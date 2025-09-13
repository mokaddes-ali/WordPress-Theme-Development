<?php 
/**
 * Sevices Section
 */

        $services_title = get_theme_mod('services_title', __('Our Services', 'laundryclean'));
 
        $services_sub_title = get_theme_mod('services_sub_title', __('The Solutions We Provide For Our Clients.', 'laundryclean'));
       
       $services_button_text = get_theme_mod('services_button_text', __('See More Services', 'laundryclean'));
?>

<!-- company service -->
<section class="w-full mx-auto relative bg-[#ECF2FE] px-[5%] lg:px-[7.5%] py-5 md:py-6 lg:py-8 flex flex-col gap-3 sm:gap-4 lg:gap-6">

     <!-- Latest News Label -->
    <div class="flex items-center justify-center md:justify-start">
     <div
        class="w-[150px] py-1.5 px-3 border border-[rgba(20,33,55,0.14)] flex items-center gap-2 flex-shrink-0 text-base font-medium leading-none text-[rgba(20,33,55,0.70)]font-poppins">
        <span class="w-[5px] h-[5px] bg-[#142137] flex-shrink-0 aspect-square"></span>
        <?php if($services_title):
        echo esc_html($services_title);
            endif;
            ?>
    </div>
</div>

    <!-- Heading and Button -->
    <div class="flex flex-col md:flex-row justify-between items-center gap-6 w-full">
         <h1
             class="text-[#142137] tex-start text-[22px] sm:text-[28px] xl:text-[38px] font-semibold leading-tight sm:leading-snug lg:leading-[48px] tracking-tight font-poppins max-w-[450px]">
             <?php if($services_sub_title):
             echo esc_html($services_sub_title);
            endif;
            ?>
         </h1>

          <button
    class="relative py-2 px-3 shrink-0 border border-[rgba(20,33,55,0.14)] font-poppins text-[15px] font-medium flex items-center justify-center gap-2 group overflow-hidden">

    <!-- Background animation -->
    <span
        class="absolute inset-0 bg-black -translate-x-full group-hover:translate-x-0 transition-transform duration-700 ease-in-out">
    </span>

    <!-- Button text and icon -->
    <a href="<?php echo esc_url(get_post_type_archive_link('services')); ?>"
       class="relative flex items-center gap-2 text-[#142137] group-hover:text-white transition-colors duration-500 z-10">
          <?php if($services_button_text):
             echo esc_html($services_button_text);
            endif;
            ?>
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none"
             class="transition-colors duration-500 group-hover:stroke-white">
            <path d="M1 7L13 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M8 13L14 7L8 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </a>
</button>
      </div>


    <!-- Cards -->
    <div class="relative grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 px-4 sm:px-0">

          
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
            <div class="image py-4">
                  <?php if($services_icon): ?>
                    <a href="<?php the_permalink();?>">
                 <img src="<?php echo esc_url($services_icon); ?>"
                     alt="<?php echo esc_attr($title); ?>" />
                     </a>
                 <?php endif; ?>
                
            </div>
            <div class="card-body flex flex-col gap-4 items-center md:items-start">
                <div class="group">
                   <h1 class="text-[#142137] hover:text-[#4375E7]  font-poppins text-[22px] md:text-[26px] font-semibold leading-none tracking-[-0.48px] cursor-pointer">
                    <a href="<?php the_permalink();?>">
                  <?php echo esc_html(wp_trim_words($title, 4)); ?>
                    </a>
                 </h1>

            <!-- Hover Image -->
               <div class="hidden absolute top-[70%] group-hover:block">
                 <?php if($services_hover_image): ?>
                 <img src="<?php echo esc_url($services_hover_image); ?>"
                     alt="<?php echo esc_attr($title); ?>" class="w-[350px]" />
                 <?php endif; ?>
                </div>
               </div>
                <p class="text-[rgba(20,33,55,0.7)] text-center md:text-start font-poppins text-[14px] md:text-base not-italic font-normal leading-[26px]">
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