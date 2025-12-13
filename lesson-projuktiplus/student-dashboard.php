<?php
/*
Template Name: Student Dashboard
*/

get_header();
?>

  <!-- TOPBAR -->
   <div class="container">
        <div class="student-dashboard-topbar">
            <div class="topbar-breadcrumb">
                <i class="fa-solid fa-house"></i> Home 
                <i class="fa-solid fa-angle-right"></i> Dashboard
            </div>

            <div class="topbar-user-icon">
               <span>Welcome Mokaddes Ali</span> <i class="fa-solid fa-circle-user"></i>
            </div>
        </div>
     </div>

<div class="student-dashboard-wrapper container">

    <!-- LEFT SIDEBAR -->
    <div class="dashboard-left-sidebar">

        <ul class="sidebar-menu-items">

            <li class="active">
                <a href="<?php echo site_url('/student-dashboard'); ?>">
                    <i class="fa-solid fa-gauge"></i> Dashboard
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('/my-account'); ?>">
                    <i class="fa-solid fa-user"></i> My Account
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('/my-enrollments'); ?>">
                    <i class="fa-solid fa-list"></i> My Enrollments
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('/my-courses'); ?>">
                    <i class="fa-solid fa-book"></i> My Courses
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('/change-password'); ?>">
                    <i class="fa-solid fa-key"></i> Change Password
                </a>
            </li>

            <li>
                <a href="<?php echo wp_logout_url(); ?>">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </a>
            </li>

        </ul>

    </div>

    <!-- MAIN CONTENT -->
    <div style="width:100%;">

        <!-- Dashboard Body -->
        <div class="student-dashboard-main">
            
            <h2 class="dashboard-heading">Welcome to Your Dashboard</h2>

            <div class="dashboard-cards-grid">

                <div class="dashboard-card-box">
                    <div class="dashboard-card-title">Total Sales</div>
                    <div class="dashboard-card-number">0</div>
                </div>

                <div class="dashboard-card-box">
                    <div class="dashboard-card-title">Total Enrolls</div>
                    <div class="dashboard-card-number">0</div>
                </div>

                <div class="dashboard-card-box">
                    <div class="dashboard-card-title">Active Courses</div>
                    <div class="dashboard-card-number">0</div>
                    <a href="<?php echo site_url('/my-courses'); ?>" class="dashboard-view-course-btn">View Courses</a>
                </div>

                <div class="dashboard-card-box">
                    <div class="dashboard-card-title">Completed Courses</div>
                    <div class="dashboard-card-number">0</div>
                </div>

                <div class="dashboard-card-box">
                    <div class="dashboard-card-title">Your Enrollments</div>
                    <div class="dashboard-card-number">0</div>
                </div>

            </div>

        </div>
    </div>
</div>

<?php get_footer(); ?>
