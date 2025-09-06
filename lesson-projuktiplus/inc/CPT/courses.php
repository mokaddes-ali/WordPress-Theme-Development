<?php 
/**
 * Register Courses
 */



// Register Course 
function lessonlms_custome_courses_register(){
    $labels = array(
        'name'                  => _x( 'Courses', 'Post type general name', 'lessonlms' ),
        'singular_name'         => _x( 'Course', 'Post type singular name', 'lessonlms' ),
        'menu_name'             => _x( 'Courses', 'Admin Menu text', 'lessonlms' ),
        'name_admin_bar'        => _x( 'Course', 'Add New on Toolbar', 'lessonlms' ),
        'add_new'               => __( 'Add New', 'lessonlms' ),
        'add_new_item'          => __( 'Add New Course', 'lessonlms' ),
        'new_item'              => __( 'New Course', 'lessonlms' ),
        'edit_item'             => __( 'Edit Course', 'lessonlms' ),
        'view_item'             => __( 'View Course', 'lessonlms' ),
        'all_items'             => __( 'All Courses', 'lessonlms' ),
        'search_items'          => __( 'Search Courses', 'lessonlms' ),
        'parent_item_colon'     => __( 'Parent Courses:', 'lessonlms' ),
        'not_found'             => __( 'No Courses found.', 'lessonlms' ),
        'not_found_in_trash'    => __( 'No Courses found in Trash.', 'lessonlms' ),
    );     
    $args = array(
        'labels'             => $labels,
        'description'        => 'Courses custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'courses' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'         => array( 'category', 'post_tag' ),
        'show_in_rest'       => true
    );
  
    register_post_type('courses', $args);
}
add_action('init', 'lessonlms_custome_courses_register');

?>