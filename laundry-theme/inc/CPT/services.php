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
    'supports'              => array(
        'title',
        'editor',
        'thumbnail',
        'excerpt',
        'revisions'
    ),
);

    register_post_type('services', $args);
}
add_action('init', 'laundryclean_services_register');


// Add Custom Meta Box
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

function laundryclean_services_meta_box_callback($post) {
 
    $services_icon  = get_post_meta($post->ID, '_services_icon', true) ?: '';

    ?>
    <p style="margin-bottom:20px;">
    <label for="services_icon" style="display:block; font-weight:bold; font-size:16px; color:#333; margin-bottom:5px;">
        <?php _e('Services Icon URL:', 'laundryclean'); ?>
    </label>
    <input 
        type="text" 
        name="services_icon" 
        id="services_icon" 
        value="<?php echo esc_attr($services_icon); ?>" 
        style="width:100%; padding:8px 10px; border:1px solid #ccc; border-radius:5px; font-size:14px; outline:none;"
        onfocus="this.style.borderColor='#ff7f50'; this.style.boxShadow='0 0 5px rgba(255,127,80,0.5)';" 
        onblur="this.style.borderColor='#ccc'; this.style.boxShadow='none';"
    >
    <small style="color:#666; font-size:14px;">
        <?php _e('Enter image URL or upload via Media Library and copy link.', 'laundryclean'); ?>
    </small>
</p>

    <?php
}

// Save Meta Box Data
function laundryclean_save_services_meta($post_id)
{
    $fields = [
        'services_icon'       => '_services_icon',
    ];

    foreach ($fields as $form_field => $meta_key) {
        if (array_key_exists($form_field, $_POST)) {
            update_post_meta($post_id, $meta_key, sanitize_text_field($_POST[$form_field]));
        }
    }
}
add_action('save_post', 'laundryclean_save_services_meta');