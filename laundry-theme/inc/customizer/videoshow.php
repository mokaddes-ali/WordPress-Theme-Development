<?php 

/**
 * Show Video Section in Homepage
 */

function laundryclean_video_section_customizer($customizer){
    //Settings
    $customizer->add_section('_about_section', array(
        'title' => __('Show Video Settings', 'laundryclean'),
        'priority' => 90,
    ));

    $customizer->add_setting('about_title', array(
        'default' => __('About Our Company', 'laundryclean'),
    ));
    $customizer->add_control('about_title', array(
        'label' => __('Show Video Title', 'laundryclean'),
        'section' => '_about_section',
        'type' => 'text',
    ));

    //sub title
    $customizer->add_setting('about_subtitle', array(
        'default' => __('Laundry & Dry Cleaning Made Simple.', 'laundryclean'),
    ));
    $customizer->add_control('about_subtitle', array(
        'label' => __('Show Video Subtitle', 'laundryclean'),
        'section' => '_about_section',
        'type' => 'text',
    ));

    //button text
    $customizer->add_setting('about_button_text', array(
        'default' => __('Discover More', 'laundryclean'),
    ));
    $customizer->add_control('about_button_text', array(
        'label' => __('Show Video URL', 'laundryclean'),
        'section' => '_about_section',
        'type' => 'text',
    ));
    //button url
    $customizer->add_setting('about_button_url', array(
        'default' => __('http://localhost/wordpress/', 'laundryclean'),
    ));
    $customizer->add_control('about_button_url', array(
        'label' => __('About Button URL', 'laundryclean'),
        'section' => '_about_section',
        'type' => 'url',
    ));


    //left image
    $customizer->add_setting('about_left_image', array(
        'default' => get_template_directory_uri() . '/assets/images/aboutleft.png',
    ));
    $customizer->add_control(WP_Customize_Image_Control::class, array(
        'label' => __('About Left Image', 'laundryclean'),
        'section' => '_about_section',
        'settings' => 'about_left_image',
    ));

    //right image
    $customizer->add_setting('about_right_image', array(
        'default' => get_template_directory_uri() . '/assets/images/aboutright.png',
    ));
    $customizer->add_control(WP_Customize_Image_Control::class, array(
        'label' => __('About Right Image', 'laundryclean'),
        'section' => '_about_section',
        'settings' => 'about_right_image',
    ));

    //First Counter
    $customizer->add_setting('about_first_counter', array(
        'default' => __('86', 'laundryclean'),
    ));
    $customizer->add_control('about_first_counter', array(
        'label' => __('About First Counter', 'laundryclean'),
        'section' => '_about_section',
        'type' => 'text',
    ));

    //First counter suffix
    $customizer->add_setting('about_first_counter_suffix', array(
        'default' => __('K', 'laundryclean'),
    ));
    $customizer->add_control('about_first_counter_suffix', array(
        'label' => __('About First Counter Suffix', 'laundryclean'),
        'section' => '_about_section',
        'type' => 'text',
    ));


    //First Counter Text
    $customizer->add_setting('about_first_counter_text', array(
        'default' => __('Free Pickup & Delivery', 'laundryclean'),
    ));
    $customizer->add_control('about_first_counter_text', array(
        'label' => __('About First Counter Text', 'laundryclean'),
        'section' => '_about_section',
        'type' => 'text',
    ));

    // Second Counter
    $customizer->add_setting('about_second_counter', array(
        'default' => __('140', 'laundryclean'),
    ));
    $customizer->add_control('about_second_counter', array(
        'label' => __('About Second Counter', 'laundryclean'),
        'section' => '_about_section',
        'type' => 'text',
    ));

    //second counter suffix
    $customizer->add_setting('about_second_counter_suffix', array(
        'default' => __('+', 'laundryclean'),
    ));
    $customizer->add_control('about_second_counter_suffix', array(
        'label' => __('About Second Counter Suffix', 'laundryclean'),
        'section' => '_about_section',
        'type' => 'text',
    ));

    //Second Counter Text
    $customizer->add_setting('about_second_counter_text', array(
        'default' => __('Cleaning Expert Members', 'laundryclean'),
    ));
    $customizer->add_control('about_second_counter_text', array(
        'label' => __('About Second Counter Text', 'laundryclean'),
        'section' => '_about_section',
        'type' => 'text',
    ));

    // Third Counter
    $customizer->add_setting('about_third_counter', array(
        'default' => __('98', 'laundryclean'),
    ));
    $customizer->add_control('about_third_counter', array(
        'label' => __('About Third Counter', 'laundryclean'),
        'section' => '_about_section',
        'type' => 'text',
    ));

    //Third counter suffix
    $customizer->add_setting('about_third_counter_suffix', array(
        'default' => __('%', 'laundryclean'),
    ));
    $customizer->add_control('about_third_counter_suffix', array(
        'label' => __('About Third Counter Suffix', 'laundryclean'),
        'section' => '_about_section',
        'type' => 'text',
    ));

    //Third Counter Text
    $customizer->add_setting('about_third_counter_text', array(
        'default' => __('Company Award Winner', 'laundryclean'),
    ));
    $customizer->add_control('about_third_counter_text', array(
        'label' => __('About Third Counter Text', 'laundryclean'),
        'section' => '_about_section',
        'type' => 'text',
    ));
}
add_action('customize_register', 'laundryclean_video_section_customizer');
