<?php 
/**
 * Template Name: Explore Category
 * 
 * @package lessonlms
 */
?>

<div class="explore-section">
    <div class="container">

        <!-- category heading -->
        <div class="explore-category-heading">
            <h1>Explore Categories</h1>
            <p>Discover categories designed to help you excel in your professional and personal growth.</p>
        </div>

       <!-- category card  -->
        <div class="explore-category-cards">
            <a href="<?php echo esc_url(get_post_type_archive_link('courses')); ?>">
            <div class="explore-category-single-card">
                <h3>Web Development</h3>
            </div>
            </a>
            <a href="<?php echo esc_url(get_post_type_archive_link('courses')); ?>">
             <div class="explore-category-single-card">
                <h3>Marketing</h3>
            </div>
            </a>
             
            <a href="<?php echo esc_url(get_post_type_archive_link('courses')); ?>">
             <div class="explore-category-single-card">
                <h3>Personal Development</h3>
            </div>
            </a>

            <a href="<?php echo esc_url(get_post_type_archive_link('courses')); ?>">
            <div class="explore-category-single-card">
                <h3>Marketing</h3>
            </div>
            </a>
            
            <a href="<?php echo esc_url(get_post_type_archive_link('courses')); ?>">
             <div class="explore-category-single-card">
                <h3>Web Development</h3>
            </div>
            </a>

            <a href="<?php echo esc_url(get_post_type_archive_link('courses')); ?>">
             <div class="explore-category-single-card">
                <h3>Marketing</h3>
            </div>
            </a>

             <a href="<?php echo esc_url(get_post_type_archive_link('courses')); ?>">
             <div class="explore-category-single-card">
                <h3>Personal Development</h3>
            </div>
            </a>

            <a href="<?php echo esc_url(get_post_type_archive_link('courses')); ?>">
            <div class="explore-category-single-card">
                <h3>Marketing</h3>
            </div>
            </a>  
        </div>
    </div>
</div>