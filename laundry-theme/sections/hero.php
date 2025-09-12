 <?php
     /**
      * Hero Section Template
      *
      * @package LaundryTheme
      */
 ?>

 <section class=" relative w-full h-[750px]">
     <!-- Next and preview Button -->
     <div class="absolute top-[50%] left-[85%] z-50 flex flex-col gap-2">

         <!-- Prev Button -->
         <button id="custom-prev"
             class="w-[54px] h-[54px] flex items-center justify-center rounded-full hover:bg-[#4375E7] transition duration-300">
             <svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 54 54" fill="none">
                 <foreignObject x="-14" y="-14" width="82" height="82">
                     <div xmlns="http://www.w3.org/1999/xhtml"
                         style="backdrop-filter:blur(7px);clip-path:url(#bgblur_0_59_22_clip_path);height:100%;width:100%">
                     </div>
                 </foreignObject>
                 <rect data-figma-bg-blur-radius="14" width="54" height="54" rx="27" fill="white" fill-opacity="0.14" />
                 <path d="M34 27H20" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                 <path d="M26.998 19.999L19.998 26.999L26.998 33.999" stroke="white" stroke-width="1.5"
                     stroke-linecap="round" stroke-linejoin="round" />
                 <defs>
                     <clipPath id="bgblur_0_59_22_clip_path" transform="translate(14 14)">
                         <rect width="54" height="54" rx="27" />
                     </clipPath>
                 </defs>
             </svg>
         </button>

         <!-- Next Button -->
         <button id="custom-next"
             class="w-[54px] h-[54px] flex items-center justify-center rounded-full hover:bg-[#4375E7] transition duration-300">
             <svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 54 54" fill="none">
                 <rect width="54" height="54" rx="27" transform="matrix(-1 0 0 1 54 0)" fill="#4375E7" />
                 <path d="M20 27.0007L34 27.0007" stroke="white" stroke-width="1.5" stroke-linecap="round"
                     stroke-linejoin="round" />
                 <path d="M27 20.001L34 27.001L27 34.001" stroke="white" stroke-width="1.5" stroke-linecap="round"
                     stroke-linejoin="round" />
             </svg>
         </button>
     </div>


     <div class="hero-slick-items">
         <?php 
              $slider_args = array(
              'post_type' => 'slider',
              'posts_per_page' => 3,
              'orderby' => 'date',
              'order' => 'DESC'
             );

           $slider_posts = get_posts($slider_args);
 
            foreach($slider_posts as $post):
            setup_postdata($post);
               ?>
         <?php
              $slider_background_image = has_post_thumbnail($post) ? get_the_post_thumbnail_url($post , 'full') : get_template_directory_uri() . '/assets/images/Image_here.png';

             $slider_title = get_the_title($post) ?: 'Fabric Fresh Laundry & Cleaning.';
              $slider_description= get_the_excerpt($post) ?: 'Our services are designed for convenience and efficiency, offering doorstep pickup & delivery to make your laundry experience as seamless as possible.';

               $slider_type = get_post_meta($post->ID, '_slider_type', true) ?: 'Dry Clean Experts';
               $slider_button_text = get_post_meta($post->ID, '_slider_button_text', true) ?: 'Book Laundry Now!';
               $slider_button_link = get_post_meta($post->ID, '_slider_button_link', true) ?: 'https://example.com/book-laundry-now';
               $slider_avatar = get_post_meta($post->ID, '_slider_avatar', true) ?: get_template_directory_uri() . '/assets/images/avatorhero.png';
               $slider_rating = get_post_meta($post->ID, '_slider_rating', true) ?: 5;
               $slider_rating_text = get_post_meta($post->ID, '_slider_rating_text', true) ?: '8k Clients Reviews.';

             ?>


         <div class="hero-slick-single-item relative">

             <!-- Background Image -->
             <div class="absolute inset-0 z-0 w-full">
                 <?php if($slider_background_image): ?>
                 <img src="<?php echo esc_url($slider_background_image); ?>"
                     alt="<?php echo esc_attr($slider_title); ?>" class="w-full h-full object-cover" />
                 <?php endif; ?>
             </div>

             <div class="absolute inset-0 z-10 bg-gradient-to-r from-[#142137] to-[#1421371A] opacity-100">
             </div>


             <!-- design -->
             <div
                 class="design absolute top-[30%] sm:top-[34%] md:top-[40%] lg:top-[57%] xl:top-[50%] z-10 left-[0%] sm:left-[5%] md:left-[6%] lg:left-[15.625rem]">
                 <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 474 54" fill="none"
                     class="w-[18rem] sm:w-[22rem] md:w-[25rem] lg:w-[29.625rem]">
                     <path
                         d="M473.807 20.1567C483.484 -13.3431 126.015 -3.02882 4.10742 35.9075C-2.43858 37.1866 -0.730936 42.5433 6.19456 41.264C174.968 14.9603 294.029 11.8422 403.319 14.9603C562.51 20.1567 206.749 29.428 185.403 44.2991C181.502 47.0174 179.332 55.0126 193.278 53.8933C328.941 35.5843 466.994 43.743 473.807 20.1567Z"
                         fill="#4375E7" />
                 </svg>
             </div>

             <!-- Hero Content -->
             <div
                 class="relative z-20 flex flex-col gap-3 px-[5%] lg:px-[5%] 2xl:px-[8%] py-4 md:py-6 lg:py-10 mx-auto text-white">

                 <!-- Tag Box -->
                 <div
                     class="w-[10.5rem] h-[1.50rem] md:w-[11.375rem] md:h-[1.8125rem] flex items-center gap-[0.5rem] px-[0.875rem] py-[0.5rem] bg-white/15 backdrop-blur-[0.4375rem] text-white/70 text-sm md:text-[1rem] font-poppins font-medium">
                     <div class="w-[0.3125rem] h-[0.3125rem] rounded-full bg-white flex-shrink-0"></div>
                     <?php if($slider_type):?>
                     <?php echo esc_html($slider_type); ?>
                     <?php endif; ?>
                 </div>

                 <!-- Heading -->
                 <h1
                     class="text-white font-poppins w-full text-[2.0rem] sm:text-[2.5rem] md:text-[3.0rem] lg:text-[4.75rem] md:max-w-2xl lg:max-w-4xl xl:max-w-5xl font-semibold leading-[1.1] tracking-[-0.125rem]">
                     <?php if($slider_title): ?>
                     <?php echo esc_html($slider_title); ?>
                     <?php endif; ?>
                 </h1>

                 <!-- Description -->
                 <p
                     class="text-white/70 font-poppins w-full md:w-[80%] lg:w-[48.125rem] md:pt-[0.5rem] text-sm sm:text-[1rem] md:sm:text-[1.125rem] font-medium leading-[1.8]">
                     <?php if($slider_description): ?>
                     <?php echo esc_html($slider_description); ?>
                     <?php endif; ?>
                 </p>

                 <!-- Button & Avatar Section -->
                 <div
                     class="flex flex-col sm:flex-row items-start sm:items-center pt-[1.5rem] gap-[1.5rem] sm:gap-[2rem]">
                     <button
                         class="w-[13.25rem] h-[3.375rem] flex-shrink-0 bg-[#4375E7] text-white font-[Poppins] text-[0.9375rem] font-medium hover:bg-blue-600 transition">
                         <?php if($slider_button_text): ?>
                         <a
                             href="<?php echo esc_url($slider_button_link); ?>"><?php echo esc_html($slider_button_text); ?></a>
                         <?php endif; ?>
                     </button>

                     <div class="flex items-center gap-[1.125rem]">
                         <img src="<?php echo esc_url($slider_avatar); ?>" alt="Client"
                             class="w-[10.125rem] h-[3.375rem]" />
                         <div class="flex flex-col gap-[0.5rem] sm:gap-[0.625rem]">
                             <div class="flex items-center text-yellow-400">
                                 <?php if($slider_rating): ?>
                                 <?php $total_stars = $slider_rating;
                                   for($i = 1; $i <= $total_stars; $i++): ?>
                                 <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" viewBox="0 0 20 20"
                                     fill="currentColor" class="text-yellow-400">
                                     <path
                                         d="M10 15.27L16.18 20 14.54 12.97 20 8.64l-7.19-.61L10 0 7.19 8.03 0 8.64l5.46 4.33L3.82 20z" />
                                 </svg>
                                 <?php endfor; ?>
                                 <?php endif; ?>

                             </div>
                             <p class="text-white font-poppins text-[1rem] font-medium leading-[1.5]">
                                 <?php if($slider_rating_text): ?>
                                 <?php echo esc_html($slider_rating_text); ?>
                                 <?php endif; ?>
                             </p>
                         </div>
                     </div>
                 </div>
             </div>
         </div> <!-- Slick Item End -->
         <?php
     endforeach;
     wp_reset_postdata();
     ?>
     </div>
 </section>