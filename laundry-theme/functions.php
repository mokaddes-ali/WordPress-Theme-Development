<?php
/**
 * 
 * 
 */



function laundry_clean_enqueue_scripts()
{

    
    // Slick CSS
    wp_register_style('slick-css', get_template_directory_uri() . 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css', array(), '1.9.0', 'all');


    wp_register_style('tailwind-css', get_template_directory_uri() . '/assets/tailwindcss/output.css', [], false, 'all');

wp_register_style(
    'style-css',
    get_template_directory_uri() . '/style.css', 
    [],
    filemtime(get_template_directory() . '/style.css'),
    'all'
);


    // Register Script
    wp_register_script('custom-js', get_template_directory_uri() . '/assets/js/custom-js', [], filemtime(get_template_directory() . '/assets/js/custom-js'), true);

      // jQuery
    wp_enqueue_script('jquery');
   
    //   enqueue_style
    
    wp_enqueue_style('style-css');
    wp_enqueue_style('tailwind-css');
    wp_enqueue_style('slick-css');

    //   enqueue_script
    wp_enqueue_script('custom-js');
}

add_action("wp_enqueue_scripts", "laundry_clean_enqueue_scripts");

function laundry_clean_customize_register($wp_customize){
    // Company Information Settings
    $wp_customize->add_section('company_information', array(
        'title' => __('Company Information', 'laundry_clean'),
        'priority' => 30,
    ));

    // Company Name
    $wp_customize->add_setting('company_name', array(
        'default' => __('Laundry Service', 'laundry_clean'),
    ));
    $wp_customize->add_control('company_name', array(
        'label' => __('Company Name', 'laundry_clean'),
        'section' => 'company_information',
        'type' => 'text',
    ));

    // Company Address
    $wp_customize->add_setting('company_address', array(
        'default' => __('Holland, London 7QU UK', 'laundry_clean'),
    ));
    $wp_customize->add_control('company_address', array(
        'label' => __('Company Address', 'laundry_clean'),
        'section' => 'company_information',
        'type' => 'textarea',
    ));

    // Company Phone
    $wp_customize->add_setting('company_phone', array(
        'default' => __('(234) 987 - 354 - 3670', 'laundry_clean'),
    ));
    $wp_customize->add_control('company_phone', array(
        'label' => __('Company Phone', 'laundry_clean'),
        'section' => 'company_information',
        'type' => 'text',
    ));

    // Company Email
    $wp_customize->add_setting('company_email', array(
        'default' => __('example@gmail.com', 'laundry_clean'),
    ));
    $wp_customize->add_control('company_email', array(
        'label' => __('Company Email', 'laundry_clean'),
        'section' => 'company_information',
        'type' => 'email',
    ));

    // Company Social Media Link

    //Facebook
    $wp_customize->add_setting('company_facebook', array(
        'default' => __('https://www.facebook.com/', 'laundry_clean'),
    ));
    $wp_customize->add_control('company_facebook', array(
        'label' => __('Company Facebook Link', 'laundry_clean'),
        'section' => 'company_information',
        'type' => 'url',
    ));

    // LinkedIn
    $wp_customize->add_setting('company_linkedin', array(
        'default' => __('https://www.linkedin.com/', 'laundry_clean'),
    ));
    $wp_customize->add_control('company_linkedin', array(
        'label' => __('Company LinkedIn Link', 'laundry_clean'),
        'section' => 'company_information',
        'type' => 'url',
    ));

    // Twitter
    $wp_customize->add_setting('company_twitter', array(
        'default' => __('https://www.twitter.com/', 'laundry_clean'),
    ));
    $wp_customize->add_control('company_twitter', array(
        'label' => __('Company Twitter Link', 'laundry_clean'),
        'section' => 'company_information',
        'type' => 'url',
    ));

    // Pinterest
    $wp_customize->add_setting('company_pinterest', array(
        'default' => __('https://www.pinterest.com/', 'laundry_clean'),
    ));
    $wp_customize->add_control('company_pinterest', array(
        'label' => __('Company Pinterest Link', 'laundry_clean'),
        'section' => 'company_information',
        'type' => 'url',
    ));
}



add_action('customize_register', 'laundry_clean_customize_register');

?>