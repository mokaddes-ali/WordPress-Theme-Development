<?php

function laundryclean_blog_customizer($wp_customize) {

    //Settings

    $wp_customize->add_section('blog_section', array(
        'title' => __('Blog Settings', 'laundryclean'),
        'priority' => 130,
    ));
    //  Title

    $wp_customize->add_setting('blog_title', array(
        'default' => __('Latest News & Blog', 'laundryclean'),
    ));

       $wp_customize->add_control('blog_title', array(
        'label' => __('Blog Title', 'laundryclean'),
        'section' => 'blog_section',
        'type' => 'textarea',
    ));
 
    // Description

     $wp_customize->add_setting('blog_sub_title', array(
        'default' => __('Clothing Care & Laundry Best Practices.', 'laundryclean'),
    ));

       $wp_customize->add_control('blog_sub_title', array(
        'label' => __('Blog Sub Title', 'laundryclean'),
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
}
add_action('customize_register', 'laundryclean_blog_customizer');