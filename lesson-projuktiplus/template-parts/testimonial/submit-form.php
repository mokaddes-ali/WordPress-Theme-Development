<?php 
/**
 * Template Name: Testimonial Feedback Form
 * 
 * @package lessonlms
 */

$user_id = get_current_user_id();

$old_data = get_posts([
     'post_type'      => 'testimonials',
     'posts_per_page' => 1,
     'meta_key'       => 'testimonial_user_id',
     'meta_value'     => $user_id,
     'post_status'    => ['pending','publish','draft'],
]);

$old_name = "";
$old_designation = "";
$old_feedback = "";
$button_text = !empty($old_data) ? "Update Feedback" : "Submit Feedback";

if(!empty($old_data)){
    $post_id = $old_data[0]->ID;
    $old_name = get_the_title($post_id);
    $old_feedback = get_post_field('post_content', $post_id);
    $old_designation = get_post_meta($post_id, 'student_designation', true);
    $old_image_id = get_post_thumbnail_id($post_id);
}

$user_login = is_user_logged_in();

?>

<div class="testimonial-feedback">
    <div class="feedback-heading">
        <h1 class="common-heading">Give Your Valuable Feedback</h1>
    </div>
    <?php if($user_login):?>

    <form id="ajax-feedback-form" method="post" enctype="multipart/form-data">
        
        <?php wp_nonce_field('testimonial_form_action', 'testimonial_nonce_field'); ?>

        <input type="hidden" name="submit_testimonial_form" value="1">

            <div class="student-name">
                <label class="required">Your Name</label>
                <input id="student_name" name="student_name" type="text" 
                    placeholder="Enter your name" 
                    value="<?php echo esc_attr($old_name); ?>">
            </div>

            <div class="student-designation">
                <label class="required">Your Designation / Course Name</label>
                <input id="student_designation" name="student_designation" type="text" 
                    placeholder="Example: Student of Full Stack Web Development" 
                    value="<?php echo esc_attr($old_designation); ?>">
            </div>

            <div class="student-feedback-message">
                <label class="required">Your Feedback Message</label>
                <textarea id="student_feedback" name="student_feedback" placeholder="Write your feedback here..."><?php echo esc_textarea($old_feedback); ?></textarea>
            </div>

        <div class="student-image">
            <label>Your Photo</label>
            <input id="student_image" name="student_image" type="file" accept="image/*">
            
            <div class="current-image" id="image-preview-container" style="<?php echo empty($old_image_id) ? 'display:none;' : ''; ?>">
                <p>Current Image:</p>
                <?php 
                if(!empty($old_image_id)) {
                    echo wp_get_attachment_image($old_image_id, 'thumbnail', false, ['id' => 'preview_img_tag']); 
                } else {
                    // Placeholder if no image exists yet
                    echo '<img id="preview_img_tag" src="" style="max-width:150px;">';
                }
                ?>
        </div>
     </div>
        <button id="feedback_submit_btn" type="submit" class="submit-btn yellow-bg-btn">
            <?php echo $button_text?>
        </button>
    </form>
    <?php else:?>
        <div class="feedback-user-login">
          <p>Please login for provide feedback</p>
        </div>
    <?php endif;?>
</div>
