<?php
/**
 * Pagination
 *
 * Choose default, split, and numbered for listings pagination
 *
 * @param $type the type of pagination
 * @param $args the arguments
 * 
 * @since 0.0.1
 */
if( !function_exists( 'fcwp_pagination' ) ) :
	function fcwp_pagination( $type = 'default', $args = array() ) {
		new FCWP_Pagination(  $type, $args );
	}
endif;

/**
 * Post Pagination
 *
 * @since 0.0.1
 */
if( !function_exists( 'fcwp_posts_pagination ' ) ) :
	function fcwp_posts_pagination( $args = array() ) {
		new FCWP_Posts_Pagination(  $args );
	}
endif;

/**
 * Link Pages
 *
 * @since 0.0.1
 */
if( !function_exists( 'fcwp_link_pages' ) ) :
	function fcwp_link_pages( $args = array() ) {
		new FCWP_Link_Pages(  $args );
	}
endif;

/**
 * Published Date
 *
 * @since 0.0.1
 */
if( !function_exists( 'fcwp_published_date' ) ) :
	function fcwp_published_date( $args = array() ) {
		new FCPW_Published_Date(  $args );
	}
endif;