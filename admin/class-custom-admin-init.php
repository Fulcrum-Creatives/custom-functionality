<?php
/**
 * Admin Init
 *
 * @package     Custom
 * @subpackage  Custom/includes
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'Custom_Admin_Init' ) ) {
	class Custom_Admin_Init {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() {
			$this->admin_css();
			$this->add_admin_bar_link();
			$this->remove_admin_bar_link();
			$this->remove_customizer();
			$this->add_menu_items();
		}

		/**
         * Load the admin CSS
         *
         * @since 0.0.1
         * @access protected
         * @return void
         */
		protected function admin_css() {
			new Custom_Admin_CSS();
		}

		/**
         * Add custom admin bar links
         *
         * @since 0.0.1
         * @access protected
         * @return void
         */
		protected function add_admin_bar_link() {
			new Custom_Add_Admin_Bar_Link();
		}

		/**
         * Remove custom admin bar links
         *
         * @since 0.0.1
         * @access protected
         * @return void
         */
		protected function remove_admin_bar_link() {
			new Custom_Remove_Admin_Bar_Link();
		}
		
		/**
         * Remove Customizer
         *
         * @since 0.0.1
         * @access protected
         * @return void
         */
		protected function remove_customizer() {
			new Custom_Remove_Customizer();
		}

		/**
         * Add menu items
         *
         * @since 0.0.1
         * @access protected
         * @return void
         */
		protected function add_menu_items() {
			new Custom_Add_Menu_Items();
		}
	}
}