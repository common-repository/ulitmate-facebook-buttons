<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://witoni.com
 * @since             1.0.0
 * @package           ultimate_facebook_buttons
 *
 * @wordpress-plugin
 * Plugin Name:       Ulitmate Facebook Buttons By Witoni Softwares
 * Plugin URI:        http://witoni.com/
 * Description:       This plugin helps you to place Facebook Like, Share & Profile Buttons into your post/pages easily with few clicks.
 * Version:           1.0.0
 * Author:            Witoni Softwares
 * Author URI:        https://www.linkedin.com/in/rakesh-singh/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ultimate-facebook-buttons
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ULTIMATE_FACEBOOK_BUTTONS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ultimate-facebook-buttons-activator.php
 */
function activate_ultimate_facebook_buttons() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ultimate-facebook-buttons-activator.php';
	ultimate_facebook_buttons_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ultimate-facebook-buttons-deactivator.php
 */
function deactivate_ultimate_facebook_buttons() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ultimate-facebook-buttons-deactivator.php';
	ultimate_facebook_buttons_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ultimate_facebook_buttons' );
register_deactivation_hook( __FILE__, 'deactivate_ultimate_facebook_buttons' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ultimate-facebook-buttons.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ultimate_facebook_buttons() {

	$plugin = new ultimate_facebook_buttons();
	$plugin->run();

}
run_ultimate_facebook_buttons();
