<?php	
/**
 * Register a custom menu page.
 */
    
/**
 * Proper way to enqueue scripts and styles.
 */

add_action('init', 'product_register');   

function product_register() {   

$labels = array( 
    'name' => _x('ProductBox', 'post type general name'), 
    'singular_name' => _x('ProductBox Item', 'post type singular name'), 
    'add_new' => _x('Add New', 'ProductBox item'), 
    'add_new_item' => __('Add New Item'), 
    'edit_item' => __('Edit Item'),
    'new_item' => __('New Item'), 

    'view_item' => __('View ProductBox Item'), 
    'search_items' => __('Search ProductBox'), 
    'not_found' => __('Nothing found'), 
    'not_found_in_trash' => __('Nothing found in Trash'), 
    'parent_item_colon' => '' 
);   

$args = array( 
    'labels' => $labels, 
    'public' => true, 
    'publicly_queryable' => true, 
    'show_ui' => true, 
    'show_in_menu'  => true,
    'query_var' => true, 
    'rewrite' => array( 'slug' => 'productbox', 'with_front'=> false ), 'capability_type' => 'post', 
    'hierarchical' => true, 
    'menu_position' => 100, 
    'supports' => array('title','editor','thumbnail') 
);   

register_post_type( 'productbox' , $args ); 

register_taxonomy("categories", array("productbox"), array("hierarchical" => true, "label" => "Categories", "singular_label" => "Category", "rewrite" => array( 'slug' => 'productbox', 'with_front'=> false )));

}

add_action('admin_menu', 'wc_plugin_menu');
function wc_plugin_menu(){
 add_menu_page('Title', 'Product Boxes', 'manage_options', 'wc-admin-menu', 'wc_plugin_options'); 
 //add_submenu_page(, 'Box Product', 'Box Product', 8, 'wc-admin-menu', 'boxproduct');
}
