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


// Add Custom Meta Box for Slider
function laundryclean_testimonial_meta_box()
{
    add_meta_box(
        'testimonial_meta_box',
        __('Testimonial Settings', 'laundryclean'),
        'laundryclean_testimonial_meta_box_callback',
        'testimonials',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'laundryclean_testimonial_meta_box');


// Callback function for meta box fields
function laundryclean_testimonial_meta_box_callback($post)
{
  
    $testimonial_rating = get_post_meta($post->ID, '_testimonial_rating', true) ?: '4';
    $testimonial_client_destination  = get_post_meta($post->ID, '_testimonial_client_destination', true) ?: 'Bussinesman';

    ?>
  
    <p>
        <label for="testimonial_rating"><?php _e('Client Rating (1-5):', 'laundryclean'); ?></label>
        <br>
        <input type="number" name="testimonial_rating" id="testimonial_rating" value="<?php echo esc_attr($testimonial_rating); ?>" min="1" max="5" required>
    </p>
    <p>
        <label for="testimonial_client_destination"><?php _e('Client Destination:', 'laundryclean'); ?></label><br>
        <input type="text" name="testimonial_client_destination" id="testimonial_client_destination" value="<?php echo esc_attr($testimonial_client_destination); ?>" class="widefat">
    </p>
    <?php
}

// Save Meta Box Data
function laundryclean_save_testimonial_meta($post_id)
{
    $fields = [
        'testimonial_rating'       => '_testimonial_rating',
        'testimonial_client_destination'  => '_testimonial_client_destination',
    ];

    foreach ($fields as $form_field => $meta_key) {
        if (array_key_exists($form_field, $_POST)) {
            update_post_meta($post_id, $meta_key, sanitize_text_field($_POST[$form_field]));
        }
    }
}
add_action('save_post', 'laundryclean_save_testimonial_meta');


