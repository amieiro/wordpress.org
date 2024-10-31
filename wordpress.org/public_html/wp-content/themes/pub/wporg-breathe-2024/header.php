<?php

\WordPressdotorg\skip_to( '#primary' );

echo do_blocks( '<!-- wp:wporg/global-header {"style":{"border":{"bottom":{"color":"var:preset|color|white-opacity-15","style":"solid","width":"1px"}}}} /-->' );

if ( is_front_page() && is_home() ) {
	echo do_blocks( '<!-- wp:pattern {"slug":"wporg-breathe/local-nav-home"} /-->' );
} else {
	echo do_blocks( '<!-- wp:pattern {"slug":"wporg-breathe/local-nav"} /-->' );
}

do_action( 'wporg_breathe_after_header' );

?>

<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>

	<div id="main" class="site-main clear">
