<?php 
/**
 * Vedio Section
 */
?>

<!-- Video Section -->
<section class="w-full bg-[#FFFFFF] relative px-[5%] lg:px-[7.5%]  py-4 lg:py-9 2xl:py-12 flex flex-col items-center gap-3 sm:gap-4 md:gap-6">
  <!-- Heading -->
  <div class="heading flex flex-col justify-center items-center gap-2 md:gap-3">
    <h1 class="text-[#142137] text-center text-[22px] sm:text-[28px] xl:text-[38px] font-semibold leading-tight sm:leading-snug lg:leading-[48px] tracking-tight font-poppins">
      Using Laundre Made Simple
    </h1>
    <p class="text-[rgba(20,33,55,0.7)] text-center font-poppins text-sm sm:text-base not-italic font-normal leading-snug sm:leading-normal md:leading-[26px] max-w-[50%] sm:max-w-[60%] md:max-w-none">
      The modern and convenient approach to laundry and dry cleaning.
    </p>
  </div>
  <!-- vedio and button -->
  <div class="video-img relative inline-block w-full max-w-[900px] h-[160px] sm:h-[220px] md:h-[300px] lg:h-[350px] overflow-hidden shadow-lg">
    <img src="<?php echo get_template_directory_uri()?>/assets/images/vedio-img.png" alt="image" class="w-full" />

    <!-- Centered Button -->
    <div class="absolute inset-0 pt-2 sm:pt-4 md:pt-8 flex items-center justify-center">
      <img src="<?php echo get_template_directory_uri()?>/assets/images/Button.png" alt="button" class="h-10 sm:h-12 md:h-14 lg:h-16 xl:h-[66px] w-auto aspect-[98/66]" />
    </div>
  </div>
<div class="circle-section container mx-auto pt-2">
  <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 lg:gap-10 items-start justify-center">
    <!-- first card -->
    <div class="flex flex-col items-center">
      <div class="w-28 h-28 md:w-32 md:h-32 lg:w-36 lg:h-36 xl:w-40 xl:h-40 flex items-center justify-center">
        <img src="<?php echo get_template_directory_uri()?>/assets/images/featureimg1.png" alt="Order" class="w-full h-full object-contain" />
      </div>
      <div class="card-text flex flex-col items-center pt-3 md:pt-4 gap-3">
        <h1 class="text-[#142137] text-center font-poppins text-[22px] md:text-[26px] font-semibold leading-none tracking-[-0.6px]">
          You Order
        </h1>
        <p class="text-center max-w-[260px] font-poppins text-sm md:text-base font-medium leading-relaxed text-[rgba(20,33,55,0.6)]">
          Quickly book your laundry pickup online.
        </p>
      </div>
    </div>

    <!-- second card -->
    <div class="flex flex-col items-center">
      <div class="w-28 h-28 md:w-32 md:h-32 lg:w-36 lg:h-36 xl:w-40 xl:h-40 flex items-center justify-center">
        <img src="<?php echo get_template_directory_uri()?>/assets/images/featureimg2.png" alt="Collect" class="w-full h-full object-contain" />
      </div>
      <div class="card-text flex flex-col items-center pt-3 md:pt-4 gap-3">
        <h1 class="text-[#142137] text-center font-poppins text-[22px] md:text-[26px] font-semibold leading-none tracking-[-0.6px]">
          We Collect
        </h1>
        <p class="text-center max-w-[260px] font-poppins text-sm md:text-base font-medium leading-relaxed text-[rgba(20,33,55,0.6)]">
          No bag needed – just hand over your clothes!
        </p>
      </div>
    </div>

    <!-- third card -->
    <div class="flex flex-col items-center">
      <div class="w-28 h-28 md:w-32 md:h-32 lg:w-36 lg:h-36 xl:w-40 xl:h-40 flex items-center justify-center">
        <img src="<?php echo get_template_directory_uri()?>/assets/images/featureimg3.png" alt="Clean" class="w-full h-full object-contain" />
      </div>
      <div class="card-text flex flex-col items-center pt-3 md:pt-4 gap-3">
        <h1 class="text-[#142137] text-center font-poppins text-[22px] md:text-[26px] font-semibold leading-none tracking-[-0.6px]">
          We Clean
        </h1>
        <p class="text-center max-w-[260px] font-poppins text-sm md:text-base font-medium leading-relaxed text-[rgba(20,33,55,0.6)]">
          Superior cleaning satisfaction assured.
        </p>
      </div>
    </div>

    <!-- fourth card -->
    <div class="flex flex-col items-center">
      <div class="w-28 h-28 md:w-32 md:h-32 lg:w-36 lg:h-36 xl:w-40 xl:h-40 flex items-center justify-center">
        <img src="<?php echo get_template_directory_uri()?>/assets/images/featureimg4.png" alt="Deliver" class="w-full h-full object-contain" />
      </div>
      <div class="card-text flex flex-col items-center pt-3 md:pt-4 gap-3">
        <h1 class="text-[#142137] text-center font-poppins text-[22px] md:text-[26px] font-semibold leading-none tracking-[-0.6px]">
          We Deliver
        </h1>
        <p class="text-center max-w-[260px] font-poppinstext-sm md:text-base font-medium leading-relaxed text-[rgba(20,33,55,0.6)]">
          Pick a time, and we'll deliver straight to you!
        </p>
      </div>
    </div>
  </div>
</div>


    </div>


  </section>