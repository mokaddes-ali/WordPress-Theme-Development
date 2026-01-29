<?php
/**
 * Add Courses Category Taxonomy
 * 
 * @package lessonlms
 */
function lessonlms_register_course_category() {
    $labels = array(
        'name' => 'Course Categories',
        'singular_name' => 'Course Category',
        'menu_name' => 'Course Categories'
    );
    register_taxonomy('course_category', 'courses', array(
        'labels' => $labels,
        'hierarchical' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'course-category'),
    ));
}
add_action('init', 'lessonlms_register_course_category');