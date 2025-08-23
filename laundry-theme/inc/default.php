<?php 

/**
 * Summary of laundryclean_setup_theme default
 * @return void
 */
function laundryclean_setup_theme()
{
    if (wp_get_theme()->get('TextDomain') === 'laundryclean') {

    // Enable post thumbnails for posts and pages
    add_theme_support( 'post-thumbnails', array( 'post','page','slider' ) );

    
    // Enable dynamic title tag support
    add_theme_support('title-tag'); 

     /** post formats */
    $post_formats = array('gallery','video','quote');
    add_theme_support( 'post-formats', $post_formats);

    register_nav_menus(array(
        'laundryclean_header_menu' => __('Laundry Header Menu', 'laundryclean'),
        'laundryclean_mobile_menu' => __('Laundry Mobile Menu', 'laundryclean'),
        
        // Footer Menu
        'laundry_footer1_ourservice' => __('Laundry Footer Our Services', 'laundryclean'),
        'laundry_footer2_quick_links' => __('Laundry Footer  Quick Links', 'laundryclean'),
        'laundry_footer3_commercial_service' => __('Laundry Footer Commercial Service', 'laundryclean')
    ));
}
}
add_action('after_setup_theme', 'laundryclean_setup_theme');


// Excerpt Settings

function laundryclean_excerpt_more($more) {
    global $post;
   return '<a class="read-more-btn" href="' . get_permalink($post->ID) . '">' . 'Read More' . '</a>';
}
add_filter('excerpt_more', 'laundryclean_excerpt_more');



function laundryclean_excerpt_length($length){
    return 44;
}
add_filter('excerpt_length', 'laundryclean_excerpt_length');
