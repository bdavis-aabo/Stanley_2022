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
	add_image_size('event', 450, 450, true);
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
		wp_enqueue_script('mapbox.min', '//api.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.js', 'jquery', '', true);
		wp_enqueue_script('fontawesome.min','//kit.fontawesome.com/4a3ca8ad33.js','','',true);
		wp_enqueue_script('slick.min','//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js','','',true);
		wp_enqueue_script('aos.min','//unpkg.com/aos@2.3.1/dist/aos.js','','',true);
		wp_enqueue_script(
      'jquery.extras.min',
      get_template_directory_uri() . '/assets/js/main.min.js',
      array(),
      filemtime(get_template_directory().'/assets/js/main.min.js'),
      true
    );
		wp_enqueue_script(
      'jquery.maps.min',
      get_template_directory_uri() . '/assets/js/maps.min.js',
      array(),
      filemtime(get_template_directory().'/assets/js/maps.min.js'),
      true
    );
  }
}

function wpt_register_css(){
  wp_enqueue_style('bootstrap.min', '//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
	wp_enqueue_style('mapbox.min', '//api.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.css');
	wp_enqueue_style('aos.min', '//unpkg.com/aos@2.3.1/dist/aos.css');
	wp_enqueue_style('slick.min','//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
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
	  'supports' 			    => array('title','author','excerpt','thumbnail','order','page-attributes','editor'),
    'menu_position' 	  => 21,
    'menu_icon'			    => 'dashicons-cart',
    'has_archive' 		  => true,
		'show_in_rest'			=> true
	));

	register_post_type('events', array(
		'label'             => __('Events'),
	  'singular_label' 	  => __('Event'),
	  'public' 			      => true,
	  'show_ui' 			    => true,
	  'capability_type' 	=> 'post',
	  'hierarchical' 		  => true,
	  'rewrite' 			    => array('slug' => 'events'),
	  'supports' 			    => array('title','author','excerpt','thumbnail','order','page-attributes','editor'),
    'menu_position' 	  => 22,
    'menu_icon'			    => 'dashicons-tickets-alt',
    'has_archive' 		  => true,
		'show_in_rest'		  => true
	));
}

function marketplace_taxonomies(){
	$_labels = array(
		'name' 				      => 	_x('Marketplaces', 'taxonomy general name'),
		'singular_name'		  => 	_x('Marketplace', 'taxonomy singular name'),
		'search_items'		  =>	__('Search Marketplaces'),
		'all_items'			    =>	__('All Marketplaces'),
		'parent_item'		    =>	__('Parent Marketplace'),
		'parent_item_colon'	=>	__('Parent Marketplace:'),
		'edit_item'			    =>	__('Edit Marketplace'),
		'update_item'		    =>	__('Update Marketplace'),
		'add_new_item'		  =>	__('Add New Marketplace'),
		'new_item_name'		  =>	__('New Marketplace Name'),
		'menu_name'			    =>	__('Marketplaces'),
		);
	$_args = array(
		'hierarchical'		  =>	true,
		'labels'			      =>	$_labels,
		'show_ui'			      =>	true,
		'show_admin_column'	=>	true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'			    =>	true,
		'rewrite'			      =>	array('slug' => 'marketplace'),
		'show_in_rest'			=>	true
		);
	register_taxonomy('marketplace', array('businesses'), $_args);
}
add_action('init', 'marketplace_taxonomies', 0);

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
		'show_in_rest'			=>	true
		);
	register_taxonomy('channel', array('businesses'), $_args);
}
add_action('init', 'business_taxonomies', 0);

// Widgets
if(function_exists('register_sidebar')){
  register_sidebar(array(
    'name'          => __('Footer Address', 'footer-address'),
	  'description'   => __('Widget to display address content on homepage.', 'footer-address'),
	  'id'            => 'footer-address',
	  'before_widget' => '<div class="footer-contents">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h3>',
	  'after_title'   => '</h3>'
  ));
}


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
