<?php

function lessonlms_theme_enqueue_styles() {
    //Google Font
     wp_enqueue_style('google-font', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;0,900;1,400&family=Sen:wght@400..800&display=swap', array(), null);
    // Slick CSS
    wp_enqueue_style('slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css', array(), '1.9.0');


    // AOS CSS
    wp_enqueue_style('aos-css', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css', array(), '2.3.4');
    
    // box icon 
     wp_enqueue_style('boxicons-css', 'https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css', array(), '2.1.4');


  // Responsive CSS
  wp_enqueue_style('responsive-style-css', get_template_directory_uri() . '/assets/css/responsive.css', array(), time());

  //Style CSS  
  wp_enqueue_style('lesson-theme-css', get_template_directory_uri() . '/assets/css/style.css', array(), time());

    //Main CSS
    wp_enqueue_style('main-style', get_stylesheet_uri());

    // jQuery
    wp_enqueue_script('jquery');

    // Slick JS
    wp_enqueue_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array('jquery'), '1.9.0', true);


    //AOS JS
    wp_enqueue_script('aos-js', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js', array(), '2.3.4', true);

    // Custom script to initialize AOS
    wp_add_inline_script('aos-js', 'AOS.init();');

    // Custom JS
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), time(), true);
}
add_action('wp_enqueue_scripts', 'lessonlms_theme_enqueue_styles');


function lessonlms_theme_register(){
    
    add_theme_support('post-thumbnails');

    add_theme_support('custom-logo',array(
        'height' => 34,
        'width'=> 85,
    ));

    register_nav_menus(array(
    'header_menu' => __('Header Menu','lessonlms'),
    'mobile_menu' => __('Mobile Menu','lessonlms'),
     'footer_menu1' => __('Footer Menu1','lessonlms'),
      'footer_menu2' => __('Footer Menu2','lessonlms'),
    ));

}

add_action('after_setup_theme','lessonlms_theme_register');


function lessonlms_customize_register($wp_customize) {


  // Blog Section Start

   $wp_customize->add_section('blog_settings', array(
        'title'=> __('Blog Settings','lessonlms'),
        'priority' => 120,
      ));


      // Blog Section Title
      $wp_customize->add_setting('blog_section_title',array(
        'default'=> 'Our Blog',
      ));

      $wp_customize->add_control('blog_section_title',array(
        'label'=> __('Blog Section Title','lessonlms'),
        'section'=> 'blog_settings',
        'type'=> 'text',
      ));


       // Blog Section Description
      $wp_customize->add_setting('blog_section_description',array(
        'default'=> 'Read our regular travel blog and know the latest update of tour and travel',
      ));

      $wp_customize->add_control('blog_section_description',array(
        'label'=> __('Blog Section Description','lessonlms'),
        'section'=> 'blog_settings',
        'type'=> 'textarea',
      ));

      // Footer Section Start
      $wp_customize->add_section('footer_settings', array(
        'title'=> __('Footer Settings','lessonlms'),
        'priority' => 120,
      ));


      // Footer Logo
       $wp_customize->add_setting('footer_logo');
       $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo',array(
        'label'=> __('Footer Logo','lessonlms'),
        'settings'=> 'footer_logo',
        'section'=> 'footer_settings',
       )));


      //  Social Media Link

      $socials = array('twitter','facebook','linkedin','instagram');
      foreach ($socials as $social) {
        $wp_customize->add_setting("footer_{$social}_link", array(
          "default"=> '#',
        ));
        $wp_customize->add_control("footer_{$social}_link", array(
        "label"=> sprintf( __("%s URL","lessonlms"), ucfirst($social)),
        "section"=> "footer_settings",
        "type"=> 'url',
        ));
      }

      
      // About Text
      $wp_customize->add_setting('footer_about_text',array(
        'default'=> 'Need to help for your dream Career? trust us. With Lesson, study becomes a lot easier with us.',
      ));

      $wp_customize->add_control('footer_about_text',array(
        'label'=> __('About Text','lessonlms'),
        'section'=> 'footer_settings',
        'type'=> 'textarea',
      ));


       // Footer Menu 1 Title
      $wp_customize->add_setting('footer_menu1_title',array(
        'default'=> 'Company',
      ));

      $wp_customize->add_control('footer_menu1_title',array(
        'label'=> __('Footer Menu1 Title','lessonlms'),
        'section'=> 'footer_settings',
        'type'=> 'text',
      ));


        // Footer Menu 2 Title
      $wp_customize->add_setting('footer_menu2_title',array(
        'default'=> 'Support',
      ));

      $wp_customize->add_control('footer_menu2_title',array(
        'label'=> __('Footer Menu2 Title','lessonlms'),
        'section'=> 'footer_settings',
        'type'=> 'text',
      ));


          // Footer Address
      $wp_customize->add_setting('footer_address',array(
        'default'=> 'Address',
      ));

      $wp_customize->add_control('footer_address',array(
        'label'=> __('Address Title','lessonlms'),
        'section'=> 'footer_settings',
        'type'=> 'text',
      ));


          // Footer  Location
      $wp_customize->add_setting('footer_location_title',array(
        'default'=> 'Location:',
      ));

      $wp_customize->add_control('footer_location_title',array(
        'label'=> __('Location Title','lessonlms'),
        'section'=> 'footer_settings',
        'type'=> 'text',
      ));


      // Footer  Location Description
      $wp_customize->add_setting('footer_location_description',array(
        'default'=> '27 Division St, New York, NY 10002, USA',
      ));

      $wp_customize->add_control('footer_location_description',array(
        'label'=> __('Location Description','lessonlms'),
        'section'=> 'footer_settings',
        'type'=> 'text',
      ));


      
          // Footer  Email Title
      $wp_customize->add_setting('footer_email_title',array(
        'default'=> 'Email:',
      ));

      $wp_customize->add_control('footer_email_title',array(
        'label'=> __('Email Title','lessonlms'),
        'section'=> 'footer_settings',
        'type'=> 'text',
      ));


      // Footer Email
      $wp_customize->add_setting('footer_email',array(
        'default'=> 'email@gmail.com',
      ));

      $wp_customize->add_control('footer_email',array(
        'label'=> __('Footer Email','lessonlms'),
        'section'=> 'footer_settings',
        'type'=> 'email',
      ));


          // Footer  Phone Title
      $wp_customize->add_setting('footer_phone_title',array(
        'default'=> 'Phone:',
      ));

      $wp_customize->add_control('footer_phone_title',array(
        'label'=> __('Phone Title','lessonlms'),
        'section'=> 'footer_settings',
        'type'=> 'text',
      ));


      // Footer Phone Description
      $wp_customize->add_setting('footer_phone_description',array(
        'default'=> '+ 000 1234 567 890',
      ));

      $wp_customize->add_control('footer_phone_description',array(
        'label'=> __('Phone Description','lessonlms'),
        'section'=> 'footer_settings',
        'type'=> 'tel',
      ));
}
add_action('customize_register','lessonlms_customize_register');
