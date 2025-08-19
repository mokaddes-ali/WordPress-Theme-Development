

<!-- Hero Section -->
<section class="hero-slick-items relative w-full mt-20 h-[30rem] md:h-[38rem] lg:h-[48rem]  xl:h-[40.5rem]  2xl:h-[52.5rem] overflow-hidden">


  <!-- Background Image -->
  <div class="absolute inset-0 z-0 w-full h-full aspect-[1920/840] sm:aspect-[1920/840] md:aspect-[1920/840] lg:aspect-[1920/840] xl:aspect-[1920/840] 2xl:aspect-[1920/840]">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Image_here.png" alt="Background" class="w-full h-full object-cover" />
  </div>

  <!-- Overlay Image -->
  <div class="absolute inset-0 z-10">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Overly.png" alt="Overlay" class="w-full h-full object-cover" />
  </div>
  
  <!-- design -->
  <div class="design absolute top-[30%] sm:top-[34%] md:top-[40%] lg:top-[57%] xl:top-[50%] z-10 left-[0%] sm:left-[5%] md:left-[6%] lg:left-[15.625rem]">
    <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 474 54" fill="none" class="w-[18rem] sm:w-[22rem] md:w-[25rem] lg:w-[29.625rem]">
      <path
        d="M473.807 20.1567C483.484 -13.3431 126.015 -3.02882 4.10742 35.9075C-2.43858 37.1866 -0.730936 42.5433 6.19456 41.264C174.968 14.9603 294.029 11.8422 403.319 14.9603C562.51 20.1567 206.749 29.428 185.403 44.2991C181.502 47.0174 179.332 55.0126 193.278 53.8933C328.941 35.5843 466.994 43.743 473.807 20.1567Z"
        fill="#4375E7" />
    </svg>
  </div>

  <!-- Hero Content -->
  <div class="relative z-20 flex flex-col gap-[1.5rem] px-[2.5%] lg:px-[5%] 2xl:px-[8%] pt-[1.75rem] sm:pt-[2.25rem] md:pt-[6rem] 2xl:pt-[12rem] h-full pb-[3rem] sm:pb-[4rem] md:pb-[5rem] 2xl:pb-[12rem] mx-auto text-white">

    <!-- Tag Box -->
    <div class="w-[10.5rem] h-[1.50rem] md:w-[11.375rem] md:h-[1.8125rem] flex items-center gap-[0.5rem] px-[0.875rem] py-[0.5rem] bg-white/15 backdrop-blur-[0.4375rem] text-white/70 text-sm md:text-[1rem] font-poppins font-medium">
      <div class="w-[0.3125rem] h-[0.3125rem] rounded-full bg-white flex-shrink-0"></div>
      Dry Clean Experts
    </div>

    <!-- Heading -->
    <h1 class="text-white font-poppins -ml-[0.25rem] w-full text-[2.5rem] sm:text-[3rem] md:text-[3.5rem] lg:text-[6.25rem] font-semibold leading-[1.1] tracking-[-0.125rem]">
      Fabric Fresh Laundry <span class="rounded-2xl pr-[0.125rem]">&</span>Cleaning.
    </h1>

    <!-- Description -->
    <p class="text-white/70 font-poppins w-full md:w-[80%] lg:w-[48.125rem] md:pt-[0.5rem] text-sm sm:text-[1rem] md:sm:text-[1.125rem] font-medium leading-[1.8]">
      Our services are designed for convenience and efficiency, offering doorstep pickup & delivery to make your
      laundry experience as seamless as possible.
    </p>

    <!-- Button & Avatar Section -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center pt-[1.5rem] gap-[1.5rem] sm:gap-[2rem]">
      <button class="w-[13.25rem] h-[3.375rem] flex-shrink-0 bg-[#4375E7] text-white font-[Poppins] text-[0.9375rem] font-medium hover:bg-blue-600 transition">
        Book Laundry Now!
      </button>

      <div class="flex items-center gap-[1.125rem]">
        <img src="./assets/images/avatorhero.png" alt="Client" class="w-[10.125rem] h-[3.375rem]" />
        <div class="flex flex-col gap-[0.5rem] sm:gap-[0.625rem]">
          <div class="flex items-center text-yellow-400">
            <!-- Star Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" width="102" height="18" viewBox="0 0 102 18" fill="none">
              <path d="M92.0948 1.92837C92.4547 1.16162 93.5453 1.16162 93.9052 1.92838L95.5545 5.4418C95.6961 5.74338 95.9785 5.95465 96.3078 6.00526L100.078 6.58468C100.882 6.70829 101.21 7.68948 100.641 8.27168L97.8527 11.1277C97.6309 11.3549 97.5302 11.6739 97.5813 11.9873L98.2304 15.9672C98.3648 16.7911 97.4901 17.4073 96.7596 17.0033L93.4839 15.1919C93.1828 15.0254 92.8172 15.0254 92.5161 15.1919L89.2404 17.0033C88.5099 17.4073 87.6352 16.7911 87.7696 15.9672L88.4187 11.9873C88.4698 11.6739 88.3691 11.3549 88.1473 11.1277L85.3587 8.27168C84.7902 7.68948 85.118 6.70829 85.9223 6.58468L89.6922 6.00526C90.0215 5.95465 90.3039 5.74338 90.4455 5.4418L92.0948 1.92837Z" fill="#FFB100"/>
              <path d="M71.0948 1.92837C71.4547 1.16162 72.5453 1.16162 72.9052 1.92838L74.5545 5.4418C74.6961 5.74338 74.9785 5.95465 75.3078 6.00526L79.0777 6.58468C79.882 6.70829 80.2098 7.68948 79.6413 8.27168L76.8527 11.1277C76.6309 11.3549 76.5302 11.6739 76.5813 11.9873L77.2304 15.9672C77.3648 16.7911 76.4901 17.4073 75.7596 17.0033L72.4839 15.1919C72.1828 15.0254 71.8172 15.0254 71.5161 15.1919L68.2404 17.0033C67.5099 17.4073 66.6352 16.7911 66.7696 15.9672L67.4187 11.9873C67.4698 11.6739 67.3691 11.3549 67.1473 11.1277L64.3587 8.27168C63.7902 7.68948 64.118 6.70829 64.9223 6.58468L68.6922 6.00526C69.0215 5.95465 69.3039 5.74338 69.4455 5.4418L71.0948 1.92837Z" fill="#FFB100"/>
              <path d="M50.0948 1.92837C50.4547 1.16162 51.5453 1.16162 51.9052 1.92838L53.5545 5.4418C53.6961 5.74338 53.9785 5.95465 54.3078 6.00526L58.0777 6.58468C58.882 6.70829 59.2098 7.68948 58.6413 8.27168L55.8527 11.1277C55.6309 11.3549 55.5302 11.6739 55.5813 11.9873L56.2304 15.9672C56.3648 16.7911 55.4901 17.4073 54.7596 17.0033L51.4839 15.1919C51.1828 15.0254 50.8172 15.0254 50.5161 15.1919L47.2404 17.0033C46.5099 17.4073 45.6352 16.7911 45.7696 15.9672L46.4187 11.9873C46.4698 11.6739 46.3691 11.3549 46.1473 11.1277L43.3587 8.27168C42.7902 7.68948 43.118 6.70829 43.9223 6.58468L47.6922 6.00526C48.0215 5.95465 48.3039 5.74338 48.4455 5.4418L50.0948 1.92837Z" fill="#FFB100"/>
              <path d="M29.0948 1.92837C29.4547 1.16162 30.5453 1.16162 30.9052 1.92838L32.5545 5.4418C32.6961 5.74338 32.9785 5.95465 33.3078 6.00526L37.0777 6.58468C37.882 6.70829 38.2098 7.68948 37.6413 8.27168L34.8527 11.1277C34.6309 11.3549 34.5302 11.6739 34.5813 11.9873L35.2304 15.9672C35.3648 16.7911 34.4901 17.4073 33.7596 17.0033L30.4839 15.1919C30.1828 15.0254 29.8172 15.0254 29.5161 15.1919L26.2404 17.0033C25.5099 17.4073 24.6352 16.7911 24.7696 15.9672L25.4187 11.9873C25.4698 11.6739 25.3691 11.3549 25.1473 11.1277L22.3587 8.27168C21.7902 7.68948 22.118 6.70829 22.9223 6.58468L26.6922 6.00526C27.0215 5.95465 27.3039 5.74338 27.4455 5.4418L29.0948 1.92837Z" fill="#FFB100"/>
              <path d="M8.09478 1.92837C8.45471 1.16162 9.54529 1.16162 9.90522 1.92838L11.5545 5.4418C11.6961 5.74338 11.9785 5.95465 12.3078 6.00526L16.0777 6.58468C16.882 6.70829 17.2098 7.68948 16.6413 8.27168L13.8527 11.1277C13.6309 11.3549 13.5302 11.6739 13.5813 11.9873L14.2304 15.9672C14.3648 16.7911 13.4901 17.4073 12.7596 17.0033L9.48392 15.1919C9.18279 15.0254 8.8172 15.0254 8.51608 15.1919L5.24045 17.0033C4.50989 17.4073 3.63518 16.7911 3.76957 15.9672L4.41872 11.9873C4.46983 11.6739 4.36909 11.3549 4.14727 11.1277L1.35869 8.27168C0.790242 7.68948 1.11804 6.70829 1.92229 6.58468L5.69218 6.00526C6.02147 5.95465 6.30392 5.74338 6.44549 5.4418L8.09478 1.92837Z" fill="#FFB100"/>
            </svg>
          </div>
          <p class="text-white font-poppins text-[1rem] font-medium leading-[1.5]">8k Clients Reviews</p>
        </div>
      </div>
    </div>
  </div>

  
</section>