<?php 
/**
 * Vedio Section
 */
?>

<!-- Video Section -->
<section class="w-full bg-[#FFFFFF] relative px-[2.5%] lg:px-[5%] 2xl:px-[8%] py-4 lg:py-[40px] 2xl:py-[90px] flex flex-col items-center gap-6 sm:gap-8 md:gap-[34px]">
  <!-- Heading -->
  <div class="heading pt-6 sm:pt-8 md:pt-[34px] flex flex-col justify-center items-center gap-3 sm:gap-4 md:gap-[15px]">
    <h1 class="text-[#142137] text-center font-poppins text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-[54px] not-italic font-semibold leading-tight sm:leading-normal md:leading-[64px] tracking-tight sm:tracking-[-0.72px] md:tracking-[-1.08px]">
      Using Laundre Made Simple
    </h1>
    <p class="text-[rgba(20,33,55,0.7)] text-center font-poppins text-sm sm:text-base md:text-[16px] not-italic font-normal leading-snug sm:leading-normal md:leading-[26px] max-w-[50%] sm:max-w-[60%] md:max-w-none">
      The modern and convenient approach to laundry and dry cleaning.
    </p>
  </div>
  <!-- vedio and button -->
  <div class="video-img pt-4 sm:pt-5 md:pt-7 relative inline-block w-full max-w-[950px]">
    <img src="<?php echo get_template_directory_uri()?>/assets/images/vedio-img.png" alt="image" class="w-full" />

    <!-- Centered Button -->
    <div class="absolute inset-0 pt-2 sm:pt-4 md:pt-8 flex items-center justify-center">
      <img src="<?php echo get_template_directory_uri()?>/assets/images/Button.png" alt="button" class="h-10 sm:h-12 md:h-14 lg:h-16 xl:h-[66px] w-auto aspect-[98/66]" />
    </div>
  </div>
<div class="circle-section container mx-auto px-4 py-6 md:py-12">
  <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 md:gap-12 lg:gap-16 xl:gap-20 items-start justify-center">
    <!-- first card -->
    <div class="flex flex-col items-center">
      <div class="w-40 h-40 md:w-48 md:h-48 lg:w-56 lg:h-56 xl:w-64 xl:h-64 flex items-center justify-center">
        <img src="<?php echo get_template_directory_uri()?>/assets/images/featureimg1.png" alt="Order" class="w-full h-full object-contain" />
      </div>
      <div class="card-text flex flex-col items-center pt-6 md:pt-8 gap-3">
        <h1 class="text-[#142137] text-center font-poppins text-2xl md:text-3xl font-semibold leading-none tracking-[-0.6px]">
          You Order
        </h1>
        <p class="text-center max-w-[260px] font-poppins text-base md:text-lg font-medium leading-relaxed text-[rgba(20,33,55,0.6)]">
          Quickly book your laundry pickup online.
        </p>
      </div>
    </div>

    <!-- second card -->
    <div class="flex flex-col items-center">
      <div class="w-40 h-40 md:w-48 md:h-48 lg:w-56 lg:h-56 xl:w-64 xl:h-64 flex items-center justify-center">
        <img src="<?php echo get_template_directory_uri()?>/assets/images/featureimg2.png" alt="Collect" class="w-full h-full object-contain" />
      </div>
      <div class="card-text flex flex-col items-center pt-6 md:pt-8 gap-3">
        <h1 class="text-[#142137] text-center font-poppins text-2xl md:text-3xl font-semibold leading-none tracking-[-0.6px]">
          We Collect
        </h1>
        <p class="text-center max-w-[260px] font-poppins text-base md:text-lg font-medium leading-relaxed text-[rgba(20,33,55,0.6)]">
          No bag needed – just hand over your clothes!
        </p>
      </div>
    </div>

    <!-- third card -->
    <div class="flex flex-col items-center">
      <div class="w-40 h-40 md:w-48 md:h-48 lg:w-56 lg:h-56 xl:w-64 xl:h-64 flex items-center justify-center">
        <img src="<?php echo get_template_directory_uri()?>/assets/images/featureimg3.png" alt="Clean" class="w-full h-full object-contain" />
      </div>
      <div class="card-text flex flex-col items-center pt-6 md:pt-8 gap-3">
        <h1 class="text-[#142137] text-center font-poppins text-2xl md:text-3xl font-semibold leading-none tracking-[-0.6px]">
          We Clean
        </h1>
        <p class="text-center max-w-[260px] font-poppins text-base md:text-lg font-medium leading-relaxed text-[rgba(20,33,55,0.6)]">
          Superior cleaning satisfaction assured.
        </p>
      </div>
    </div>

    <!-- fourth card -->
    <div class="flex flex-col items-center">
      <div class="w-40 h-40 md:w-48 md:h-48 lg:w-56 lg:h-56 xl:w-64 xl:h-64 flex items-center justify-center">
        <img src="<?php echo get_template_directory_uri()?>/assets/images/featureimg4.png" alt="Deliver" class="w-full h-full object-contain" />
      </div>
      <div class="card-text flex flex-col items-center pt-6 md:pt-8 gap-3">
        <h1 class="text-[#142137] text-center font-poppins text-2xl md:text-3xl font-semibold leading-none tracking-[-0.6px]">
          We Deliver
        </h1>
        <p class="text-center max-w-[260px] font-poppins text-base md:text-lg font-medium leading-relaxed text-[rgba(20,33,55,0.6)]">
          Pick a time, and we'll deliver straight to you!
        </p>
      </div>
    </div>
  </div>
</div>


    </div>


  </section>