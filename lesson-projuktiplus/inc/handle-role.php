<?php
/**
 * Handle Role
 * 
 * @package lessonlms
 */
function lessonlms_add_custom_roles() {
    add_role( 'student', 'Student', get_role( 'subscriber' )->capabilities );
    add_role( 'instructor', 'Instructor', get_role( 'author' )->capabilities );
}
add_action( 'init', 'lessonlms_add_custom_roles' );

function lessonlms_login_redirect( $redirect_to, $request, $user ) {
    if ( isset( $user->roles ) && is_array( $user->roles ) ) {
        if ( in_array( 'administrator', $user->roles ) || in_array( 'instructor', $user->roles ) ) {
            return admin_url();
        } elseif ( in_array( 'student', $user->roles ) ) {
            return wp_redirect( home_url('/student-dashboard') );
        }
    }
    return $redirect_to;
}
add_filter( 'login_redirect', 'lessonlms_login_redirect', 10, 3 );

function lessonlms_block_student_admin_access() {
    if ( is_user_logged_in() && is_admin() && ! defined( 'DOING_AJAX' ) ) {
        $user = wp_get_current_user();
        if ( in_array( 'student', (array) $user->roles ) ) {
            return wp_redirect( home_url('/student-dashboard') );
            exit;
        }
    }
}
add_action( 'init', 'lessonlms_block_student_admin_access' );

function lessonlms_hide_admin_bar_for_students() {
    if ( is_user_logged_in() ) {
        $user = wp_get_current_user();
        if ( in_array( 'student', (array) $user->roles ) ) {
            show_admin_bar( false );
        }
    }
}
add_action( 'after_setup_theme', 'lessonlms_hide_admin_bar_for_students' );

function lessonlms_show_own_course_only( $query ) {
    if ( ! is_admin() || $query->is_main_query() ) {
        return;
    }
    $user = wp_get_current_user();

    if ( isset( $query->query['post_type'] ) && in_array( 'instructor', (array) $user->roles ) ) {
        $query->set( 'author', $user->ID);
    }
}
add_action( 'pre_get_posts', 'lessonlms_show_own_course_only' );
