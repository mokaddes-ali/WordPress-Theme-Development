<?php
/**
 *Testimonial customize
 */

function laundryclean_testimonial_customizer($wp_customize) {

    //Settings

    $wp_customize->add_section('testimonial_section', array(
        'title' => __('Testimonial Settings', 'laundryclean'),
        'priority' => 90,
    ));
    //  Title

    $wp_customize->add_setting('testimonial_title', array(
        'default' => __('Our Happy Customers', 'laundryclean'),
    ));

       $wp_customize->add_control('testimonial_title', array(
        'label' => __('Testimonials Title', 'laundryclean'),
        'section' => 'testimonial_section',
        'type' => 'text',
    ));
 
    // Description

     $wp_customize->add_setting('testimonial_sub_title', array(
        'default' => __('Raving Reviews From Satisfied Clients.', 'laundryclean'),
    ));

       $wp_customize->add_control('testimonial_sub_title', array(
        'label' => __('Testimonials Sub Title', 'laundryclean'),
        'section' => 'testimonial_section',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'laundryclean_testimonial_customizer');