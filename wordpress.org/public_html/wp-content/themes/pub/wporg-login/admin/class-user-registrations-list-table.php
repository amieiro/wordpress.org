<?php
if ( ! class_exists( 'WP_List_Table' ) ){
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class User_Registrations_List_Table extends WP_List_Table {

	function get_views() {
		global $wpdb;

		$views = [
			[
				'all',
				'All',
			],
			[
				'pending',
				'Pending Email Confirmation',
			],
			[
				'registered',
				'Completed registration',
			],
			[
				'spam',
				'Caught in spam',
			],
			[
				'heuristics-review',
				'Heuristics: Review',
			],
			[
				'heuristics-block',
				'Heuristics: Block',
			],
			[
				'banned-users',
				'Recent Banned Users',
			]
		];

		$current_view = $this->get_current_view();

		if ( ! empty( $_GET['s'] ) ) {
			$views[0] = [
				'search', 'All search results'
			];

			array_unshift( $views, [ 'all', 'All' ] );
		}

		return array_map(
			function( $item ) use ( $current_view ) {
				global $wpdb;

				$view      = $item[0];
				$is_search = ( ! empty( $_GET['s'] ) && 'all' != $view );

				// If we're searching, and the search didn't have any results, all the "sub views" are 0.
				if ( $is_search && ! $this->get_view_total_count( 'search' ) ) {
					$count = 0;
				} else {
					$count = $this->get_view_total_count( $view );
				}

				$url = admin_url( 'admin.php?page=user-registrations' );
				if ( $is_search ) {
					$url = add_query_arg( 's', urlencode( wp_unslash( $_GET['s'] ) ), $url );
				}

				if ( 'all' !== $view ) {
					$url = add_query_arg( 'view', $view, $url );
				}

				return sprintf(
					'<a href="%s" class="%s">%s <span class="count">(%s)</span></a>',
					$url,
					$current_view === $view ? 'current' : '',
					$item[1],
					number_format_i18n( $count ),
				);
			}, $views
		);
	}

	/**
	 * Get the current view to display.
	 *
	 * @return string
	 */
	protected function get_current_view() {
		$view = $_REQUEST['view'] ?? false;
		if ( ! $view ) {
			$view = 'all';
			if ( ! empty( $_GET['s'] ) ) {
				$view = 'search';
			}
		}

		if ( 'all' === $view && ! empty( $_GET['s'] ) ) {
			$view = 'search';
		}

		return $view;
	}

	/**
	 * Get the total count for a given view.
	 *
	 * @param string $view The view to get the count for.
	 * @return int
	 */
	protected function get_view_total_count( $view ) {
		global $wpdb;
		static $counts = [];

		// Search view has no results if no search term...
		if ( 'search' === $view && empty( $_GET['s'] ) ) {
			return 0;
		}

		$current_view = $this->get_current_view();
		if ( $view === $current_view ) {
			return $this->get_pagination_arg( 'total_items' );
		}

		$counts[ $view ] ??= $wpdb->get_var(
			"SELECT count(*) FROM {$wpdb->base_prefix}user_pending_registrations registrations " .
			$this->get_join_where_sql( $view )
		);

		return $counts[ $view ];
	}

	/**
	 * Get the SQL WHERE clause for a given view.
	 *
	 * @param string $view The view to get the WHERE clause for.
	 * @return string
	 */
	protected function get_view_sql_where( $view ) {
		switch ( $view ) {
			case 'pending':
				return 'created = 0 AND cleared = 1';
			case 'spam':
				return 'cleared = 0';
			case 'akismet':
				return "meta LIKE '%akismet_result\":\"spam%'";
			case 'heuristics-allow':
				return "meta LIKE '%heuristics\":\"allow%'";
			case 'heuristics-review':
				return "meta LIKE '%heuristics\":\"review%'";
			case 'heuristics-block':
				return "meta LIKE '%heuristics\":\"block%'";
			case 'registered':
				return 'created = 1';
			case 'banned-users':
				return 'created = 1 AND users.user_pass LIKE "BLOCKED%"';
			default:
			case 'all':
				return '1=1';
		}
	}

	/**
	 * Get the SQL JOIN and WHERE clause for a given view.
	 *
	 * @param string $view The view to get the JOIN and WHERE clause for.
	 * @return string
	 */
	protected function get_join_where_sql( $view = null ) {
		global $wpdb;

		$join  = '';
		$where = ' WHERE ';
		$where .= $this->get_view_sql_where( $view ?: ( $_REQUEST['view'] ?? 'all' ) );

		if ( isset( $_GET['s'] ) && 'all' != $view ) {
			$where .= ' ';

			$search_term = wp_unslash( $_GET['s'] );
			$search_like = '%' . $wpdb->esc_like( $search_term ) . '%';

			// Limit searches to where they're likely, for performance.
			if ( str_contains( $search_term, '@' ) ) {
				// If it looks like a full email, exact match.
				if ( preg_match( '/^.{3,}@.+[.].+$/', $search_term ) ) {
					// Looks like an email, so just search the emails.
					$where .= $wpdb->prepare(
						"AND registrations.user_email = %s",
						$search_term
					);
				} else {
					// Otherwise, a wildcard on the email.
					$where .= $wpdb->prepare(
						"AND registrations.user_email LIKE %s",
						$search_like
					);
				}
			} elseif (
				// If it looks like an IP
				preg_match( '/^\d{1,3}\.[0-9.]*$/', $search_term ) ||
				// Or it looks like a country code, 
				preg_match( '/^[A-Z]{2}$/', $search_term )
			) {
				// then only look in metadata, case sensitive.
				$where .= $wpdb->prepare(
					"AND registrations.meta LIKE BINARY %s",
					'%"' . $wpdb->esc_like( $search_term ) . '%' // Anchor it with a " at the start of the field.
				);
			} else {
				// Otherwise, search everything.
				$where .= $wpdb->prepare(
					"AND (
						registrations.user_login LIKE %s OR
						registrations.user_email LIKE %s OR
						registrations.meta LIKE %s OR
						description.meta_value LIKE %s
					)",
					$search_like, $search_like, $search_like, $search_like
				);
			}
		}

		// Join if the view needs the users or description table.
		if ( strpos( $where . $join, 'users.' ) || strpos( $where, 'description.' ) || (  'banned-users' === $view ?: ( $_REQUEST['view'] ?? 'all' )  ) ) {
			$join .= " LEFT JOIN {$wpdb->users} users ON registrations.created = 1 AND registrations.user_login = users.user_login";
		}
		if ( strpos( $where, 'description.' ) ) {
			$join .= " LEFT JOIN {$wpdb->usermeta} description ON users.ID = description.user_id AND description.meta_key = 'description'";
		}

		if ( 'banned-users' === ( $view ?: ( $_REQUEST['view'] ?? 'all' ) ) ) {
			$join .= " LEFT JOIN {$wpdb->usermeta} notes ON users.ID = notes.user_id AND notes.meta_key = '_wporg_bbp_user_notes'";
		}

		return $join . $where;
	}

	public function get_columns() {
		return [
			'cb'              => '<input type="checkbox" />',
			'user_login'      => 'User Login',
			'meta'            => 'Meta',
			'scores'          => 'Anti-spam<br>reCaptcha Akismet',
			'user_registered' => 'Registered',
		];
	 }

	 public function get_sortable_columns() {
		return [
			'user_login'      => array( 'user_login', true ),
			'scores'          => array( 'scores', true ),
			'user_registered' => array( 'user_registered', true ),
		];
	}

	protected function get_bulk_actions() {
		return array(
			'reg_block' => 'Block Reg / Ban user',
		);
	}

	function prepare_items() {
		global $wpdb;

		$this->_column_headers = array( 
			$this->get_columns(),
			array(),
			$this->get_sortable_columns(),
		);

		$sort_column = $_GET['orderby'] ?? 'pending_id';
		$sort_order = strtoupper( $_GET['order'] ?? 'DESC' );

		if ( ! in_array( $sort_order, [ 'DESC', 'ASC' ] ) ) {
			$sort_order = 'DESC';
		}
		if ( ! isset( $this->get_sortable_columns()[ $sort_column ] ) ) {
			$sort_column = 'pending_id';
		}
		if ( 'banned-users' === ( $_GET['view'] ?? '' ) ) {
			$sort_column = 'notes.umeta_id';
			$sort_order = 'DESC';
		}

		$per_page     = $_GET['per_page'] ?? $this->get_items_per_page( 'users_per_page', 100 );
		$current_page = $this->get_pagenum();

		$join_where = $this->get_join_where_sql();

		$per_page_offset = ($current_page-1) * $per_page;

		$this->items = $wpdb->get_results(
			"SELECT SQL_CALC_FOUND_ROWS registrations.*
			FROM {$wpdb->base_prefix}user_pending_registrations registrations
			$join_where
			ORDER BY {$sort_column} {$sort_order}
			LIMIT {$per_page_offset}, {$per_page}"
		);

		$total_items = $wpdb->get_var( 'SELECT FOUND_ROWS()' );

		// Prime the user lookups.
		$logins = wp_list_pluck( wp_list_filter( $this->items, [ 'created' => true ] ), 'user_login' );
		if ( $logins ) {
			get_users( [
				'login__in' => $logins,
				'fields'    => 'all_with_meta'
			] );
		}

		foreach ( $this->items as $i => $item ) {
			$this->items[$i]->user       = $item->created ? get_user_by( 'login', $item->user_login ) : false;
			$this->items[$i]->pending_id = (int) $this->items[$i]->pending_id;
			$this->items[$i]->cleared    = (int) $this->items[$i]->cleared;
			$this->items[$i]->created    = (int) $this->items[$i]->created;
			$this->items[$i]->meta       = json_decode( $this->items[$i]->meta );
			$this->items[$i]->scores     = json_decode( $this->items[$i]->scores );
		}

		$this->set_pagination_args([
			'total_items' => $total_items,
			'per_page'    => $per_page,
		]);

	}

	protected function bulk_actions( $which = '' ) {
		parent::bulk_actions( $which );

		if ( 'top' !== $which ) {
			return;
		}
		?>

		<fieldset class="alignleft actions">
			<input name="block_reason" id="block_reason" placeholder="Ban/Block reason. Used for bulk + single." style="width: 32em;padding: 0.4em;margin: 0;" value="<?php echo esc_attr( $_REQUEST['block_reason'] ?? '' ); ?>" />
		</fieldset>
		<?php
	}

	function single_row( $item ) {
		$classes = $this->get_row_class( $item );
		printf( '<tr class="%s">', esc_attr( implode( ' ', $classes ) ) );
		$this->single_row_columns( $item );
		echo '</tr>';
	}

	function get_row_class( $item ) {
		$classes = [];

		if ( ! empty( $_GET['view'] ) && 'all' !== $_GET['view'] ) {
			return $classes;
		}

		if (
			$item->user &&
			'BLOCKED' === substr( $item->user->user_pass, 0, 7 )
		) {
			$classes[] = 'blocked';
		} elseif ( $item->created ) {
			$classes[] = 'created';
		} elseif ( $item->cleared > 1 ) {
			$classes[] = 'manually-approved';
		} elseif ( $item->cleared ) {
			$classes[] = 'cleared';
		} else {
			$classes[] = 'failed';
		}

		return $classes;
	}

	public function column_cb( $item ) {
		return sprintf(
			'<input type="checkbox" name="pending_ids[]" value="%1$s" />',
			esc_attr( $item->pending_id ),
		);
	}

	function column_default( $item, $column_name ) {
		echo esc_html( $item->$column_name );
	}

	function column_user_registered( $item ) {
		printf(
			'<abbr title="%s">%s ago</abbr>',
			esc_attr( $item->user_registered ),
			human_time_diff( strtotime( $item->user_registered ) )
		);

		if ( $item->created_date && '0000-00-00 00:00:00' !== $item->created_date ) {
			printf(
				'<br>Created: <abbr title="%s">%s ago</abbr>',
				esc_attr( $item->created_date ),
				human_time_diff( strtotime( $item->created_date ) )
			);
		}
	}

	function column_user_login( $item ) {
		if ( $item->created ) {
			$url = esc_url( 'https://profiles.wordpress.org/' . $item->user_login . '/' );
			echo "<a href='$url'>" . esc_html( $item->user_login ) . '</a>';

			if (
				$item->user &&
				'BLOCKED' === substr( $item->user->user_pass, 0, 7 )
			) {
				echo ' <span class="delete-red">(banned)</span>';
			}

		} else {
			echo esc_html( $item->user_login );
		}

		echo '<hr>';

		echo $this->link_to_search( $item->user_email );

		$row_actions = [];

		if ( ! $item->created && $item->cleared ) {
			$url = add_query_arg(
				'email',
				urlencode( $item->user_email ),
				admin_url( 'admin-post.php?action=login_resend_email' )
			);
			$url = wp_nonce_url( $url, 'resend_' . $item->user_email );

			$row_actions['resend'] = '<a href="' . esc_url( $url ) . '">Resend Email</a>';
		}

		if ( ! $item->created ) {
			if ( $item->user_activation_key ) {
				$url = add_query_arg(
					'email',
					urlencode( $item->user_email ),
					admin_url( 'admin-post.php?action=login_block' )
				);
				$url = wp_nonce_url( $url, 'block_' . $item->user_email );
	
				$row_actions['block'] = '<a href="' . esc_url( $url ) . '">Block Registration</a>';
			}

			$url = add_query_arg(
				'email',
				urlencode( $item->user_email ),
				admin_url( 'admin-post.php?action=login_delete' )
			);
			$url = wp_nonce_url( $url, 'delete_' . $item->user_email );

			$row_actions['delete'] = '<a href="' . esc_url( $url ) . '">Delete</a>';

		} else {
			$url = add_query_arg(
				'user',
				urlencode( $item->user->user_login ),
				admin_url( 'admin-post.php?action=login_block_account' )
			);
			$url = wp_nonce_url( $url, 'block_account_' . $item->user->ID );

			if ( $item->user && 'BLOCKED' !== substr( $item->user->user_pass, 0, 7 ) ) {
				$row_actions['block-account'] = '<a href="' . esc_url( $url ) . '">Block Account</a>';
			}

		}

		if ( $row_actions ) {
			echo $this->row_actions( $row_actions );
		}

	}

	function column_meta( $item ) {
		$meta = $item->meta;

		echo '<div>';

		$ips = [];
		foreach ( [ 'registration', 'confirmed' ] as $field ) {
			if ( empty( $meta->{$field . '_ip'} ) ) {
				continue;
			}
			$ip = $meta->{$field . '_ip'};

			if ( empty( $meta->{$field . '_ip_country'} ) ) {
				$meta->{$field . '_ip_country'} = ( is_callable( 'WordPressdotorg\GeoIP\query' ) ? \WordPressdotorg\GeoIP\query( $ip, 'country_short' ) : '' );
			}

			$ips[] = $ip . ' ' . $meta->{$field . '_ip_country'};
		}

		echo implode( ', ', array_map( array( $this, 'link_to_Search' ), array_unique( $ips ) ) );

		echo '<hr>';

		foreach ( [ 'url', 'from', 'occ', 'interests', 'source' ] as $field ) {
			if ( !empty( $meta->$field ) ) {
				printf( "%s: %s<br>", esc_html( $field ), $this->link_to_search( $meta->$field ) );
			}
		}

		// Add other meta after an account is created
		if ( $item->user ) {
			// Forum profile description (this is where the spam usually is)
			if ( $desc = get_user_meta( $item->user->ID, 'description', true ) ) {
				printf( "forum bio: %s<br>", $this->link_to_search( $desc ) );
			}
		}

		echo '</div>';
	}

	function column_scores( $item ) {

		echo ( $item->cleared ? 'Passed' : 'Failed' ) . '<br>';

		foreach ( $item->scores as $type => $val ) {
			printf(
				'<abbr title="%s">%s</abbr> ',
				esc_attr( $type ),
				esc_html( $val )
			);
		}

		$akismet = $item->meta->akismet_result ?? '';
		if ( $akismet ) {
			printf(
				'<abbr title="%s">%s</abbr> ',
				esc_attr( 'Akismet' ),
				esc_html( strtolower( $akismet ) )
			);
		}

		$heuristics = $item->meta->heuristics ?? '';
		if ( $heuristics ) {
			printf(
				'<abbr title="%s">%s</abbr> ',
				esc_attr( 'Heuristics' ),
				esc_html( strtolower( $heuristics ) )
			);
		}

		$block_reason = (array) ( $item->meta->block_reason ?? [] );
		if ( $block_reason ) {
			$first_key = array_keys( $block_reason )[0];
			$title     = ( is_numeric( $first_key ) ? '' : "{$first_key}: " ) . ( $block_reason[ $first_key ] ?? '' );
			unset( $block_reason[ $first_key ] );

			if ( wp_is_numeric_array( $block_reason ) && 1 == count( $block_reason ) ) {
				$details = array_shift( $block_reason );
			} else {
				$details = print_r( $block_reason, true );
			}

			printf(
				'<abbr title="%s">%s</abbr> ',
				esc_attr( $details ),
				esc_html( $title )
			);
		}

		$row_actions = [];

		if ( ! $item->created && $item->user_activation_key ) {
			$url = add_query_arg(
				'email',
				urlencode( $item->user_email ),
				admin_url( 'admin-post.php?action=login_block' )
			);
			$url = wp_nonce_url( $url, 'block_' . $item->user_email );

			$row_actions['block'] = '<a href="' . esc_url( $url ) . '">Block Registration</a>';
		}

		if ( ! $item->cleared ) {
			$url = add_query_arg(
				'email',
				urlencode( $item->user_email ),
				admin_url( 'admin-post.php?action=login_mark_as_cleared' )
			);
			$url = wp_nonce_url( $url, 'clear_' . $item->user_email );
			$row_actions['approve-reg'] = '<a href="' . esc_url( $url ) . '">Approve</a>';
		}

		if ( $row_actions ) {
			echo $this->row_actions( $row_actions );
		}
	}

	function link_to_search( $s ) {
		$parts = preg_split( '/([^\w\.-])/ui', $s, -1, PREG_SPLIT_DELIM_CAPTURE );
		if ( ! $parts ) {
			$parts = array( $s );
		}

		return implode( '', array_map( function( $s ) {
			if ( strlen( $s ) >= 3 || preg_match( '/^[A-Z]{2}$/', $s ) /* country */ ) {
				return '<a href="' . esc_url( add_query_arg( 's', urlencode( $s ), admin_url( 'admin.php?page=user-registrations' ) ) ) . '">' . esc_html( $s ) . '</a>';
			}
			return esc_html( $s );
		}, $parts ) );
	}

}
