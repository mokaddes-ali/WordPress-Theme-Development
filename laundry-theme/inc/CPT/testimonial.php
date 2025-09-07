<?php

/**
 * Register Testimonial custom post type.
 */

function laundryclean_testimonials_register()
{
    $labels = array(
        'name'                  => __('Testimonials', 'laundryclean'),
        'singular_name'         => __('Testimonial', 'laundryclean'),
        'add_new'               => __('Add New Testimonial', 'laundryclean'),
        'add_new_item'          => __('Add New Testimonial', 'laundryclean'),
        'edit_item'             => __('Edit Testimonial', 'laundryclean'),
        'new_item'              => __('New Testimonial', 'laundryclean'),
        'all_items'             => __('All Testimonials', 'laundryclean'),
        'view_item'             => __('View Testimonial', 'laundryclean'),
        'search_items'          => __('Search Testimonials', 'laundryclean'),
        'not_found'             => __('No Testimonials found', 'laundryclean'),
        'not_found_in_trash'    => __('No Testimonials found in Trash', 'laundryclean'),
        'menu_name'             => __('Testimonials', 'laundryclean')
    );

    $args = array(
        'labels'                => $labels,
        'description'           => __('Custom post type for homepage Testimonials', 'laundryclean'),
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'testimonials'),
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => 8,
        'menu_icon'             => 'dashicons-format-quote',
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
        )
    );
    register_post_type('testimonials', $args);
}
add_action('init', 'laundryclean_testimonials_register');


