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

    // Slick JS
    wp_enqueue_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array('jquery'), '1.9.0', true);


    //AOS JS
    wp_enqueue_script('aos-js', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js', array(), '2.3.4', true);

    // sweetalert-js
   wp_enqueue_script(
    'sweetalert-js','https://cdn.jsdelivr.net/npm/sweetalert2@11', array('jquery'), null, true);

    // ajax-comment-js
    wp_enqueue_script( 'ajax-comment-js', get_template_directory_uri() . '/assets/js/ajax-comment.js', ['jquery'], null, true);
    wp_localize_script( 'ajax-comment-js', 'lessonlms_ajax_comment_obj',[
      'ajax_url' => admin_url('admin-ajax.php'),
       'nonce' => wp_create_nonce('lessonlms_ajax_comment_nonce')
    ]);


    // Custom script to initialize AOS
    wp_add_inline_script('aos-js', 'AOS.init();');

    // Custom JS
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), time(), true);


}
add_action('wp_enqueue_scripts', 'lessonlms_theme_enqueue_styles');

function lessonlms_ajax_comment(){

    check_ajax_referer('lessonlms_ajax_comment_nonce', 'security');

    $comment_data = [
        'comment_post_ID' => intval($_POST['comment_post_ID']),
        'comment_content' => sanitize_textarea_field($_POST['comment']),
        'comment_type'    => '',
    ];

    if(empty($comment_data['comment_content'])){
        wp_send_json_error("Comment cannot be empty");
    }

    $comment_id = wp_insert_comment($comment_data);

    if($comment_id){
        $count = get_comments_number($comment_data['comment_post_ID']);
        $new_comment = get_comment($comment_id);

        ob_start();
        ?>
        <div class="comment-list">
            <div class="comment-item" id="comment-<?php echo $new_comment->comment_ID; ?>">
                <div class="comment-left">
                   <?php echo get_avatar($new_comment, 70, ['class' => 'comment-avatar-image']); ?>
                </div>
                <div class="comment-right">
                    <div class="comment-header">
                        <strong><?php echo esc_html($new_comment->comment_author); ?></strong>
                        <span class="time">
                            <?php echo esc_html(human_time_diff(strtotime($new_comment->comment_date), current_time('timestamp'))) ?> ago
                        </span>
                    </div>
                    <p class="comment-text">
                        <?php echo esc_html($new_comment->comment_content); ?>
                    </p>
                    <?php if ( current_user_can('manage_options') ) : ?>
                        <a href="#" class="reply-btn">
                            <i class="fa-solid fa-reply"></i> Reply
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php

         $html = ob_get_clean();

        wp_send_json_success([
            "message" => "Your comment is awaiting approval.",
            "count"   => $count,
            "comment" =>  $html
        ]);
    } else {
        wp_send_json_error("Failed to submit comment.");
    }

    wp_die();
}

add_action('wp_ajax_lessonlms_ajax_comment', 'lessonlms_ajax_comment');
add_action('wp_ajax_nopriv_lessonlms_ajax_comment', 'lessonlms_ajax_comment');

