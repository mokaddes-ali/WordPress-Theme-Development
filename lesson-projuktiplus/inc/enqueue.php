<?php 

/**
 * Enque Script and Style
 */

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
  wp_enqueue_style('theme-main-css', get_template_directory_uri() . '/assets/css/main.css', array(), time());

    //Main CSS
    wp_enqueue_style('main-style', get_stylesheet_uri());

    // jQuery
    wp_enqueue_script('jquery');

     // magnific-popup.js
     wp_enqueue_script('magnific-popup.js', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js', array('jquery'), '1.1.0', true);

    // Slick JS
    wp_enqueue_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array('jquery'), '1.9.0', true);


    //AOS JS
    wp_enqueue_script('aos-js', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js', array(), '2.3.4', true);

    // sweetalert-js
   wp_enqueue_script(
    'sweetalert-js','https://cdn.jsdelivr.net/npm/sweetalert2@11', array('jquery'), null, true);

    // ajax-comment-js
    wp_enqueue_script( 'ajax-comment-js', get_template_directory_uri() . '/assets/js/ajax-comment.js', ['jquery', 'sweetalert-js'], null, true);
    wp_localize_script( 'ajax-comment-js', 'lessonlms_ajax_comment_obj',[
      'ajax_url' => admin_url('admin-ajax.php'),
       'nonce' => wp_create_nonce('lessonlms_ajax_comment_nonce')
    ]);


        // ajax-review-js
    wp_enqueue_script( 'ajax-review-js', get_template_directory_uri() . '/assets/js/ajax-review.js', ['jquery', 'sweetalert-js'], null, true );

            wp_enqueue_script(
    'course-filter-js',
    get_template_directory_uri() . '/assets/js/course-filter.js',
    ['jquery'],
    null,
    true
);

wp_localize_script('course-filter-js', 'lessonlms_filter', [
    'ajax_url' => admin_url('admin-ajax.php'),
]);


    

    wp_localize_script( 'ajax-review-js', 'lessonlms_ajax_review_obj',[
      'ajax_url' => admin_url('admin-ajax.php'),
       'nonce' => wp_create_nonce('lessonlms_ajax_review_nonce')
    ]);

          // ajax-feedback-js
    wp_enqueue_script( 'ajax-feedback-js', get_template_directory_uri() . '/assets/js/ajax-feedback.js', ['jquery', 'sweetalert-js'], null, true );


    wp_localize_script( 'ajax-feedback-js', 'lessonlms_ajax_feedback_obj',[
      'ajax_url' => admin_url('admin-ajax.php'),
       'nonce' => wp_create_nonce('lessonlms_ajax_feedback_nonce')
    ]);


    // Custom script to initialize AOS
    wp_add_inline_script('aos-js', 'AOS.init();');

    // Custom JS
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), time(), true);


}
add_action('wp_enqueue_scripts', 'lessonlms_theme_enqueue_styles');


