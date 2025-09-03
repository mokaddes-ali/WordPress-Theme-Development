<?php
/**
 * Team Member Section
 *
 * @package LaundryTheme
 */
get_header();
?>
<section class="team-area bg-[#FFF] w-full px-[2.5%] lg:px-[5%] 2xl:px-[8%] py-16 md:py-28 flex flex-col gap-8 md:gap-10">

  <!-- heading -->
  <div class="team-heading w-full max-w-[48rem] mx-auto flex items-center justify-center flex-col gap-6 text-center">

    <div class="border border-[rgba(20,33,55,0.14)] flex items-center gap-2 text-sm md:text-base font-medium leading-none text-[rgba(20,33,55,0.70)] py-2 px-3 font-poppins">
      <span class="w-1.5 h-1.5 bg-[#142137] rounded-full"></span>
      Meet Cleaning Expert!
    </div>
    
    <h1 class="text-[#142137] w-full font-poppins text-3xl sm:text-4xl md:text-5xl font-semibold leading-tight tracking-tight">
      Meet The Professional Behind Our Clean Services!
    </h1>
  </div>

  <!-- team cards -->
  <div class="team-cards w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8">

    <!-- Team Card 1 -->
    <div class="relative w-full aspect-[378/470] h-[470px] lg:h-[360px] max-w-[24rem] mx-auto overflow-hidden group bg-white shadow-lg hover:shadow-xl transition-shadow duration-300">
      <!-- Image -->
      <div class="w-full aspect-[378/370]">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team1.png" alt="Team Member" class="w-full h-full object-cover" />
      </div>

      <!-- Card Body -->
      <div class="flex justify-between items-center px-6 pt-6 pb-6 bg-[#ECF2FE]">
        <div class="flex flex-col gap-1.5">
          <h1 class="text-[#142137] font-poppins text-lg font-semibold leading-none">Cecil Hipplington</h1>
          <p class="text-[rgba(20,33,55,0.70)] font-poppins text-sm font-medium leading-relaxed uppercase">
            CEO & Owner
          </p>
        </div>

        <!-- Share Button -->
        <div class="relative">
          <a href="#" class="block">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/share.png" alt="Share" class="w-12 h-12 group-hover:hidden transition-opacity" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sharehover.png" alt="Share Hover" class="w-12 h-12 hidden group-hover:block" />
          </a>

          <!-- Social Icons (appear on hover) -->
          <div class="absolute top-[-10rem] right-0 space-y-2 opacity-0 group-hover:opacity-100 transition-all duration-300">
            <a href="#" class="block hover:scale-110 transition-transform">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.png" class="w-12 h-12" alt="Facebook" />
            </a>
            <a href="#" class="block hover:scale-110 transition-transform">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/twiter.png" class="w-12 h-12" alt="Twitter" />
            </a>
            <a href="#" class="block hover:scale-110 transition-transform">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/linkedin.png" class="w-12 h-12" alt="LinkedIn" />
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Team Card 2 -->
    <div class="relative w-full aspect-[378/470] max-w-[24rem] mx-auto overflow-hidden group bg-white shadow-lg hover:shadow-xl transition-shadow duration-300">
      <!-- Image -->
      <div class="w-full aspect-[378/370]">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team2.png" alt="Team Member" class="w-full h-full object-cover" />
      </div>

      <!-- Card Body -->
      <div class="flex justify-between items-center px-6 py-6 bg-[#ECF2FE]">
        <div class="flex flex-col gap-1.5">
          <h1 class="text-[#142137] font-poppins text-lg font-semibold leading-none">Cecil Hipplington</h1>
          <p class="text-[rgba(20,33,55,0.70)] font-poppins text-sm font-medium leading-relaxed uppercase">
            CEO & Owner
          </p>
        </div>

        <!-- Share Button -->
        <div class="relative">
          <a href="#" class="block">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sharehover.png" alt="Share Hover" class="w-12 h-12" />
          </a>

          <!-- Social Icons (appear on hover) -->
          <div class="absolute top-[-10rem] right-0 space-y-2 opacity-100 group-hover:opacity-100 transition-all duration-300">
            <a href="#" class="block hover:scale-110 transition-transform">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.png" class="w-12 h-12" alt="Facebook" />
            </a>
            <a href="#" class="block hover:scale-110 transition-transform">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/twiter.png" class="w-12 h-12" alt="Twitter" />
            </a>
            <a href="#" class="block hover:scale-110 transition-transform">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/linkedin.png" class="w-12 h-12" alt="LinkedIn" />
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Team Card 3 -->
    <div class="relative w-full aspect-[378/470] max-w-[24rem] mx-auto overflow-hidden group bg-white shadow-lg hover:shadow-xl transition-shadow duration-300">
      <!-- Image -->
      <div class="w-full aspect-[378/370]">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team3.png" alt="Team Member" class="w-full h-full object-cover" />
      </div>

      <!-- Card Body -->
      <div class="flex justify-between items-center px-6 py-6 bg-[#ECF2FE]">
        <div class="flex flex-col gap-1.5">
          <h1 class="text-[#142137] font-poppins text-lg font-semibold leading-none">Cecil Hipplington</h1>
          <p class="text-[rgba(20,33,55,0.70)] font-poppins text-sm font-medium leading-relaxed uppercase">
            CEO & Owner
          </p>
        </div>

        <!-- Share Button -->
        <div class="relative">
          <a href="#" class="block">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/share.png" alt="Share" class="w-12 h-12 group-hover:hidden transition-opacity" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sharehover.png" alt="Share Hover" class="w-12 h-12 hidden group-hover:block" />
          </a>

          <!-- Social Icons (appear on hover) -->
          <div class="absolute top-[-10rem] right-0 space-y-2 opacity-0 group-hover:opacity-100 transition-all duration-300">
            <a href="#" class="block hover:scale-110 transition-transform">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.png" class="w-12 h-12" alt="Facebook" />
            </a>
            <a href="#" class="block hover:scale-110 transition-transform">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/twiter.png" class="w-12 h-12" alt="Twitter" />
            </a>
            <a href="#" class="block hover:scale-110 transition-transform">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/linkedin.png" class="w-12 h-12" alt="LinkedIn" />
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Team Card 4 -->
    <div class="relative w-full aspect-[378/470] max-w-[24rem] mx-auto overflow-hidden group bg-white shadow-lg hover:shadow-xl transition-shadow duration-300">
      <!-- Image -->
      <div class="w-full aspect-[378/370]">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team4.png" alt="Team Member" class="w-full h-full object-cover" />
      </div>

      <!-- Card Body -->
      <div class="flex justify-between items-center px-6 py-6 bg-[#ECF2FE]">
        <div class="flex flex-col gap-1.5">
          <h1 class="text-[#142137] font-poppins text-lg font-semibold leading-none">Cecil Hipplington</h1>
          <p class="text-[rgba(20,33,55,0.70)] font-poppins text-sm font-medium leading-relaxed uppercase">
            CEO & Owner
          </p>
        </div>

        <!-- Share Button -->
        <div class="relative">
          <a href="#" class="block">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/share.png" alt="Share" class="w-12 h-12 group-hover:hidden transition-opacity" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sharehover.png" alt="Share Hover" class="w-12 h-12 hidden group-hover:block" />
          </a>

          <!-- Social Icons (appear on hover) -->
          <div class="absolute top-[-10rem] right-0 space-y-2 opacity-0 group-hover:opacity-100 transition-all duration-300">
            <a href="#" class="block hover:scale-110 transition-transform">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.png" class="w-12 h-12" alt="Facebook" />
            </a>
            <a href="#" class="block hover:scale-110 transition-transform">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/twiter.png" class="w-12 h-12" alt="Twitter" />
            </a>
            <a href="#" class="block hover:scale-110 transition-transform">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/linkedin.png" class="w-12 h-12" alt="LinkedIn" />
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- card button -->
  <div class="cart-btn flex justify-center items-center mx-auto pt-8">
    <svg xmlns="http://www.w3.org/2000/svg" width="86" height="26" viewBox="0 0 86 26" fill="none">
      <circle opacity="0.2" cx="81" cy="13" r="5" fill="#142137" />
      <circle opacity="0.2" cx="61" cy="13" r="5" fill="#142137" />
      <circle cx="33" cy="13" r="13" fill="#4375E7" />
      <circle cx="33" cy="13" r="3" fill="white" />
      <circle opacity="0.2" cx="5" cy="13" r="5" fill="#142137" />
    </svg>
  </div>
</section>

<?php get_footer();?>