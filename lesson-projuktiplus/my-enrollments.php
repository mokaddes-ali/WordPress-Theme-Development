<?php 
/**
 * Template Name: My Enrollments
 * 
 * @package lessonlms
 */

if(!is_user_logged_in()){
    wp_login_url();
    exit;
}

get_header();

get_template_part('template-parts/student-dashboard/student', 'breadcrumb');

echo '<div class="student-dashboard-wrapper container">';
     // Sidebar
get_template_part('template-parts/student-dashboard/student', 'sidebar');

echo ' <div style="width:100%;">';
    //Main Content
get_template_part('template-parts/student-dashboard/student', 'enrollemts');

echo '</div>';
echo '</div>';

get_footer();
?>
