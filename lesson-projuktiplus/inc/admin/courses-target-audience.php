<?php
/**
 * Courses Target Audience
 * 
 * @package lessonlms
 */

function lessonlms_courses_target_audience(){
 $meta_box_id = 'courses_target_audience';
 $meta_box_title = __('Who This Course is For', 'lessonlms');
 $callback_function = 'lessonlms_courses_target_audience_callback';
 $post_type = 'courses';
 $context = 'normal';
 $priority = 'high'; // sidebar
 
 add_meta_box(
    $meta_box_id,
    $meta_box_title,
    $callback_function,
    $post_type,
    $context,
    $priority
);
}
add_action('add_meta_boxes', 'lessonlms_courses_target_audience');

function lessonlms_courses_target_audience_callback( $post ){
    $audience = get_post_meta( $post->ID, '_course_target_audience', true );
    if(!$audience && !is_array($audience)){
        $audience = [];
    }
    wp_nonce_field('save_course_target_audience', 'course_target_audience_nonce');
    ?>
    <div id="audience-wrapper">
        <div class="audience-input-btn">
            <input type="text" id="new-audience-input" class="form-control" placeholder="Enter new item" />
            <button type="button" class="add-btn">Add</button>
        </div>

        <!-- show list -->
         <div class
         "></div>
    </div>

<?php
}