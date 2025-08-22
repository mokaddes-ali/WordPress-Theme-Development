<?php

/**
 * Theme Functions
 */



function laundryclean_enqueue_scripts() {
    // Tailwind & style
    wp_enqueue_style('tailwind-css', get_template_directory_uri() . '/assets/tailwindcss/output.css', [], filemtime(get_template_directory() . '/assets/tailwindcss/output.css'));
    wp_enqueue_style('style-css', get_template_directory_uri() . '/style.css', [], filemtime(get_template_directory() . '/style.css'));

    // Slick CSS
    wp_enqueue_style('slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css', [], '1.9.0');
    wp_enqueue_style('slick-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css', [], '1.9.0');

    // jQuery 
    wp_enqueue_script('jquery');

    // Slick JS
    wp_enqueue_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', ['jquery'], '1.9.0', true);

    // Custom JS after Slick
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/custom-js.js', ['jquery', 'slick-js'], filemtime(get_template_directory() . '/assets/js/custom-js.js'), true);
}
add_action('wp_enqueue_scripts', 'laundryclean_enqueue_scripts');



function laundryclean_setup_theme()
{
    if (wp_get_theme()->get('TextDomain') === 'laundryclean') {

    // Enable post thumbnails for posts and pages
    add_theme_support( 'post-thumbnails', array( 'post','page' ) );

    
    // Enable dynamic title tag support
    add_theme_support('title-tag'); 

     /** post formats */
    $post_formats = array('gallery','video','quote');
    add_theme_support( 'post-formats', $post_formats);

    add_theme_support('custom-logo', array(
        'height' => 40,
        'width' => 120,
    ));

    register_nav_menus(array(
        'laundryclean_header_menu' => __('Laundry Header Menu', 'laundryclean'),
        'laundryclean_mobile_menu' => __('Laundry Mobile Menu', 'laundryclean'),
        // Footer Menu
        'laundryclean_footer1_ourservice' => __('Laundry Footer One Our Services', 'laundryclean'),
        'laundryclean_footer2_quick_links' => __('Laundry Footer Two Quick Links', 'laundryclean'),
        'laundryclean_footer3_commercial_service' => __('Laundry Footer Three Commercial Service', 'laundryclean')
    ));
}
}
add_action('after_setup_theme', 'laundryclean_setup_theme');




// Register Slider Custom Post Type

function laundryclean_slider_init()
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
        'menu_position'         => 3,
        'menu_icon'             => 'dashicons-images-alt2',
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
        )
    );
    register_post_type('slider', $args);
}
add_action('init', 'laundryclean_slider_init');



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
    $slider_button_link  = get_post_meta($post->ID, '_slider_button_link', true) ?: 'https://example.com/book-laundry-now';
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




function laundryclean_customize_register($wp_customize)
{
    // Company Information Settings
    $wp_customize->add_section('company_information', array(
        'title' => __('Company Information', 'laundryclean'),
        'priority' => 30,
    ));

    // Company Name
    $wp_customize->add_setting('company_name', array(
        'default' => __('Laundry Service', 'laundryclean'),
    ));
    $wp_customize->add_control('company_name', array(
        'label' => __('Company Name', 'laundryclean'),
        'section' => 'company_information',
        'type' => 'text',
    ));

    // Company Address
    $wp_customize->add_setting('company_address', array(
        'default' => __('Holland, London 7QU UK', 'laundryclean'),
    ));
    $wp_customize->add_control('company_address', array(
        'label' => __('Company Address', 'laundryclean'),
        'section' => 'company_information',
        'type' => 'textarea',
    ));

    // Company Phone
    $wp_customize->add_setting('company_phone', array(
        'default' => __('(234) 987 - 354 - 3670', 'laundryclean'),
    ));
    $wp_customize->add_control('company_phone', array(
        'label' => __('Company Phone', 'laundryclean'),
        'section' => 'company_information',
        'type' => 'text',
    ));

    // Company Email
    $wp_customize->add_setting('company_email', array(
        'default' => __('example@gmail.com', 'laundryclean'),
    ));
    $wp_customize->add_control('company_email', array(
        'label' => __('Company Email', 'laundryclean'),
        'section' => 'company_information',
        'type' => 'email',
    ));

    // Company Social Media Link

    //Facebook
    $wp_customize->add_setting('company_facebook', array(
        'default' => __('https://www.facebook.com/', 'laundryclean'),
    ));
    $wp_customize->add_control('company_facebook', array(
        'label' => __('Company Facebook Link', 'laundryclean'),
        'section' => 'company_information',
        'type' => 'url',
    ));

    // LinkedIn
    $wp_customize->add_setting('company_linkedin', array(
        'default' => __('https://www.linkedin.com/', 'laundryclean'),
    ));
    $wp_customize->add_control('company_linkedin', array(
        'label' => __('Company LinkedIn Link', 'laundryclean'),
        'section' => 'company_information',
        'type' => 'url',
    ));

    // Twitter
    $wp_customize->add_setting('company_twitter', array(
        'default' => __('https://www.twitter.com/', 'laundryclean'),
    ));
    $wp_customize->add_control('company_twitter', array(
        'label' => __('Company Twitter Link', 'laundryclean'),
        'section' => 'company_information',
        'type' => 'url',
    ));

    // Pinterest
    $wp_customize->add_setting('company_pinterest', array(
        'default' => __('https://www.pinterest.com/', 'laundryclean'),
    ));
    $wp_customize->add_control('company_pinterest', array(
        'label' => __('Company Pinterest Link', 'laundryclean'),
        'section' => 'company_information',
        'type' => 'url',
    ));


    // Blog Section Settings

    $wp_customize->add_section('blog_section', array(
        'title' => __('Blog Settings', 'laundryclean'),
        'priority' => 130,
    ));
    //  Blog Section Title

    $wp_customize->add_setting('blog_section_title', array(
        'default' => __('Latest News & Blog', 'laundryclean'),
    ));

       $wp_customize->add_control('blog_section_title', array(
        'label' => __('Blog Title', 'laundryclean'),
        'section' => 'blog_section',
        'type' => 'textarea',
    ));
 
    // Blog Section Description

     $wp_customize->add_setting('blog_section_description', array(
        'default' => __('Clothing Care & Laundry Best Practices.', 'laundryclean'),
    ));

       $wp_customize->add_control('blog_section_description', array(
        'label' => __('Blog Description', 'laundryclean'),
        'section' => 'blog_section',
        'type' => 'textarea',
    ));

    // Blog Section Button Text

    $wp_customize->add_setting('blog_button_text', array(
        'default' => __('See More Blog', 'laundryclean'),
    ));
    $wp_customize->add_control('blog_button_text', array(
        'label' => __('Blog Button Text', 'laundryclean'),
        'section' => 'blog_section',
        'type' => 'text',
    ));

    // Blog Section Button URL

    $wp_customize->add_setting('blog_button_url', array(
        'default' => __('http://localhost/wordpress/index.php/blog/', 'laundryclean'),
    ));
    $wp_customize->add_control('blog_button_url', array(
        'label' => __('Blog Button URL', 'laundryclean'),
        'section' => 'blog_section',
        'type' => 'text',
    ));

    // Footer Section Settings

    $wp_customize->add_section('footer_section', array(
        'title' => __('Footer Settings', 'laundryclean'),
        'priority' => 140,
    ));

    // Footer Logo
     $wp_customize->add_setting('footer_logo', array(
        'default' => get_template_directory_uri() . '/assets/images/footerlogo.png',
     ));

     $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
         'label' => __('Footer Logo', 'laundryclean'),
         'section' => 'footer_section',
         'settings' => 'footer_logo',
     )));

     // Footer Description
    $wp_customize->add_setting('footer_description', array(
        'default' => __('Fusce non ellus nege purus fermentum commodo nunc ame alique Suspendisse poten In eu ipsum massa.', 'laundryclean'),
    ));
    $wp_customize->add_control('footer_description', array(
        'label' => __('Footer Description', 'laundryclean'),
        'section' => 'footer_section',
        'type' => 'textarea',
    ));

    // Footer menu 1
    $wp_customize->add_setting('footer_menu1_title', array(
        'default' => __('Our Services', 'laundryclean'),
    ));
    $wp_customize->add_control('footer_menu1_title', array(
        'label' => __('Footer Menu 1 Title', 'laundryclean'),
        'section' => 'footer_section',
        'type' => 'text',
    ));
    // Footer Menu 2
    $wp_customize->add_setting('footer_menu2_title', array(
        'default' => __('Quick Links', 'laundryclean'),
    ));
    $wp_customize->add_control('footer_menu2_title', array(
        'label' => __('Footer Menu 2 Title', 'laundryclean'),
        'section' => 'footer_section',
        'type' => 'text',
    ));
    // Footer Menu 3
    $wp_customize->add_setting('footer_menu3_title', array(
        'default' => __('Commercial Services', 'laundryclean'),
    ));
    $wp_customize->add_control('footer_menu3_title', array(
        'label' => __('Footer Menu 3 Title', 'laundryclean'),
        'section' => 'footer_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('newsletter_title', array(
        'default' => __('Newsletters', 'laundryclean'),
    ));
    $wp_customize->add_control('newsletter_title', array(
        'label' => __('Newsletter Title', 'laundryclean'),
        'section' => 'footer_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('newsletter_description', array(
        'default' => __('Sign up and receive our special offers.', 'laundryclean'),
    ));
    $wp_customize->add_control('newsletter_description', array(
        'label' => __('Newsletter Description', 'laundryclean'),
        'section' => 'footer_section',
        'type' => 'textarea',
    ));
}

add_action('customize_register', 'laundryclean_customize_register');
