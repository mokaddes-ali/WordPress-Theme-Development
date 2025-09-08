<?php 
/**
 * Sevices Section
 */

        $services_title = get_theme_mod('services_title', __('Our Services', 'laundryclean'));
 
        $services_sub_title = get_theme_mod('services_sub_title', __('The Solutions We Provide For Our Clients.', 'laundryclean'));
       
       $services_button_text = get_theme_mod('services_button_text', __('See More Services', 'laundryclean'));
?>

<!-- company service -->
<section class="w-full mx-auto relative bg-[#ECF2FE] px-[2.5%] lg:px-[5%] 2xl:px-[8%] py-6 md:py-10 xl:py-14 flex flex-col gap-[34px]">

     <!-- Latest News Label -->
     <div
        class="w-[194px] h-[29px] border border-[rgba(20,33,55,0.14)] flex items-center gap-2 flex-shrink-0 text-base font-medium leading-none text-[rgba(20,33,55,0.70)] py-2 px-3 font-poppins">
        <span class="w-[5px] h-[5px] bg-[#142137] flex-shrink-0 aspect-square"></span>
        <?php if($services_title):
        echo esc_html($services_title);
            endif;
            ?>
    </div>

    <!-- Heading and Button -->
    <div class="flex flex-col md:flex-row justify-between items-center gap-6 w-full">
         <h1
             class="text-[#142137] font-semibold text-3xl sm:text-4xl md:text-5xl lg:text-[54px] leading-tight tracking-tight text-center md:text-left lg:leading-[64px] lg:tracking-[-1.08px] font-poppins max-w-[660px]">
             <?php if($services_sub_title):
             echo esc_html($services_sub_title);
            endif;
            ?>
         </h1>
         <button
            class="w-[188px] h-[44px] shrink-0 border border-[rgba(20,33,55,0.14)] text-[#142137] font-poppins text-[15px] font-medium flex items-center justify-center gap-2 group mt-0 md:mt-[60px]">
         
            <a href="<?php echo esc_url(get_post_type_archive_link('services')); ?>">
                
                 <?php if($services_button_text):
             echo esc_html($services_button_text);
            endif;
            ?>
            </a>

  
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none"
                class="transition-transform duration-300 group-hover:translate-x-1">
                <path d="M1 7L13 7" stroke="#142137" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M8 13L14 7L8 1" stroke="#142137" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
          </button>
      </div>


    <!-- Cards -->
    <div class="relative grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 px-4 sm:px-0">

          
      <?php 
      $services = new WP_Query(array(
        'post_type'=> 'services',
        'posts_per_page'=> 4,
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
               <div class="hidden absolute top-[80%] group-hover:block pt-4">
                 <?php if($services_hover_image): ?>
                 <img src="<?php echo esc_url($services_hover_image); ?>"
                     alt="<?php echo esc_attr($title); ?>" class="w-[350px]" />
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
</section>