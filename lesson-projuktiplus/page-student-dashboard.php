<?php
/*
Template Name: Student Dashboard
*/
get_header();
if ( ! is_user_logged_in() ) {
    wp_redirect(  wp_login_url() );
    exit;
}

function sidebar_menu_ajax_handler() {

    // Nonce check
    if (
        ! isset($_POST['nonce']) ||
        ! wp_verify_nonce( $_POST['nonce'], 'sidebar_menu_ajax_action' )
    ) {
        wp_send_json_error( 'Invalid nonce' );
    }

    if ( empty($_POST['tab']) ) {
        wp_send_json_error( 'No tab found' );
    }

    $tab = sanitize_text_field( $_POST['tab'] );

    ob_start();

    // Load content based on tab
    if ( $tab === 'dashboard' ) {
        get_template_part('template-parts/student-dashboard/student', 'dashboard');
    }

    if ( $tab === 'profile' ) {
        get_template_part('template-parts/student-dashboard/student', 'profile');
    }

    if ( $tab === 'enrollments' ) {
        get_template_part('template-parts/student-dashboard/student', 'enrollemts');
    }

    $content = ob_get_clean();

    wp_send_json_success( $content );
}
add_action( 'wp_ajax_sidebar_menu_ajax_action', 'sidebar_menu_ajax_handler' );
add_action( 'wp_ajax_nopriv_sidebar_menu_ajax_action', 'sidebar_menu_ajax_handler' );


get_template_part('template-parts/student-dashboard/student', 'breadcrumb');

echo '<div class="student-dashboard-wrapper container">';
     // Sidebar
get_template_part('template-parts/student-dashboard/student', 'sidebar');

echo ' <div style="width:100%;">';
//? Main Content
// Dashboard
echo '<div class="student-sidebar-tab student-active student-dashboard-main" id="dashboard">';
get_template_part('template-parts/student-dashboard/student', 'dashboard');
echo '</div>';

// Profile
echo '<div class="student-sidebar-tab" id="profile">';
get_template_part('template-parts/student-dashboard/student', 'profile');
echo '</div>';

// Enrollments
echo '<div class="student-sidebar-tab" id="enrollments">';
get_template_part('template-parts/student-dashboard/student', 'enrollemts');
echo '</div>';

echo '</div>';
echo '</div>';

get_footer(); ?>
