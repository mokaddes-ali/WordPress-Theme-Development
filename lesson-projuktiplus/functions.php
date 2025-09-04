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

     //font-awesome icon 
     wp_enqueue_style('font-awesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css', array(), '7.0.0');



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

     if (wp_get_theme()->get('TextDomain') === 'lessonlms') {
    add_theme_support('post-thumbnails');

    add_theme_support('custom-logo',array(
        'height' => 34,
        'width'=> 85,
    ));

    register_nav_menus(array(
    'header_menu' => __('LMS Header Menu','lessonlms'),
    'mobile_menu' => __('LMS Mobile Menu','lessonlms'),
     'footer_menu1' => __('LMS Footer Menu1','lessonlms'),
      'footer_menu2' => __('LMS Footer Menu2','lessonlms'),
    ));
     }
}

add_action('after_setup_theme','lessonlms_theme_register');




// <!-- // Wideget and Sidebar -->

function lessonlms_register_sidebar() {
          register_sidebar([
            'name' => __('Blog Sidebar', 'lessonlms'),
             'id' => 'blog-sidebar',
              'description'   => __( 'Add widgets here to appear in your sidebar.', 'lessonlms' ),
              'before_widget' => ' <div class="card">',
              'after_widget'  => '</div>',
              'before_title'  => '<h4 class="blog-detail-right-heading">', 
             'after_title'   => '</h4><div class="sidebar-divider"></div>',


          ]);
}
add_action('widgets_init', 'lessonlms_register_sidebar');


// Default pagination

function lessonlms_all_pagenav() {
    global $wp_query, $wp_rewrite;
    $pages = '';
    $bigrandom = 999999999; 
    $max = $wp_query->max_num_pages; 
    $total = 1; 
    $current = max(1, get_query_var('paged'));

    if ($max <= 1) return;
    if ($total == 1 && $max > 1) {
    $pages = '<p class="pages-count">Page <span class="current-page">' . $current . '</span> 
              <span class="sep">of</span> 
              <span class="total-page">' . $max . '</span></p>';
}

echo '<div class="pagination-info">' . $pages . '</div>';

    echo '<div class="pagination-wrapper">';

    $links = paginate_links(array(
        'base'      => str_replace($bigrandom, '%#%', esc_url(get_pagenum_link($bigrandom))),
        'format'    => '?paged=%#%',
        'current'   => $current,
        'total'     => $max,
        'prev_text' => '<div class="pagination-prev">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
</svg>

                          

                        </div>',
        'next_text' => '<div class="pagination-next">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
</svg>

                        </div>',
        'type'      => 'array',
    ));

    if (is_array($links)) {
        echo '<ul class="pagination">';
        foreach ($links as $link) {
            echo "<li>$link</li>";
        }
        echo '</ul>';
    }

    echo '</div>';
}



function lessonlms_customize_register($wp_customize) {

  // ======================
  // Hero Section
  // ======================
    $wp_customize->add_section('hero_section', array(
        'title' => __('Hero Settings', 'lessonlms'),
        'priority' => 30,
    ));

      // Hero Image
  $wp_customize->add_setting('hero_image', array(
    'default' => get_template_directory_uri() . '/assets/images/heor-img.png',
  ));
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image',array(
      'label'=> __('Hero Image','lessonlms'),
      'settings'=> 'hero_image',
      'section'=> 'hero_section',
  )));

    //Hero Section Title
  $wp_customize->add_setting('hero_section_title',array(
      'default'=> 'Learn without limits and spread knowledge.',
  ));

  $wp_customize->add_control('hero_section_title',array(
      'label'=> __('Hero Title','lessonlms'),
      'section'=> 'hero_section',
      'type'=> 'text',
  ));

  // Hero Section Description
  $wp_customize->add_setting('hero_section_description',array(
      'default'=> 'Build new skills for that “this is my year” feeling with courses, certificates, and degrees from world-class universities and companies.',
  ));

  $wp_customize->add_control('hero_section_description',array(
      'label'=> __('Hero Description','lessonlms'),
      'section'=> 'hero_section',
      'type'=> 'textarea',
  ));

    //Courses Button Text
  $wp_customize->add_setting('courses_button_text',array(
      'default'=> 'See Courses',
  ));

  $wp_customize->add_control('courses_button_text',array(
      'label'=> __('Courses Button Text','lessonlms'),
      'section'=> 'hero_section',
      'type'=> 'text',
  ));

    //Courses Button URL
  $wp_customize->add_setting('courses_button_url',array(
      'default'=> '#',
  ));

  $wp_customize->add_control('courses_button_url',array(
      'label'=> __('Courses Button URL','lessonlms'),
      'section'=> 'hero_section',
      'type'=> 'url',
  ));


     //Watch Button Text
  $wp_customize->add_setting('watch_button_text',array(
      'default'=> 'Watch Video',
  ));

  $wp_customize->add_control('watch_button_text',array(
      'label'=> __('Vedio Button Text','lessonlms'),
      'section'=> 'hero_section',
      'type'=> 'text',
  ));

    //Courses Button URL
  $wp_customize->add_setting('watch_button_url',array(
      'default'=> '#',
  ));

  $wp_customize->add_control('watch_button_url',array(
      'label'=> __('Vedio Button URL','lessonlms'),
      'section'=> 'hero_section',
      'type'=> 'url',
  ));



    //   Recent engagement
       $wp_customize->add_setting('recent_engagement_text',array(
           'default'=> 'Recent engagement',
       ));

       $wp_customize->add_control('recent_engagement_text',array(
           'label'=> __('Recent Engagement Text','lessonlms'),
           'section'=> 'hero_section',
           'type'=> 'text',
       ));

       // students count
            $wp_customize->add_setting('student_count_text',array(
                'default' => '50K', 'lessonlms'
            ));

            $wp_customize->add_control('student_count_text',array(
                'label'=> __('Student Count Text','lessonlms'),
                'section'=> 'hero_section',
                'type'=> 'text',
            ));

    //    students label

    $wp_customize->add_setting('student_label_text',array(
        'default' => 'Students',
    ));

    $wp_customize->add_control('student_label_text',array(
        'label'=> __('Student Label Text','lessonlms'),
        'section'=> 'hero_section',
        'type'=> 'text',
    ));

    // Cources Count
    $wp_customize->add_setting('course_count_text',array(
        'default' => '70+', 'lessonlms'
    ));

    $wp_customize->add_control('course_count_text', array(
        'label' => __('Course Count Text','lessonlms'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    // Courses Label
    $wp_customize->add_setting('course_label_text',array(
        'default' => 'Courses',
    ));

    $wp_customize->add_control('course_label_text',array(
        'label'=> __('Course Label Text','lessonlms'),
        'section'=> 'hero_section',
        'type'=> 'text',
    ));


     // UI/UX Design Count
    $wp_customize->add_setting('uiux_design_count',array(
        'default' => '20', 'lessonlms'
    ));

    $wp_customize->add_control('uiux_design_count', array(
        'label' => __('UI/UX Design Count','lessonlms'),
        'section' => 'hero_section',
        'type' => 'number',
    ));

    // UI/UX Design Label
    $wp_customize->add_setting('uiux_design_label',array(
        'default' => 'UI/UX Design',
    ));

    $wp_customize->add_control('uiux_design_label',array(
        'label'=> __('UI/UX Design Label','lessonlms'),
        'section'=> 'hero_section',
        'type'=> 'text',
    ));

     // Development Count
    $wp_customize->add_setting('development_count',array(
        'default' => '30', 'lessonlms'
    ));

    $wp_customize->add_control('development_count', array(
        'label' => __('Development Count Text','lessonlms'),
        'section' => 'hero_section',
        'type' => 'number',
    ));

    // Development Count Label
    $wp_customize->add_setting('development_label_text',array(
        'default' => 'Development',
    ));

    $wp_customize->add_control('development_label_text',array(
        'label'=> __('Development Label Text','lessonlms'),
        'section'=> 'hero_section',
        'type'=> 'text',
    ));



     // Marketing Count
    $wp_customize->add_setting('marketing_count',array(
        'default' => '20', 'lessonlms'
    ));

    $wp_customize->add_control('marketing_count', array(
        'label' => __('Marketing Count','lessonlms'),
        'section' => 'hero_section',
        'type' => 'number',
    ));

    // Marketing Count Label
    $wp_customize->add_setting('marketing_label_text',array(
        'default' => 'Marketing',
    ));

    $wp_customize->add_control('marketing_label_text',array(
        'label'=> __('Marketing Label Text','lessonlms'),
        'section'=> 'hero_section',
        'type'=> 'text',
    ));

       // ======================
  //  Features Section Start
  // ======================

  $wp_customize->add_section('features_section' ,array(
      'title' => __('Features Settings', 'lessonlms'),
      'priority' => 100,
  ));

  // Features Title
  $wp_customize->add_setting('features_title',array(
      'default'=> 'Learner outcomes through our awesome platform',
  ));

  $wp_customize->add_control('features_title',array(
      'label'=> __('Features Title','lessonlms'),
      'section'=> 'features_section',
      'type'=> 'textarea',
  ));

  //Features Description One
  $wp_customize->add_setting('features_description_one',array(
      'default'=> '87% of people learning for professional development report career benefits like getting a promotion, a raise, or starting a new career.',
  ));

  $wp_customize->add_control('features_description_one',array(
      'label'=> __('Features Description One','lessonlms'),
      'section'=> 'features_section',
      'type'=> 'textarea',
  ));
//Features Description Two
$wp_customize->add_setting('features_description_two',array(
    'default'=> 'Lesson Impact Report (2022)',
));

$wp_customize->add_control('features_description_two',array(
    'label'=> __('Features Description Two','lessonlms'),
    'section'=> 'features_section',
    'type'=> 'textarea',
));

//Features Button Text
$wp_customize->add_setting('features_button_text',array(
    'default'=> 'sign up',
));

$wp_customize->add_control('features_button_text',array(
    'label'=> __('Features Button Text','lessonlms'),
    'section'=> 'features_section',
    'type'=> 'text',
));

//Features Button URL

$wp_customize->add_setting('features_button_url',array(
    'default'=> '#',
));

$wp_customize->add_control('features_button_url',array(
    'label'=> __('Features Button URL','lessonlms'),
    'section'=> 'features_section',
    'type'=> 'url',
));

//Features Image One
$wp_customize->add_setting('features_image_one',array(
    'default'=> get_template_directory_uri() . '/assets/images/feature1.png',
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'features_image_one',array(
    'label'=> __('Features Image One','lessonlms'),
    'section'=> 'features_section',
    'settings'=> 'features_image_one',
)));

// Feature Image Two
$wp_customize->add_setting('features_image_two',array(
    'default'=> get_template_directory_uri() . '/assets/images/feature2.png',
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'features_image_two',array(
    'label'=> __('Features Image Two','lessonlms'),
    'section'=> 'features_section',
    'settings'=> 'features_image_two',
)));

  // ======================
  //   CTA Section
  // ======================
   
  $wp_customize->add_section('cta_section', array(
      'title' => __('CTA Settings', 'lessonlms'),
      'priority' => 105,
  ));


//   CTA Title
$wp_customize->add_setting('cta_title', array(
    'default' => 'Take the next step toward your personal and professional goals with Lesson.',
));

$wp_customize->add_control('cta_title', array(
    'label' => __('CTA Title', 'lessonlms'),
    'section' => 'cta_section',
    'type' => 'text',
));

$wp_customize->add_setting('cta_description', array(
    'default' => 'Take the next step toward. Join now to receive personalized and more recommendations from the full Coursera catalog.',
));

$wp_customize->add_control('cta_description', array(
    'label' => __('CTA Description', 'lessonlms'),
    'section' => 'cta_section',
    'type' => 'textarea',
));

// CTA Button Text
        $wp_customize->add_setting('cta_button_text', array(
            'default' => 'Join now',
        ));

        $wp_customize->add_control('cta_button_text', array(
            'label' => __('CTA Button Text', 'lessonlms'),
            'section' => 'cta_section',
            'type' => 'text',
        ));

// CTA Button URL
$wp_customize->add_setting('cta_button_url', array(
    'default' => '#',
));

$wp_customize->add_control('cta_button_url', array(
    'label' => __('CTA Button URL', 'lessonlms'),
    'section' => 'cta_section',
    'type' => 'url',
));

// CTA Image
$wp_customize->add_setting('cta_image', array(
    'default' => get_template_directory_uri() . '/assets/images/cta-right.png',
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cta_image', array(
    'label' => __('CTA Image', 'lessonlms'),
    'section' => 'cta_section',
    'settings' => 'cta_image',
)));


   // ======================
  //  Blog Section Start
  // ======================
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

    $wp_customize->add_setting('blog_button_text' ,array(
        'default' => 'See Blogs',
    ));
    $wp_customize->add_control('blog_button_text',array(
        'label' => __('Blog Button Text', 'lessonlms'),
        'section' => 'blog_settings',
         'type' => 'text',
    ));

       $wp_customize->add_setting('blog_button_url' ,array(
        'default' => 'http://localhost/wordpress/index.php/blog/',
    ));
    $wp_customize->add_control('blog_button_url',array(
        'label' => __('Blog Button URL', 'lessonlms'),
        'section' => 'blog_settings',
         'type' => 'url',
    ));

   // ======================
  // Footer Section Start
  // ======================
  $wp_customize->add_section('footer_settings', array(
      'title'=> __('Footer Settings','lessonlms'),
      'priority' => 130,
  ));

  // Footer Logo
  $wp_customize->add_setting('footer_logo');
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo',array(
      'label'=> __('Footer Logo','lessonlms'),
      'settings'=> 'footer_logo',
      'section'=> 'footer_settings',
  )));

  // Social Media Link
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

  // Footer About Text
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

  // Footer Location
  $wp_customize->add_setting('footer_location_title',array(
      'default'=> 'Location:',
  ));

  $wp_customize->add_control('footer_location_title',array(
      'label'=> __('Location Title','lessonlms'),
      'section'=> 'footer_settings',
      'type'=> 'text',
  ));

  // Footer Location Description
  $wp_customize->add_setting('footer_location_description',array(
      'default'=> '27 Division St, New York, NY 10002, USA',
  ));

  $wp_customize->add_control('footer_location_description',array(
      'label'=> __('Location Description','lessonlms'),
      'section'=> 'footer_settings',
      'type'=> 'text',
  ));

  // Footer Email Title
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

  // Footer Phone Title
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


// rank_math_the_breadcrumb
if (function_exists('rank_math_the_breadcrumbs')) {
    rank_math_the_breadcrumbs();
}