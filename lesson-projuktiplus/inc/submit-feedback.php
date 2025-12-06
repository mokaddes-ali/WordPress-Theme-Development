<?php 
/**
 * Template Name: Submit Feedback Function
 * 
 * @package lessonlms
 */

function lessonlms_ajax_feedback(){

    if(isset($_POST['submit_testimonial_form']) && $_SERVER['REQUEST_METHOD'] == 'POST' ){

        // nonce check
        if( !isset($_POST['security']) || !wp_verify_nonce($_POST['security'], 'lessonlms_ajax_feedback_nonce') ){
            wp_send_json_error("Security verification failed!");
        }

        //  data sanitize
        $student_name        = !empty($_POST['student_name']) ? sanitize_text_field($_POST['student_name']) : '';

        $student_designation = !empty($_POST['student_designation']) ? sanitize_text_field($_POST['student_designation']) : '';

        $student_feedback    = !empty($_POST['student_feedback']) ? sanitize_textarea_field($_POST['student_feedback']) : '';

        // validation
        if (empty($student_name)) {
            wp_send_json_error("Name field are required.");
        }

        if (empty($student_designation)) {
            wp_send_json_error("Student designation field are required.");
        }

        if (empty($student_feedback)) {
            wp_send_json_error("Feedback message field are required.");
        }

        $user_id = get_current_user_id();

    
        $existing_testimonial = get_posts([
            'post_type'      => 'testimonials',
            'posts_per_page' => 1,
            'meta_key'       => 'testimonial_user_id',
            'meta_value'     => $user_id,
            'post_status'    => ['pending', 'publish', 'draft'],
        ]);

        // ========== UPDATE ==========
        if( !empty($existing_testimonial) ){

            $post_id = $existing_testimonial[0]->ID;

            $updated_post = [
                'ID'           => $post_id,
                'post_title'   => $student_name,
                'post_content' => $student_feedback,
            ];

            wp_update_post($updated_post);

            update_post_meta($post_id, 'student_designation', $student_designation);

            wp_send_json_success([
                "message" => "Your testimonial has been updated successfully!",
                "student_name" => $student_name,
                "student_feedback" => $student_feedback,
                "student_designation" => $student_designation
            ]);
        }

        // ========== INSERT NEW TESTIMONIAL ==========
        $new_testimonial = [
            'post_title'   => $student_name,
            'post_content' => $student_feedback,
            'post_type'    => 'testimonials',
            'post_status'  => 'pending'
        ];

        $post_id = wp_insert_post($new_testimonial);

        if($post_id){

            update_post_meta($post_id, 'testimonial_user_id', $user_id);
            update_post_meta($post_id, 'student_designation', $student_designation);

            wp_send_json_success([
                "message" => "Your testimonial has been added successfully!",
                "student_name" => $student_name,
                "student_feedback" => $student_feedback,
                "student_designation" => $student_designation
            ]);
        }

        wp_send_json_error("Oh! Please Try Again");
    }

    wp_send_json_error("Invalid Request!");
}

add_action('wp_ajax_lessonlms_ajax_feedback', 'lessonlms_ajax_feedback');
add_action('wp_ajax_nopriv_lessonlms_ajax_feedback', 'lessonlms_ajax_feedback');
