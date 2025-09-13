<!DOCTYPE html>
<html style="scroll-behavior: smooth;" <?php language_attributes(); ?> class="no-js">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> class="m-0 p-0 bg-[#FFFFFF]">

<?php
get_template_part('sections/header-top');
$header_logo = get_theme_mod('header_logo', get_template_directory_uri() . '/assets/images/Logo (1).png');
$header_class = get_theme_mod('menu_position', 'left_logo');
$button_text = get_theme_mod('header_button_text', 'Schedule a Pickup');
$button_url = get_theme_mod('header_button_url', '#');
?>

<header class="w-full z-50 bg-white shadow-sm">
    <div class="mx-auto w-[90%] lg:w-[85%] flex items-center justify-between py-3">
        <!-- Logo -->
        <div class="flex items-center">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php if ($header_logo): ?>
                    <img src="<?php echo esc_url($header_logo); ?>" alt="<?php esc_attr_e('Logo', 'laundryclean'); ?>" class="h-[30px] md:h-[40px]">
                <?php endif; ?>
            </a>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center gap-6">
            <nav class="flex items-center gap-6">
                <?php
                wp_nav_menu([
                    'theme_location' => 'laundryclean_header_menu',
                    'container' => false,
                    'menu_class' => 'flex items-center gap-6',
                    'fallback_cb' => false,
                ]);
                ?>
            </nav>

            <!-- Header Button -->
            <a href="<?php echo esc_url($button_url); ?>"
               class="relative px-5 py-2 rounded-md font-medium text-[#142137] border border-gray-300 bg-white overflow-hidden group hover:text-white">
               
                <span class="absolute inset-0 bg-black -translate-x-full group-hover:translate-x-0 transition-transform duration-500"></span>
                
                <span class="relative flex items-center gap-2 z-10">
                    <?php echo esc_html($button_text); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                        <path d="M1 7.00056L13 7.00056" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M8 13.0002L14 7.00016L8 1.00016" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
            </a>
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
                            <?php if ($button_text): ?>
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
                        <svg id="openIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>


                </div>
              <!-- Fullscreen Menu -->
<div id="navPhone"
    class="mobile-menu fixed top-10 left-0 w-full h-[120px] p-5 
           bg-black/90  text-white text-xl 
           opacity-0 invisible scale-95 
           transition-all duration-500 ease-in-out z-40">

    <!-- Top Close Button -->
    <button id="menuClose" class="absolute top-4 right-4 p-2 text-white">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <!-- Menu Items -->
    <?php 
    wp_nav_menu(array(
        'theme_location' => 'laundryclean_mobile_menu',
        'menu_class'     => 'flex mt-[-80%] ml-[50%] flex-col items-start text-white text-lg',
        'container'      => false,
        'fallback_cb'    => false
    )); 
    ?>
</div>

            </div>
        </div>
</header>

<main>
