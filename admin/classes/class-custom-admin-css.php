<?php
/**
 * Load admin CSS
 *
 * @package     Custom
 * @subpackage  Custom/Admin
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'Custom_Admin_CSS' ) ) {
	class Custom_Admin_CSS {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() { 
			add_action( 'admin_enqueue_scripts', array( $this, 'load_admin_css' ) );
		}

		public function load_admin_css() {
			wp_enqueue_style( CUSTOM_PREFIX . '-admin', CUSTOM_PLUGIN_URL . 'admin/css/admin.css', array(), CUSTOM_VERSION, 'all' );
		}
	}
}