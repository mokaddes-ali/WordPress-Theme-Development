<?php

/**
 * Theme Customizer
 */


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


    /**=============================
     * Header Settings
     *=============================*/
    $wp_customize->add_section('header_section', array(
        'title' => __('Header Settings', 'laundryclean'),
        'priority' => 120,
    ));

    // Header Logo
    $wp_customize->add_setting('header_logo', array(
        'default' => get_template_directory_uri() . '/assets/images/Logo (1).png',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_logo', array(
        'label' => __('Header Logo', 'laundryclean'),
        'section' => 'header_section',
        'settings' => 'header_logo',
        'height' => 40,
        'width' => 140,
    )));

    // Menu Position
    $wp_customize->add_setting('menu_position', array(
        'default' => 'left_logo',
    ));
    $wp_customize->add_control('menu_position', array(
        'label' => __('Menu Position', 'laundryclean'),
        'section' => 'header_section',
        'type' => 'radio',
        'choices' => array(
            'left_logo' => __('Left Logo', 'laundryclean'),
            'right_logo' => __('Right Logo', 'laundryclean'),
        ),
    ));


    // Header Button Text
    $wp_customize->add_setting('header_button_text', array(
        'default' => __('Schedule a Pickup', 'laundryclean'),
    ));
    $wp_customize->add_control('header_button_text', array(
        'label' => __('Header Button Text', 'laundryclean'),
        'section' => 'header_section',
        'type' => 'text',
    ));

    // Header Button URL
    $wp_customize->add_setting('header_button_url', array(
        'default' => __('http://localhost/wordpress/index.php/schedule-a-pickup/', 'laundryclean'),
    ));
    $wp_customize->add_control('header_button_url', array(
        'label' => __('Header Button URL', 'laundryclean'),
        'section' => 'header_section',
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