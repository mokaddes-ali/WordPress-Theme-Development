<?php 
/**
 * Sevices Section
 */
        $all_services_title = get_theme_mod('all_services_title', __('Our Services', 'laundryclean'));
 
        $all_services_sub_title = get_theme_mod('all_services_sub_title', __('The Solutions We Provide For Our Clients.', 'laundryclean'));
get_header();
?>

  <!-- Blog Hero Area -->
<section class="relative mx-auto w-full px-[5%] lg:px-[7.5%] py-10 md:py-12 lg:py-16 h-[200px] sm:h-[220px] md:h-[250px] lg:h-[280px] bg-cover bg-center bg-no-repeat z-0"
style="background-image: url('<?php 
    if(has_post_thumbnail()) {
        echo esc_url(get_the_post_thumbnail_url()); 
    } else {
        echo esc_url(get_template_directory_uri() . '/assets/images/bg.png'); 
    }
?>');">
  <!-- Overlay -->
  <div class="absolute inset-0 z-10 bg-gradient-to-r from-[#142137] to-[#1421371A] opacity-100"></div>

  <div class="relative z-50 container mx-auto text-white h-full flex flex-col justify-start">
    <!-- Blog Title -->
    <h1 class="text-white text-[28px] sm:text-[34px] md:text-[40px] lg:text-[48px] font-semibold leading-[1.2] sm:leading-[1.3] md:leading-[1.4] lg:leading-[110px] tracking-[-0.8px] sm:tracking-[-1px] lg:tracking-[-1.2px] font-poppins">
      <?php echo esc_html_e('Our All Services','laundryclean'); ?>
    </h1>

    <!-- Background Badge -->
    <div class="w-[200px] sm:w-[230px] max-w-[240px] h-[34px] rounded-[195px] bg-white/10 backdrop-blur-[7px] flex items-center justify-center gap-[10px] py-3 px-4 ">
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
          <?php echo esc_html_e('All Services','laundryclean'); ?>
        </span>
      </div>
    </div>
  </div>
</section>

<!-- company all service -->
<section class="w-full mx-auto relative bg-[#ECF2FE] px-[5%] lg:px-[7.5%] py-5 md:py-7 xl:py-12 flex flex-col gap-7">

     <!-- Latest News Label -->
<div class="flex items-center justify-center">
     <div
        class="border border-[rgba(20,33,55,0.14)] flex items-center gap-2 flex-shrink-0 text-base font-medium leading-none text-[rgba(20,33,55,0.70)] py-2 px-3 font-poppins">
        <span class="w-[5px] h-[5px] bg-[#142137] flex-shrink-0 aspect-square"></span>
        <?php if($all_services_title):
        echo esc_html($all_services_title);
            endif;
            ?>
    </div>
  </div>

    <!-- Heading-->
    <div class="flex flex-col md:flex-row justify-center items-center gap-6 w-full">
         <h1
             class="text-[#142137] font-semibold text-[24px] sm:text-[28px] md:text-[34px] lg:text-[44px] leading-tight tracking-tight text-center lg:leading-[64px] lg:tracking-[-1.08px] font-poppins max-w-[660px]">
             <?php if($all_services_sub_title):
             echo esc_html($all_services_sub_title);
            endif;
            ?>
         </h1>
      </div>


    <!-- Cards -->
    <div class="relative grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 px-4 sm:px-0">

          
      <?php 
      $services = new WP_Query(array(
        'post_type'=> 'services',
        'paged' => $paged,
        'post_status'=> 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
      ) );

      if( $services->have_posts() ) : while( $services->have_posts() ) : $services->the_post();
                $title = get_the_title();
                $content = get_the_content(); 
                $trimmed = wp_trim_words($content, 15); 

                $services_icon = get_post_meta($post->ID, '_services_icon', true) ?: get_template_directory_uri() . '../assets/images/service1.png';
                 $services_hover_image = has_post_thumbnail($post->ID) ? get_the_post_thumbnail_url($post->ID, 'full') : false;

      ?>
        <!--Daynamic Card -->
        <div class="relative w-full flex flex-col items-center md:items-start gap-[30px] md:pr-4 md:border-r border-[rgba(20,33,55,0.14)] last:border-r-0">
            <div class="image pt-9 pb-[22px]">
                  <?php if($services_icon): ?>
                    <a href="<?php the_permalink();?>">
                 <img src="<?php echo esc_url($services_icon); ?>"
                     alt="<?php echo esc_attr($title); ?>" />
                     </a>
                 <?php endif; ?>
                
            </div>
            <div class="card-body flex flex-col gap-[22px] items-center md:items-start">
                <div class="group">
                   <h1 class="text-[#142137] hover:text-[#4375E7]  font-poppins text-[24px] md:text-[30px] font-semibold leading-none tracking-[-0.48px] cursor-pointer">
                    <a href="<?php the_permalink();?>">
                  <?php echo esc_html($title); ?>
                    </a>
                 </h1>

            <!-- Hover Image -->
               <div class="hidden absolute top-[50%] group-hover:block pt-4">
                 <?php if($services_hover_image): ?>
                    <a href="<?php echo esc_url(the_permalink());?>">
                 <img src="<?php echo esc_url($services_hover_image); ?>"
                     alt="<?php echo esc_attr($title); ?>" class="w-[350px]" />
                     </a>
                 <?php endif; ?>
                </div>
               </div>
                <p class="text-[rgba(20,33,55,0.7)] text-center md:text-start font-poppins text-[16px] not-italic font-normal leading-[26px]">
                   <?php 

echo esc_html($trimmed); 
?>

                </p>
                <a href="<?php the_permalink();?>">
                <button class="text-[#142137] mt-[20px] md:mt-[46px] flex gap-[10px] font-poppins text-[15px] not-italic font-medium leading-none">
                    
                    <?php echo _e('Read More', 'laundryclean');?>
                    <span class="pt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path d="M1 6L11 6" stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M6 1L11 6L6 11" stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </button>
                 </a>
            </div>
        </div>

        <?php endwhile; endif;?>
    </div>
    <?php laundryclean_all_pagenav(); ?>
</section>

<?php get_footer()?>