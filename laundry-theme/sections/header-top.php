<?php 
/**
 * Header Top Section
 *
 * @package LaundryTheme
 */
?>

<!-- Navbar Top -->
<section class="header-top w-full px-[10%] md:px-[15%] lg:px-[5%] 2xl:px-[8%] py-[0.625rem] bg-[#4375E7] h-[4rem] lg:h-[3.375rem] flex flex-col gap-3 lg:gap-4 items-center lg:flex-row lg:justify-between">  

  <!-- left -->
<div class="follow-liink flex w-full justify-between lg:justify-start items-center lg:gap-[1.25rem]">
  
  <!-- Social Icons -->
  <div class="social-icon flex items-center justify-center gap-2  xl:gap-[1.125rem]">
    <h3 class="text-white font-poppins text-xs sm:text-sm  md:text-base font-medium leading-none">
      <?php echo esc_html_e('Follow Us:', 'laundryclean'); ?>
    </h3>
      <!-- Facebook -->
   <a href="<?php echo esc_url(get_theme_mod('company_facebook')); ?>" target="_blank" rel="noopener noreferrer">
    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" fill="none">
        <path opacity="0.5"
          d="M7.7 0H5.6C4.67174 0 3.7815 0.368749 3.12513 1.02513C2.46875 1.6815 2.1 2.57174 2.1 3.5V5.6H0V8.4H2.1V14H4.9V8.4H7L7.7 5.6H4.9V3.5C4.9 3.31435 4.97375 3.1363 5.10503 3.00503C5.2363 2.87375 5.41435 2.8 5.6 2.8H7.7V0Z"
          fill="white" />
      </svg>
   </a>
   <!-- Linkedin -->
   <a href="<?php echo esc_url(get_theme_mod('company_linkedin')); ?>" target="_blank" rel="noopener noreferrer">
     <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
        <path
          d="M10.3117 4.42106C11.4842 4.42106 12.6087 4.88684 13.4378 5.71595C14.2669 6.54506 14.7327 7.66957 14.7327 8.84211V14H11.7854V8.84211C11.7854 8.45126 11.6301 8.07643 11.3537 7.80006C11.0774 7.52369 10.7025 7.36842 10.3117 7.36842C9.92083 7.36842 9.54599 7.52369 9.26962 7.80006C8.99325 8.07643 8.83799 8.45126 8.83799 8.84211V14H5.89062V8.84211C5.89062 7.66957 6.35641 6.54506 7.18552 5.71595C8.01463 4.88684 9.13914 4.42106 10.3117 4.42106Z"
          fill="white" />
        <path d="M2.94737 5.15775H0V13.9998H2.94737V5.15775Z" fill="white" />
        <path
          d="M1.47368 2.94737C2.28758 2.94737 2.94737 2.28758 2.94737 1.47368C2.94737 0.659791 2.28758 0 1.47368 0C0.659791 0 0 0.659791 0 1.47368C0 2.28758 0.659791 2.94737 1.47368 2.94737Z"
          fill="white" />
      </svg>
    </a>
   <!-- Twitter -->
   <a href="<?php echo esc_url(get_theme_mod('company_twitter')); ?>" target="_blank" rel="noopener noreferrer">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12" fill="none">
        <path opacity="0.5"
          d="M15.5294 0.00672484C14.8534 0.458456 14.105 0.803959 13.3129 1.02993C12.8878 0.566818 12.3228 0.238578 11.6944 0.0896016C11.0659 -0.0593751 10.4044 -0.021901 9.79912 0.196956C9.19388 0.415812 8.67419 0.805492 8.31034 1.31329C7.94649 1.82109 7.75602 2.42251 7.76471 3.0362V3.70496C6.52421 3.73544 5.29502 3.47478 4.18659 2.94622C3.07817 2.41765 2.12493 1.63758 1.41176 0.675484C1.41176 0.675484 -1.41176 6.69432 4.94118 9.36935C3.48743 10.3043 1.75564 10.773 0 10.7069C6.35294 14.0507 14.1176 10.7069 14.1176 3.01614C14.117 2.82986 14.0981 2.64404 14.0612 2.46107C14.7816 1.78796 15.29 0.938114 15.5294 0.00672484Z"
          fill="white" />
      </svg>
   </a>

  <!-- Pinterest -->
   <a href="<?php echo esc_url(get_theme_mod('company_pinterest')); ?>" target="_blank" rel="noopener noreferrer">
      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
        <path opacity="0.5"
          d="M7.50631 0C3.36066 0 0 3.35508 0 7.49385C0 10.6702 1.97701 13.384 4.76925 14.4756C4.70087 13.8838 4.646 12.9706 4.7936 12.3231C4.92947 11.7369 5.67074 8.59746 5.67074 8.59746C5.67074 8.59746 5.4486 8.14746 5.4486 7.4874C5.4486 6.44502 6.054 5.66807 6.80759 5.66807C7.44997 5.66807 7.75927 6.14941 7.75927 6.72305C7.75927 7.36436 7.35166 8.32676 7.13509 9.22119C6.95608 9.96738 7.51189 10.5779 8.24699 10.5779C9.58163 10.5779 10.6073 9.17168 10.6073 7.14844C10.6073 5.35342 9.31635 4.10156 7.46904 4.10156C5.3318 4.10156 4.07728 5.69912 4.07728 7.35205C4.07728 7.99336 4.32466 8.68447 4.63308 9.06094C4.69559 9.13418 4.70205 9.20215 4.68326 9.27598C4.62751 9.51035 4.49809 10.0222 4.47286 10.1273C4.44204 10.263 4.36134 10.2935 4.21931 10.2261C3.28025 9.78809 2.69305 8.4249 2.69305 7.321C2.69305 4.9585 4.41035 2.78789 7.65392 2.78789C10.2551 2.78789 12.2808 4.63857 12.2808 7.11797C12.2808 9.59736 10.6501 11.7812 8.38873 11.7812C7.62868 11.7812 6.91177 11.3862 6.67143 10.9175C6.67143 10.9175 6.29463 12.348 6.2019 12.6999C6.03551 13.3535 5.57772 14.168 5.269 14.6675C5.97388 14.8825 6.71574 15 7.49399 15C11.6396 15 15.0003 11.6449 15.0003 7.50615C15.0123 3.35508 11.652 0 7.50631 0Z"
          fill="white" />
      </svg>
   </a>
  </div>

  <!-- Location for mobile, sm, md device -->
  <div class="location flex items-center gap-1 sm:gap-2 lg:gap-[0.4375rem] pr-[10px] border-r border-white/25 lg:hidden">
     <svg xmlns="http://www.w3.org/2000/svg" width="13" height="16" viewBox="0 0 13 16" fill="none">
        <path
          d="M0.141069 4.88781C1.62473 -1.63429 11.2874 -1.62676 12.7635 4.89534C13.6296 8.72124 10.3086 12.9009 8.22238 14.9042C6.70859 16.3653 6.19599 16.3653 4.67467 14.9042C2.59604 12.9009 -0.72503 8.71371 0.141069 4.88781Z"
          fill="white" />
        <path
          d="M6.45206 8.60897C7.7498 8.60897 8.80182 7.55694 8.80182 6.25921C8.80182 4.96147 7.7498 3.90944 6.45206 3.90944C5.15432 3.90944 4.10229 4.96147 4.10229 6.25921C4.10229 7.55694 5.15432 8.60897 6.45206 8.60897Z"
          fill="#4375E7" />
      </svg>
      <h3 class="text-white font-poppins text-xs sm:text-sm lg:text-[0.9375rem] font-medium leading-none whitespace-nowrap">
        <?php echo esc_html(get_theme_mod('company_address', 'Holland, London 7QU UK')); ?>
      </h3>
  </div>
</div>

<!-- right -->
<div class="contact-info relative flex flex-row items-center justify-center gap-2 sm:gap-3 md:gap-6 lg:gap-[1.25rem]">

  <!-- Location  Location for lg or large device -->
  <div class="location hidden lg:flex items-center gap-1 sm:gap-2 lg:gap-[0.4375rem] pr-[10px] border-r border-white/25">
     <svg xmlns="http://www.w3.org/2000/svg" width="13" height="16" viewBox="0 0 13 16" fill="none">
        <path
          d="M0.141069 4.88781C1.62473 -1.63429 11.2874 -1.62676 12.7635 4.89534C13.6296 8.72124 10.3086 12.9009 8.22238 14.9042C6.70859 16.3653 6.19599 16.3653 4.67467 14.9042C2.59604 12.9009 -0.72503 8.71371 0.141069 4.88781Z"
          fill="white" />
        <path
          d="M6.45206 8.60897C7.7498 8.60897 8.80182 7.55694 8.80182 6.25921C8.80182 4.96147 7.7498 3.90944 6.45206 3.90944C5.15432 3.90944 4.10229 4.96147 4.10229 6.25921C4.10229 7.55694 5.15432 8.60897 6.45206 8.60897Z"
          fill="#4375E7" />
      </svg>

    <h3 class="text-white font-poppins text-xs sm:text-sm lg:text-[0.9375rem] font-medium leading-none whitespace-nowrap">
      <?php echo esc_html(get_theme_mod('company_address', 'Holland, London 7QU UK')); ?>
    </h3>
  </div>

  <!-- Contact Number -->
  <div class="contact-number flex items-center gap-1 sm:gap-2 lg:gap-[0.4375rem] pr-[10px] border-r border-white/25">
    <!-- svg -->
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
        <path
          d="M15.9995 11.9791V14.3877C16.0004 14.6113 15.9545 14.8327 15.8648 15.0375C15.775 15.2424 15.6434 15.4263 15.4783 15.5775C15.3132 15.7286 15.1183 15.8437 14.906 15.9154C14.6938 15.987 14.4689 16.0136 14.2457 15.9935C11.7702 15.725 9.39235 14.8808 7.30312 13.5286C5.35937 12.2959 3.71141 10.6512 2.47627 8.71134C1.11669 6.61679 0.270593 4.23206 0.00652969 1.75036C-0.0135738 1.52834 0.0128649 1.30457 0.0841619 1.0933C0.155459 0.882034 0.270052 0.687898 0.420646 0.523253C0.57124 0.358607 0.754535 0.22706 0.958861 0.136987C1.16319 0.0469136 1.38407 0.000287778 1.60744 7.78413e-05H4.02086C4.41128 -0.00375708 4.78977 0.134222 5.0858 0.388297C5.38182 0.642373 5.57517 0.995207 5.62981 1.38103C5.73168 2.15185 5.92059 2.9087 6.19295 3.63713C6.30118 3.9245 6.32461 4.23682 6.26045 4.53707C6.19629 4.83732 6.04723 5.11292 5.83093 5.33121L4.80925 6.35087C5.95446 8.36092 7.62206 10.0252 9.6361 11.1682L10.6578 10.1485C10.8765 9.93264 11.1527 9.78387 11.4535 9.71984C11.7544 9.6558 12.0673 9.67918 12.3552 9.78721C13.0851 10.059 13.8435 10.2476 14.6158 10.3492C15.0066 10.4042 15.3635 10.6007 15.6186 10.9012C15.8737 11.2017 16.0093 11.5853 15.9995 11.9791Z"
          fill="white" />
      </svg>
     <!-- Phone number link -->
    <a href="tel:<?php echo esc_html(get_theme_mod('company_phone', '2349873543670')); ?>" 
       class="text-white w-[10.75rem] font-poppins text-xs sm:text-sm lg:text-[0.9375rem] font-medium leading-none whitespace-nowrap">
       <?php echo esc_html(get_theme_mod('company_phone', '(234) 987 - 354 - 3670')); ?>
    </a>
  </div>

  <!-- Email -->
  <div class="email flex items-center gap-1 sm:gap-2 lg:gap-[0.375rem]">
    <!-- svg -->
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" viewBox="0 0 20 14" fill="none">
        <path
          d="M2.75 0H16.75C17.7125 0 18.5 0.7875 18.5 1.75V12.25C18.5 13.2125 17.7125 14 16.75 14H2.75C1.7875 14 1 13.2125 1 12.25V1.75C1 0.7875 1.7875 0 2.75 0Z"
          fill="white" />
        <path d="M18.5 1.75L9.75 7.875L1 1.75" stroke="#4375E7" stroke-width="1.5" stroke-linecap="round"
          stroke-linejoin="round" />
      </svg>
   <a href="mailto:<?php echo get_theme_mod('company_email', 'example@gmail.com'); ?>" 
   class="text-white font-poppins text-xs sm:text-sm lg:text-[1rem] font-medium leading-none whitespace-nowrap">
    <?php echo esc_html__('Email:', 'laundryclean'); ?>
    <?php echo esc_html(get_theme_mod('company_email', 'example@gmail.com')); ?>
</a>

  </div>

</div>

</section>