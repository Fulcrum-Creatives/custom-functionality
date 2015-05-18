<?php
/**
 * Public Init
 *
 * @package     FCWP
 * @subpackage  FCWP/includes
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

class FCWP_Init {

	/**
	 * Initialize the class
	 */
	public function __construct() {
		$this->public_css();
		$this->public_js();
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
		new FCWP_Public_CSS();
	}

	/**
     * Load the public JS
     *
     * @since 0.0.1
     * @access protected
     * @return void
     */
	protected function public_js() {
		new FCWP_Public_JS();
	}

	/**
     * Turn off attchment comments
     *
     * @since 0.0.1
     * @access protected
     * @return void
     */
	protected function turn_off_attachment_comments() {
		new FCWP_Stop_Attachment_Comments();
	}
}