<?php

/**
 * Template Name: Single Courses Image and Card
 * 
 * @package LessonLMS
 */

?>

<div class="single-couses-image-box">
    <?php
    if (has_post_thumbnail()): ?>

        <?php the_post_thumbnail('full'); ?>

    <?php endif; ?>
    <?php get_template_part('template-parts/single-course/single-course-price', 'card'); ?>
</div>