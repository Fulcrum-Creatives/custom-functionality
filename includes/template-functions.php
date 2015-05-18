<?php
/**
 * Archive Title
 * @since 0.0.1
 */
if( !function_exists( 'fcwp_archive_title' ) ) :
	function fcwp_archive_title( $args = array() ) {
		new FCWP_Archive_Title(  $args );
	}
endif;

/**
 * Display Author
 * @since 0.0.1
 */
if( !function_exists( 'fcwp_display_author' ) ) :
	function fcwp_display_author( $args = array() ) {
		new FCWP_Display_Author(  $args );
	}
endif;

/**
 * Link Pages
 * @since 0.0.1
 */
if( !function_exists( 'fcwp_link_pages' ) ) :
	function fcwp_link_pages( $args = array() ) {
		new FCWP_Link_Pages(  $args );
	}
endif;

/**
 * List Terms
 * @since 0.0.1
 */
if( !function_exists( 'fcwp_list_terms' ) ) :
	function fcwp_list_terms( $args = array() ) {
		new FCWP_List_Terms(  $args );
	}
endif;

/**
 * Pagination
 *
 * Choose default, split, and numbered for listings pagination
 * @since 0.0.1
 */
if( !function_exists( 'fcwp_pagination' ) ) :
	function fcwp_pagination( $type = 'default', $args = array() ) {
		new FCWP_Pagination(  $type, $args );
	}
endif;

/**
 * Post Pagination
 * @since 0.0.1
 */
if( !function_exists( 'fcwp_posts_pagination ' ) ) :
	function fcwp_posts_pagination( $args = array() ) {
		new FCWP_Posts_Pagination(  $args );
	}
endif;

/**
 * Published Date
 * @since 0.0.1
 */
if( !function_exists( 'fcwp_published_date' ) ) :
	function fcwp_published_date( $args = array() ) {
		new FCPW_Published_Date(  $args );
	}
endif;
