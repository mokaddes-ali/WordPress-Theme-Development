<?php 
/**
 * All service heading
 */


function laundryclean_all_services_customizer($customizer){
    //Settings
    $customizer->add_section('all_services_section', array(
        'title' => __('All Services Settings', 'laundryclean'),
        'priority' => 150,
    ));

    $customizer->add_setting('all_services_title', array(
        'default' => __('Our Services', 'laundryclean'),
    ));
    $customizer->add_control('all_services_title', array(
        'label' => __('All Services Title', 'laundryclean'),
        'section' => 'all_services_section',
        'type' => 'text',
    ));

    //sub title
    $customizer->add_setting('all_services_sub_title', array(
        'default' => __('The Solutions We Provide For Our Clients.', 'laundryclean'),
    ));
    $customizer->add_control('all_services_sub_title', array(
        'label' => __('All Services Subtitle', 'laundryclean'),
        'section' => 'all_services_section',
        'type' => 'text',
    ));
}
add_action('customize_register','laundryclean_all_services_customizer');