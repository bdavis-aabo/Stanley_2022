<?php
// Theme Functions

/* Remove Admin Bar from Frontend */
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar(){
  show_admin_bar(false);
}

if (function_exists('add_theme_support')){
  // Add Menu Support
  add_theme_support('menus');

  // Add Thumbnail Theme Support
  add_theme_support('post-thumbnails');
  add_image_size('large', 700, '', true);  		// Large Thumbnail
  add_image_size('medium', 250, '', true); 		// Medium Thumbnail
  add_image_size('small', 125, '', true);  		// Small Thumbnail
  add_image_size('custom-size', 700, 200, true);  // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

  // Enables post and comment RSS feed links to head
  add_theme_support('automatic-feed-links');
}

add_action('after_setup_theme', 'wpt_setup');
if(!function_exists('wpt_setup')):
  function wpt_setup() {
    register_nav_menu('primary', __('Primary Navigation', 'wptmenu'));
  }
endif;

function wpt_register_js(){
  if( !is_admin()){
    wp_deregister_script('jquery');

    wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.3.1.min.js', 'jquery', '', true);
    wp_enqueue_script('jquery.popper.min', '//cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js', 'jquery', '', true);
  	      wp_enqueue_script('jquery.bootstrap.min', '//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js', 'jquery', '', true);
  	      wp_enqueue_script(
      'jquery.extras.min',
      get_template_directory_uri() . '/assets/js/min/main.min.js',
      array(),
      filemtime(get_template_directory().'/assets/js/min/main.min.js'),
      true
    );
  }
}

function wpt_register_css(){
  wp_enqueue_style('bootstrap.min', '//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
  wp_enqueue_style('fontawesome.min', '//use.fontawesome.com/releases/v5.6.3/css/all.css');
  wp_enqueue_style(
    'main.min',
    get_template_directory_uri() . '/assets/css/main.min.css',
    array(),
    filemtime(get_stylesheet_directory().'/assets/css/main.min.css'),
    'all'
  );
}
add_action('init','wpt_register_js');
add_action('wp_enqueue_scripts', 'wpt_register_css');

// CREATE CUSTOM POST TYPES
add_action('init', 'create_post_type');
function create_post_type(){

	// Marketplace Post Type
	register_post_type('businesses', array(
		'label'             => __('Businesses'),
	  'singular_label' 	  => __('Business'),
	  'public' 			      => true,
	  'show_ui' 			    => true,
	  'capability_type' 	=> 'post',
	  'hierarchical' 		  => true,
	  'rewrite' 			    => array('slug' => 'businesses'),
	  'supports' 			    => array('title','author','excerpt','thumbnail','order','page-attributes'),
    'menu_position' 	  => 21,
    'menu_icon'			    => 'dashicons-cart',
    'has_archive' 		  => true,
	));

	register_post_type('events', array(

	));
}

function business_taxonomies(){
	$_labels = array(
		'name' 				      => 	_x('Channels', 'taxonomy general name'),
		'singular_name'		  => 	_x('Channel', 'taxonomy singular name'),
		'search_items'		  =>	__('Search Channels'),
		'all_items'			    =>	__('All Channels'),
		'parent_item'		    =>	__('Parent Channel'),
		'parent_item_colon'	=>	__('Parent Channel:'),
		'edit_item'			    =>	__('Edit Channel'),
		'update_item'		    =>	__('Update Channel'),
		'add_new_item'		  =>	__('Add New Channel'),
		'new_item_name'		  =>	__('New Channel Name'),
		'menu_name'			    =>	__('Channels'),
		);
	$_args = array(
		'hierarchical'		  =>	true,
		'labels'			      =>	$_labels,
		'show_ui'			      =>	true,
		'show_admin_column'	=>	true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'			    =>	true,
		'rewrite'			      =>	array('slug' => 'channel'),
		);
	register_taxonomy('channel', array('businesses'), $_args);
}
add_action('init', 'business_taxonomies', 0);


// Add Class to Images posted on pages
function add_responsive_class($content){
  $content = mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8');
  $document = new DOMDocument();
  libxml_use_internal_errors(true);
  $document->loadHTML(utf8_decode($content));

  $imgs = $document->getElementsByTagName('img');
  foreach($imgs as $img){
    $existing_class = $img->getAttribute('class');
    $img->setAttribute('class', 'img-fluid ' . $existing_class);
  }
  $html = $document->saveHTML();
	      return $html;
}
add_filter('the_content', 'add_responsive_class');

?>
