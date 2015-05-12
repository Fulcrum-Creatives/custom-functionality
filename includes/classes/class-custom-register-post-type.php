<?php
/**
 * Register custom post type
 *
 * @package     Custom
 * @subpackage  Custom/includes
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'Custom_Register_Post_Type' ) ) {
    class Custom_Register_Post_Type {

        /**
         * The post type
         *
         * @var string
         */
        public $post_type;

        /**
         * Plural Version of Post Type
         *
         * @var string
         */
        public $plural;

        /**
         * The labels array
         *
         * @var array
         */
        public $post_type_labels;

        /**
         * The post type arguments
         *
         * @var array
         */
        public $post_type_args;

        /**
         * Initialize the class
         *
         * @since 0.0.1
         * @param string $post_type         The post type's name
         * @param array  $post_type_labels  The post type labels
         * @param array  $post_type_args    The post type arguments
         */
        public function __construct( $post_type, $plural = '', $post_type_labels = array(), $post_type_args = array() ) {
            $this->post_type        = strtolower( str_replace( array( ' ', '-' ), '_', $post_type ) );
            $this->plural           = ( !empty( $plural ) ? strtolower( str_replace( array( ' ', '-' ), '_', $plural ) ) : $this->post_type );
            $this->post_type_labels = $post_type_labels;
            $this->post_type_args   = $post_type_args;
        }

        /**
         * Flush rerwite rules on plugin activation
         *
         * @since 0.0.1
         * @static
         * @access public
         * @return void
         */
        public static function flush_rewrite_rules() {
            if ( !post_type_exists( $this->post_type ) ) {
                // Add the custom post types
                add_action( 'init', array( $this, 'register_post_type' ) );
                // Flush the rewite rulles
                flush_rewrite_rules( false );
            }
        }

        /**
         * The post type labels. 
         * User defined labels override the default
         *
         * @since 0.0.1
         * @access private
         * @return array The modified array of post type labels
         */
        private function post_type_labels() {
            $singular = ucwords( str_replace( '_', ' ', $this->post_type ) );
            $plural   = ucwords( str_replace( '_', ' ', $this->plural ) );
            // The post type default labels
            $defaults = array(
                'name'                  => _x( $plural, 'post type general name' ),
                'singular_name'         => _x( $singular, 'post type singular name' ),
                'add_new'               => __( 'Add New' ),
                'all_items'             => __( 'All ' . $plural ),
                'add_new_item'          => __( 'Add New ' . $singular ),
                'edit_item'             => __( 'Edit ' . $singular ),
                'new_item'              => __( 'New ' . $singular ),
                'view_item'             => __( 'View ' . $singular ),
                'search_items'          => __( 'Search ' . $plural ),
                'not_found'             => __( 'No ' . $plural . ' Found' ),
                'not_found_in_trash'    => __( 'No ' . $plural . ' Found in Trash' ),
                'parent_item_colon'     => __( 'Parent ' . $singular . ' Post:' ),
                'menu_name'             => __( $plural ),
            );
            // Get user inputed label arguments
            $args     = $this->post_type_labels;
            // Override the default labels with the new argements
            $labels   = array_merge( $defaults, $args );
            return $labels;
        }

        /**
         * The post type arguments. 
         * User defined arguments override the default
         *
         * @since 0.0.1
         * @access private
         * @return array The modified array of post type arguments
         */
        private function post_type_args() {
            $labels   = $this->post_type_labels();
            // The post type default arguments
            $defaults = array(
                'labels'                => $labels,
                'description'           => '',
                'public'                => true,
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'show_ui'               => true,
                'show_in_nav_menus'     => true,
                'show_in_menu'          => true,
                'show_in_admin_bar'     => true,
                'menu_position'         => NULL,
                'menu_icon'             => NULL,
                'capability_type'       => 'post',
                'capabilities'          => array(
                    'edit_post',
                    'read_post',
                    'delete_post',
                    'edit_posts',
                    'edit_others_posts',
                    'publish_posts',
                    'read_private_posts'
                ),
                'map_meta_cap'          => true,
                'hierarchical'          => false,
                'supports'              => array(
                    'title',
                    'editor'
                ),
                'register_meta_box_cb'  => '',
                'taxonomies'            => array(),
                'has_archive'           => false,
                'permalink_epmask'      => EP_PERMALINK,
                'rewrite'               => array( 'slug'=> $this->post_type ),
                'query_var'             => true,
                'can_export'            => true,
                '_builtin'              => false
            );
            // Get user inputed post type arguments
            $args = $this->post_type_args;
            // Override the default post type arguments with the new argements
            $arguments = array_merge( $defaults, $args );
            return $arguments;
        }

        /**
         * Register Post Type
         *
         * @since 0.0.1
         * @access public
         * @return void
         */
        public function register_post_type() {
            // Register the post type
            register_post_type( $this->post_type, $this->post_type_args() );
        }
    }
}