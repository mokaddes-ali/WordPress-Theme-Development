<!DOCTYPE html>
<html style="scroll-behavior: smooth;" <?php language_attributes(); ?> class="no-js">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
get_template_part('sections/header-top');
$header_logo = get_theme_mod('header_logo', get_template_directory_uri() . '/assets/images/Logo (1).png');
$header_class = get_theme_mod('menu_position', 'left_logo');
$button_text = get_theme_mod('header_button_text', 'Schedule a Pickup');
$button_url = get_theme_mod('header_button_url', '#');
?>

<header class="w-full z-50 bg-white shadow-sm">
    <div class="custom-container mx-auto flex items-center justify-between py-3 px-4 md:px-6">
        
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

        <!-- Mobile Menu -->
        <div class="md:hidden flex items-center gap-1">
            
            <!-- Mobile Header Button -->
             <!-- Mobile Header Button -->
    <a href="<?php echo esc_url($button_url); ?>"
       class="relative flex items-center px-3 py-2 rounded-md text-[12px] font-normal text-[#142137] border border-gray-300 bg-white overflow-hidden group hover:text-white">

        <!-- Background animation -->
        <span class="absolute inset-0 bg-black -translate-x-full group-hover:translate-x-0 transition-transform duration-500"></span>

        <!-- Text + Icon on same line -->
        <span class="relative z-10 flex items-center gap-1">
            <?php echo esc_html($button_text); ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                <path d="M1 7.00056L13 7.00056" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M8 13.0002L14 7.00016L8 1.00016" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </span>
    </a>
            <!-- Hamburger -->
            <button id="menuBtn" class="p-2 z-50">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Fullscreen Menu -->
    <div id="navPhone" class="mobile-menu fixed inset-0 bg-black/90 flex flex-col items-center justify-center gap-8 text-white text-xl opacity-0 invisible scale-95 transition-all duration-500">
        <button id="menuClose" class="absolute top-6 right-6 text-white p-2">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <?php
        wp_nav_menu([
            'theme_location' => 'laundryclean_mobile_menu',
            'container' => false,
            'menu_class' => 'flex flex-col items-center gap-8',
            'fallback_cb' => false,
        ]);
        ?>
    </div>
</header>

<main>
