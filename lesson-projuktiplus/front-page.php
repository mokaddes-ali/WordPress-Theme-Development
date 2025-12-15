<?php 
/**
 * Home Page Template
 */
 get_header();?>   
 <main>
     <?php get_template_part('template-parts/hero/hero', 'section'); ?>

      <?php get_template_part('template-parts/explore-category/category', 'section'); ?>

     <?php get_template_part('template-parts/new-course/courses', 'section'); ?>

      <?php get_template_part('template-parts/courses/courses', 'section'); ?>

      <?php get_template_part('template-parts/testimonial/testimonial', 'section'); ?>
       <?php get_template_part('template-parts/features/features', 'section'); ?>

      <?php get_template_part('template-parts/cta/cta', 'section'); ?>
      <?php get_template_part('template-parts/blog/blog', 'section'); ?>
      
    </main>

    <?php get_footer();?>