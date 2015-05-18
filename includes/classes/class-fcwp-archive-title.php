<?php
/**
 * Archive Title
 *
 * @package     FCWP
 * @subpackage  FCWP/includes
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'FCWP_Archive_Title' ) ) {
	class FCWP_Archive_Title {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct( $args ) {
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
				'container'       => 'h1',
				'container_id'    => 'section-heading-' . get_the_ID(),
				'container_class' => 'entry__title',
				'container_attr'  => '',
				'category_text'   => 'Category: ',
				'tag_text'        => 'Tag: ',
				'author_text'     => 'Author: ',
				'year_text'       => 'Year: ',
				'month_text'      => 'Month: ',
				'day_text'        => 'Day: ',
				'archives_text'   => 'Archives: ',
				'year_format'     => 'Y',
				'month_format'    => 'F Y',
				'day_format'      => 'F j, Y'
			);
	        $this->args = array_merge( $defaults, $this->args );
		}

		/**
		 * Display the archive title
		 *
		 * @since 0.0.1
         * @access public
         * @return string the html output for the published time
		 */
		public function display() {
			$container_id    = ( !empty( $this->args['container_id'] ) ? 'id="' . $this->args['container_id'] . '"' : "" );
			$container_class = ( !empty( $this->args['container_class'] ) ? 'class="' . $this->args['container_class'] . '"' : "" );
			$container_attr  = ( !empty( $this->args['container_attr'] ) ? $this->args['container_attr'] : "" );
			$category_text   = ( !empty( $this->args['category_text'] ) ? __( $this->args['category_text'], FCWP_TAXDOMAIN) : "" );
			$tag_text        = ( !empty( $this->args['tag_text'] ) ? __( $this->args['tag_text'], FCWP_TAXDOMAIN) : "" );
			$author_text     = ( !empty( $this->args['author_text'] ) ? __( $this->args['author_text'], FCWP_TAXDOMAIN) : "" );
			$year_text       = ( !empty( $this->args['year_text'] ) ? __( $this->args['year_text'], FCWP_TAXDOMAIN) : "" );
			$month_text      = ( !empty( $this->args['month_text'] ) ? __( $this->args['month_text'], FCWP_TAXDOMAIN) : "" );
			$day_text        = ( !empty( $this->args['day_text'] ) ? __( $this->args['day_text'], FCWP_TAXDOMAIN) : "" );
			$archives_text   = ( !empty( $this->args['archives_text'] ) ? __( $this->args['archives_text'], FCWP_TAXDOMAIN) : "" );
			$year_format     = ( !empty( $this->args['year_format'] ) ? __( $this->args['year_format'], FCWP_TAXDOMAIN) : "" );
			$month_format    = ( !empty( $this->args['month_format'] ) ? __( $this->args['month_format'], FCWP_TAXDOMAIN) : "" );
			$day_format      = ( !empty( $this->args['day_format'] ) ? __( $this->args['day_format'], FCWP_TAXDOMAIN) : "" );

			echo '<' . $this->args['container'] . ' ' . $container_id . ' ' . $container_class  . ' ' . $container_attr . '>';
				if ( is_category() ) {
					$title = sprintf( esc_html__( $category_text . '%s', FCWP_TAXDOMAIN ), single_cat_title( '', false ) );
				} elseif ( is_tag() ) {
					$title = sprintf( esc_html__( $tag_text . '%s', FCWP_TAXDOMAIN ), single_tag_title( '', false ) );
				} elseif ( is_author() ) {
					$title = sprintf( esc_html__( $author_text . '%s', FCWP_TAXDOMAIN ), '<span class="vcard">' . get_the_author() . '</span>' );
				} elseif ( is_year() ) {
					$title = sprintf( esc_html__( $year_text . '%s', FCWP_TAXDOMAIN ), get_the_date( esc_html__( $year_format, FCWP_TAXDOMAIN ) ) );
				} elseif ( is_month() ) {
					$title = sprintf( esc_html__( $month_text . '%s', FCWP_TAXDOMAIN ), get_the_date( esc_html__( $month_format, FCWP_TAXDOMAIN ) ) );
				} elseif ( is_day() ) {
					$title = sprintf( esc_html__( $day_text . '%s', FCWP_TAXDOMAIN ), get_the_date( esc_html__( $day_format, FCWP_TAXDOMAIN ) ) );
				} elseif ( is_post_type_archive() ) {
					$title = sprintf( esc_html__( $archives_text . '%s', FCWP_TAXDOMAIN ), post_type_archive_title( '', false ) );
				} elseif ( is_tax() ) {
					$tax = get_taxonomy( get_queried_object()->taxonomy );
					/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
					$title = sprintf( esc_html__( '%1$s: %2$s', FCWP_TAXDOMAIN ), $tax->labels->singular_name, single_term_title( '', false ) );
				} else {
					$title = esc_html__( $archives_text , FCWP_TAXDOMAIN );
				}
				/**
				 * Filter the archive title.
				 *
				 * @param string $title Archive title to be displayed.
				 */
				$title = apply_filters( 'get_the_archive_title', $title );
				echo $title;
			echo '</' . $this->args['container'] . '>';
		}
	}
}