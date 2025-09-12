<?php 

/**
 * Header Customizer Options
 */
function laundryclean_header_customizer($wp_customize) {

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
}

add_action('customize_register', 'laundryclean_header_customizer');
