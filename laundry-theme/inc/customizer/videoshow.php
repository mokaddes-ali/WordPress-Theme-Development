<?php 

/**
 * Show Video Section in Homepage
 */

function laundryclean_video_section_customizer($customizer){
    //Settings
    $customizer->add_section('show_video_section', array(
        'title' => __('Show Video Settings', 'laundryclean'),
        'priority' => 90,
    ));

    $customizer->add_setting('show_video_title', array(
        'default' => __('About Our Company', 'laundryclean'),
    ));
    $customizer->add_control('show_video_title', array(
        'label' => __('Show Video Title', 'laundryclean'),
        'section' => 'show_video_section',
        'type' => 'text',
    ));

    //sub title
    $customizer->add_setting('show_video_subtitle', array(
        'default' => __('Laundry & Dry Cleaning Made Simple.', 'laundryclean'),
    ));
    $customizer->add_control('show_video_subtitle', array(
        'label' => __('Show Video Subtitle', 'laundryclean'),
        'section' => 'show_video_section',
        'type' => 'text',
    ));

    //video url
    $customizer->add_setting('show_video_url', array(
        'default'           => '',
    ));
    $customizer->add_control('show_video_url', array(
        'label' => __('Show Video URL', 'laundryclean'),
        'section' => 'show_video_section',
        'type' => 'url',
    ));

    // Our processing system
      
    // processing system 1
$customizer->add_setting('processing_system_image1',array(
    'default'=> get_template_directory_uri() . '/assets/images/featureimg1.png',
));

$customizer->add_control(new WP_Customize_Image_Control($customizer, 'processing_system_image1',array(
    'label'=> __('Processing System Image1','lessonlms'),
    'section' => 'show_video_section',
    'settings'=> 'processing_system_image1',
)));

    //processing_system_title1
    $customizer->add_setting('processing_system_title1', array(
        'default' => __('You Order', 'laundryclean'),
    ));
    $customizer->add_control('processing_system_title1', array(
        'label' => __('Processing System Title1', 'laundryclean'),
        'section' => 'show_video_section',
        'type' => 'text',
    ));

    //Processing System Subtitle1
    $customizer->add_setting('processing_system_subtitle1', array(
        'default' => __('Quickly book your laundry pickup online.', 'laundryclean'),
    ));
    $customizer->add_control('processing_system_subtitle1', array(
        'label' => __('Processing System SubTitle1', 'laundryclean'),
        'section' => 'show_video_section',
        'type' => 'text',
    ));
      

    // processing system 2
    $customizer->add_setting('processing_system_image2',array(
    'default'=> get_template_directory_uri() . '/assets/images/featureimg2.png',
));

$customizer->add_control(new WP_Customize_Image_Control($customizer, 'processing_system_image2',array(
    'label'=> __('Processing System Image2','lessonlms'),
    'section' => 'show_video_section',
    'settings'=> 'processing_system_image2',
)));

    //processing_system_title2
    $customizer->add_setting('processing_system_title2', array(
        'default' => __('We Collect', 'laundryclean'),
    ));
    $customizer->add_control('processing_system_title2', array(
        'label' => __('Processing System Title2', 'laundryclean'),
        'section' => 'show_video_section',
        'type' => 'text',
    ));

    //Processing System Subtitle2
    $customizer->add_setting('processing_system_subtitle2', array(
        'default' => __('No bag needed – just hand over your clothes!', 'laundryclean'),
    ));
    $customizer->add_control('processing_system_subtitle2', array(
        'label' => __('Processing System SubTitle2', 'laundryclean'),
        'section' => 'show_video_section',
        'type' => 'text',
    ));
     
       // processing system 3

       $customizer->add_setting('processing_system_image3',array(
    'default'=> get_template_directory_uri() . '/assets/images/featureimg3.png',
));

$customizer->add_control(new WP_Customize_Image_Control($customizer, 'processing_system_image3',array(
    'label'=> __('Processing System Image3','lessonlms'),
    'section' => 'show_video_section',
    'settings'=> 'processing_system_image3',
)));

    //processing_system_title3
    $customizer->add_setting('processing_system_title3', array(
        'default' => __('We Clean', 'laundryclean'),
    ));
    $customizer->add_control('processing_system_title3', array(
        'label' => __('Processing System Title3', 'laundryclean'),
        'section' => 'show_video_section',
        'type' => 'text',
    ));

    //Processing System Subtitle3
    $customizer->add_setting('processing_system_subtitle3', array(
        'default' => __('Superior cleaning satisfaction assured.', 'laundryclean'),
    ));
    $customizer->add_control('processing_system_subtitle3', array(
        'label' => __('Processing System SubTitle3', 'laundryclean'),
        'section' => 'show_video_section',
        'type' => 'text',
    ));

       // processing system 4
    $customizer->add_setting('processing_system_image4',array(
    'default'=> get_template_directory_uri() . '/assets/images/featureimg4.png',
));

$customizer->add_control(new WP_Customize_Image_Control($customizer, 'processing_system_image4',array(
    'label'=> __('Processing System Image4','lessonlms'),
    'section' => 'show_video_section',
    'settings'=> 'processing_system_image4',
)));

    //processing_system_title3
    $customizer->add_setting('processing_system_title4', array(
        'default' => __('We Deliver', 'laundryclean'),
    ));
    $customizer->add_control('processing_system_title4', array(
        'label' => __('Processing System Title4', 'laundryclean'),
        'section' => 'show_video_section',
        'type' => 'text',
    ));

    //Processing System Subtitle3
    $customizer->add_setting('processing_system_subtitle4', array(
        'default' => __('Pick a time, and we’ll deliver straight to you!', 'laundryclean'),
    ));
    $customizer->add_control('processing_system_subtitle4', array(
        'label' => __('Processing System SubTitle4', 'laundryclean'),
        'section' => 'show_video_section',
        'type' => 'text',
    ));
}
add_action('customize_register', 'laundryclean_video_section_customizer');
