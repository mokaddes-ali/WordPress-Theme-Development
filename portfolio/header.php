<!DOCTYPE html>
<html style="scroll-behavior: smooth;" <?php language_attributes(); ?> class="no-js">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?> class="m-0 p-0">

    <header>
        <div class="container">
            <div class="header-wrapper">
                <!----- logo ----->
                <div class="logo">
                    <?php if (has_custom_logo()) : ?>
              <?php the_custom_logo(); ?>
            <?php else : ?>
              <a href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/header-logo.png" alt="<?php echo esc_attr(get_bloginfo('name'))?>" />
              </a>
            <?php endif; ?>
            </div>

                <!----- main-menu and button ----->
                <div class="menu-button-wrapper">
                    <nav class="main-menu">
                        <?php wp_nav_menu(array(
                'theme_location' => 'portfolio_header_menu',
                 'fallback_cb' => false
              )); ?>

                    </nav>

                    <!----- sign-up-btn ----->
                    <div class="button btn-black">
                        <a href="#">Sign Up</a>
                    </div>


                    <!----- phone menu ----->
                    <div class="menu-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M3 6h18M3 12h18M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </div>
                </div>

                <!----- menu item for phone ----->
                <div  id="navPhone" class="menu-item-phone">

                    <!----- logo ----->
                    <div class="logo-div">
                        <div class="logo">
                          <?php if (has_custom_logo()) : ?>
              <?php the_custom_logo(); ?>
            <?php else : ?>
              <a href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/header-logo.png" alt="<?php echo esc_attr(get_bloginfo('name'))?>" />
              </a>
            <?php endif; ?>
                        </div>

                        <div class="x-icon menu-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <line x1="18" y1="6" x2="6" y2="18" stroke-linecap="round" />
                                <line x1="6" y1="6" x2="18" y2="18" stroke-linecap="round" />
                            </svg>
                        </div>
                    </div>
                    


                    <div class="menu-div">
                        <nav class="main-menu-phone">
                             <?php wp_nav_menu(array(
                'theme_location' => 'portfolio_mobile_menu',
                 'fallback_cb' => false
              )); ?>

                        </nav>

                    </div>    
                </div>
            </div>
        </div>
    </header>


<main>
