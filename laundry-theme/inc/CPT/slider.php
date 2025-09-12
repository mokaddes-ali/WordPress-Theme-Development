<?php

/**
 * Register the Slider custom post type.
 */

function laundryclean_slider_register()
{
    $labels = array(
        'name'                  => __('Sliders', 'laundryclean'),
        'singular_name'         => __('Slider', 'laundryclean'),
        'add_new'               => __('Add New Slider', 'laundryclean'),
        'add_new_item'          => __('Add New Slider', 'laundryclean'),
        'edit_item'             => __('Edit Slider', 'laundryclean'),
        'new_item'              => __('New Slider', 'laundryclean'),
        'all_items'             => __('All Sliders', 'laundryclean'),
        'view_item'             => __('View Slider', 'laundryclean'),
        'search_items'          => __('Search Sliders', 'laundryclean'),
        'not_found'             => __('No Sliders found', 'laundryclean'),
        'not_found_in_trash'    => __('No Sliders found in Trash', 'laundryclean'),
        'menu_name'             => __('Sliders', 'laundryclean')
    );

    $args = array(
        'labels'                => $labels,
        'description'           => __('Custom post type for homepage sliders', 'laundryclean'),
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'slider'),
        'capability_type'       => 'post',
        'has_archive'           => false,
        'hierarchical'          => false,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-images-alt2',
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
        )
    );
    register_post_type('slider', $args);
}
add_action('init', 'laundryclean_slider_register');


// Add Custom Meta Box for Slider
function laundryclean_slider_meta_box()
{
    add_meta_box(
        'slider_meta_box',
        __('Slider Settings', 'laundryclean'),
        'laundryclean_slider_meta_box_callback',
        'slider',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'laundryclean_slider_meta_box');

// Callback function for meta box fields
function laundryclean_slider_meta_box_callback($post)
{
    // Existing fields
    $slider_type       = get_post_meta($post->ID, '_slider_type', true) ?: 'Dry Clean Experts';
    $slider_button_text  = get_post_meta($post->ID, '_slider_button_text', true) ?: 'Book Laundry Now!';
    $slider_button_link  = get_post_meta($post->ID, '_slider_button_link', true) ?: 'http://localhost/wordpress/';
    $slider_avatar       = get_post_meta($post->ID, '_slider_avatar', true) ?: '';
    $slider_rating       = get_post_meta($post->ID, '_slider_rating', true) ?: '5';
    $slider_rating_text  = get_post_meta($post->ID, '_slider_rating_text', true) ?: '8k Clients Reviews.';

    ?>
    <p>
        <label for="slider_type"><?php _e('Slider Type:', 'laundryclean'); ?></label><br>
        <input type="text" name="slider_type" id="slider_type" value="<?php echo esc_attr($slider_type); ?>" class="widefat">
    </p>
    <p>
        <label for="slider_button_text"><?php _e('Button Text:', 'laundryclean'); ?></label><br>
        <input type="text" name="slider_button_text" id="slider_button_text" value="<?php echo esc_attr($slider_button_text); ?>" class="widefat">
    </p>
    <p>
        <label for="slider_button_link"><?php _e('Button Link:', 'laundryclean'); ?></label><br>
        <input type="text" name="slider_button_link" id="slider_button_link" value="<?php echo esc_attr($slider_button_link); ?>" class="widefat">
    </p>
    <hr>
    <p>
        <label for="slider_avatar"><?php _e('Avatar Image URL:', 'laundryclean'); ?></label><br>
        <input type="text" name="slider_avatar" id="slider_avatar" value="<?php echo esc_attr($slider_avatar); ?>" class="widefat">
        <small><?php _e('Enter image URL or upload via Media Library and copy link.', 'laundryclean'); ?></small>
    </p>
    <p>
        <label for="slider_rating"><?php _e('Rating (1-5):', 'laundryclean'); ?></label><br>
        <input type="number" name="slider_rating" id="slider_rating" value="<?php echo esc_attr($slider_rating); ?>" min="1" max="5">
    </p>
    <p>
        <label for="slider_rating_text"><?php _e('Rating Text:', 'laundryclean'); ?></label><br>
        <input type="text" name="slider_rating_text" id="slider_rating_text" value="<?php echo esc_attr($slider_rating_text); ?>" class="widefat">
    </p>
    <?php
}

// Save Meta Box Data
function laundryclean_save_slider_meta($post_id)
{
    $fields = [
        'slider_type'        => '_slider_type',
        'slider_button_text' => '_slider_button_text',
        'slider_button_link' => '_slider_button_link',
        'slider_avatar'       => '_slider_avatar',
        'slider_rating'       => '_slider_rating',
        'slider_rating_text'  => '_slider_rating_text',
    ];

    foreach ($fields as $form_field => $meta_key) {
        if (array_key_exists($form_field, $_POST)) {
            update_post_meta($post_id, $meta_key, sanitize_text_field($_POST[$form_field]));
        }
    }
}
add_action('save_post', 'laundryclean_save_slider_meta');