<?php 
get_header();
?>


  <!-- Single Services Area -->
<section class="relative mx-auto w-full px-[5%] lg:px-[7.5%] 
    flex items-center justify-start 
    h-[180px] sm:h-[200px] md:h-[220px] lg:h-[250px] 
    bg-cover bg-center bg-no-repeat z-0"
style="background-image: url('<?php 
    if (has_post_thumbnail()) {
        echo esc_url(get_the_post_thumbnail_url()); 
    } else {
        echo esc_url(get_template_directory_uri() . '/assets/images/bg.png'); 
    }
?>');">

  <!-- Overlay -->
  <div class="absolute inset-0 z-10 bg-gradient-to-r from-[#142137] to-[#1421371A] opacity-100"></div>

  <!-- Content -->
  <div class="relative z-50 container mx-auto text-white 
              flex flex-col items-start justify-center gap-4 h-full">
              
    <!-- Blog Title -->
     <a href="<?php echo esc_url(the_permalink());?>">
    <h1 class="text-white text-[24px] sm:text-[28px] md:text-[32px] lg:text-[38px] font-semibold leading-[1.2] tracking-[-0.8px] sm:tracking-[-1px] lg:tracking-[-1.2px] font-poppins">
      <?php echo esc_html(get_the_title()); ?>
    </h1>
    </a>

    <!-- Background Badge -->
    <div class="w-[250px] sm:w-[350px] max-w-[400px] h-[34px] rounded-[195px] bg-white/10 backdrop-blur-[7px] flex items-center justify-center gap-[10px] py-3 px-2">
      
      <!-- SVG Icon -->
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16" fill="none" class="w-4 h-4 sm:w-5 sm:h-5">
        <path d="M16.146 15.9992H11.0899V11.0576H8.29524V15.985H3.01103C3.0043 15.8855 2.99008 15.7786 2.99008 15.6716C2.98859 13.6145 2.99158 11.5581 2.9856 9.50094C2.9856 9.31169 3.02823 9.17928 3.18757 9.0581C5.25592 7.47523 7.31904 5.88563 9.38365 4.29827C9.44125 4.25413 9.50484 4.21673 9.58413 4.16437C9.74795 4.28854 9.90579 4.40674 10.0621 4.52717C12.0078 6.02402 13.9535 7.52161 15.8999 9.01696C16.051 9.1329 16.167 9.23539 16.1655 9.46504C16.1542 11.5715 16.1587 13.6788 16.158 15.7853C16.158 15.8459 16.1505 15.9057 16.1445 16L16.146 15.9992Z" fill="white" />
        <path d="M19.15 7.36603C18.699 7.9525 18.2741 8.50381 17.8282 9.08355C15.0784 6.96882 12.345 4.86605 9.57576 2.73561C6.83417 4.84436 4.09332 6.95236 1.32255 9.0828C0.87746 8.50456 0.446585 7.94577 0 7.36453C3.19267 4.90869 6.37038 2.46407 9.57352 0C10.9155 1.03081 12.2523 2.05788 13.6616 3.14031V1.82449H16.4443V2.21946C16.4443 3.11712 16.4571 4.01477 16.4369 4.91168C16.4301 5.19594 16.5289 5.36276 16.7503 5.52733C17.5492 6.12203 18.3332 6.73767 19.15 7.36603Z" fill="white" />
      </svg>

      <!-- Breadcrumb -->
      <div class="flex  items-center gap-1 sm:gap-2">
        <span class="text-white hover:text-blue-300 hover:underline text-xs sm:text-sm md:text-[16px] font-medium">
          <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'laundryclean'); ?></a>
        </span>
        <svg xmlns="http://www.w3.org/2000/svg" width="3" height="3" viewBox="0 0 3 3" fill="none">
          <circle cx="1.5" cy="1.5" r="1.5" fill="white" fill-opacity="0.7" />
        </svg>
        <span class="text-white hover:text-blue-300 hover:underline text-xs sm:text-sm md:text-[16px] font-medium">
          <a href="<?php echo esc_url(get_post_type_archive_link('services')); ?>"><?php esc_html_e('Services', 'laundryclean'); ?></a>
        </span>
        <svg xmlns="http://www.w3.org/2000/svg" width="3" height="3" viewBox="0 0 3 3" fill="none">
          <circle cx="1.5" cy="1.5" r="1.5" fill="white" fill-opacity="0.7" />
        </svg>
        <span class="text-whitehover:text-blue-300 hover:underline text-xs md:text-[16px] font-medium">
          <?php esc_html_e('Service Details', 'laundryclean'); ?>
        </span>
      </div>
    </div>
  </div>
</section>


<!-- details services -->
<section
    class="mx-auto w-full px-[2.5%] md:px-[3.5%] lg:px-[5%] 2xl:px-[8%] pt-6 md:pt-8 lg:pt-10 xl:pt-16 flex flex-col-reverse lg:flex-row gap-4 md:gap-6 xl:gap-12">

    <!-- Blog Left Content -->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <main class="blog-left w-full lg:w-8/12">
        <!-- First Card Default -->
        <div class="w-full">
            <!-- Image Section -->
            <div class="w-full h-auto aspect-[1160/570]">
                <?php if (has_post_thumbnail()) : ?>
                <img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>"
                    alt="<?php echo esc_attr(get_the_title()); ?>" class="w-full h-full object-cover" />
                <?php endif; ?>
            </div>

          <!-- First Row -->
                <div class="flex flex-col pt-3 sm:flex-wrap sm:flex-row  gap-14 md:gap-16 lg:gap-20">
                    <!-- Desktop Avatar and name -->
                    <div class="flex items-center gap-5">
                        <div class=" w-12 h-12 lg:w-14 lg:h-14 bg-[#CFD4C6] overflow-hidden">
                            <?php
                                    echo get_avatar($author_id, 80, '', '', ['class' => 'w-full h-full object-cover']);
                                    ?>
                        </div>

                        <!-- Desktop Name -->
                        <h2 class="flex text-[#142137] font-poppins text-[18px] font-semibold leading-none">
                            <?php echo get_the_author(); ?>
                        </h2>
                    </div>

                    <!-- Date and Comment Count -->
                    <div class="flex items-center gap-4">
                        <div
                            class="flex items-center gap-1 text-[rgba(20,33,55,0.60)] font-poppins text-base font-medium">
                            <!-- Calendar Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 19 20"
                                fill="none" class="w-[16.201px] h-[18px] flex-shrink-0">
                                <path d="M5.75195 1V3.70016" stroke="#1D92CD" stroke-width="2" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12.9531 1V3.70016" stroke="#1D92CD" stroke-width="2" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M17.4528 6.84927V14.4997C17.4528 17.1999 16.1027 19 12.9525 19H5.75218C2.60202 19 1.25195 17.1999 1.25195 14.4997V6.84927C1.25195 4.14911 2.60202 2.349 5.75218 2.349H12.9525C16.1027 2.349 17.4528 4.14911 17.4528 6.84927Z"
                                    stroke="#1D92CD" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M5.75195 9.09912H12.9523" stroke="#1D92CD" stroke-width="2"
                                    stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M5.75195 13.5994H9.35213" stroke="#1D92CD" stroke-width="2"
                                    stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <?php echo get_the_date('M d, Y'); ?>
                        </div>
                    </div>

                </div>

            <!-- Text Section -->
            <div class="py-4 md:py-5 xl:pr-4 flex flex-col gap-3 md:gap-[12px]">
                <!-- Title -->
                <div class="text-[#142137] font-poppins text-2xl md:text-3xl lg:text-[34px] font-semibold leading-tight md:leading-[42px] tracking-tight md:tracking-[-0.68px]">
                    <h1><?php the_title(); ?></h1>
                </div>

                <!-- Description -->
                <div class="text-[rgba(20,33,55,0.70)] font-poppins text-base md:text-[16px] font-normal leading-relaxed md:leading-[26px]">
                    <?php
                    $content = get_the_content();
                    echo esc_html($content);
                    ?>
                </div>
            </div>
        </div>

        <!-- Next and Previous Post -->
        <div class="flex flex-col lg:flex-row justify-between gap-4 py-6">
            <?php
            $prev_post = get_previous_post();
            if ($prev_post) :
                $prev_thumb = get_the_post_thumbnail($prev_post->ID, 'thumbnail', ['class' => 'h-full w-full object-cover rounded-md']);
            ?>
            <!-- Previous Post Card -->
            <div class="flex w-full h-auto items-center border border-[rgba(20,33,55,0.14)] bg-transparent p-3 gap-4">
                <div class="w-24 h-28">
                    <a href="<?php echo get_permalink($prev_post->ID); ?>">
                        <?php echo $prev_thumb; ?>
                    </a>
                </div>
                <a href="<?php echo get_permalink($prev_post->ID); ?>">
                    <div class="flex flex-col justify-center gap-2">
                        <div class="flex items-center gap-2 text-sm font-medium uppercase text-[rgba(20,33,55,0.70)] font-poppins">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 14 14">
                                <path d="M13 7H1" stroke="#5B6473" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7 13L1 7L7 1" stroke="#5B6473" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <?php echo esc_html__('Previous Post', 'laundryclean'); ?>
                        </div>
                        <h4 class="text-[#142137] text-lg md:text-xl font-semibold leading-snug font-poppins">
                            <?php echo esc_html(wp_trim_words(get_the_title($prev_post->ID), 9)); ?>
                        </h4>
                    </div>
                </a>
            </div>
            <?php endif; ?>

            <?php
            $next_post = get_next_post();
            if ($next_post) :
                $next_thumb = get_the_post_thumbnail($next_post->ID, 'thumbnail', ['class' => 'h-full w-full object-cover rounded-md']);
            ?>
            <!-- Next Post Card -->
            <div class="flex w-full h-auto items-center justify-end border border-[rgba(20,33,55,0.14)] bg-transparent p-3 gap-4">
                <a href="<?php echo get_permalink($next_post->ID); ?>">
                    <div class="flex flex-col justify-center items-end gap-2">
                        <div class="flex items-center gap-2 text-sm font-medium uppercase text-[rgba(20,33,55,0.70)] font-poppins">
                            <?php echo esc_html__('Next Post', 'laundryclean'); ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 14 14">
                                <path d="M1 7H13" stroke="#5B6473" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7 13L13 7L7 1" stroke="#5B6473" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <h4 class="text-[#142137] text-right text-lg md:text-xl font-semibold leading-snug font-poppins">
                            <?php echo esc_html(wp_trim_words(get_the_title($next_post->ID), 9)); ?>
                        </h4>
                    </div>
                </a>
                <div class="w-24 h-28 flex-shrink-0">
                    <a href="<?php echo get_permalink($next_post->ID); ?>">
                        <?php echo $next_thumb; ?>
                    </a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </main>
    <?php endwhile; wp_reset_postdata(); endif; ?>

    <!-- Right Sidebar -->
    <aside class="blog-sidebar lg:h-[680px] lg:sticky lg:top-1 w-full lg:w-4/12 flex flex-col gap-6 md:gap-[27px]">
        <div class="w-full lg:w-[380px] h-auto bg-[#EBEFF3] p-5 md:p-6 text-[#142137] font-poppins">
            <h2 class="text-xl md:text-[24px] font-semibold leading-relaxed md:leading-[34px] mb-6 md:mb-[26px] tracking-tight md:tracking-[-0.48px]">
                <?php echo __('Recent Add Service', 'laundryclean'); ?>
            </h2>

            <div class="flex flex-row flex-wrap gap-4 lg:flex-col lg:flex-nowrap md:gap-6">
                <?php
                $recent_posts = wp_get_recent_posts([
                    'numberposts' => 8,
                    'post_status' => 'publish',
                    'order' => 'DESC',
                    'orderby' => 'date',
                    'post_type' => 'services'
                ]);
                foreach ($recent_posts as $posts) :
                    setup_postdata($posts);
                ?>
                <div class="flex gap-5 items-center">
                    <div class="w-[90px] h-[100px] aspect-[9/10] flex-shrink-0 bg-gray-300">
                        <a href="<?php echo get_permalink($posts['ID']); ?>">
                            <?php if (has_post_thumbnail($posts['ID'])) : ?>
                                <?php echo get_the_post_thumbnail($posts['ID'], 'thumbnail'); ?>
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/post1.png" alt="<?php echo esc_attr($posts['post_title']); ?>" />
                            <?php endif; ?>
                        </a>
                    </div>

                    <div class="flex-1">
                        <div class="flex items-center gap-1.5 text-[15px] text-[#142137B3] leading-[26px]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" viewBox="0 0 18 20" fill="none">
                                <path d="M5.5 1V3.69865" stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12.6953 1V3.69865" stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M4.59766 10.8955H11.7941" stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M4.59766 14.4932H9.09541" stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12.6942 2.34961C15.6897 2.51153 17.1919 3.65396 17.1919 7.88184V13.4411C17.1919 17.1472 16.2924 19.0003 11.7946 19.0003H6.3973C1.89955 19.0003 1 17.1472 1 13.4411V7.88184C1 3.65396 2.50225 2.52052 5.49775 2.34961H12.6942Z" stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span><?php echo get_the_date('M d, Y'); ?></span>
                        </div>
                        <h3 class="text-[18px] font-medium leading-[28px] tracking-[-0.36px] mt-1">
                            <a href="<?php echo get_permalink($posts['ID']); ?>">
                                <?php echo esc_html($posts['post_title']); ?>
                            </a>
                        </h3>
                    </div>
                </div>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>
        </div>
    </aside>
</section>

<?php get_footer();?>

