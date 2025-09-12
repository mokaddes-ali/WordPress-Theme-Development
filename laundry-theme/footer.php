
<!-- Footer Section -->
<?php 
    $footer_logo = get_theme_mod('footer_logo', get_template_directory_uri() . '/assets/images/footerlogo.png');
    $footer_description = get_theme_mod('footer_description', __('Fusce non ellus nege purus fermentum commodo nunc ame alique Suspendisse poten In eu ipsum massa.', 'laundryclean'));
    $footer_menu1_title = get_theme_mod('footer_menu1_title', __('Our Services', 'laundryclean'));
    $footer_menu2_title = get_theme_mod('footer_menu2_title', __('Quick Links', 'laundryclean'));
    $footer_menu3_title = get_theme_mod('footer_menu3_title', __('Commercial Service', 'laundryclean'));

    $newsletter_title = get_theme_mod('newsletter_title', __('Newsletters', 'laundryclean'));

    $newsletter_description = get_theme_mod('newsletter_description', __('Sign up and receive our special offers.', 'laundryclean'));

    // Privacy Policy and Terms of Service pages
    $privacy_policy_url = get_privacy_policy_url();
    $terms_of_service_url = get_permalink(get_theme_mod('terms_of_service_page'));
?>

<footer class="footer-area w-full font-poppins text-white px-[10%] lg:px-[5%] xl:px-[5%] 2xl:px-[8%] py-12 md:py-16 lg:py-[90px] bg-[#142137]">

    <!-- Only for mobile, sm,md,and lg device subscribe form and social icon -->
    <div class="w-full mb-10 ml-0 sm:-ml-6 px-6 lg:px-28 xl:hidden ">
        <!-- heading and social icon -->
        <div class="heading-social-icon mb-9 w-full flex justify-between items-center">
            <div class="heading">
                <h3 class="text-white text-xl font-semibold tracking-[-0.4px]">
                    <?php if($newsletter_title):?>
                        <?php echo esc_html($newsletter_title); ?>
                    <?php endif; ?>
                </h3>
                <p class="text-white/70 text-base font-normal leading-[26px]">
                    <?php if($newsletter_description):?>
                        <?php echo esc_html($newsletter_description); ?>
                    <?php endif; ?>
                </p>
            </div>
            <div class="social-icon flex items-center justify-center gap-5">
                <!-- facebook -->
                <a href="<?php echo esc_url(get_theme_mod('company_facebook')); ?>" target="_blank" rel="noopener noreferrer"
                    class="w-[36px] h-[36px] flex items-center justify-center rounded-full border border-white/14 bg-[#142137] shadow-[0_10px_60px_0_rgba(3,6,17,0.2)] backdrop-blur-[5px] p-2.5 hover:bg-[#4375E7]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="17" viewBox="0 0 10 17" fill="none">
                        <path
                            d="M9.35 0H6.8C5.67283 0 4.59183 0.447767 3.7948 1.2448C2.99777 2.04183 2.55 3.12283 2.55 4.25V6.8H0V10.2H2.55V17H5.95V10.2H8.5L9.35 6.8H5.95V4.25C5.95 4.02457 6.03955 3.80837 6.19896 3.64896C6.35837 3.48955 6.57457 3.4 6.8 3.4H9.35V0Z"
                            fill="white" />
                    </svg>
                </a>
                <!-- Twitter -->
                <a href="<?php echo esc_url(get_theme_mod('company_twitter')); ?>" target="_blank" rel="noopener noreferrer"
                    class="w-[36px] h-[36px] flex items-center justify-center rounded-full border border-white/14 bg-[#142137] shadow-[0_10px_60px_0_rgba(3,6,17,0.2)] backdrop-blur-[5px] p-2.5 hover:bg-[#4375E7]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                        <path
                            d="M5.92547 8.56247C5.55609 8.98742 5.19502 9.40292 4.83396 9.81865C3.64932 11.1821 2.46422 12.5452 1.2816 13.9102C1.22424 13.9766 1.1653 14.0009 1.07936 13.9998C0.764417 13.9953 0.449472 13.9982 0.134527 13.9977C0.098083 13.9977 0.0618643 13.9944 0 13.9912C0.123054 13.8488 0.23171 13.7226 0.340816 13.5971C1.88922 11.815 3.43763 10.0326 4.98604 8.25045C5.10167 8.11749 5.21437 7.98207 5.33405 7.85294C5.38264 7.80075 5.37972 7.7652 5.34057 7.70919C4.71541 6.81137 4.09249 5.91198 3.46867 5.01303C2.74452 3.96944 2.0197 2.92607 1.29533 1.8827C0.878923 1.28228 0.46252 0.681858 0.045892 0.0814371C0.0335192 0.0634402 0.0224961 0.0443185 0.000449922 0.00899965C0.0524159 0.00630012 0.0913342 0.00247578 0.130027 0.00247578C1.4159 0.00202586 2.70201 0.00292571 3.98788 1.21355e-06C4.07449 -0.000223747 4.12309 0.0308209 4.1701 0.098984C5.08097 1.41433 5.99409 2.72833 6.9063 4.04278C7.13284 4.36897 7.35847 4.69584 7.58479 5.02226C7.61223 5.06207 7.6408 5.10099 7.67702 5.15206C7.79602 5.01641 7.90918 4.88863 8.02121 4.75973C9.373 3.2039 10.7248 1.64807 12.075 0.0908855C12.1283 0.0292461 12.1816 -0.00112359 12.266 0.000226175C12.5845 0.00495036 12.9033 0.00202586 13.2221 0.00225082C13.2583 0.00225082 13.2945 0.0058502 13.3557 0.00922461C13.2122 0.175696 13.0846 0.32507 12.9557 0.473319C11.4021 2.26086 9.84902 4.04885 8.29296 5.83414C8.22795 5.9086 8.23065 5.95764 8.28396 6.03413C9.59121 7.9139 10.896 9.79503 12.2017 11.6759C12.7103 12.4086 13.2196 13.1406 13.7282 13.8733C13.7514 13.9069 13.773 13.9415 13.8061 13.9921C13.7525 13.9946 13.7134 13.9977 13.6745 13.9977C12.3922 13.998 11.1101 13.9971 9.82787 14C9.73406 14.0002 9.6812 13.9685 9.62833 13.892C8.69024 12.5362 7.74878 11.1826 6.80844 9.82832C6.53062 9.42834 6.25392 9.02746 5.97631 8.62703C5.96349 8.60903 5.94887 8.59239 5.92547 8.56247ZM12.1459 13.131C12.1182 13.0867 12.1007 13.0549 12.08 13.0255C11.8725 12.7314 11.6645 12.4381 11.457 12.1443C9.91201 9.95565 8.36697 7.767 6.82194 5.57858C5.74573 4.05425 4.66884 2.53059 3.5942 1.0049C3.54629 0.936739 3.49814 0.906144 3.41176 0.906594C2.8606 0.910643 2.30967 0.908394 1.75852 0.908619C1.72635 0.908619 1.69441 0.912218 1.64694 0.915142C1.67933 0.963734 1.70295 1.00063 1.72815 1.0364C3.05565 2.9155 4.38337 4.79415 5.71064 6.67324C7.21292 8.80025 8.71499 10.9275 10.2148 13.0565C10.2607 13.1215 10.3093 13.1384 10.3822 13.1379C10.9295 13.1357 11.4768 13.1368 12.0244 13.1364C12.0595 13.1368 12.0953 13.1334 12.1459 13.131Z"
                            fill="white" />
                    </svg>

                </a>
                <!-- Linkedin -->
                <a href="<?php echo esc_url(get_theme_mod('company_linkedin')); ?>" target="_blank" rel="noopener noreferrer"
                    class="w-[36px] h-[36px] flex items-center justify-center rounded-full border border-white/14 bg-[#142137] shadow-[0_10px_60px_0_rgba(3,6,17,0.2)] backdrop-blur-[5px] p-2.5 hover:bg-[#4375E7]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="white">
                        <path
                            d="M4.98 3.5C4.98 4.88 3.88 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1 4.98 2.12 4.98 3.5zM.22 8.99h4.55v14.01H.22V8.99zm7.14 0h4.36v1.91h.06c.61-1.15 2.1-2.37 4.33-2.37 4.63 0 5.48 3.05 5.48 7.01v8.45h-4.54v-7.5c0-1.79-.03-4.09-2.49-4.09-2.49 0-2.87 1.95-2.87 3.97v7.62H7.36V8.99z" />
                    </svg>


                </a>
            <!-- Pinterest -->
                <a href="<?php echo esc_url(get_theme_mod('company_pinterest')); ?>" target="_blank" rel="noopener noreferrer"
                    class="w-[36px] h-[36px] flex items-center justify-center rounded-full border border-white/14 bg-[#142137] shadow-[0_10px_60px_0_rgba(3,6,17,0.2)] backdrop-blur-[5px] p-2.5 hover:bg-[#4375E7]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                        <path
                            d="M9.00757 0C4.03279 0 0 4.02609 0 8.99262C0 12.8043 2.37242 16.0608 5.7231 17.3707C5.64105 16.6605 5.57519 15.5647 5.75233 14.7878C5.91537 14.0843 6.80489 10.317 6.80489 10.317C6.80489 10.317 6.53832 9.77695 6.53832 8.98488C6.53832 7.73402 7.2648 6.80168 8.16911 6.80168C8.93996 6.80168 9.31112 7.3793 9.31112 8.06766C9.31112 8.83723 8.82199 9.99211 8.56211 11.0654C8.3473 11.9609 9.01426 12.6935 9.89639 12.6935C11.498 12.6935 12.7287 11.006 12.7287 8.57812C12.7287 6.4241 11.1796 4.92188 8.96285 4.92188C6.39816 4.92188 4.89273 6.83895 4.89273 8.82246C4.89273 9.59203 5.18959 10.4214 5.5597 10.8731C5.63471 10.961 5.64245 11.0426 5.61992 11.1312C5.55301 11.4124 5.39771 12.0266 5.36743 12.1528C5.33045 12.3156 5.23361 12.3521 5.06317 12.2713C3.9363 11.7457 3.23165 10.1099 3.23165 8.7852C3.23165 5.9502 5.29242 3.34547 9.1847 3.34547C12.3061 3.34547 14.737 5.56629 14.737 8.54156C14.737 11.5168 12.7801 14.1374 10.0665 14.1374C9.15442 14.1374 8.29412 13.6635 8.00571 13.101C8.00571 13.101 7.55356 14.8177 7.44228 15.2399C7.24261 16.0242 6.69326 17.0016 6.3228 17.601C7.16866 17.859 8.05889 18 8.99278 18C13.9676 18 18.0004 13.9739 18.0004 9.00738C18.0148 4.02609 13.9824 0 9.00757 0Z"
                            fill="white" />
                    </svg>

                </a>
            </div>
        </div>
        <!-- Subscribe form Form -->
        <form class="w-full relative" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
            <input type="hidden" name="action" value="newsletter_subscription">
            <input type="email" name="email" placeholder="Enter your Email..." class="w-full h-[50px] px-4 pr-2 text-white/70 text-[15px] font-normal 
           border border-white/14 bg-[#142137] shadow-[0_10px_60px_0_rgba(3,6,17,0.20)] 
           backdrop-blur-[5px] outline-none rounded" />
            <button type="submit" class="absolute right-1 top-1 bottom-1 w-[80px] bg-[#4375E7] text-white 
           text-sm font-medium rounded">Subscribe</button>
        </form>
    </div>

    <div class="ml-0 lg:ml-20 xl:ml-0  grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-5 gap-4 ">
        <!-- First Column -->
        <div class="w-full flex flex-col items-center sm:items-start gap-2">
            <?php if($footer_logo) : ?>
            <img src="<?php echo esc_url($footer_logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
                class="w-[183px] h-[40px] mb-4">
            <?php endif; ?>
            <p class="text-base text-center sm:text-start leading-[26px] text-white/70 w-full mb-6">
                <?php if($footer_description): ?>
                <?php echo esc_html($footer_description); ?>
                <?php endif; ?>
            </p>
            <div class="flex items-center gap-[14px] mt-1">
                <div class="w-[46px] h-[46px] rounded-full border border-white/10 bg-[#142137] shadow-[0_10px_60px_0_rgba(3,6,17,0.20)] backdrop-blur-[5px] flex items-center justify-center">
                    <!-- Phone Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 20 20">
                        <path fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M1.464 3.249c.3-.497 1.952-2.302 3.13-2.248.352.03.664.243.917.49.58.568 2.243 2.712 2.337 3.163.23 1.107-1.09 1.745-.686 2.86 1.03 2.518 2.803 4.292 5.324 5.32 1.115.405 1.753-.914 2.86-.684.452.095 2.597 1.758 3.165 2.339.246.251.46.564.49.916.044 1.24-1.873 2.914-2.246 3.128-.882.631-2.032.62-3.434-.032C9.407 16.875 3.154 10.74 1.496 6.681c-.634-1.394-.677-2.552-.032-3.433Z" />
                        <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M12.43 1.238c3.508.39 6.277 3.157 6.671 6.663" />
                        <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M12.429 4.592c1.676.327 2.986 1.637 3.313 3.314" />
                    </svg>
                </div>
                <div>
                    <p class="text-[#4375E7] text-[15px] font-medium leading-[24px] tracking-[-0.3px]">
                        <?php echo __('Hotline:', 'laundryclean') ?>
                    </p>
                    <p class="text-white text-base font-semibold leading-[24px] tracking-[-0.32px]">
                        <a href="tel:<?php echo esc_html(get_theme_mod('company_phone', '2349873543670')); ?>"><?php echo esc_html(get_theme_mod('company_phone', '(234) 987 - 354 - 3670')); ?></a>
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-4 mt-3">
                <div class="w-[46px] h-[46px] rounded-full border border-white/10 bg-[#142137] shadow-[0_10px_60px_0_rgba(3,6,17,0.20)] backdrop-blur-[5px] flex items-center justify-center">
                    <!-- Email Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="18" fill="none" viewBox="0 0 21 18">
                        <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M1 5.706C1 2.412 2.882 1 5.706 1h9.412c2.824 0 4.706 1.412 4.706 4.706v6.588c0 3.294-1.882 4.706-4.706 4.706H5.706" />
                        <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M15.117 6.176 12.171 8.528c-0.97.772-2.561.772-3.53 0L5.705 6.176" />
                        <path stroke="white" stroke-linecap="round" stroke-linejoin" round" stroke-width="1.5"
                            d="M1 13.235h5.647M1 9.47h2.824" />
                    </svg>
                </div>
                <div>
                    <p class="text-[#4375E7] text-[15px] font-medium leading-[24px] tracking-[-0.3px]">
                        <?php echo __('Email:', 'laundryclean') ?>
                    </p>
                    <p class="text-white text-base font-semibold leading-[24px] tracking-[-0.32px]">
                        <a href="mailto:<?php echo esc_html(get_theme_mod('company_email', 'example@gmail.com')); ?>"><?php echo esc_html(get_theme_mod('company_email', 'example@gmail.com')); ?></a>
                    </p>
                </div>
            </div>
        </div>

        <!-- Second Column -->
        <div class="w-full mt-4 sm:mt-4 lg:mt-0 flex items-center sm:items-start flex-col gap-5 ml-4">
            <h3 class="text-center sm:text-start  w-full text-white text-[26px] lg:text-xl font-semibold tracking-[-0.4px]">
                <?php if($footer_menu1_title): ?>
                    <?php echo esc_html($footer_menu1_title); ?>
                <?php endif; ?>
            </h3>
           <?php 
            wp_nav_menu(array(
                'theme_location' => 'laundryclean_footer1_ourservice',
                'fallback_cb' => function(){
                    echo '<ul class="text-white/70 text-start text-base font-medium leading-[44px] grid grid-cols-2 gap-4 sm:grid-cols-1">
                        <li>Laundry Service</li>
                        <li>Dry Cleaning</li>
                        <li>Ironing</li>
                        <li>Alteration & Repairs</li>
                        <li>Dry Cleaners</li>
                        <li>Shirt Service</li>
                    </ul>';
                }
            ));
           ?>
        </div>

        <!-- Third Column -->
        <div class="w-full mt-4 sm:mt-4 lg:mt-0 flex items-center sm:items-start flex-col gap-5">
            <h3 class="text-center sm:text-start  w-full text-white text-[26px] lg:text-xl font-semibold tracking-[-0.4px]">
                <?php if($footer_menu2_title): ?>
                    <?php echo esc_html($footer_menu2_title); ?>
                <?php endif; ?>
            </h3>
          <?php
          wp_nav_menu(array(
                'theme_location' => 'laundryclean_footer2_quicklinks',
                'fallback_cb' => function(){
                    echo '<ul class="text-white/70 text-start text-base font-medium leading-[44px] grid grid-cols-2 gap-4 sm:grid-cols-1">
                        <li>About Us</li>
                        <li>Contact Us</li>
                        <li>Privacy Policy</li>
                        <li>Terms & Conditions</li>
                        <li>FAQs</li>
                    </ul>';
                }
            ));
          ?>
        </div>

        <!-- Fourth Column -->
        <div class="w-full  mt-4 sm:mt-4 lg:mt-0 flex items-center sm:items-start flex-col gap-5">
            <h3 class="text-center sm:text-start  w-full text-white text-[26px] lg:text-xl font-semibold tracking-[-0.4px]">
                <?php if($footer_menu3_title): ?>
                    <?php echo esc_html($footer_menu3_title); ?>
                <?php endif; ?>
            </h3>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'laundryclean_footer3_commercial_service',
                'fallback_cb' => function(){
                    echo '<ul class="text-white/70 text-start text-base font-medium leading-[44px] grid grid-cols-2 gap-4 sm:grid-cols-1">
                        <li>Airbnb Laundry</li>
                        <li>Restaurant Laundry</li>
                        <li>Workwear Laundry</li>
                        <li>Cafe Laundry</li>
                        <li>Hotel Laundry</li>
                        <li>Gym Laundry</li>
                    </ul>';
                }
            ));
            ?>
        </div>

        <!-- Fifth Column -->
        <div class="w-full hidden xl:flex items-start flex-col gap-5">
            <h3 class="text-white w-full text-xl font-semibold tracking-[-0.4px]">Newsletters</h3>
            <p class="text-white/70 text-base font-normal leading-[26px] w-full">Sign up and receive our special offers.</p>
            <form class="w-full relative" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                <input type="hidden" name="action" value="newsletter_subscription">
                <input type="email" name="email" placeholder="Enter your Email..." class="w-full h-[50px] px-4 pr-2 text-white/70 text-[15px] font-normal 
           border border-white/14 bg-[#142137] shadow-[0_10px_60px_0_rgba(3,6,17,0.20)] 
           backdrop-blur-[5px] outline-none rounded" />
                <button type="submit" class="absolute right-1 top-1 bottom-1 w-[80px] bg-[#4375E7] text-white 
           text-sm font-medium rounded">Subscribe</button>
            </form>

            <!-- social icon -->
            <div class="social-icon flex items-center justify-center gap-6 mt-4">
                <!-- facebook -->
                <a href="<?php echo esc_url(get_theme_mod('company_facebook')); ?>" target="_blank" rel="noopener noreferrer"
                    class="w-[36px] h-[36px] flex items-center justify-center rounded-full border border-white/14 bg-[#142137] shadow-[0_10px_60px_0_rgba(3,6,17,0.2)] backdrop-blur-[5px] p-2.5 hover:bg-[#4375E7]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="17" viewBox="0 0 10 17" fill="none">
                        <path
                            d="M9.35 0H6.8C5.67283 0 4.59183 0.447767 3.7948 1.2448C2.99777 2.04183 2.55 3.12283 2.55 4.25V6.8H0V10.2H2.55V17H5.95V10.2H8.5L9.35 6.8H5.95V4.25C5.95 4.02457 6.03955 3.80837 6.19896 3.64896C6.35837 3.48955 6.57457 3.4 6.8 3.4H9.35V0Z"
                            fill="white" />
                    </svg>
                </a>
                <!-- Twitter -->
                <a href="<?php echo esc_url(get_theme_mod('company_twitter')); ?>" target="_blank" rel="noopener noreferrer"
                    class="w-[36px] h-[36px] flex items-center justify-center rounded-full border border-white/14 bg-[#142137] shadow-[0_10px_60px_0_rgba(3,6,17,0.2)] backdrop-blur-[5px] p-2.5 hover:bg-[#4375E7]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                        <path
                            d="M5.92547 8.56247C5.55609 8.98742 5.19502 9.40292 4.83396 9.81865C3.64932 11.1821 2.46422 12.5452 1.2816 13.9102C1.22424 13.9766 1.1653 14.0009 1.07936 13.9998C0.764417 13.9953 0.449472 13.9982 0.134527 13.9977C0.098083 13.9977 0.0618643 13.9944 0 13.9912C0.123054 13.8488 0.23171 13.7226 0.340816 13.5971C1.88922 11.815 3.43763 10.0326 4.98604 8.25045C5.10167 8.11749 5.21437 7.98207 5.33405 7.85294C5.38264 7.80075 5.37972 7.7652 5.34057 7.70919C4.71541 6.81137 4.09249 5.91198 3.46867 5.01303C2.74452 3.96944 2.0197 2.92607 1.29533 1.8827C0.878923 1.28228 0.46252 0.681858 0.045892 0.0814371C0.0335192 0.0634402 0.0224961 0.0443185 0.000449922 0.00899965C0.0524159 0.00630012 0.0913342 0.00247578 0.130027 0.00247578C1.4159 0.00202586 2.70201 0.00292571 3.98788 1.21355e-06C4.07449 -0.000223747 4.12309 0.0308209 4.1701 0.098984C5.08097 1.41433 5.99409 2.72833 6.9063 4.04278C7.13284 4.36897 7.35847 4.69584 7.58479 5.02226C7.61223 5.06207 7.6408 5.10099 7.67702 5.15206C7.79602 5.01641 7.90918 4.88863 8.02121 4.75973C9.373 3.2039 10.7248 1.64807 12.075 0.0908855C12.1283 0.0292461 12.1816 -0.00112359 12.266 0.000226175C12.5845 0.00495036 12.9033 0.00202586 13.2221 0.00225082C13.2583 0.00225082 13.2945 0.0058502 13.3557 0.00922461C13.2122 0.175696 13.0846 0.32507 12.9557 0.473319C11.4021 2.26086 9.84902 4.04885 8.29296 5.83414C8.22795 5.9086 8.23065 5.95764 8.28396 6.03413C9.59121 7.9139 10.896 9.79503 12.2017 11.6759C12.7103 12.4086 13.2196 13.1406 13.7282 13.8733C13.7514 13.9069 13.773 13.9415 13.8061 13.9921C13.7525 13.9946 13.7134 13.9977 13.6745 13.9977C12.3922 13.998 11.1101 13.9971 9.82787 14C9.73406 14.0002 9.6812 13.9685 9.62833 13.892C8.69024 12.5362 7.74878 11.1826 6.80844 9.82832C6.53062 9.42834 6.25392 9.02746 5.97631 8.62703C5.96349 8.60903 5.94887 8.59239 5.92547 8.56247ZM12.1459 13.131C12.1182 13.0867 12.1007 13.0549 12.08 13.0255C11.8725 12.7314 11.6645 12.4381 11.457 12.1443C9.91201 9.95565 8.36697 7.767 6.82194 5.57858C5.74573 4.05425 4.66884 2.53059 3.5942 1.0049C3.54629 0.936739 3.49814 0.906144 3.41176 0.906594C2.8606 0.910643 2.30967 0.908394 1.75852 0.908619C1.72635 0.908619 1.69441 0.912218 1.64694 0.915142C1.67933 0.963734 1.70295 1.00063 1.72815 1.0364C3.05565 2.9155 4.38337 4.79415 5.71064 6.67324C7.21292 8.80025 8.71499 10.9275 10.2148 13.0565C10.2607 13.1215 10.3093 13.1384 10.3822 13.1379C10.9295 13.1357 11.4768 13.1368 12.0244 13.1364C12.0595 13.1368 12.0953 13.1334 12.1459 13.131Z"
                            fill="white" />
                    </svg>

                </a>
                <!-- Linkedin -->
                <a href="<?php echo esc_url(get_theme_mod('company_linkedin')); ?>" target="_blank" rel="noopener noreferrer"
                    class="w-[36px] h-[36px] flex items-center justify-center rounded-full border border-white/14 bg-[#142137] shadow-[0_10px_60px_0_rgba(3,6,17,0.2)] backdrop-blur-[5px] p-2.5 hover:bg-[#4375E7]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="white">
                        <path
                            d="M4.98 3.5C4.98 4.88 3.88 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1 4.98 2.12 4.98 3.5zM.22 8.99h4.55v14.01H.22V8.99zm7.14 0h4.36v1.91h.06c.61-1.15 2.1-2.37 4.33-2.37 4.63 0 5.48 3.05 5.48 7.01v8.45h-4.54v-7.5c0-1.79-.03-4.09-2.49-4.09-2.49 0-2.87 1.95-2.87 3.97v7.62H7.36V8.99z" />
                    </svg>


                </a>
            <!-- Pinterest -->
                <a href="<?php echo esc_url(get_theme_mod('company_pinterest')); ?>" target="_blank" rel="noopener noreferrer"
                    class="w-[36px] h-[36px] flex items-center justify-center rounded-full border border-white/14 bg-[#142137] shadow-[0_10px_60px_0_rgba(3,6,17,0.2)] backdrop-blur-[5px] p-2.5 hover:bg-[#4375E7]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                        <path
                            d="M9.00757 0C4.03279 0 0 4.02609 0 8.99262C0 12.8043 2.37242 16.0608 5.7231 17.3707C5.64105 16.6605 5.57519 15.5647 5.75233 14.7878C5.91537 14.0843 6.80489 10.317 6.80489 10.317C6.80489 10.317 6.53832 9.77695 6.53832 8.98488C6.53832 7.73402 7.2648 6.80168 8.16911 6.80168C8.93996 6.80168 9.31112 7.3793 9.31112 8.06766C9.31112 8.83723 8.82199 9.99211 8.56211 11.0654C8.3473 11.9609 9.01426 12.6935 9.89639 12.6935C11.498 12.6935 12.7287 11.006 12.7287 8.57812C12.7287 6.4241 11.1796 4.92188 8.96285 4.92188C6.39816 4.92188 4.89273 6.83895 4.89273 8.82246C4.89273 9.59203 5.18959 10.4214 5.5597 10.8731C5.63471 10.961 5.64245 11.0426 5.61992 11.1312C5.55301 11.4124 5.39771 12.0266 5.36743 12.1528C5.33045 12.3156 5.23361 12.3521 5.06317 12.2713C3.9363 11.7457 3.23165 10.1099 3.23165 8.7852C3.23165 5.9502 5.29242 3.34547 9.1847 3.34547C12.3061 3.34547 14.737 5.56629 14.737 8.54156C14.737 11.5168 12.7801 14.1374 10.0665 14.1374C9.15442 14.1374 8.29412 13.6635 8.00571 13.101C8.00571 13.101 7.55356 14.8177 7.44228 15.2399C7.24261 16.0242 6.69326 17.0016 6.3228 17.601C7.16866 17.859 8.05889 18 8.99278 18C13.9676 18 18.0004 13.9739 18.0004 9.00738C18.0148 4.02609 13.9824 0 9.00757 0Z"
                            fill="white" />
                    </svg>

                </a>
            </div>
        </div>
    </div>

    <!-- divider and footer bottom -->
    <div class="mt-3 flex flex-col gap-[30px]">
        <div class="w-full h-px  bg-white/10"></div>
        <div class="footer-bottom flex flex-col md:flex-row justify-between items-center gap-4">
            <h2 class="text-white/70 text-base font-normal leading-[26px]">
                 <?php echo esc_html__('Copyright', 'laundryclean'); ?> &copy; <?php echo date('Y');?> <?php bloginfo('name');?> <?php echo esc_html__('All rights reserved', 'laundryclean'); ?></h2>
            <p class="text-base font-normal leading-[26px]">
                <span class="text-white/70">
                    <a href="<?php echo $privacy_policy_url ? esc_url($privacy_policy_url) : '#'; ?>"><?php esc_html_e('Privacy Policy', 'laundryclean'); ?></a>
                </span>
                <span class="text-white/70 mx-[14px]">|</span>
                <span class="text-white">
                    <a href="<?php echo $terms_of_service_url ? esc_url($terms_of_service_url) : '#'; ?>"><?php esc_html_e('Term of Service', 'laundryclean'); ?></a>
                </span>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</main>
</body>
</html>

