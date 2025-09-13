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
<section class="w-full bg-[#FFF] mx-auto relative px-[5%] lg:px-[8%] 2xl:px-[10%] pt-5 md:pt-6 lg:pt-8 flex flex-col md:flex-row gap-8 md:gap-5 lg:gap-[50px] 2xl:gap-20">

  <!-- About Left -->
  <div class="flex flex-col items-center md:items-start gap-3 md:gap-4 2xl:gap-6 w-full md:w-6/12">

    <!-- Small Top Label -->
    <div class="border border-[rgba(20,33,55,0.14)] flex items-center gap-2 text-[13px] sm:text-[14px] md:text-[15px] font-medium text-[rgba(20,33,55,0.70)] py-1.5 px-3 font-poppins">
      <span class="w-[6px] h-[6px] rounded-full bg-[#142137] flex-shrink-0"></span>
      <?php if($about_title): echo esc_html($about_title); endif; ?>
    </div>

    <!-- Heading -->
    <h1 class="text-[#142137] w-full text-center md:text-left font-poppins 
              text-[22px] sm:text-[28px] xl:text-[38px] 
              font-semibold leading-tight sm:leading-snug lg:leading-[48px] tracking-tight">
      <?php if($about_subtitle): echo esc_html($about_subtitle); endif; ?>
    </h1>

    <!-- Description -->
    <p class="text-[rgba(20,33,55,0.70)] text-center md:text-left font-poppins 
              text-[14px] sm:text-[15px] md:text-[16px] 
              leading-relaxed max-w-[95%]">
      <?php if($about_description): echo esc_html($about_description); endif; ?>
    </p>

  <!-- Animated Button -->
<a href="<?php echo esc_url($about_button_url); ?>" 
   class="relative inline-flex items-center justify-center gap-2 
          py-3 px-6 text-[13px] sm:text-[14px] md:text-[15px] font-poppins font-medium
          overflow-hidden rounded-lg group border border-[rgba(20,33,55,0.14)]">

  <!-- Background Animation -->
  <span class="absolute inset-0 bg-[#4375E7] group-hover:bg-black 
               -translate-x-full group-hover:translate-x-0 
               transition-all duration-500 ease-in-out">
  </span>

  <!-- Text + Icon -->
  <span class="relative z-10 flex items-center gap-2 text-black group-hover:text-white transition-colors duration-300">
    <?php if($about_button_text): echo esc_html($about_button_text); endif; ?>
    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
      <path d="M1 7.00049L13 7.00049" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M8 13.0001L14 7.00012L8 1.00012" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
  </span>
</a>


    <!-- Image + Card -->
    <div class="relative">
      <!-- Left Image -->
      <div class="w-full h-[280px] sm:h-[300px] md:h-[260px] lg:h-[320px] overflow-hidden shadow-md">
        <?php if($about_left_image): ?>
          <img src="<?php echo esc_url($about_left_image); ?>" alt="about image" 
               class="w-full h-full object-cover transition-transform duration-500 hover:scale-95" />
        <?php endif; ?>
      </div>

      <!-- Experience Card -->
      <div class="absolute top-[40%] right-[-10%] sm:right-[-20%] md:right-[-50%] w-[150px] sm:w-[210px] md:w-[230px] lg:w-[250px] 
                  h-[160px] sm:h-[180px] md:h-[200px] lg:h-[200px] bg-white border border-[rgba(7,11,19,0.14)] 
                  shadow-xl p-4 sm:p-5 flex flex-col justify-center">
        <!-- Top Circle -->
        <div class="absolute top-6 right-[15%] sm:right-[8%]">
          <div class="w-[60px] sm:w-[70px] lg:w-[80px] h-[60px] sm:h-[70px] lg:h-[80px] rounded-full bg-[#EBEFF3] flex items-center justify-center">
          </div>
          <h3 class="text-[#142137] ml-[20%] mt-[-80%] sm:-mt-[70%] md:-mt-[60%] max-w-[20px] font-poppins text-[12px] sm:text-[13px] lg:text-[14px] font-medium">
              <?php if($about_experience_year_text): echo esc_html($about_experience_year_text); endif; ?>
        </h3>
        </div>

        <!-- Number -->
        <div class="absolute top-[20%] right-[50%] sm:right-[30%] counter text-[#142137] font-poppins font-semibold 
                    text-[60px] sm:text-[80px] md:text-[100px] lg:text-[120px] leading-none opacity-90"
             data-count="<?php if($about_experience_year) echo esc_html($about_experience_year); ?>">
          0
        </div>
      </div>
    </div>
  </div>

  <!-- About Right -->
  <div class="about-right w-full items-center justify-start md:justify-center md:w-6/12 relative flex flex-col h-[250px] sm:h-[300px] md:h-auto">

    <!-- circle text -->
    <div class="text-circle flex flex-wrap gap-[15px] md:gap-[20px] lg:gap-[25px] 2xl:pb-16">
      <div class="grid grid-cols-3 gap-6 justify-items-center">
        <!-- First Circle -->
        <div class="rounded-full border border-gray-300 flex flex-col justify-center items-center 
                    text-center w-[85px] h-[85px] sm:w-[110px] sm:h-[110px] md:w-[130px] md:h-[130px] 
                    lg:w-[150px] lg:h-[150px] xl:w-[170px] xl:h-[170px] p-3 sm:p-4 lg:p-6 shadow-md bg-white">
          <h2 class="counter text-[#142137] font-poppins text-[16px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] font-semibold tracking-tight uppercase"
              data-count="<?php echo esc_html($about_first_counter); ?>"
              data-suffix="<?php echo esc_html($about_first_counter_suffix); ?>">0</h2>
          <p class="text-[rgba(20,33,55,0.70)] font-poppins text-center text-[10px] sm:text-[12px] md:text-[14px] lg:text-[15px] leading-tight max-w-[90px] mt-1 sm:mt-2">
            <?php echo esc_html($about_first_counter_text); ?>
          </p>
        </div>

        <!-- Second Circle -->
        <div class="rounded-full border border-gray-300 flex flex-col justify-center items-center 
                    text-center w-[85px] h-[85px] sm:w-[110px] sm:h-[110px] md:w-[130px] md:h-[130px] 
                    lg:w-[150px] lg:h-[150px] xl:w-[170px] xl:h-[170px] p-3 sm:p-4 lg:p-6 shadow-md bg-white">
          <h2 class="counter text-[#142137] font-poppins text-[16px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] font-semibold tracking-tight uppercase"
              data-count="<?php echo esc_html($about_second_counter); ?>"
              data-suffix="<?php echo esc_html($about_second_counter_suffix); ?>">0</h2>
          <p class="text-[rgba(20,33,55,0.70)] font-poppins text-center text-[10px] sm:text-[12px] md:text-[14px] lg:text-[15px] leading-tight max-w-[90px] mt-1 sm:mt-2">
            <?php echo esc_html($about_second_counter_text); ?>
          </p>
        </div>

        <!-- Third Circle -->
        <div class="rounded-full border border-gray-300 flex flex-col justify-center items-center 
                    text-center w-[85px] h-[85px] sm:w-[110px] sm:h-[110px] md:w-[130px] md:h-[130px] 
                    lg:w-[150px] lg:h-[150px] xl:w-[170px] xl:h-[170px] p-3 sm:p-4 lg:p-6 shadow-md bg-white">
          <h2 class="counter text-[#142137] font-poppins text-[16px] sm:text-[20px] md:text-[24px] lg:text-[28px] xl:text-[32px] font-semibold tracking-tight uppercase"
              data-count="<?php echo esc_html($about_third_counter); ?>"
              data-suffix="<?php echo esc_html($about_third_counter_suffix); ?>">0</h2>
          <p class="text-[rgba(20,33,55,0.70)] font-poppins text-center text-[10px] sm:text-[12px] md:text-[14px] lg:text-[15px] leading-tight max-w-[90px] mt-1 sm:mt-2">
            <?php echo esc_html($about_third_counter_text); ?>
          </p>
        </div>
      </div>
    </div>

  <!-- Bottom Centered Image -->
<div class="absolute bottom-0 left-1/2 w-[300px] sm:w-[350px] md:w-[300px] lg:w-[400px] 2xl:w-[480px] transform -translate-x-1/2">
  <?php if($about_right_image): ?>
    <img src="<?php echo esc_url($about_right_image); ?>" alt="about image" class="w-full h-full object-cover shadow-lg" />
  <?php endif; ?>
</div>

  </div>
</section>
