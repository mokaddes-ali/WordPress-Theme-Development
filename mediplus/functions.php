<?php
/**
 * Theme Functions
 * 
 */


/**
 * Add Theme Style
 * 
 */

 
   

function mediplus_theme_style(){
      // box icon
      wp_enqueue_style('boxicons-css', 'https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css', array(), '2.1.4');

     //font-awesome icon 
     wp_enqueue_style('font-awesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css', array(), '7.0.0');

    wp_enqueue_style('custom_style', get_stylesheet_directory_uri() . '/assets/custom-style.css',array(), time());
        //Main CSS
    wp_enqueue_style('main-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'mediplus_theme_style');


// Menu Add
function mediplus_theme_register_menu(){

    register_nav_menu('primary_menu_mediplus', __('Primary Menu Mediplus'));
}

add_action('after_setup_theme', 'mediplus_theme_register_menu');

// add theme suport
if (function_exists('add_theme_support')) {

    add_theme_support('post-thumbnails');
    add_image_size('blog-cover',550,280,true);
}






/**
 * 
 * Widget area
 */

function mediplus_theme_widgets_init(){
    $args = [
      'name'          => __('Sidebar', 'textdomain'),
        'id'            => 'sidebar_widget',
        'description'   => __('Registering widget area', 'textdomain'),
        'before_widget' => '<section id="sameId">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ];

    register_sidebar($args);
}

add_action('widgets_init', 'mediplus_theme_widgets_init');







