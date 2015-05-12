<?php
/**
 * Load admin CSS
 *
 * @package     Custom
 * @subpackage  Custom/includes
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'Custom_Public_CSS' ) ) {
	class Custom_Public_CSS {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() { 
			add_action( 'wp_enqueue_scripts', array( $this, 'load_public_css' ) );
		}

		public function load_public_css() {
			wp_enqueue_style( CUSTOM_PREFIX . '-public', CUSTOM_PLUGIN_URL . 'includes/css/public.css', array(), CUSTOM_VERSION, 'all' );
		}
	}
}