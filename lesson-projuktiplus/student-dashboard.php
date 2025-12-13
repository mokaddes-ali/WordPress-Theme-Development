<?php
/*
Template Name: Student Dashboard
*/

get_header();

if(!is_user_logged_in()){
    wp_login_url();
    exit;
}

$current_user = wp_get_current_user();

?>

  <!-- TOPBAR -->
   <div class="container">
        <div class="student-dashboard-topbar">
            <div class="topbar-breadcrumb">
                <i class="fa-solid fa-house"></i> Home 
                <i class="fa-solid fa-angle-right"></i> Dashboard
            </div>

            <div class="topbar-user-icon">
               <span>
                <?php echo esc_attr__('Welcome' . ' ' . $current_user->display_name, 'lessonlms'); ?>
            </span>
             <i class="fa-solid fa-circle-user"></i>
            </div>
        </div>
     </div>

<div class="student-dashboard-wrapper container">

    <!-- LEFT SIDEBAR -->
    <div class="dashboard-left-sidebar">

        <ul class="sidebar-menu-items">

            <li class="active">
                <a href="<?php echo site_url('/student-dashboard'); ?>">
                    <i class="fa-solid fa-gauge"></i> 
                    <?php echo esc_html__('Dashboard', 'lessonlms'); ?>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('/my-account'); ?>">
                    <i class="fa-solid fa-user"></i>
                    <?php echo esc_html__('My Account', 'lessonlms'); ?>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('/my-enrollments'); ?>">
                    <i class="fa-solid fa-list"></i>
                 <?php echo esc_html__('My Enrollments', 'lessonlms'); ?> 
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('/change-password'); ?>">
                 <i class="fa-solid fa-key"></i> 
                 <?php echo esc_html__('Change Password', 'lessonlms'); ?> 
                </a>
            </li>

            <li>
                <a href="<?php echo esc_url(wp_logout_url(), 'lessonlms'); ?>">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <?php echo esc_html__('Logout', 'lessonlms'); ?>  
                </a>
            </li>

        </ul>

    </div>

    <!-- MAIN CONTENT -->
    <div style="width:100%;">

        <!-- Dashboard Body -->
        <div class="student-dashboard-main">

            <div class="dashboard-cards-grid">
                
                <div class="dashboard-card-box">
                    <div class="dashboard-card-title">Your Enrollments</div>
                    <div class="dashboard-card-number">0</div>
                </div>
                
                <div class="dashboard-card-box">
                    <div class="dashboard-card-title">Favourite Courses</div>
                    <div class="dashboard-card-number">0</div>
                </div>

                <div class="dashboard-card-box">
                    <div class="dashboard-card-title">Completed Courses</div>
                    <div class="dashboard-card-number">0</div>
                </div>

            </div>

        </div>
    </div>
</div>

<?php get_footer(); ?>
