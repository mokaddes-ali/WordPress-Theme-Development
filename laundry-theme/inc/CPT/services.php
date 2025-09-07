<?php 
/**
 * Register Services custom post type
 */

function laundryclean_services_register()
{
    $labels = array(
        'name'                  => __('Services', 'laundryclean'),
        'singular_name'         => __('Service', 'laundryclean'),
        'add_new'               => __('Add New Service', 'laundryclean'),
        'add_new_item'          => __('Add New Service', 'laundryclean'),
        'edit_item'             => __('Edit Service', 'laundryclean'),
        'new_item'              => __('New Service', 'laundryclean'),
        'all_items'             => __('All Services', 'laundryclean'),
        'view_item'             => __('View Service', 'laundryclean'),
        'search_items'          => __('Search Services', 'laundryclean'),
        'not_found'             => __('No Services found', 'laundryclean'),
        'not_found_in_trash'    => __('No Services found in Trash', 'laundryclean'),
        'menu_name'             => __('Services', 'laundryclean')
    );

    $args = array(
        'labels'                => $labels,
        'description'           => __('Custom post type for homepage Services', 'laundryclean'),
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'services'),
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => 11,
        'menu_icon'             => 'dashicons-format-quote',
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
        )
    );
    register_post_type('services', $args);
}
add_action('init', 'laundryclean_services_register');


// Add Custom Meta Box for Slider
function laundryclean_services_meta_box()
{
    add_meta_box(
        'services_meta_box',
        __('Services Settings', 'laundryclean'),
        'laundryclean_services_meta_box_callback',
        'services',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'laundryclean_services_meta_box');


// Callback function for meta box fields
function laundryclean_services_meta_box_callback($post)
{
  
    $services_avator = get_post_meta($post->ID, '_services_avator', true) ?: 'default a image';

    ?>
  
   
    <p>
        <label for="testimonial_client_destination"><?php _e('Client Destination:', 'laundryclean'); ?></label><br>
        <input type="text" name="testimonial_client_destination" id="testimonial_client_destination" value="<?php echo esc_attr($services_avator); ?>" class="widefat">
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


