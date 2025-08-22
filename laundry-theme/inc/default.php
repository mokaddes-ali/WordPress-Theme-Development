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
        'laundryclean_footer1_ourservice' => __('Laundry Footer One Our Services', 'laundryclean'),
        'laundryclean_footer2_quick_links' => __('Laundry Footer Two Quick Links', 'laundryclean'),
        'laundryclean_footer3_commercial_service' => __('Laundry Footer Three Commercial Service', 'laundryclean')
    ));
}
}
add_action('after_setup_theme', 'laundryclean_setup_theme');