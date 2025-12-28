<?php
/*
Template Name: Student Dashboard
*/
get_header();
if ( ! is_user_logged_in() ) {
    wp_redirect(  wp_login_url() );
    exit;
}

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
