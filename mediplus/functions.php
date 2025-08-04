<?php
/**
 * Theme Functions
 * Mokaddes Ali
 */


// Enable featured image support
add_action('after_setup_theme', function () {
    add_theme_support('post-thumbnails');
});

// Register Custom Post Type: Slider
function custom_slider_post_type() {
    $labels = [
        'name'                  => _x('Sliders', 'Post Type General Name'),
        'singular_name'         => _x('Slider', 'Post Type Singular Name'),
        'menu_name'             => __('Sliders'),
        'name_admin_bar'        => __('Slider'),
        'add_new'               => __('Add New'),
        'add_new_item'          => __('Add New Slider'),
        'edit_item'             => __('Edit Slider'),
        'new_item'              => __('New Slider'),
        'view_item'             => __('View Slider'),
        'all_items'             => __('All Sliders'),
        'search_items'          => __('Search Sliders'),
        'not_found'             => __('No sliders found.'),
        'not_found_in_trash'    => __('No sliders found in Trash.'),
    ];

    $args = [
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => ['slug' => 'sliders'],
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => 20,
        'show_in_rest'          => true,
        'supports'              => ['title', 'editor', 'thumbnail', 'custom-fields'],
    ];

    register_post_type('slider', $args);
}
add_action('init', 'custom_slider_post_type');


// Add Meta Boxes for Slider Extra Fields
function custom_slider_meta_boxes() {
    add_meta_box(
        'slider_extra_fields',
        'Slider Extra Fields',
        'render_slider_meta_boxes',
        'slider',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'custom_slider_meta_boxes');

function render_slider_meta_boxes($post) {
    $button1_text = get_post_meta($post->ID, '_button1_text', true);
    $button1_url  = get_post_meta($post->ID, '_button1_url', true);
    $button2_text = get_post_meta($post->ID, '_button2_text', true);
    $button2_url  = get_post_meta($post->ID, '_button2_url', true);

    ?>
    <p>
        <label for="button1_text">Button 1 Text:</label><br>
        <input type="text" name="button1_text" id="button1_text" value="<?php echo esc_attr($button1_text); ?>" style="width:100%;" />
    </p>
    <p>
        <label for="button1_url">Button 1 URL:</label><br>
        <input type="text" name="button1_url" id="button1_url" value="<?php echo esc_url($button1_url); ?>" style="width:100%;" />
    </p>
    <p>
        <label for="button2_text">Button 2 Text:</label><br>
        <input type="text" name="button2_text" id="button2_text" value="<?php echo esc_attr($button2_text); ?>" style="width:100%;" />
    </p>
    <p>
        <label for="button2_url">Button 2 URL:</label><br>
        <input type="text" name="button2_url" id="button2_url" value="<?php echo esc_url($button2_url); ?>" style="width:100%;" />
    </p>
    <?php
}

// Save Meta Box Data
function save_slider_meta_boxes($post_id) {
    if (array_key_exists('button1_text', $_POST)) {
        update_post_meta($post_id, '_button1_text', sanitize_text_field($_POST['button1_text']));
    }
    if (array_key_exists('button1_url', $_POST)) {
        update_post_meta($post_id, '_button1_url', esc_url_raw($_POST['button1_url']));
    }
    if (array_key_exists('button2_text', $_POST)) {
        update_post_meta($post_id, '_button2_text', sanitize_text_field($_POST['button2_text']));
    }
    if (array_key_exists('button2_url', $_POST)) {
        update_post_meta($post_id, '_button2_url', esc_url_raw($_POST['button2_url']));
    }
}
add_action('save_post', 'save_slider_meta_boxes');


