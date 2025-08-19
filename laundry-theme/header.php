<!DOCTYPE html>
<html style="scroll-behavior: smooth;" <?php language_attributes();?> >
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name');?>- <?php bloginfo('description');?></title>
  


<?php wp_head();?>
</head>
<body <?php body_class();?>></body>

<?php 
get_template_part('sections/header-top');
?>

<!-- header  -->
<header class="header absolute top-[90px left-0 w-full z-50 px-[2.5%] lg:px-[5%] 2xl:px-[8%] py-3 md:py-[20px] flex items-center justify-between gap-12 md:gap-3 2xl:gap-32">
  <!-- logo -->
  <div class="logo w-4/12 md:w-2/12 h-[40px] flex items-center">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo (1).png" />
  </div>

  <!-- Navbar menu -->
  <div class="hidden md:flex w-full md:w-8/12 lg:w-7/12 items-center justify-center">
    <nav class="laundry_header-menu bg-white flex items-center justify-center gap-4 lg:gap-6 2xl:gap-12 w-full py-2 pl-[4px] h-[21px]">
     <?php
     wp_nav_menu(array(
         'theme_location' => 'header_menu',
         'fallback_cb' => function(){
            echo ' <ul class="flex justify-center text-[#142137] font-medium text-[16px] font-poppins hover:text-blue-600 transition">
        <li><a href="#" class="flex items-center gap-[4px] hover:text-blue-600 transition">Home
            <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
              </svg>
            </span>
          </a></li>
        <li class="pl-[32px]"><a href="#" class="">About Us</a></li>
        <li class="pl-[60px]"><a href="#" class="flex items-center gap-[16px] hover:text-blue-600 transition">Service
            <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
              </svg>
            </span>
          </a></li>
        <li class="pl-[27px]"><a href="#" class=" flex items-center  gap-[22px] hover:text-blue-600 transition">Pages
            <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
              </svg>
            </span>
          </a></li>
        <li class="pl-[22px]"><a href="#" class="flex items-center  gap-[30px] hover:text-blue-600 transition">Blog
            <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
              </svg>
            </span>
          </a></li>
        <li class="pl-[13px]"><a href="#" class="hover:text-blue-600 transition">Contact</a></li>
      </ul>';
         }
     ));
     ?>
    </nav>
  </div>

  <!-- nav button -->
  <div class="navbar-btn w-4/12 md:w-2/12 lg:w-3/12 -mt-[3px] flex items-center md:justify-between lg:justify-end">
    <button
      class="w-auto p-4 h-[44px] flex items-center gap-1 md:gap-2 border border-[rgba(20,33,55,0.14)] text-[#142137] font-poppins text-sm md:text-[15px] font-medium rounded">
      Schedule a Pickup
      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
        <path d="M1 7.00056L13 7.00056" stroke="#142137" stroke-width="1.5" stroke-linecap="round"
          stroke-linejoin="round" />
        <path d="M8 13.0002L14 7.00016L8 1.00016" stroke="#142137" stroke-width="1.5" stroke-linecap="round"
          stroke-linejoin="round" />
      </svg>
    </button>
  </div>

  <!-- Mobile Nav Button -->
  <div class="flex md:hidden">
    <button id="menuBtn" class="menu-btn text-black z-50">
      <!-- Open Icon -->
      <svg id="openIcon" xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M4 6h16M4 12h16M4 18h16" />
      </svg>
      <!-- Close Icon -->
      <svg id="closeIcon" xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 hidden" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
  </div>
</header>

<!-- Fullscreen Circle Nav -->
<div id="navPhone"
  class="fixed top-36 left-0 w-full h-full flex flex-col  items-center 
       bg-black/80 text-white opacity-0 invisible scale-100 pt-5
       transition-all duration-700 ease-in-out z-40">
  <ul class="space-y-6 text-2xl font-semibold">
    <li><a href="#" class="hover:text-orange-400">Home</a></li>
    <li><a href="#" class="hover:text-orange-400">About</a></li>
    <li><a href="#" class="hover:text-orange-400">Services</a></li>
    <li><a href="#" class="hover:text-orange-400">Portfolio</a></li>
    <li><a href="#" class="hover:text-orange-400">Contact</a></li>
  </ul>
</div>
