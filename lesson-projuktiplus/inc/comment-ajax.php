<?php 
/**
 * Template Name: Register Comment Ajax
 * 
 * @package lessonlms
 */


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
