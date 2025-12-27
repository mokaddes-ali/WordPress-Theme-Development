<?php 
/**
 * Template Name: My Enrollments
 * 
 * @package lessonlms
 */

if ( ! is_user_logged_in() ) {
    wp_redirect( wp_login_url() );
    exit;
}
get_header();
$temp_dir = 'template-parts/student-dashboard/student';
get_template_part( $temp_dir, 'breadcrumb');

echo '<div class="student-dashboard-wrapper container">';
     // Sidebar
get_template_part( $temp_dir, 'sidebar');

echo ' <div style="width:100%;">';
    //Main Content
get_template_part( $temp_dir, 'enrollemts');

echo '</div>';
echo '</div>';

get_footer();
?>
