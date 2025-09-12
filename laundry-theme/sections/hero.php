<?php
/**
 * Hero Section Template
 * @package LaundryTheme
 */
?>

<section class="relative w-full">
    <div class="hero-slick-items">
        <?php 
        $slider_args = array(
            'post_type'      => 'slider',
            'posts_per_page' => 3,
            'orderby'        => 'date',
            'order'          => 'DESC'
        );

        $slider_query = new WP_Query($slider_args);

        if ($slider_query->have_posts()) :
            while ($slider_query->have_posts()) : $slider_query->the_post();

                $slider_background_image = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : get_template_directory_uri() . '/assets/images/Image_here.png';
                $slider_title           = get_the_title() ?: 'Fabric Fresh Laundry & Cleaning.';
                $slider_description     = get_the_excerpt() ?: 'Our services are designed for convenience and efficiency, offering doorstep pickup & delivery to make your laundry experience as seamless as possible.';
                $slider_type            = get_post_meta(get_the_ID(), '_slider_type', true) ?: 'Dry Clean Experts';
                $slider_button_text     = get_post_meta(get_the_ID(), '_slider_button_text', true) ?: 'Book Laundry Now!';
                $slider_button_link     = get_post_meta(get_the_ID(), '_slider_button_link', true) ?: 'https://example.com/book-laundry-now';
                $slider_avatar          = get_post_meta(get_the_ID(), '_slider_avatar', true) ?: get_template_directory_uri() . '/assets/images/avatorhero.png';
                $slider_rating          = get_post_meta(get_the_ID(), '_slider_rating', true) ?: 5;
                $slider_rating_text     = get_post_meta(get_the_ID(), '_slider_rating_text', true) ?: '8k Clients Reviews.';
        ?>
            <div class="hero-slick-single-item relative h-[385px] sm:h-[350px] md:h-[420px] lg:h-[500px]">
                <!-- Background Image -->
                <div>
                    <?php if ($slider_background_image) : ?>
                        <img src="<?php echo esc_url($slider_background_image); ?>" alt="<?php echo esc_attr($slider_title); ?>" class="absolute inset-0 z-0 w-full h-full object-cover" />
                    <?php endif; ?>
                </div>

                <!-- Overlay -->
                <div class="absolute inset-0 z-10 bg-gradient-to-r from-[#142137] to-[#1421371A] opacity-100"></div>

                <!-- Hero Content -->
                <div class="z-50 relative flex flex-col gap-3 px-[5%] lg:px-[5%] 2xl:px-[8%] py-4 sm:py-6 md:py-6 lg:py-13 mx-auto text-white text-center md:text-start">

                    <!-- Tag Box -->
                    <div class="flex items-center justify-center md:justify-start">
                        <div class="flex items-center gap-[0.5rem] px-[0.50rem] py-[0.3rem] bg-white/15 backdrop-blur-[0.4375rem] text-white/70 text-sm md:text-base font-poppins font-normal md:font-medium">
                            <div class="w-[0.3125rem] h-[0.3125rem] rounded-full bg-white flex-shrink-0"></div>
                            <?php echo esc_html($slider_type); ?>
                        </div>
                    </div>

                    <!-- Heading -->
                    <h1 class="text-white font-poppins w-full text-[1.50rem] sm:text-[2.75rem] md:text-[3.0rem] lg:text-[4.50rem] md:max-w-2xl lg:max-w-4xl xl:max-w-5xl font-semibold leading-[1.1] tracking-[-0.125rem]">
                        <?php echo esc_html(wp_trim_words($slider_title, 6)); ?>
                    </h1>

                    <!-- Description -->
                    <p class="text-white/70 font-poppins w-full md:w-[80%] lg:w-[48.125rem] md:pt-[1.5rem] text-sm sm:text-base md:text-[1.115rem] font-medium leading-[1.8]">
                        <?php echo esc_html(wp_trim_words($slider_description, 25)); ?>
                    </p>

                    <!-- Button & Avatar Section -->
                    <div class="flex justify-center flex-col sm:justify-start sm:flex-row items-center sm:items-center pt-1 md:pt-[1.5rem] gap-[1.25rem] sm:gap-[2rem]">
                        <button class="px-3 py-2 lg:px-5 lg:py-4 flex-shrink-0 bg-[#4375E7] text-white font-[Poppins] text-[12px] lg:text-[0.9375rem] font-medium hover:bg-blue-600 transition">
                            <a href="<?php echo esc_url($slider_button_link); ?>"><?php echo esc_html($slider_button_text); ?></a>
                        </button>

                        <div class="flex items-center gap-2 md:gap-[1.125rem]">
                            <img src="<?php echo esc_url($slider_avatar); ?>" alt="Client" class="wimg-[10.125rem] h-[3.375rem]" />
                            <div class="flex flex-col gap-[0.5rem] sm:gap-[0.625rem]">
                                <div class="flex items-center text-yellow-400">
                                    <?php 
                                    if ($slider_rating) :
                                        $i = 1;
                                        while ($i <= $slider_rating) : ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" viewBox="0 0 20 20" fill="currentColor" class="text-yellow-400">
                                                <path d="M10 15.27L16.18 20 14.54 12.97 20 8.64l-7.19-.61L10 0 7.19 8.03 0 8.64l5.46 4.33L3.82 20z" />
                                            </svg>
                                    <?php 
                                        $i++;
                                        endwhile;
                                    endif; 
                                    ?>
                                </div>
                                <p class="text-white font-poppins text-[12px] md:text-[1rem] font-medium leading-[1.5]">
                                    <?php echo esc_html($slider_rating_text); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- design -->
                <div class="design absolute top-[20%] sm:top-[34%] md:top-[35%] lg:top-[40%] xl:top-[42%] z-20 left-[12%] md:left-[3%]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 474 54" fill="none" class="w-[18rem] sm:w-[22rem] md:w-[25rem] lg:w-[29.625rem]">
                        <path d="M473.807 20.1567C483.484 -13.3431 126.015 -3.02882 4.10742 35.9075C-2.43858 37.1866 -0.730936 42.5433 6.19456 41.264C174.968 14.9603 294.029 11.8422 403.319 14.9603C562.51 20.1567 206.749 29.428 185.403 44.2991C181.502 47.0174 179.332 55.0126 193.278 53.8933C328.941 35.5843 466.994 43.743 473.807 20.1567Z" fill="#4375E7" />
                    </svg>
                </div>
            </div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>

    <!-- Next and preview Button -->
    <div class="absolute top-[64%] left-[85%] z-30 flex flex-col gap-2">
        <!-- Prev Button -->
        <button id="custom-prev" class="w-10 h-10 lg:w-[54px] lg:h-[54px] flex items-center justify-center rounded-full hover:bg-[#4375E7] transition duration-300">
            <!-- SVG Code -->
        </button>
        <!-- Next Button -->
        <button id="custom-next" class="w-10 h-10 lg:w-[54px] lg:h-[54px] flex items-center justify-center rounded-full hover:bg-[#4375E7] transition duration-300">
            <!-- SVG Code -->
        </button>
    </div>
</section>
