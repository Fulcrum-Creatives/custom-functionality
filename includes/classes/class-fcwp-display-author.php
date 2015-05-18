<?php
/**
 * Display Post Author
 *
 * @package     FCWP
 * @subpackage  FCWP/includes
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'FCWP_Display_Author' ) ) {
	class FCWP_Display_Author {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct( $args = array() ) {
			$this->args = $args;
			$this->arguments();
			$this->display();
		}

		/**
		 * The class arguments
		 *
		 * @global $paged the paged number
		 * 
		 * @since 0.0.1
         * @access private
         * @return void
		 */
		private function arguments() {
			$defaults = array(
				'container'         => 'span',
				'container_id'      => '',
				'container_class'   => 'meta__author author vcard',
				'container_attr'    => '',
				'author_text'       => 'By: ',
				'is_linked'         => true,
				'author_link_id'    => '',
				'author_link_class' => 'url fn n',
				'author_link_attr'  => 'rel="bookmark"'
			);
	        $this->args = array_merge( $defaults, $this->args );
		}

		/**
		 * Display the published time
		 *
		 * @since 0.0.1
         * @access public
         * @return string the html output for the published time
		 */
		public function display() {
			$container_id      = ( !empty( $this->args['container_id'] ) ? 'id="' . $this->args['container_id'] . '"' : "" );
			$container_class   = ( !empty( $this->args['container_class'] ) ? 'class="' . $this->args['container_class'] . '"' : "" );
			$container_attr    = ( !empty( $this->args['container_attr'] ) ? $this->args['container_attr'] : "" );
			$author_text       = ( !empty( $this->args['author_text'] ) ? $this->args['author_text'] : "" );
			$author_link_id    = ( !empty( $this->args['author_link_id'] ) ? 'id="' . $this->args['author_link_id'] . '"' : "" );
			$author_link_class = ( !empty( $this->args['author_link_class'] ) ? 'class="' . $this->args['author_link_class'] . '"' : "" );
			$author_link_attr  = ( !empty( $this->args['author_link_attr'] ) ? $this->args['author_link_attr'] : "" );
			$string            = '';
			
			if( $this->args['is_linked'] != true ) {
				$string = '<' . $this->args['container'] . ' ' . $container_id . ' ' . $container_class  . ' ' . $container_attr . '>' .
								esc_html__( $author_text, FCWP_TAXDOMAIN ) . esc_html( get_the_author() ) . '
						   </' . $this->args['container'] . '>';
			} else {
				$string = '<' . $this->args['container'] . ' ' . $container_id . ' ' . $container_class  . ' ' . $container_attr . '>' .
						  esc_html__( $author_text, FCWP_TAXDOMAIN ) . '
							<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" ' . $author_link_id . ' ' . $author_link_class  . ' ' . $author_link_attr . '>' . 
								esc_html( get_the_author() ) . '
							</a>
					      </' . $this->args['container'] . '>';
			}

			echo $string;
		}
	}
}