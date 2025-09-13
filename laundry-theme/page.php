<?php 
get_header();
?>
<?php 
get_template_part('sections/pagesTitle');
?>

<section class="relative mx-auto w-full px-[5%] lg:px-[7.5%] py-12 flex flex-col items-center justify-center text-center bg-gradient-to-b from-gray-50 to-gray-100 rounded-xl shadow-xl">
  <!-- Heading -->
  <h1 class="text-3xl sm:text-5xl font-extrabold text-gray-900 mb-4">
    <?php echo __('Oh no! This page is not working right now.', 'laundryclean'); ?>
  </h1>

  <!-- Description -->
  <p class="text-gray-600 mb-10 sm:mb-12 text-lg sm:text-xl max-w-2xl">
    <?php echo __('It seems something went wrong. You can go back to the homepage.', 'laundryclean'); ?>
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
<?php get_footer(); ?>