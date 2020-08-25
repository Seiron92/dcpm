<?php
/* REGISTER MENU */

function register_my_menus() {
    register_nav_menus(
      array(
        'main-menu' => __('Primary'),
       'secondary-menu' => __('Cities'),
        'footer-menu' => __('Footer'),
        'before' => '<li>',
        'after' => '</li>'
      )
    );
  }
  add_action( 'init', 'register_my_menus' );

/* ADD HEADER  */
$args = array(
	'flex-width'    => true,
	'width'         => 980,
	'flex-height'    => true,
	'height'        => 200,
	'default-image' => get_template_directory_uri() . '../images/main_background.svg'
);
add_theme_support( 'custom-header', $args );

/* ADD FEATURED IMAGE */
add_theme_support( 'post-thumbnails' ); 

add_filter( 'better_rest_api_featured_image', 'xxx_modify_rest_api_featured_image', 10, 2 );
/**
 * Modify the Better REST API Featured Image response.
 *
 * @param   array  $featured_image  The array of image data.
 * @param   int    $image_id        The image ID.
 *
 * @return  array                   The modified image data.
 */
function xxx_modify_rest_api_featured_image( $featured_image, $image_id ) {

  // Add an extra_data_string field with a string value.
  $featured_image['extra_data_string'] = 'A custom value.';

  // Add an extra_data_array field with an array value.
  $featured_image['extra_data_array'] = array(
    'custom_key' => 'A custom value.',
  );

  return $featured_image;
}
/* JAVASCRRIPT */

function starter_scripts() {
 //  wp_enqueue_script( 'script', get_template_directory_uri() . '/js/ws-scroli.js', array ( 'jquery' ), 1.1, false);

}


add_action( 'wp_enqueue_scripts', 'starter_scripts' );

/* J QUERY */
function include_jquery() {

	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.1.1.min.js', array(), null, true);
  wp_enqueue_script('jquery', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), null, true);

}
add_action('wp_enqueue_scripts', 'include_jquery');

/* Add custom logo */

$arg = array(
	'flex-width'    => true,
	'width'         => 980,
	'flex-height'    => true,
);

add_theme_support( 'custom-logo', $arg );

/* LIMIT NUMBER OF "NEWS" SHOWN */
add_filter('term_links-post_tag','limit_to_five_tags');
function limit_to_five_tags($terms) {
return array_slice($terms,0,5,true);
}

/* MODIFY ENDING TO EXCERPT */

function new_excerpt_more($more) {

return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


