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
   <!-- Blog Hero Area -->
<section class="relative mt-20 mx-auto w-full px-[2.5%] lg:px-[5%] 2xl:px-[8%] py-12 md:py-16 lg:py-20 xl:py-24 h-[250px] sm:h-[300px] md:h-[350px] lg:h-[370px] bg-cover bg-center bg-no-repeat "
style="background-image: url('<?php echo get_template_directory_uri() . '/assets/images/bg.png'; ?>');
  ">
  <div class="container mx-auto text-white h-full flex flex-col justify-center">

    <!-- Blog Title -->
    <h1 class="text-white text-4xl sm:text-5xl md:text-[50px] lg:text-[60px] font-semibold leading-[1.2] sm:leading-[1.3] md:leading-[1.4] lg:leading-[110px] tracking-[-0.8px] sm:tracking-[-1px] lg:tracking-[-1.2px] font-poppins mb-4 sm:mb-6">
      Archive for Tag
    </h1>

    <!-- Background Badge -->
    <div class="w-[200px] sm:w-[230px] max-w-[240px] h-[34px] rounded-[195px] bg-white/10 backdrop-blur-[7px] flex items-center justify-center gap-[10px] px-3 sm:px-4">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16" fill="none" class="w-4 h-4 sm:w-5 sm:h-5">
        <path
          d="M16.146 15.9992H11.0899V11.0576H8.29524V15.985H3.01103C3.0043 15.8855 2.99008 15.7786 2.99008 15.6716C2.98859 13.6145 2.99158 11.5581 2.9856 9.50094C2.9856 9.31169 3.02823 9.17928 3.18757 9.0581C5.25592 7.47523 7.31904 5.88563 9.38365 4.29827C9.44125 4.25413 9.50484 4.21673 9.58413 4.16437C9.74795 4.28854 9.90579 4.40674 10.0621 4.52717C12.0078 6.02402 13.9535 7.52161 15.8999 9.01696C16.051 9.1329 16.167 9.23539 16.1655 9.46504C16.1542 11.5715 16.1587 13.6788 16.158 15.7853C16.158 15.8459 16.1505 15.9057 16.1445 16L16.146 15.9992Z"
          fill="white" />
        <path
          d="M19.15 7.36603C18.699 7.9525 18.2741 8.50381 17.8282 9.08355C15.0784 6.96882 12.345 4.86605 9.57576 2.73561C6.83417 4.84436 4.09332 6.95236 1.32255 9.0828C0.87746 8.50456 0.446585 7.94577 0 7.36453C3.19267 4.90869 6.37038 2.46407 9.57352 0C10.9155 1.03081 12.2523 2.05788 13.6616 3.14031V1.82449H16.4443V2.21946C16.4443 3.11712 16.4571 4.01477 16.4369 4.91168C16.4301 5.19594 16.5289 5.36276 16.7503 5.52733C17.5492 6.12203 18.3332 6.73767 19.15 7.36603Z"
          fill="white" />
      </svg>

      <!-- Breadcrumb -->
      <div class="flex items-center gap-1 sm:gap-2">
        <!-- Home Text -->
        <span class="text-white text-xs sm:text-sm md:text-[16px] font-medium leading-none tracking-[-0.24px] sm:tracking-[-0.28px] md:tracking-[-0.32px] font-[Poppins]">
          <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'laundryclean'); ?></a>
        </span>

        <!-- Dot Separator -->
        <svg xmlns="http://www.w3.org/2000/svg" width="3" height="3" viewBox="0 0 3 3" fill="none">
          <circle cx="1.5" cy="1.5" r="1.5" fill="white" fill-opacity="0.7" />
        </svg>

        <!-- Blog Text -->
        <span class="flex text-white text-xs md:text-[16px] font-medium leading-none tracking-[-0.24px] md:tracking-[-0.32px] font-poppins">
          Blog
        </span>
      </div>
    </div>
  </div>
</section>


<section class="blog-content-area w-full px-5 lg:px-20 py-16 md:py-24 flex flex-col gap-10">
    
    <?php 
    if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>
        
            <article class="bg-white shadow-lg rounded-xl p-6 md:p-8 flex flex-col gap-4 transition-transform hover:-translate-y-1 hover:shadow-2xl">
              <?php echo get_post_format(); ?>

                <!-- Post Thumbnail -->
                <?php if ( has_post_thumbnail() ) : ?>
                    <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" 
                         alt="<?php the_title_attribute(); ?>" 
                         class="w-full h-64 md:h-80 object-cover rounded-lg mb-4">
                <?php endif; ?>

                <!-- Post Title -->
                <h2 class="text-[#142137] text-2xl md:text-3xl font-semibold mb-2 font-poppins">
                    <a href="<?php the_permalink(); ?>" class="hover:text-blue-600 transition-colors">
                        <?php the_title(); ?>
                    </a>
                </h2>

                <!-- Post Excerpt / Content -->
                <div class="text-[#142137] text-base md:text-lg leading-relaxed font-poppins">
                    <?php the_excerpt(); ?>
                </div>

                <!-- Read More Button -->
                <a href="<?php the_permalink(); ?>" class="mt-4 inline-block w-max px-5 py-2 bg-[#142137] text-white rounded-lg font-medium hover:bg-blue-600 transition-colors">
                    Read More
                </a>

            </article>

        <?php endwhile;
    else : ?>
        <p class="text-center text-[#142137] text-lg md:text-xl font-poppins">
            <?php echo esc_html__( 'Sorry, no posts matched your criteria.', 'laundryclean' ); ?>
        </p>
    <?php endif; ?>

</section>

<?php 
wp_reset_postdata(); // Reset post data after the loop
get_footer();        // Include footer
?>
