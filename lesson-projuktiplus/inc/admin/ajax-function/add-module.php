<?php
/**
 * Add module ajax call function
 * 
 * @package lessonlms
 */
function lessonlms_add_course_module() {

    if (
        ! isset( $_POST['lessonlms_add_module_nonce_field'] ) ||
        ! wp_verify_nonce( $_POST['lessonlms_add_module_nonce_field'], 'lessonlms_add_module_nonce' )
    ) {
        wp_send_json_error( 'Security check failed' );
    }

    if ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) {
        wp_send_json_error( 'Invalid request' );
    }

    if ( ! current_user_can( 'manage_options' ) ) {
        wp_send_json_error( 'Permission denied' );
    }

    $course_id  = isset( $_POST['lessonlms_select_course'] ) ? intval( $_POST['lessonlms_select_course'] ) : 0;
    $module_id  = isset( $_POST['course_module_id'] ) ? intval( $_POST['course_module_id'] ) : 0;
    $module_name = isset( $_POST['course_modules_name'] ) ? sanitize_text_field( $_POST['course_modules_name'] ) : '';
    $status     = isset( $_POST['lessonlms_course_status'] ) ? sanitize_text_field( $_POST['lessonlms_course_status'] ) : 'disabled';

    if ( empty( $course_id ) || empty( $module_name ) ) {
        wp_send_json_error( 'Course and module name are required' );
    }
    $user_id = get_current_user_id();
    $module_data = array(
        'post_title'  => $module_name,
        'post_type'   => 'course_modules',
        'post_status' => 'publish',
        'post_author' => $user_id,
    );

    if ( $module_id > 0 ) {
        $module_data['ID'] = $module_id;
        $module_id = wp_update_post( $module_data );
    } else {
        $module_id = wp_insert_post( $module_data );
    }

    if ( is_wp_error( $module_id ) ) {
        wp_send_json_error( 'Database error' );
    }

    update_post_meta( $module_id, '_lessonlms_course_id', $course_id );
    update_post_meta( $module_id, '_lessonlms_module_status', $status );

    wp_send_json_success( 'Module saved successfully' );
}
add_action( 'wp_ajax_lessonlms_add_module', 'lessonlms_add_course_module' );
