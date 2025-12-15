<?php 
/**
 * Template Name: Student Breadcrumb
 * 
 * @package lessonlms
 */

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
                <i class="fa-solid fa-house"></i> 
                <a href="<?php echo esc_url('/');?>">
                <?php echo esc_html__('Home', 'lessonlms');?> 
                </a>

                <?php if ( !is_page('student-dashboard') ) : ?>
                <i class="fa-solid fa-angle-right"></i> 
                <a href="<?php echo esc_url( home_url('/student-dashboard') ); ?>">
                <?php echo esc_html__( 'Dashboard');?> 
                </a>
                <?php endif; ?>
                
                <i class="fa-solid fa-angle-right"></i> 
                <a href="<?php echo esc_url( get_permalink() ); ?>">
                <?php echo esc_html( get_the_title());?> 
                </a>
            </div>

            <div class="topbar-user-icon">
               <span>
                <?php echo esc_attr__('Welcome' . ' ' . $current_user->display_name, 'lessonlms'); ?>
            </span>
             <i class="fa-solid fa-circle-user"></i>
            </div>
        </div>
     </div>