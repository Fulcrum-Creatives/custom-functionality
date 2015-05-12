<?php
/**
 * Public Init
 *
 * @package     Custom
 * @subpackage  Custom/includes
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

class Custom_Init {

	/**
	 * Initialize the class
	 */
	public function __construct() {
		$this->public_css();
		$this->turn_off_attachment_comments();
	}

	/**
     * Load the public CSS
     *
     * @since 0.0.1
     * @access protected
     * @return void
     */
	protected function public_css() {
		new Custom_Public_CSS();
	}

	/**
     * Turn off attchment comments
     *
     * @since 0.0.1
     * @access protected
     * @return void
     */
	protected function turn_off_attachment_comments() {
		new Custom_Stop_Attachment_Comments();
	}
}