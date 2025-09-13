<?php 
/**
 * Vedio Section
 */
?>

<!-- Video Section -->
<section class="w-full bg-[#FFFFFF] relative px-[5%] lg:px-[7.5%]  py-4 lg:py-9 2xl:py-12 flex flex-col items-center gap-3 sm:gap-4 md:gap-6">

    <?php 
     $show_video_title = get_theme_mod('show_video_title', ' Using Laundre Made Simple');
    $show_video_subtitle = get_theme_mod('show_video_subtitle', 'The modern and convenient approach to laundry and dry cleaning.');
    $show_video_url     = get_theme_mod('show_video_url');
    if ( ! empty( $show_video_url ) ) :
    $embed_url = str_replace( "watch?v=", "embed/", $show_video_url );
    endif;
     ?>
  <!-- Heading -->
  <div class="heading flex flex-col justify-center items-center gap-2 md:gap-3">
    <h1 class="text-[#142137] text-center text-[22px] sm:text-[28px] xl:text-[38px] font-semibold leading-tight sm:leading-snug lg:leading-[48px] tracking-tight font-poppins">
      <?php if($show_video_title): ?>
     <?php echo esc_html($show_video_title)?>
     <?php endif;?>
    </h1>
    <p class="text-[rgba(20,33,55,0.7)] text-center font-poppins text-sm sm:text-base not-italic font-normal leading-snug sm:leading-normal md:leading-[26px] max-w-[50%] sm:max-w-[60%] md:max-w-none">
      <?php if($show_video_subtitle): ?>
     <?php echo esc_html($show_video_subtitle)?>
     <?php endif;?>
    </p>
  </div>
<!-- Video Section -->
<div class="video-img relative inline-block w-full max-w-[900px] h-[160px] sm:h-[220px] md:h-[300px] lg:h-[350px] overflow-hidden shadow-lg rounded-xl">
   <iframe 
            class="w-full aspect-video"
            src="<?php echo esc_url($embed_url); ?>" 
            title="YouTube video"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
        </iframe>
</div>
  </div>
<div class="circle-section container mx-auto pt-2">
  <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 lg:gap-10 items-start justify-center">
    <!-- first card -->

    <?php 
        $processing_system_image1 = get_theme_mod('processing_system_image1',get_template_directory_uri() . '/assets/images/featureimg1.png');
     $processing_system_title1 = get_theme_mod('processing_system_title1', 'You Order');
     $processing_system_subtitle1 = get_theme_mod('processing_system_subtitle1', 'Quickly book your laundry pickup online.');
    ?>
    <div class="flex flex-col items-center">
      <div class="w-28 h-28 md:w-32 md:h-32 lg:w-36 lg:h-36 xl:w-40 xl:h-40 flex items-center justify-center">
        <?php if($processing_system_image1):?>
        <img src="<?php echo esc_url($processing_system_image1);?>" alt="<?php echo esc_html(the_title())?>" class="w-full h-full object-contain" />
        <?php endif;?>
      </div>
      <div class="card-text flex flex-col items-center pt-3 md:pt-4 gap-3">
        <h1 class="text-[#142137] text-center font-poppins text-[22px] md:text-[26px] font-semibold leading-none tracking-[-0.6px]">
          <?php if($processing_system_title1):?>
          <?php echo esc_html($processing_system_title1);?>
          <?php endif;?>
        </h1>
        <p class="text-center max-w-[260px] font-poppins text-sm md:text-base font-medium leading-relaxed text-[rgba(20,33,55,0.6)]">
          <?php if($processing_system_subtitle1):?>
          <?php echo esc_html($processing_system_subtitle1);?>
          <?php endif;?>
        </p>
      </div>
    </div>

    <!-- second card -->
      <?php 
        $processing_system_image2 = get_theme_mod('processing_system_image2',get_template_directory_uri() . '/assets/images/featureimg2.png');
     $processing_system_title2 = get_theme_mod('processing_system_title2', 'We Collect');
     $processing_system_subtitle2 = get_theme_mod('processing_system_subtitle2', 'No bag needed – just hand over your clothes!');
    ?>
    <div class="flex flex-col items-center">
      <div class="w-28 h-28 md:w-32 md:h-32 lg:w-36 lg:h-36 xl:w-40 xl:h-40 flex items-center justify-center">
         <?php if($processing_system_image2):?>
        <img src="<?php echo esc_url($processing_system_image2);?>" alt="<?php echo esc_html(the_title())?>" class="w-full h-full object-contain" />
        <?php endif;?>
      </div>
      <div class="card-text flex flex-col items-center pt-3 md:pt-4 gap-3">
        <h1 class="text-[#142137] text-center font-poppins text-[22px] md:text-[26px] font-semibold leading-none tracking-[-0.6px]">
           <?php if($processing_system_title2):?>
          <?php echo esc_html($processing_system_title2);?>
          <?php endif;?>
        </h1>
        <p class="text-center max-w-[260px] font-poppins text-sm md:text-base font-medium leading-relaxed text-[rgba(20,33,55,0.6)]">
          <?php if($processing_system_subtitle2):?>
          <?php echo esc_html($processing_system_subtitle2);?>
          <?php endif;?>
        </p>
      </div>
    </div>

    <!-- third card -->
      <?php 
        $processing_system_image3 = get_theme_mod('processing_system_image3',get_template_directory_uri() . '/assets/images/featureimg3.png');
     $processing_system_title3 = get_theme_mod('processing_system_title3', 'We Clean');
     $processing_system_subtitle3 = get_theme_mod('processing_system_subtitle3', 'Superior cleaning satisfaction assured.');
    ?>
    <div class="flex flex-col items-center">
      <div class="w-28 h-28 md:w-32 md:h-32 lg:w-36 lg:h-36 xl:w-40 xl:h-40 flex items-center justify-center">
         <?php if($processing_system_image3):?>
        <img src="<?php echo esc_url($processing_system_image3);?>" alt="<?php echo esc_html(the_title())?>" class="w-full h-full object-contain" />
        <?php endif;?>
      </div>
      <div class="card-text flex flex-col items-center pt-3 md:pt-4 gap-3">
        <h1 class="text-[#142137] text-center font-poppins text-[22px] md:text-[26px] font-semibold leading-none tracking-[-0.6px]">
           <?php if($processing_system_title3):?>
          <?php echo esc_html($processing_system_title3);?>
          <?php endif;?>
        </h1>
        <p class="text-center max-w-[260px] font-poppins text-sm md:text-base font-medium leading-relaxed text-[rgba(20,33,55,0.6)]">
          <?php if($processing_system_subtitle3):?>
          <?php echo esc_html($processing_system_subtitle3);?>
          <?php endif;?>
        </p>
      </div>
    </div>

    <!-- fourth card -->
      <?php 
        $processing_system_image4 = get_theme_mod('processing_system_image4',get_template_directory_uri() . '/assets/images/featureimg4.png');
     $processing_system_title4 = get_theme_mod('processing_system_title4', 'We Deliver');
     $processing_system_subtitle4 = get_theme_mod('processing_system_subtitle4', "Pick a time, and we'll deliver straight to you!");
    ?>
    <div class="flex flex-col items-center">
      <div class="w-28 h-28 md:w-32 md:h-32 lg:w-36 lg:h-36 xl:w-40 xl:h-40 flex items-center justify-center">
        <?php if($processing_system_image4):?>
        <img src="<?php echo esc_url($processing_system_image4);?>" alt="<?php echo esc_html(the_title())?>" class="w-full h-full object-contain" />
        <?php endif;?>
      </div>
      <div class="card-text flex flex-col items-center pt-3 md:pt-4 gap-3">
        <h1 class="text-[#142137] text-center font-poppins text-[22px] md:text-[26px] font-semibold leading-none tracking-[-0.6px]">
           <?php if($processing_system_title4):?>
          <?php echo esc_html($processing_system_title4);?>
          <?php endif;?>
        </h1>
        <p class="text-center max-w-[260px] font-poppinstext-sm md:text-base font-medium leading-relaxed text-[rgba(20,33,55,0.6)]">
          <?php if($processing_system_subtitle4):?>
          <?php echo esc_html($processing_system_subtitle4);?>
          <?php endif;?>
        </p>
      </div>
    </div>
  </div>
</div>


    </div>


  </section>