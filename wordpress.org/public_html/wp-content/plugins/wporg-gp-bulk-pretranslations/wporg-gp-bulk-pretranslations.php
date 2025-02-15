<?php
/**
 * Plugin Name: WordPress.org bulk pre-translations
 * Description: Pre-translate strings in GlotPress projects using internal and external tools.
 * Version:     0.1.0
 * Author:      WordPress.org
 * Author URI:  https://wordpress.org/
 * License:     GPLv2 or later
 * Text Domain: wporg-gp-bulk-pretranslations
 *
 * @package WordPressdotorg\GlotPress\Bulk_Pretranslations
 */

namespace WordPressdotorg\GlotPress\Bulk_Pretranslations;

use WordPressdotorg\Autoload;

// Store the root plugin file for usage with functions which use the plugin basename.
define( __NAMESPACE__ . '\PLUGIN_FILE', __FILE__ );

if ( ! class_exists( '\WordPressdotorg\Autoload\Autoloader', false ) ) {
	include __DIR__ . '/vendor/wordpressdotorg/autoload/class-autoloader.php';
}

// Register an Autoloader for all files.
Autoload\register_class_path( __NAMESPACE__, __DIR__ . '/inc' );
// Instantiate the Plugin.
Plugin::get_instance();

