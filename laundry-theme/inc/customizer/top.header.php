<?php 

/**
 * Top Header Customizer
 */

function laundryclean_customize_header($wp_customize)
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
}
add_action('customize_register', 'laundryclean_customize_header');