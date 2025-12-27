<?php

/**
 * Home Page Template
 */
   get_header();
   echo '<main>';
   
   get_template_part('template-parts/hero-section/hero', 'section');

   get_template_part('template-parts/explore-category/category', 'section');

   get_template_part('template-parts/popular-courses/courses', 'section');

   get_template_part('template-parts/featured-courses/courses', 'section');

   get_template_part('template-parts/testimonial/testimonial', 'section');

   get_template_part('template-parts/features/features', 'section');

   get_template_part('template-parts/cta/cta', 'section');

   get_template_part('template-parts/blog/blog', 'section');

   echo '</main>';
   get_footer();
