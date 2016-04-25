<?php
/**
 * @wordpress-plugin
 * Plugin Name:       Atk4-wp interface sample
 * Plugin URI:        https://github.com/ibelar/atk4wp-sample
 * Description:       Agile Toolkit integration inside WordPress. Demonstrate the use of Agile Toolkit within a WordPress plugin. This plugin create an event table within your WordPress database, add an admin menu called Event and submenu, two meta boxes within your post type, a widget for displaying last event and two samples shortcode; one displaying a user form and the other showing atk4 ajax reloading.
 * Version:           1.0.0
 * Author:            Alain Belair
 * License:           MIT
 */

// ===============
// = Plugin Name =
// ===============

namespace atk4wp;

require_once __DIR__ . '/vendor/autoload.php';
require_once WP_CONTENT_DIR . '/atk4-wp/vendor/autoload.php';

if (array_search(ABSPATH . 'wp-admin/includes/plugin.php', get_included_files()) === false)
{
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
}


$atk_plugin_name    = "atk4wp";
$atk_plugin         = __NAMESPACE__."\\Plugin";


$$atk_plugin_name = new  $atk_plugin( $atk_plugin_name, plugin_dir_path( __FILE__ ) );

if ( ! is_null( $$atk_plugin_name)) {
	register_activation_hook(__FILE__, [ $$atk_plugin_name, 'activatePlugin']);
	register_deactivation_hook(__FILE__, [ $$atk_plugin_name, 'deactivatePlugin']);

	$$atk_plugin_name->boot();
}