<!DOCTYPE html>
<html style="scroll-behavior: smooth;" <?php language_attributes();?> class="no-js">

<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head();?>
</head>

<body <?php body_class();?>>

    <?php
       get_template_part('sections/header-top');
        $header_logo = get_theme_mod('header_logo', get_template_directory_uri() . '/assets/images/Logo (1).png');
        $header_class = get_theme_mod('menu_position', 'left_logo');
        $button_text = get_theme_mod('header_button_text', 'Schedule a Pickup');
        $button_url = get_theme_mod('header_button_url', 'http://localhost/wordpress/index.php/schedule-a-pickup/');
     ?>

    <!-- header  -->
    <header class="
    <?php if($header_class): ?>
      <?php echo esc_attr($header_class); ?>
    <?php endif; ?>
     ">

        <!-- logo -->
        <div class="w-4/12 md:w-2/12 h-[40px] flex items-center">
            <a href="<?php echo esc_url(home_url('/')); ?>">
               <?php if($header_logo): ?>
                   <img src="<?php echo esc_url($header_logo); ?>" alt="<?php esc_attr_e('Header Logo', 'laundryclean'); ?>" class="h-full">
               <?php endif; ?> 
            </a>
        </div>

        <!-- Navbar menu -->
        <div class="hidden md:flex w-full md:w-10/12 items-center justify-center gap-4 xl:gap-10">
            <nav class="laundry_header-menu bg-white flex items-center justify-center gap-4 lg:gap-6 2xl:gap-10 w-full py-2 h-[21px]">
                <?php
             wp_nav_menu(array(
            'theme_location' => 'laundryclean_header_menu',
             'fallback_cb' => function(){
              echo ' <ul class="flex justify-center items-center gap-3 lg:gap-6 xl:gap-10 text-[#142137] font-medium text-sm lg:text-base font-poppins transition">
            <li>
             <a href="#" class="flex items-center gap-1 hover:text-blue-600 transition">
              Home
             <span>
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"       stroke-width="1.5"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
               </svg>
             </span>
           </a>
        </li>
        <li class="hover:text-blue-600 transition">
          <a href="#" class="">
            About Us
          </a>
        </li>
        <li class="">
         <a href="#" class="flex items-center gap-1 hover:text-blue-600 transition">
           Service
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"   stroke-width="1.5"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
              </svg>
            </span>
          </a>
        </li>
        <li class="">
          <a href="#" class=" flex items-center  gap-1 hover:text-blue-600 transition">Pages
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
              </svg>
            </span>
          </a>
        </li>
        <li class="">
          <a href="#" class="flex items-center  gap-1 hover:text-blue-600 transition">Blog
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
              </svg>
            </span>
          </a></li>
        <li class="">
          <a href="#" class="hover:text-blue-600 transition">Contact</a>
        </li>
       </ul>';
         }
       ));
       ?>
     </nav>
            <!-- nav button -->
            <div class="navbar-btn w-64 mt-2 flex items-center md:justify-between lg:justify-end">
                <button class="relative w-full h-[44px] flex items-center justify-center gap-2 rounded-md overflow-hidden
                border border-[rgba(20,33,55,0.14)] bg-white text-[#142137] font-poppins text-sm md:text-[15px] font-medium 
                shadow-sm transition-all duration-500 ease-in-out group">

                    <!-- background animation -->
                    <span
                        class="absolute inset-0 bg-black translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-700 ease-in-out">
                    </span>

                    <!-- text & icon -->
                    <span
                        class="relative flex items-center gap-2 z-10 group-hover:text-white transition-colors duration-500">
                        <a href="<?php echo esc_url($button_url); ?>">
                            <?php if($button_text):?>
                            <?php echo esc_html($button_text); ?>
                            <?php endif; ?>
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none"
                            class="transition-all duration-300 ease-in-out">
                            <path d="M1 7.00056L13 7.00056" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M8 13.0002L14 7.00016L8 1.00016" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </button>
            </div>
        </div>



        <!-- Mobile Nav Menu and Button -->
        <div class="flex gap-6 md:hidden">
                <button class="relative w-48 p-2 h-[44px] flex items-center justify-center gap-2 rounded-md overflow-hidden
                border border-[rgba(20,33,55,0.14)] bg-white text-[#142137] font-poppins text-sm md:text-[15px] font-medium 
                shadow-sm transition-all duration-500 ease-in-out group">

                    <!-- background animation -->
                    <span
                        class="absolute inset-0 bg-black translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-700 ease-in-out">
                    </span>

                    <!-- text & icon -->
                    <span
                        class="relative flex items-center gap-2 z-10 group-hover:text-white transition-colors duration-500">
                        <a href="<?php echo esc_url($button_url); ?>">
                            <?php if($button_text):?>
                            <?php echo esc_html($button_text); ?>
                            <?php endif; ?>
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none"
                            class="transition-all duration-300 ease-in-out">
                            <path d="M1 7.00056L13 7.00056" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M8 13.0002L14 7.00016L8 1.00016" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </button>

  <!-- Mobile Nav Toggle -->
<div class="md:hidden relative">

  <!-- Hamburger Button -->
  <button id="menuBtn" class="z-50 p-2">
    <!-- Open Icon -->
    <svg id="openIcon" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
    </svg>
  </button>

  
</div>
<!-- Fullscreen Menu -->
  <div id="navPhone" class="mobile-menu absolute top-16 right-0 w-full h-screen p-5 bg-black/80 flex flex-col items-center space-y-4 text-white text-xl opacity-0 invisible scale-95 transition-all duration-500 ease-in-out z-40">
    <!-- Top Close Button -->
    <button id="menuClose" class="absolute top-0 right-0 p-2 text-white">
      <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
    <?php wp_nav_menu(array(
        'theme_location' => 'laundryclean_mobile_menu',
        'fallback_cb' => function(){
            echo '
                <a href="#" class="flex items-center gap-1 hover:text-blue-600 transition">
              Home
             <span>
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"       stroke-width="1.5"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
               </svg>
             </span>
           </a>

          <a href="#" class="">
            About Us
          </a>

         <a href="#" class="flex items-center gap-1 hover:text-blue-600 transition">
           Service
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"   stroke-width="1.5"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
              </svg>
            </span>
          </a>

          <a href="#" class=" flex items-center  gap-1 hover:text-blue-600 transition">Pages
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
              </svg>
            </span>
          </a>
          <a href="#" class="flex items-center  gap-1 hover:text-blue-600 transition">Blog
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
              </svg>
            </span>
          </a>
    
          <a href="#" class="hover:text-blue-600 transition">Contact</a>
            ';
        }
    )); ?>


  </div>

        </div>
    </header>

    <main>