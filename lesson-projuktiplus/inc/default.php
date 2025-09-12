<?php 
/**
 * default settings
 */


function lessonlms_theme_register(){

     if (wp_get_theme()->get('TextDomain') === 'lessonlms') {
    add_theme_support('post-thumbnails');

    add_theme_support('custom-logo',array(
        'height' => 34,
        'width'=> 85,
    ));
     
    add_image_size('custom-courses-image',370,278,true);
    add_image_size('custom-blog-image',370,250,true);
    

    register_nav_menus(array(
    'header_menu' => __('LMS Header Menu','lessonlms'),
    'mobile_menu' => __('LMS Mobile Menu','lessonlms'),
     'footer_menu1' => __('LMS Footer Menu1','lessonlms'),
      'footer_menu2' => __('LMS Footer Menu2','lessonlms'),
    ));
     }
}

add_action('after_setup_theme','lessonlms_theme_register');