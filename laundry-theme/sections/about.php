<?php
/**
 * About Section
 *
 * @package LaundryTheme 
 */

$about_title = get_theme_mod('about_title', __('About Our Company', 'laundryclean'));

$about_subtitle = get_theme_mod('about_subtitle', __('Laundry & Dry Cleaning Made Simple.', 'laundryclean'));

$about_description = get_theme_mod('about_description', __('Revolutionized the way you think about dry cleaning and laundry. Our mission is simple: to make laundry day hassle-free. With our easy-to-use service, you can enjoy the convenience of professional dry cleaning and laundry.', 'laundryclean'));

$about_button_text = get_theme_mod('about_button_text', __('Discover More', 'laundryclean'));

$about_button_url = get_theme_mod('about_button_url', __('http://localhost/wordpress/', 'laundryclean'));

$about_experience_year = get_theme_mod('about_experience_year', __('14', 'laundryclean'));

$about_experience_year_text = get_theme_mod('about_experience_year_text', __('Years Experience', 'laundryclean'));

$about_left_image = get_theme_mod('about_left_image', get_template_directory_uri() . '/assets/images/aboutleft.png');

$about_right_image = get_theme_mod('about_right_image', get_template_directory_uri() . '/assets/images/aboutright.png');

$about_first_counter = get_theme_mod('about_first_counter', __('86', 'laundryclean'));
$about_first_counter_suffix = get_theme_mod('about_first_counter_suffix', __('K', 'laundryclean'));
$about_first_counter_text = get_theme_mod('about_first_counter_text', __('Free Pickup & Delivery', 'laundryclean'));

$about_second_counter = get_theme_mod('about_second_counter', __('140', 'laundryclean'));
$about_second_counter_suffix = get_theme_mod('about_second_counter_suffix', __('+', 'laundryclean'));
$about_second_counter_text = get_theme_mod('about_second_counter_text', __('Cleaning Expert Members', 'laundryclean'));

$about_third_counter = get_theme_mod('about_third_counter', __('98', 'laundryclean'));
$about_third_counter_suffix = get_theme_mod('about_third_counter_suffix', __('%', 'laundryclean'));
$about_third_counter_text = get_theme_mod('about_third_counter_text', __('Company Award Winner', 'laundryclean'));

?>



<!-- About Company -->
<section class="w-full bg-[#FFF] mx-auto h-auto relative px-[2.5%] lg:px-[5%] 2xl:px-[8%] py-8 md:py-14 lg:py-20 flex flex-col md:flex-row gap-6 md:gap-6 lg:gap-[90px] 2xl:gap-52">

  <!-- about left -->
  <div class="flex flex-col items-center justify-center md:items-start md:justify-start gap-2 w-full md:w-6/12 md:gap-3 2xl:gap-5">

    <div class=" w-auto lg:w-[208px] h-[29px] border border-[rgba(20,33,55,0.14)] flex items-center gap-2 flex-shrink-0 text-[14px] sm:text-[14px] md:text-[16px] font-[500] leading-none text-[rgba(20,33,55,0.70)] py-2 px-[12px] font-poppins">
      <!-- Dot -->
      <span class="w-[5px] h-[5px] rounded-[10px] bg-[#142137] flex-shrink-0 aspect-square"></span>
      <?php if($about_title):?>
        <?php echo esc_html($about_title); ?>
      <?php endif; ?>
    </div>

    <h1 class=" text-[#142137] w-full text-center md:text-start font-poppins text-[32px] sm:text-[40px] xl:text-[54px] font-semibold leading-[40px] sm:leading-[48px] md:leading-[56px] lg:leading-[64px] tracking-[-0.5px] sm:tracking-[-0.8px] lg:tracking-[-1.08px]">
      <?php if($about_subtitle):?>
        <?php echo esc_html($about_subtitle); ?>
      <?php endif; ?>
    </h1>
    <p class="text-[rgba(20,33,55,0.70)] text-center md:text-start font-poppins text-[14px] sm:text-[15px] md:text-[16px] font-normal leading-[22px] sm:leading-[24px] md:leading-[26px]">
      <?php if($about_description):?>
        <?php echo esc_html($about_description); ?>
      <?php endif; ?>
    </p>

    <button class=" w-[160px] sm:w-[180px] md:w-[198px] h-[44px] sm:h-[50px] md:h-[54px] mt-[12px] sm:mt-[14px] md:mt-[16px] border border-[rgba(20,33,55,0.14)] flex items-center justify-center gap-[8px] sm:gap-[10px] flex-shrink-0 text-[#142137] font-poppins text-[13px] sm:text-[14px] md:text-[15px] font-medium leading-none">

      <a href="<?php echo esc_url($about_button_url); ?>">
          <?php if($about_button_text):?>
        <?php echo esc_html($about_button_text); ?>
      <?php endif; ?>
      </a>
  
      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
        <path d="M1 7.00049L13 7.00049" stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M8 13.0001L14 7.00012L8 1.00012" stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </button>

    <!-- image and time -->
    <div class="flex items-center mt-6">

      <!-- Image -->
      <div class=" w-full h-[350px] md:w-[240px] md:h-[320px] lg:w-[280px] lg:h-[360px] xl:w-[320px] xl:h-[400px] 2xl:w-[360px] 2xl:h-[440px] object-cover ">
        <?php if($about_left_image):?>
          <img src="<?php echo esc_url($about_left_image); ?>" alt="about image" class="w-full h-full object-cover" />
        <?php endif; ?>
      </div>

      <!-- Experience Card (Smaller & Clean) -->
<div class="w-[300px] md:w-[280px] lg:w-[320px] 
     h-[200px] md:h-[220px] lg:h-[240px] 
     -ml-[60px] sm:-ml-[80px] md:-ml-[100px] lg:-ml-[120px] 
     flex-shrink-0 border border-[rgba(20,33,55,0.14)] 
     bg-white text-[#142137] font-poppins relative 
     p-3 sm:p-4 md:p-5 z-10 shadow-md rounded-xl">

  <!-- Top Right Circle with Text -->
  <div class="absolute top-2 sm:top-3 left-16 sm:left-20 md:left-24 lg:left-28 
              w-[90px] sm:w-[110px] lg:w-[130px] 
              h-[55px] sm:h-[65px] lg:h-[75px] flex items-center relative">

    <!-- Circle -->
    <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" viewBox="0 0 90 90" fill="none">
      <circle cx="45" cy="45" r="45" fill="#EBEFF3" />
    </svg>

    <!-- Text Inside Same Container -->
    <div class="absolute w-9 right-6 sm:right-8 md:right-9 lg:right-10 
                text-[rgba(20,33,55,0.70)] font-poppins 
                text-[12px] sm:text-[14px] lg:text-[15px] 
                font-medium leading-[18px] sm:leading-[20px] lg:leading-[22px]">
      <p> 
        <?php if($about_experience_year_text):?>
          <?php echo esc_html($about_experience_year_text); ?>
        <?php endif; ?>
      </p>
    </div>
  </div>

  <!-- Large Center Number -->
  <div class="counter absolute left-[16px] sm:left-[22px] md:left-[26px] lg:left-[32px] 
              bottom-[60px] sm:bottom-[65px] md:bottom-[70px] lg:bottom-[75px] 
              text-[80px] sm:text-[110px] md:text-[140px] lg:text-[160px] 
              font-medium leading-[50px] sm:leading-[70px] md:leading-[80px] lg:leading-[90px] opacity-80"  
              data-count="<?php if($about_experience_year):?>
            <?php echo esc_html($about_experience_year); ?>
           <?php endif; ?>" 
           data-suffix=""> 0

  </div>
</div>

    </div>
  </div>

  <!-- About Right -->
  <div class="about-right w-full items-center md:w-6/12 relative py-4 sm:pb-4 md:pt-12 lg:pt-16 2xl:pt-28 flex flex-col">

    <!-- circle text -->
    <div class="text-circle flex flex-wrap justify-center gap-[15px] md:gap-[20px] lg:gap-[25px]">

      <!-- first circle -->
      <div class="w-[180px] h-[180px]  xl:w-[220px] xl:h-[220px] rounded-full border border-gray-300 flex flex-col items-center justify-center text-center py-[30px] sm:py-[40px] md:py-[50px] lg:py-[64px] px-[20px] sm:px-[30px] md:px-[40px] lg:px-[60px]">
        <div class="text -mt-[4px] sm:-mt-[6px] lg:-mt-[8px]">
         <h2 
  class="counter text-[#142137] font-poppins text-[30px] sm:text-[40px] md:text-[45px] lg:text-[50px] 
         font-semibold leading-[36px] sm:leading-[48px] md:leading-[54px] lg:leading-[60px] uppercase"
  data-count="<?php echo $about_first_counter ? esc_html($about_first_counter) : ''; ?>" 
  data-suffix="<?php echo $about_first_counter_suffix ? esc_html($about_first_counter_suffix) : ''; ?>"
>
  60
</h2>

          <p class="text-[rgba(20,33,55,0.70)] font-poppins pt-[4px] sm:pt-[6px] lg:pt-[8px] text-[12px] sm:text-[14px] lg:text-[16px] font-medium leading-[16px] sm:leading-[18px] lg:leading-[22px] text-center min-w-[80px] sm:min-w-[100px] lg:min-w-[110px] break-words">
            <?php if($about_first_counter_text):?>
              <?php echo esc_html($about_first_counter_text); ?>
            <?php endif; ?>
          </p>
        </div>
      </div>

      <!-- second circle -->
      <div class="w-[180px] h-[180px] xl:w-[220px] xl:h-[220px] rounded-full border border-gray-300 flex flex-col items-center justify-center text-center py-[30px] sm:py-[40px] md:py-[50px] lg:py-[64px] px-[20px] sm:px-[30px] md:px-[40px] lg:px-[60px]">
        <div class="text -mt-[4px] sm:-mt-[6px] lg:-mt-[8px]">
        <h2 
  class="counter text-[#142137] font-poppins text-[30px] sm:text-[40px] md:text-[45px] lg:text-[50px] 
         font-semibold leading-[36px] sm:leading-[48px] md:leading-[54px] lg:leading-[60px] uppercase"
  data-count="<?php echo $about_second_counter ? esc_html($about_second_counter) : ''; ?>"
  data-suffix="<?php echo $about_second_counter_suffix ? esc_html($about_second_counter_suffix) : ''; ?>"
>
  50
</h2>

          <p class="text-[rgba(20,33,55,0.70)] font-poppins pt-[4px] sm:pt-[6px] lg:pt-[8px] text-[12px] sm:text-[14px] lg:text-[16px] font-medium leading-[16px] sm:leading-[18px] lg:leading-[22px] text-center min-w-[90px] sm:min-w-[110px] lg:min-w-[130px] break-words">
            <?php if($about_second_counter_text):?>
              <?php echo esc_html($about_second_counter_text); ?>
            <?php endif; ?>
          </p>
        </div>
      </div>

      <!-- third circle -->
      <div class="w-[180px] h-[180px] xl:w-[220px] xl:h-[220px] rounded-full border border-gray-300 flex flex-col items-center justify-center text-center py-[30px] sm:py-[40px] md:py-[50px] lg:py-[64px] px-[20px] sm:px-[30px] md:px-[40px] lg:px-[60px]">
        <div class="text -mt-[4px] sm:-mt-[6px] lg:-mt-[8px]">
          <h2 
  class="counter text-[#142137] font-poppins text-[30px] sm:text-[40px] md:text-[45px] lg:text-[50px] 
         font-semibold leading-[36px] sm:leading-[48px] md:leading-[54px] lg:leading-[60px] uppercase"
  data-count="<?php if($about_third_counter) echo esc_html($about_third_counter); ?>" 
  data-suffix="<?php if($about_third_counter_suffix) echo esc_html($about_third_counter_suffix); ?>"
>
  70
</h2>

          <p class="text-[rgba(20,33,55,0.70)] font-poppins pt-[4px] sm:pt-[6px] lg:pt-[8px] text-[12px] sm:text-[14px] lg:text-[16px] font-medium leading-[16px] sm:leading-[18px] lg:leading-[22px] text-center min-w-[90px] sm:min-w-[120px] lg:min-w-[140px] break-words">
            <?php if($about_third_counter_text):?>
              <?php echo esc_html($about_third_counter_text); ?>
            <?php endif; ?>
          </p>
        </div>
      </div>
    </div>

    <!-- image -->
    <div class="mt-6 ml-0 md:ml-6 md:mt-40 w-[300px] sm:w-[350px] md:w-[300px] lg:w-[400px] 2xl:w-[480px]">
      <div class="image">
        <?php if($about_right_image):?>
          <img src="<?php echo esc_url($about_right_image); ?>" alt="about image" class="w-full h-full object-cover" />
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>