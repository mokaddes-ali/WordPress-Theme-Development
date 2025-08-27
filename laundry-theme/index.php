<?php 
/**
 * 
 * 
 */
get_header();
?>
<?php 

/**
 * Blog Section
 *
 * @package LaundryTheme
 */



?>

<!-- Blog Heading Section -->


    
  <section class="blog-section mx-auto w-full px-[2.5%] md:px-[3.5%] lg:px-[5%] 2xl:px-[8%] pt-6 md:pt-8 lg:pt-10 xl:pt-16 flex flex-col-reverse md:flex-row gap-4 md:gap-6 xl:gap-12 overflow-hidden">
   <!-- Blog Left Content -->
    <div class="blog-left  w-full md:w-8/12">
      
<?php
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => 4,
      'post_status' => 'publish',
      'orderby' => 'date',
      'order' => 'DESC',
      'paged' => $paged
    );
    $blog_query = new WP_Query($args);
 if ( $blog_query->have_posts() ) : ?>
    <?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
        <?php get_template_part('template-parts/content', get_post_format()); ?>
    <?php endwhile; ?>
<?php else: ?>
    <p>No posts found</p>
<?php endif; wp_reset_postdata(); ?>


    </div>

    <!-- Right Sidebar from sidebar.php -->
<?php get_sidebar(); ?>

</section>
   
<?php get_footer(); ?>