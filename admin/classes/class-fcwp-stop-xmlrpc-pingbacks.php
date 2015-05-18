<?php
/**
 * Stop XMLRPC Pinbacks
 *
 * @package     FCWP
 * @subpackage  FCWP/includes
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'FCWP_Stop_XMLRPC_Pingbacks' ) ) {
	class FCWP_Stop_XMLRPC_Pingbacks {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() {
			add_filter( 'xmlrpc_methods', 'remove_xmlrpc_pingback_ping' );
		}

		/**
	     * Trun off XMLRPC Pingback
	     *
	     * @since 0.0.1
	     * @access public
	     * @return array XMLRPC methods
	     */
		public function remove_xmlrpc_pingback_ping( $methods ) {
		   unset( $methods['pingback.ping'] );
		   return $methods;
		}
	}
}