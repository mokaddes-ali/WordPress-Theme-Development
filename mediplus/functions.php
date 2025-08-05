<?php
/**
 * Theme Functions
 * 
 */


/**
 * Add Theme Style
 * 
 */

// function mediplus_theme_style(){
//     wp_enqueue_style('tailwind_style', get_stylesheet_directory_uri().'assets/outputTailwind');
// }
// add_action('wp_enqueue_scripts' , 'mediplus_theme_style');

// Menu Add
function mediplus_theme_register_menu(){

    register_nav_menu('primary_menu_mediplus', __('Primary Menu Mediplus'));
}

add_action('after_setup_theme', 'mediplus_theme_register_menu');

// Register Custom Post Type: Slider
require get_template_directory() . '/inc/sliders/register-slider-cpt.php';
require get_template_directory() . '/inc/sliders/slider-meta-fields.php';
require get_template_directory() . '/inc/sliders/slider-meta-callback.php';






