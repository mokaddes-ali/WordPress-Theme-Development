<?php
/**
 * Services customize
 */

function laundryclean_services_customizer($wp_customize) {

    //Settings

    $wp_customize->add_section('services_section', array(
        'title' => __('Services Settings', 'laundryclean'),
        'priority' => 40,
    ));
    //  Title

    $wp_customize->add_setting('services_title', array(
        'default' => __('Our Services', 'laundryclean'),
    ));

       $wp_customize->add_control('services_title', array(
        'label' => __('Services Title', 'laundryclean'),
        'section' => 'services_section',
        'type' => 'text',
    ));
 
    // Description

     $wp_customize->add_setting('services_sub_title', array(
        'default' => __('The Solutions We Provide For Our Clients.', 'laundryclean'),
    ));

       $wp_customize->add_control('services_sub_title', array(
        'label' => __('Services Sub Title', 'laundryclean'),
        'section' => 'services_section',
        'type' => 'textarea',
    ));

    // Blog Section Button Text

    $wp_customize->add_setting('services_button_text', array(
        'default' => __('See More Services', 'laundryclean'),
    ));
    $wp_customize->add_control('services_button_text', array(
        'label' => __('Services Button Text', 'laundryclean'),
        'section' => 'services_section',
        'type' => 'text',
    ));
}
add_action('customize_register', 'laundryclean_services_customizer');