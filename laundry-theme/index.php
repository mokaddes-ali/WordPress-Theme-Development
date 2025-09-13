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




<!-- Services Hero Area -->
<section class="relative mx-auto w-full px-[5%] lg:px-[7.5%] 
    flex items-center justify-start 
    h-[180px] sm:h-[200px] md:h-[220px] lg:h-[250px] 
    bg-cover bg-center bg-no-repeat z-0" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/bg.png');">
        <div class="container mx-auto text-white h-full flex flex-col justify-center">

    <!-- Overlay -->
    <div class="absolute inset-0 z-10 bg-gradient-to-r from-[#142137] to-[#1421371A] opacity-100"></div>

    <!-- Content -->
    <div class="relative z-50 container mx-auto text-white 
              flex flex-col items-start justify-center gap-4 h-full">

        <!-- Blog Title -->
        <a href="<?php echo esc_url(the_permalink());?>">
            <h1
                class="text-white text-[24px] sm:text-[28px] md:text-[32px] lg:text-[38px] font-semibold leading-[1.2] tracking-[-0.8px] sm:tracking-[-1px] lg:tracking-[-1.2px] font-poppins">
                <?php echo esc_html('All Blog', 'laundryclean'); ?>
            </h1>
        </a>

        <!-- Background Badge -->
        <div
            class="w-[200px] max-w-[280px] h-[34px] rounded-[195px] bg-white/10 backdrop-blur-[7px] flex items-center justify-center gap-[10px] py-3 px-2">

            <!-- SVG Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16" fill="none"
                class="w-4 h-4 sm:w-5 sm:h-5">
                <path
                    d="M16.146 15.9992H11.0899V11.0576H8.29524V15.985H3.01103C3.0043 15.8855 2.99008 15.7786 2.99008 15.6716C2.98859 13.6145 2.99158 11.5581 2.9856 9.50094C2.9856 9.31169 3.02823 9.17928 3.18757 9.0581C5.25592 7.47523 7.31904 5.88563 9.38365 4.29827C9.44125 4.25413 9.50484 4.21673 9.58413 4.16437C9.74795 4.28854 9.90579 4.40674 10.0621 4.52717C12.0078 6.02402 13.9535 7.52161 15.8999 9.01696C16.051 9.1329 16.167 9.23539 16.1655 9.46504C16.1542 11.5715 16.1587 13.6788 16.158 15.7853C16.158 15.8459 16.1505 15.9057 16.1445 16L16.146 15.9992Z"
                    fill="white" />
                <path
                    d="M19.15 7.36603C18.699 7.9525 18.2741 8.50381 17.8282 9.08355C15.0784 6.96882 12.345 4.86605 9.57576 2.73561C6.83417 4.84436 4.09332 6.95236 1.32255 9.0828C0.87746 8.50456 0.446585 7.94577 0 7.36453C3.19267 4.90869 6.37038 2.46407 9.57352 0C10.9155 1.03081 12.2523 2.05788 13.6616 3.14031V1.82449H16.4443V2.21946C16.4443 3.11712 16.4571 4.01477 16.4369 4.91168C16.4301 5.19594 16.5289 5.36276 16.7503 5.52733C17.5492 6.12203 18.3332 6.73767 19.15 7.36603Z"
                    fill="white" />
            </svg>

            <!-- Breadcrumb -->
            <div class="flex  items-center gap-1 sm:gap-2">
                <span
                    class="text-white hover:text-blue-300 hover:underline text-xs sm:text-sm md:text-[16px] font-medium">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'laundryclean'); ?></a>
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" width="3" height="3" viewBox="0 0 3 3" fill="none">
                    <circle cx="1.5" cy="1.5" r="1.5" fill="white" fill-opacity="0.7" />
                </svg>
                <span
                    class="text-white hover:text-blue-300 hover:underline text-xs sm:text-sm md:text-[16px] font-medium">
                    <a
                        href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))) ?>"><?php esc_html_e('Blog', 'laundryclean'); ?></a>
                </span>
            </div>
        </div>
    </div>
</section>

    <!-- Blog Cards -->
    
  <section class="mx-auto w-full px-[2.5%] md:px-[3.5%] lg:px-[5%] 2xl:px-[8%] pt-6 md:pt-8 lg:pt-10 xl:pt-16 flex flex-col-reverse lg:flex-row gap-4 md:gap-6 xl:gap-12">
   <!-- Blog Left Content -->
    <main class="blog-left flex flex-col gap-6 pb-8 lg:gap-10 w-full lg:w-8/12">
      
<?php
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => get_option('posts_per_page'),
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

      <!-- Pagination -->
           <?php if ('laundryclean_all_pagenav') : laundryclean_all_pagenav(); else: ?>
            <?php next_post_link(); ?>
            <?php previous_post_link(); ?>
            <?php endif;?>

<?php else: ?>
    <p class="text-red-500 text-lg">
        <?php esc_html_e('No posts found', 'laundry-theme'); ?></p>
<?php endif; wp_reset_postdata(); ?>


    </main>

    <!-- Right Sidebar from sidebar.php --> 
        <?php get_sidebar(); ?>


</section>
   
<?php get_footer(); ?>