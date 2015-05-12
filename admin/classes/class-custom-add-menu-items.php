<?php
/**
 * Add Custom Menu Items
 *
 * @package     Custom
 * @subpackage  Custom/Admin
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'Custom_Add_Menu_Items' ) ) {
	class Custom_Add_Menu_Items {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() { 
			if( class_exists( 'acf' ) ) {
				$this->add_theme_settings();
				$this->add_social_settings();
				$this->add_company_settings();
				$this->add_logos_settings();
			}
		}


		/**
         * Add theme settings page
         *
         * @since 0.0.1
         * @access public
         * @return void
         */
		public function add_theme_settings(){
		    if( function_exists( 'acf_add_options_page') ) {
				acf_add_options_page( array( 
					'page_title'  => 'Theme Settings' 
				) );
			}
		}

		/**
         * Add social settings page
         *
         * @since 0.0.1
         * @access public
         * @return void
         */
		public function add_social_settings(){
		    if( function_exists( 'acf_add_options_sub_page') ) {
				acf_add_options_sub_page( array( 
					'page_title'  => 'Social Links',
					'parent_slug' => 'options-general.php'
				) );
			}
		}

		/**
         * Add company settings page
         *
         * @since 0.0.1
         * @access public
         * @return void
         */
		public function add_company_settings(){
		    if( function_exists( 'acf_add_options_sub_page') ) {
				acf_add_options_sub_page( array( 
					'page_title'  => 'Company Information',
					'parent_slug' => 'options-general.php'
				) );
			}
		}

		/**
         * Add logos settings page
         *
         * @since 0.0.1
         * @access public
         * @return void
         */
		public function add_logos_settings(){
		    if( function_exists( 'acf_add_options_sub_page') ) {
				acf_add_options_sub_page( array( 
					'page_title'  => 'Logos',
					'parent_slug' => 'themes.php'
				) );
			}
		}
	}
}