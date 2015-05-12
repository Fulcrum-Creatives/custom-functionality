<?php
/**
 * Custom Functionality plugin
 * 
 * @package     Custom
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 *
 * @wordpress-plugin
 * Plugin Name:       Custom Functionality
 * Plugin URI:        https://github.com/
 * Description:       This is a short description of what the plugin does.
 * Version:           0.0.1
 * Author:            Jason Witt
 * Author URI:        http://yoursite.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       custom
 * Domain Path:       /languages
 * GitHub Plugin URI: 
 * GitHub Branch:     
 */

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
	die;
}
if( !class_exists( 'Custom' ) ) {
	class Custom {
		
		/**
		 * Instance of the class
		 *
		 * @since 0.0.1
		 * @var Instance of Custom class
		 */
		private static $instance;

		/**
		 * Instance of the plugin
		 *
		 * @since 0.0.1
		 * @static
		 * @staticvar array $instance
		 * @return Instance
		 */
		public static function instance() {
			if ( !isset( self::$instance ) && ! ( self::$instance instanceof Custom ) ) {
				self::$instance = new Custom;
				self::$instance->define_constants();
				add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
				self::$instance->includes();
				//register_activation_hook( __FILE__, array( 'Custom_Register_Post_Type', 'flush_rewrite_rules' ) );
				self::$instance->admin_init = new Custom_Admin_Init();
				self::$instance->init = new Custom_Init();
			}
		return self::$instance;
		}

		/**
		 * Define the plugin constants
		 *
		 * @since  0.0.1
		 * @access private
		 * @return voide
		 */
		private function define_constants() {
			// Plugin Version
			if ( ! defined( 'CUSTOM_VERSION' ) ) {
				define( 'CUSTOM_VERSION', '0.0.1' );
			}
			// Prefix
			if ( ! defined( 'CUSTOM_PREFIX' ) ) {
				define( 'CUSTOM_PREFIX', 'custom' );
			}
			// Textdomain
			if ( ! defined( 'CUSTOM_TEXTDOMAIN' ) ) {
				define( 'CUSTOM_TEXTDOMAIN', 'custom' );
			}
			// Plugin Options
			if ( ! defined( 'CUSTOM_OPTIONS' ) ) {
				define( 'CUSTOM_OPTIONS', 'custom-options' );
			}
			// Plugin Directory
			if ( ! defined( 'CUSTOM_PLUGIN_DIR' ) ) {
				define( 'CUSTOM_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
			}
			// Plugin URL
			if ( ! defined( 'CUSTOM_PLUGIN_URL' ) ) {
				define( 'CUSTOM_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
			}
			// Plugin Root File
			if ( ! defined( 'CUSTOM_PLUGIN_FILE' ) ) {
				define( 'CUSTOM_PLUGIN_FILE', __FILE__ );
			}
		}

		/**
		 * Load the required files
		 *
		 * @since  0.0.1
		 * @access private
		 * @return void
		 */
		private function includes() {
			$includes_path = plugin_dir_path( __FILE__ ) . 'includes/';

			require_once CUSTOM_PLUGIN_DIR . 'admin/classes/class-custom-remove-customizer.php';
			require_once CUSTOM_PLUGIN_DIR . 'admin/classes/class-custom-admin-css.php';
			require_once CUSTOM_PLUGIN_DIR . 'admin/classes/class-custom-remove-admin-bar-link.php';
			require_once CUSTOM_PLUGIN_DIR . 'admin/classes/class-custom-add-admin-bar-link.php';
			require_once CUSTOM_PLUGIN_DIR . 'admin/classes/class-custom-add-menu-items.php';
			//require_once CUSTOM_PLUGIN_DIR . 'admin/classes/class-custom-rename-post.php';
			require_once CUSTOM_PLUGIN_DIR . 'admin/class-custom-admin-init.php';

			require_once CUSTOM_PLUGIN_DIR . 'includes/classes/class-custom-stop-attachment-comments.php';
			require_once CUSTOM_PLUGIN_DIR . 'includes/classes/class-custom-public-css.php';
			//require_once CUSTOM_PLUGIN_DIR . 'includes/classes/class-custom-widget.php';
			//require_once CUSTOM_PLUGIN_DIR . 'includes/classes/class-custom-register-post-type.php';
			//require_once CUSTOM_PLUGIN_DIR . 'includes/classes/class-custom-register-taxonomies.php';
			require_once CUSTOM_PLUGIN_DIR . 'includes/class-custom-init.php';
		}

		/**
		 * Load the plugin text domain for translation.
		 *
		 * @since  0.0.1
		 * @access public
		 */
		public function load_textdomain() {
			$custom_lang_dir = dirname( plugin_basename( CUSTOM_PLUGIN_FILE ) ) . '/languages/';
			$custom_lang_dir = apply_filters( 'custom_lang_dir', $custom_lang_dir );
			$locale = apply_filters( 'plugin_locale',  get_locale(), CUSTOM_TEXTDOMAIN );
			$mofile = sprintf( '%1$s-%2$s.mo', CUSTOM_TEXTDOMAIN, $locale );
			$mofile_local  = $custom_lang_dir . $mofile;
			if ( file_exists( $mofile_local ) ) {
				load_textdomain( CUSTOM_TEXTDOMAIN, $mofile_local );
			} else {
				load_plugin_textdomain( CUSTOM_TEXTDOMAIN, false, $custom_lang_dir );
			}
		}

		/**
		 * Throw error on object clone
		 *
		 * @since  0.0.1
		 * @access public
		 * @return void
		 */
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', CUSTOM_TEXTDOMAIN ), '1.6' );
		}

		/**
		 * Disable unserializing of the class
		 *
		 * @since  0.0.1
		 * @access public
		 * @return void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', CUSTOM_TEXTDOMAIN ), '1.6' );
		}

	}
}
/**
 * Return the instance 
 *
 * @since 0.0.1
 * @return object The Safety Links instance
 */
function Custom_Run() {
	return Custom::instance();
}
Custom_Run();