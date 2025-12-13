<?php 
/**
 * Template Name: Student Dashboard Sidebar
 * 
 */
 ?>
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