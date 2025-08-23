<?php 
/**
 * 
 * 
 */
get_header();
?>
<?php 

/**
 * Blog Section
 *
 * @package LaundryTheme
 */



?>






<section class="h-screen flex items-center justify-center bg-gray-200">
  <h1 class="text-4xl font-bold">Scroll Down</h1>
</section>

<section class="h-screen flex flex-col gap-6 items-center justify-center bg-white">
  <div class="box1 w-40 h-40 bg-red-500"></div>
  <div class="box2 w-40 h-40 bg-blue-500"></div>
  <div class="box3 w-40 h-40 bg-green-500"></div>
</section>



<section class="h-screen flex flex-col items-center justify-center bg-gray-100">
  <h2 class="text-3xl font-bold mb-10">Our Achievements</h2>

  <div class="grid grid-cols-3 gap-10 text-center">
    <div>
      <h3 id="counter1" class="text-5xl font-extrabold text-orange-500">0</h3>
      <p class="mt-2 text-lg">Happy Clients</p>
    </div>
    <div>
      <h3 id="counter2" class="text-5xl font-extrabold text-green-500">0</h3>
      <p class="mt-2 text-lg">Projects Done</p>
    </div>
    <div>
      <h3 id="counter3" class="text-5xl font-extrabold text-blue-500">0</h3>
      <p class="mt-2 text-lg">Awards Won</p>
    </div>
  </div>
</section>




<?php get_footer(); ?>