<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://beescripts.com
 * @since      1.0.0
 *
 * @package    Horizontal_Post_Slider
 * @subpackage Horizontal_Post_Slider/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Horizontal_Post_Slider
 * @subpackage Horizontal_Post_Slider/includes
 * @author     aumsrini <seenu.ceo@gmail.com>
 */
class Horizontal_Post_Slider_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'horizontal-post-slider',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
