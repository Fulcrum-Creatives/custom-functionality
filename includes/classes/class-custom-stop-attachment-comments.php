<?php
/**
 * Stop attachment comments
 *
 * @package     Custom
 * @subpackage  Custom/includes
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'Custom_Stop_Attachment_Comments' ) ) {
	class Custom_Stop_Attachment_Comments {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() {
			add_filter( 'comments_open', array( $this, 'stop_attachment_comments' ), 10, 2 );
		}

		/**
	     * Trun off attamchment comments
	     *
	     * @since 0.0.1
	     * @access public
	     * @return string the status of attachment comments
	     */
		public function stop_attachment_comments( $open, $post_id ) {
			$post = get_post( $post_id );
			if ( 'attachment' == $post->post_type ) {
				$open = false;
			}
			return $open;
		}
	}
}