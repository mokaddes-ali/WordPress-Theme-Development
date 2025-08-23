<?php 
    get_header();
?>

<?php 
get_template_part('sections/pagesTitle');
?>

 <section class="blog-section mx-auto w-full px-[2.5%] md:px-[3.5%] lg:px-[5%] 2xl:px-[8%] pt-6 md:pt-8 lg:pt-10 xl:pt-16 flex flex-col-reverse md:flex-row gap-4 md:gap-6 xl:gap-12 overflow-hidden">
    <!-- Blog Left Content -->
    <div class="blog-left  w-full md:w-8/12">
      <?php if(have_posts()): while(have_posts()): the_post(); ?>
      <?php get_template_part('sections/postSetup', get_post_format()); ?>
      <?php endwhile; endif; ?>

    </div>

    <!-- Right Sidebar from sidebar.php -->
<?php get_sidebar(); ?>

</section>

<?php
 get_footer();
  ?>
