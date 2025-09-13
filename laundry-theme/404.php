<?php 
/**
 * 404 Page design
 */

get_header();
?>
<section class="relative w-full h-[300px] md:h-[400px] flex flex-col items-center justify-center bg-gradient-to-b from-gray-50 to-gray-100 px-6 lg:px-16 text-center">
  
  <!-- Icon -->
  <div class="mb-2">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 text-[#142137] animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 9.75l4.5 4.5M14.25 9.75l-4.5 4.5" />
      <circle cx="12" cy="12" r="10" stroke="#142137" stroke-width="2"/>
    </svg>
  </div>

  <!-- Heading -->
  <h1 class="text-4xl sm:text-6xl font-extrabold text-gray-900 mb-2">
    <?php echo __('404 - Page Not Found', 'laundryclean'); ?>
  </h1>

  <!-- Description -->
  <p class="text-gray-600 text-lg sm:text-xl mb-10 max-w-2xl">
    <?php echo __('Oops! The page you are looking for does not exist. You can go back to the homepage.', 'laundryclean'); ?>
  </p>

  <!-- Button -->
  <a href="<?php echo esc_url(home_url('/')); ?>" class="relative inline-flex items-center px-8 py-4 bg-gradient-to-r from-[#142137] to-[#1f3a8a] text-white font-semibold text-lg rounded-full overflow-hidden group hover:from-[#1f3a8a] hover:to-[#142137] transition-all duration-500 shadow-lg">
    
    <!-- Background hover animation -->
    <span class="absolute inset-0 bg-white -translate-x-full group-hover:translate-x-0 transition-transform duration-500 ease-in-out opacity-10 rounded-full"></span>

    <!-- Text + Icon -->
    <span class="relative z-10 flex items-center gap-3">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
      </svg>
      <?php echo __('Go Back Home', 'laundryclean'); ?>
    </span>
  </a>
</section>



<?php get_footer();?>