<?php 
/**
 * Footer Customize
 */

function laundryclean_footer_customize_register($wp_customize)
{

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

add_action('customize_register', 'laundryclean_footer_customize_register');