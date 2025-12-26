<?php 
/**
 * Home Page Template
 */
 get_header();?>   
 <main>
     <?php get_template_part('template-parts/hero-section/hero', 'section'); ?>

     <?php get_template_part('template-parts/explore-category/category', 'section'); ?>

      <?php get_template_part('template-parts/popular-courses/courses', 'section'); ?>

         <?php get_template_part('template-parts/featured-courses/courses', 'section'); ?>
         require_once ABSPATH . 'file-name.php';

      <?php get_template_part('template-parts/testimonial/testimonial', 'section'); ?>
       <?php get_template_part('template-parts/features/features', 'section'); ?>

      <?php get_template_part('template-parts/cta/cta', 'section'); ?>
      <?php get_template_part('template-parts/blog/blog', 'section'); ?>
      
    </main>

    <?php get_footer();?>