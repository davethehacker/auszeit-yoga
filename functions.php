<?php
add_theme_support( 'post-thumbnails' );

add_filter( 'auto_update_plugin', '__return_true' );
define( 'AUTOMATIC_UPDATER_DISABLED', false );


function register_my_menus() {
	register_nav_menus(
	array('menu' => __( 'Header Menu' ) )
	);
}
add_action ('init', 'register_my_menus');

add_theme_support( 'custom-header' );

function add_taxonomies_to_pages() {
 register_taxonomy_for_object_type( 'category', 'page' );
 }
add_action( 'init', 'add_taxonomies_to_pages' );

// Register Custom Post Type
function custom_post_type() {
	$labels = array(
		'name'                => 'Kurse',
		'singular_name'       => 'Kurs',
		'menu_name'           => 'Kurse',
		'parent_item_colon'   => 'Parent Item:',
		'all_items'           => 'All Items',
		'view_item'           => 'View Item',
		'add_new_item'        => 'Add New Item',
		'add_new'             => 'Add New',
		'edit_item'           => 'Edit Item',
		'update_item'         => 'Update Item',
		'search_items'        => 'Search Item',
		'not_found'           => 'Not found',
		'not_found_in_trash'  => 'Not found in Trash',
	);
	$args = array(
		'label'               => 'event',
		'description'         => 'Beinhaltet alle Auftritte',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail'),
		'hierarchical'        => false,
		'taxonomies' => array('category'),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-calendar-alt',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'event', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_post_type', 0 );



// Show posts of 'post', 'page' and 'movie' post types on home page
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );
function add_my_post_types_to_query( $query ) {
	if ( is_home() && $query->is_main_query() )
	$query->set( 'post_type', array( 'post' ) );
	return $query;
}
