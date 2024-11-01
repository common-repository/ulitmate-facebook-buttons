<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://witoni.com
 * @since      1.0.0
 *
 * @package    ultimate_facebook_buttons
 * @subpackage ultimate_facebook_buttons/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    ultimate_facebook_buttons
 * @subpackage ultimate_facebook_buttons/includes
 * @author     Your Name <support@witoni.com>
 */
class ultimate_facebook_buttons_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ultimate-facebook-buttons',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
