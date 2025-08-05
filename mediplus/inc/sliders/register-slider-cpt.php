<?php 

function mediplus_register_slider_post_type(){
    $textdomain = 'mediplus';

    $labels = [
        'name' =>_x('Sliders', 'Post Type General Name',$textdomain),
        'singular_name' => _x('Slider', 'Post Type Singular Name', $textdomain),
         'menu_name' => __('Sliders', $textdomain),
         'name_admin_bar' => __('Slider', $textdomain),
          'add_new' => __('Add New', $textdomain),
           'add_new_item' => __('Add New Slider', $textdomain),
           'edit_item' => __('Edit Slider', $textdomain),
            'new_item' => __('New Slider', $textdomain),
               'view_item' => __('View Slider', $textdomain),
                'view_items' => __('View Sliders', $textdomain),
                      'search_items' => __('Search Sliders', $textdomain),
                'not_found' => __('No sliders found.', $textdomain),
                 'not_found_in_trash' => __('No sliders found in Trash.', $textdomain),
                  'all_items' => __('All Sliders', $textdomain),
                          'archives' => __('Slider Archives', $textdomain),

    ];

    $args = [
         'label' => __('Slider', $textdomain),
          'description' => __('Custom slider for homepage banners', $textdomain),
           'labels' => $labels,
                   'supports' => ['title', 'editor', 'thumbnail'],
                  'hierarchical' => false,
                 'public' => true,
                    'show_ui' => true,
                'show_in_menu' => true,
                  'menu_position' => 20,
                  'menu_icon' => 'dashicons-images-alt2',
                   'show_in_admin_bar' => true,
                     'show_in_nav_menus' => true,
                     'has_archive' => true,
                       'exclude_from_search' => false,
                    'publicly_queryable' => true,
                      'show_in_rest' => true,
        'rewrite' => ['slug' => 'sliders'],
        'capability_type' => 'post',
        
    ];

    register_post_type('slider', $args);
}
add_action('init',  'mediplus_register_slider_post_type');

add_theme_support('post-thumbnails');

?>