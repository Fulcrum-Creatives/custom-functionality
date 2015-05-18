<?php
/**
 * Remove the Customizer
 *
 * @package     FCWP
 * @subpackage  FCWP/Admin
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'FCWP_Remove_Customizer' ) ) {
	class FCWP_Remove_Customizer {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() {
			add_action( 'load-customize.php', array( $this, 'deny_access' ) );
			add_action( 'admin_menu', array( $this, 'remove_submenus' ) );
			add_action( 'wp_before_admin_bar_render', array( $this, 'remove_admin_bar_links' ) );
		}

		/**
         * Deny access to customizer page
         *
         * @since 0.0.1
         * @access public
         * @return void
         */
		public function deny_access() {
			// Disallow acces to an empty editor
			wp_die( sprintf( __( 'No WordPress Theme Customizer support - If needed check your functions.php' ) ) . sprintf( '<br /><a href="javascript:history.go(-1);">Go back</a>' ) );
		}

		/**
         * Remove customizer from menu
         *
         * @since 0.0.1
         * @access public
         * @return void
         */
		public function remove_submenus() {
			global $submenu;
			unset($submenu['themes.php'][6]);
		}

		/**
         * Remove customizer from admin bar
         *
         * @since 0.0.1
         * @access public
         * @return void
         */
		public function remove_admin_bar_links() {
		    global $wp_admin_bar;
		    $wp_admin_bar->remove_menu('customize');
		}
	}
}