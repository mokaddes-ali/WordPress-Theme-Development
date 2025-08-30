 <!-- Blog Right Sidebar -->
        <aside class="blog-sidebar lg:h-[1480px] lg:sticky lg:top-1 w-full lg:w-4/12 flex flex-col gap-6 md:gap-[27px]">

            <!-- For mobile,sm, md device only -->
            <div class="flex flex-row h-[130px] gap-6 lg:hidden">

                <!-- search section -->
                <div
                    class="w-6/12 bg-[#EBEFF3] p-4 sm:p-5 text-[#142137] font-poppins text-xl font-semibold leading-relaxed  tracking-tight">
                    <h2 class="mb-3">
                        <?php echo __('Search', 'laundryclean') ?>
                    </h2>

                    <form role="search" action="<?php echo esc_url(home_url('/')); ?>" method="get" class="relative w-full md:w-[318px] mb-6 md:mb-0">
                        <input name="s" type="text" placeholder="<?php echo esc_attr_e('Search Here....', 'laundryclean') ?>" value="<?php get_search_query(); ?>" required
                            class="w-full h-11 md:h-[44px] border border-[#1421371A] bg-transparent text-[#142137B3] font-poppins text-sm md:text-[15px] font-normal leading-relaxed md:leading-[26px] pl-4 pr-12 outline-none" />

                        <!-- Icon inside input -->
                        <button type="submit"
                            class="absolute right-0 top-1/2 -translate-y-1/2 w-11 md:w-[44px] h-11 md:h-[44px] bg-[#4375E7] flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 44 44"
                                fill="none">
                                <path
                                    d="M21.1111 28.2222C25.0384 28.2222 28.2222 25.0384 28.2222 21.1111C28.2222 17.1837 25.0384 14 21.1111 14C17.1837 14 14 17.1837 14 21.1111C14 25.0384 17.1837 28.2222 21.1111 28.2222Z"
                                    stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M29.9995 29.9995L26.1328 26.1328" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </form>
                </div>

                <!-- Follow Us Card -->
                <div class="w-6/12 p-4 sm:p-5 bg-[#EBEFF3] text-[#142137] font-poppins">
                    <!-- Title -->
                    <h2
                        class="text-xl md:text-[24px] font-semibold leading-relaxed md:leading-[34px] mb-3 tracking-tight md:tracking-[-0.48px]">
                        <?php echo __('Follow Us', 'laundryclean'); ?>
                    </h2>

                    <!-- Icons Row -->
                    <div class="flex items-center gap-3.5">
                        <a href="#"
                            class="flex items-center justify-center bg-white rounded-full shadow hover:bg-orange-500 hover:text-white transition">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 50 50"
                                fill="none">
                                <circle cx="25" cy="25" r="25" fill="#1877F2" />
                                <path
                                    d="M31 14H27.7273C26.2806 14 24.8933 14.5795 23.8703 15.6109C22.8474 16.6424 22.2727 18.0413 22.2727 19.5V22.8H19V27.2H22.2727V36H26.6364V27.2H29.9091L31 22.8H26.6364V19.5C26.6364 19.2083 26.7513 18.9285 26.9559 18.7222C27.1605 18.5159 27.4379 18.4 27.7273 18.4H31V14Z"
                                    fill="white" />
                            </svg>
                        </a>

                        <a href="#"
                            class=" flex items-center justify-center bg-white rounded-full shadow hover:bg-orange-500 hover:text-white transition">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 50 50"
                                fill="none">
                                <circle cx="25" cy="25" r="25" fill="#040618" />
                                <path
                                    d="M23.7255 27.0089C23.2439 27.5553 22.7731 28.0895 22.3024 28.624C20.7579 30.377 19.2128 32.1295 17.6709 33.8846C17.5961 33.9699 17.5193 34.0012 17.4072 33.9997C16.9966 33.9939 16.586 33.9977 16.1754 33.9971C16.1279 33.9971 16.0807 33.9928 16 33.9887C16.1604 33.8056 16.3021 33.6434 16.4443 33.482C18.4631 31.1907 20.4819 28.899 22.5007 26.6077C22.6514 26.4368 22.7984 26.2627 22.9544 26.0966C23.0177 26.0295 23.0139 25.9838 22.9629 25.9118C22.1478 24.7575 21.3357 23.6011 20.5224 22.4453C19.5782 21.1036 18.6332 19.7621 17.6888 18.4206C17.1459 17.6486 16.603 16.8767 16.0598 16.1047C16.0437 16.0816 16.0293 16.057 16.0006 16.0116C16.0683 16.0081 16.1191 16.0032 16.1695 16.0032C17.846 16.0026 19.5228 16.0038 21.1993 16C21.3122 15.9997 21.3756 16.0396 21.4369 16.1273C22.6244 17.8184 23.8149 19.5079 25.0043 21.1979C25.2996 21.6172 25.5938 22.0375 25.8888 22.4572C25.9246 22.5084 25.9619 22.5584 26.0091 22.6241C26.1642 22.4497 26.3118 22.2854 26.4578 22.1196C28.2203 20.1193 29.9827 18.1189 31.7431 16.1169C31.8126 16.0376 31.8821 15.9986 31.9921 16.0003C32.4074 16.0064 32.823 16.0026 33.2386 16.0029C33.2858 16.0029 33.333 16.0075 33.4128 16.0119C33.2257 16.2259 33.0594 16.4179 32.8913 16.6086C30.8658 18.9068 28.8409 21.2057 26.8121 23.501C26.7274 23.5968 26.7309 23.6598 26.8004 23.7582C28.5048 26.175 30.2059 28.5936 31.9082 31.0119C32.5713 31.9539 33.2354 32.8951 33.8985 33.8372C33.9287 33.8803 33.9569 33.9248 34 33.9899C33.9302 33.9931 33.8792 33.9971 33.8284 33.9971C32.1566 33.9974 30.4851 33.9962 28.8133 34C28.691 34.0003 28.6221 33.9595 28.5532 33.8612C27.3301 32.1179 26.1027 30.3776 24.8767 28.6364C24.5144 28.1222 24.1537 27.6067 23.7918 27.0919C23.775 27.0688 23.756 27.0474 23.7255 27.0089ZM31.8355 32.8827C31.7994 32.8257 31.7765 32.7849 31.7495 32.747C31.4791 32.369 31.2078 31.9918 30.9374 31.6141C28.923 28.8001 26.9086 25.9861 24.8943 23.1725C23.4911 21.2126 22.0871 19.2536 20.686 17.292C20.6236 17.2044 20.5608 17.165 20.4482 17.1656C19.7296 17.1708 19.0113 17.1679 18.2927 17.1682C18.2508 17.1682 18.2091 17.1729 18.1472 17.1766C18.1895 17.2391 18.2203 17.2865 18.2531 17.3325C19.9839 19.7485 21.7149 22.1639 23.4454 24.5799C25.404 27.3146 27.3624 30.0496 29.3178 32.7869C29.3776 32.8705 29.441 32.8922 29.536 32.8916C30.2496 32.8888 30.9632 32.8902 31.6771 32.8896C31.7228 32.8902 31.7695 32.8859 31.8355 32.8827Z"
                                    fill="white" />
                            </svg>
                        </a>

                        <a href="#"
                            class="flex items-center justify-center bg-white rounded-full shadow hover:bg-orange-500 hover:text-white transition">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 50 50"
                                fill="none">
                                <circle cx="25" cy="25" r="25" fill="#0A66C2" />
                                <path
                                    d="M28.732 21.3154C30.407 21.3154 32.0135 21.9808 33.198 23.1653C34.3825 24.3498 35.0479 25.9562 35.0479 27.6313V34.9998H30.8373V27.6313C30.8373 27.0729 30.6155 26.5374 30.2206 26.1426C29.8258 25.7478 29.2903 25.526 28.732 25.526C28.1736 25.526 27.6381 25.7478 27.2433 26.1426C26.8485 26.5374 26.6266 27.0729 26.6266 27.6313V34.9998H22.416V27.6313C22.416 25.9562 23.0814 24.3498 24.2659 23.1653C25.4504 21.9808 27.0569 21.3154 28.732 21.3154Z"
                                    fill="white" />
                                <path d="M18.2106 22.3682H14V34.9999H18.2106V22.3682Z" fill="white" />
                                <path
                                    d="M16.1053 19.2106C17.268 19.2106 18.2106 18.268 18.2106 17.1053C18.2106 15.9426 17.268 15 16.1053 15C14.9426 15 14 15.9426 14 17.1053C14 18.268 14.9426 19.2106 16.1053 19.2106Z"
                                    fill="white" />
                            </svg>
                        </a>

                        <a href="#"
                            class="flex items-center justify-center bg-white rounded-full shadow hover:bg-orange-500 hover:text-white transition">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 50 50"
                                fill="none">
                                <circle cx="25" cy="25" r="25" fill="#CB2027" />
                                <path
                                    d="M25.009 14C18.9289 14 14 18.9208 14 24.991C14 29.6496 16.8996 33.6298 20.9947 35.2309C20.8945 34.3629 20.814 33.0236 21.0305 32.0739C21.2297 31.2141 22.3169 26.6096 22.3169 26.6096C22.3169 26.6096 21.9911 25.9496 21.9911 24.9815C21.9911 23.4527 22.879 22.3132 23.9843 22.3132C24.9264 22.3132 25.38 23.0191 25.38 23.8605C25.38 24.8011 24.7822 26.2126 24.4646 27.5244C24.202 28.6188 25.0172 29.5143 26.0953 29.5143C28.0528 29.5143 29.557 27.4518 29.557 24.4844C29.557 21.8517 27.6637 20.0156 24.9544 20.0156C21.8198 20.0156 19.9799 22.3587 19.9799 24.783C19.9799 25.7236 20.3427 26.7372 20.795 27.2894C20.8867 27.3968 20.8962 27.4965 20.8686 27.6048C20.7869 27.9485 20.5971 28.6992 20.56 28.8534C20.5149 29.0524 20.3965 29.0971 20.1882 28.9982C18.8109 28.3559 17.9497 26.3565 17.9497 24.7375C17.9497 21.2725 20.4684 18.0889 25.2255 18.0889C29.0405 18.0889 32.0115 20.8032 32.0115 24.4397C32.0115 28.0761 29.6198 31.279 26.3032 31.279C25.1885 31.279 24.137 30.6998 23.7845 30.0123C23.7845 30.0123 23.2319 32.1105 23.0959 32.6265C22.8519 33.5852 22.1805 34.7797 21.7277 35.5123C22.7615 35.8277 23.8495 36 24.9909 36C31.0711 36 36 31.0792 36 25.009C36.0176 18.9208 31.0892 14 25.009 14Z"
                                    fill="white" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- search section for lg and above device -->
            <div
                class="search-area hidden lg:flex md:flex-col md:w-auto lg:w-[380px] md:h-[165px]  bg-[#EBEFF3] p-6 text-[#142137] font-poppins text-xl md:text-[24px] font-semibold leading-relaxed md:leading-[34px] tracking-tight md:tracking-[-0.48px]">
                <h2 class="mb-6">Search</h2>

                <form role="search" action="<?php echo esc_url(home_url('/')); ?>" method="get" class="relative w-full lg:w-[318px] mb-6 md:mb-0">
                    <input name="s" value="<?php echo esc_attr_e(get_search_query()); ?>" type="text" placeholder="<?php echo __('Search Here....', 'laundryclean'); ?>"
                        class="w-full h-11 md:h-[44px] border border-[#1421371A] bg-transparent text-[#142137B3] font-poppins text-sm md:text-[15px] font-normal leading-relaxed md:leading-[26px] pl-4 pr-12 outline-none" />

                    <!-- Icon inside input -->
                    <button type="submit"
                        class="absolute right-0 top-1/2 -translate-y-1/2 w-11 md:w-[44px] h-11 md:h-[44px] bg-[#4375E7] flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 44 44" fill="none">
                            <path
                                d="M21.1111 28.2222C25.0384 28.2222 28.2222 25.0384 28.2222 21.1111C28.2222 17.1837 25.0384 14 21.1111 14C17.1837 14 14 17.1837 14 21.1111C14 25.0384 17.1837 28.2222 21.1111 28.2222Z"
                                stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M29.9995 29.9995L26.1328 26.1328" stroke="white" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </form>
            </div>

            <!-- Recent Posts Card -->
            <div class="w-full lg:w-[380px] h-auto bg-[#EBEFF3] p-5 md:p-6 text-[#142137] font-poppins">
                <!-- Title -->
                <h2
                    class="text-xl md:text-[24px] font-semibold leading-relaxed md:leading-[34px] mb-6 md:mb-[26px] tracking-tight md:tracking-[-0.48px]">
                    <?php echo __('Recent Posts', 'laundryclean'); ?>
                </h2>
                

                <!-- Post Rows -->
                <div class="flex flex-row flex-wrap gap-4 lg:flex-col lg:flex-nowrap md:gap-6">
                    <?php 
                $recent_posts = wp_get_recent_posts([
                    'numberposts' => 3, 
                    'post_status' => 'publish',
                    'order' => 'DESC',
                    'orderby' => 'date',
                    'post_type' => 'post'
                ]);

                foreach($recent_posts as $posts):
                    setup_postdata($posts);
                ?>
                    <!-- Single Row -->
                    <div class="flex gap-5 items-center">
                        <!-- Left: Image -->
                        <div class="w-[90px] h-[100px] aspect-[9/10] flex-shrink-0 bg-gray-300">
                            <a href="<?php echo get_permalink($posts['ID']); ?>">
                                <?php if(has_post_thumbnail($posts['ID'])):?>
                                    <?php echo get_the_post_thumbnail($posts['ID'], 'thumbnail');
                                else: ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/post1.png" alt="<?php echo esc_attr(get_the_title($posts['post_title'])); ?>" />
                                <?php endif;?>
                            </a>
                        </div>

                        <!-- Right: Content -->
                        <div class="flex-1">
                            <!-- Date -->
                            <div class="flex items-center gap-1.5 text-[15px] text-[#142137B3] leading-[26px]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" viewBox="0 0 18 20"
                                    fill="none">
                                    <path d="M5.5 1V3.69865" stroke="#142137" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M12.6953 1V3.69865" stroke="#142137" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M4.59766 10.8955H11.7941" stroke="#142137" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M4.59766 14.4932H9.09541" stroke="#142137" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M12.6942 2.34961C15.6897 2.51153 17.1919 3.65396 17.1919 7.88184V13.4411C17.1919 17.1472 16.2924 19.0003 11.7946 19.0003H6.3973C1.89955 19.0003 1 17.1472 1 13.4411V7.88184C1 3.65396 2.50225 2.52052 5.49775 2.34961H12.6942Z"
                                        stroke="#142137" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <span>
                                    <?php echo get_the_date('M d, Y'); ?>
                                </span>
                            </div>
                            <!-- Title -->
                            <h3 class="text-[18px] font-medium leading-[28px] tracking-[-0.36px] mt-1">
                                <a href="<?php echo get_permalink($posts['ID']); ?>">
                                    <?php echo esc_html($posts['post_title']); ?>
                                </a>
                            </h3>
                        </div>
                    </div>

                <?php endforeach;
                wp_reset_postdata();
                 ?>
                </div>
            </div>

            <!-- Category Card -->
            <div class="w-full lg:w-[380px] h-auto flex-shrink-0 bg-[#EBEFF3] p-5 md:p-6 text-[#142137] font-poppins">
                <!-- Title -->
                <h2
                    class="text-xl md:text-[24px] font-semibold leading-relaxed md:leading-[34px] mb-6 tracking-tight md:tracking-[-0.48px]">
                    <?php echo __('Categories', 'laundryclean'); ?>
                </h2>

                <!-- Category List -->
                <div class="grid grid-cols-2 lg:grid-cols-1 gap-4">
                    <!-- Single Category -->
<?php 
$categories = get_categories([
    'orderby'    => 'name',
    'order'      => 'ASC',
    'hide_empty' => true,
]);

if ( ! empty( $categories ) ) :
    foreach ( $categories as $category ) :
        $cat_link  = esc_url( get_category_link( $category->term_id ) );
        $cat_name  = esc_html( $category->name );
        $cat_count = esc_html( $category->count );

        // Check if this category is active (current queried category)
        $is_active = ( is_category() && get_queried_object_id() === $category->term_id );

        if ( $is_active ) :
            ?>
            <div class="h-[46px] flex items-center justify-between bg-[#4375E7] border border-[#14213723] px-4">
                <a href="<?php echo $cat_link; ?>" class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="4" height="4" viewBox="0 0 4 4" fill="none">
                        <circle opacity="0.5" cx="2" cy="2" r="2" fill="#142137" />
                    </svg>
                    <span class="text-[15px] text-white font-medium leading-[26px]"><?php echo $cat_name; ?></span>
                </a>
                <span class="text-[15px] text-white font-medium leading-[26px]">(<?php echo $cat_count; ?>)</span>
            </div>
        <?php else : ?>
            <div class="h-[46px] flex items-center justify-between bg-[#F5F5F5] border border-[#14213723] px-4">
                <a href="<?php echo $cat_link; ?>" class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="4" height="4" viewBox="0 0 4 4" fill="none">
                        <circle opacity="0.5" cx="2" cy="2" r="2" fill="#142137" />
                    </svg>
                    <span class="text-[15px] text-[#142137] font-medium leading-[26px]"><?php echo $cat_name; ?></span>
                </a>
                <span class="text-[15px] text-[#142137] font-medium leading-[26px]">(<?php echo $cat_count; ?>)</span>
            </div>
        <?php 
        endif;
    endforeach;
else :
    echo '<div
                        class="h-[46px] flex items-center justify-between border border-[#14213723] bg-transparent px-4.5">
                        <div class="flex items-center gap-2">
                            <!-- Dot Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="4" height="4" viewBox="0 0 4 4" fill="none">
                                <circle opacity="0.5" cx="2" cy="2" r="2" fill="#142137" />
                            </svg>
                            <!-- Category Name -->
                            <span class="text-[15px] text-[#142137B3] font-medium leading-[26px]">
                                Laundry Services
                            </span>
                        </div>
                        <!-- Count -->
                        <span class="text-[15px] text-[#142137B3] font-medium leading-[26px]">(6)</span>
                    </div>

                    <div
                        class="h-[46px] flex items-center justify-between bg-[#4375E7] border border-[#14213723] px-4.5">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="4" height="4" viewBox="0 0 4 4" fill="none">
                                <circle opacity="0.5" cx="2" cy="2" r="2" fill="#142137" />
                            </svg>
                            <span class="text-[15px] text-white font-medium leading-[26px]">
                                Dry Cleaning
                            </span>
                        </div>
                        <span class="text-[15px] text-white font-medium leading-[26px]">(8)</span>
                    </div>

                    <div
                        class="h-[46px] flex items-center justify-between border border-[#14213723] bg-transparent px-4.5">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="4" height="4" viewBox="0 0 4 4" fill="none">
                                <circle opacity="0.5" cx="2" cy="2" r="2" fill="#142137" />
                            </svg>
                            <span class="text-[15px] text-[#142137B3] font-medium leading-[26px]">
                                Coats & Jackets
                            </span>
                        </div>
                        <span class="text-[15px] text-[#142137B3] font-medium leading-[26px]">(3)</span>
                    </div>

                    <div
                        class="h-[46px] flex items-center justify-between border border-[#14213723] bg-transparent px-4.5">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="4" height="4" viewBox="0 0 4 4" fill="none">
                                <circle opacity="0.5" cx="2" cy="2" r="2" fill="#142137" />
                            </svg>
                            <span class="text-[15px] text-[#142137B3] font-medium leading-[26px]">
                                Carpet & Rug Cleaning
                            </span>
                        </div>
                        <span class="text-[15px] text-[#142137B3] font-medium leading-[26px]">(5)</span>
                    </div>

                    <div
                        class="h-[46px] flex items-center justify-between border border-[#14213723] bg-transparent px-4.5">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="4" height="4" viewBox="0 0 4 4" fill="none">
                                <circle opacity="0.5" cx="2" cy="2" r="2" fill="#142137" />
                            </svg>
                            <span class="text-[15px] text-[#142137B3] font-medium leading-[26px]">
                                Shoe & Sneaker
                            </span>
                        </div>
                        <span class="text-[15px] text-[#142137B3] font-medium leading-[26px]">(7)</span>
                    </div>';
endif;
?>

                </div>

            </div>

            <!-- Popular Tags Card -->
            <div class="w-full lg:w-[380px] h-auto flex-shrink-0 bg-[#EBEFF3] p-5 md:p-6 text-[#142137] font-poppins">
                <!-- Title -->
                <h2
                    class="text-xl md:text-[24px] font-semibold leading-relaxed md:leading-[34px] mb-4 tracking-tight md:tracking-[-0.48px]">
                    <?php echo  __('Popular Tags', 'laundryclean'); ?>
                </h2>

                <!-- Tag List -->
                  <?php
                      wp_tag_cloud([
                          'smallest'  => 12,
                          'largest'   => 12,
                          'unit'      => 'px',
                          'number'    => 15,
                          'format'    => 'flat',
                          'separator' => " ",
                      ]);
                
                  ?>
               

            </div>

            <!-- Follow Us Card -->
            <div
                class="w-full hidden lg:flex lg:flex-col lg:w-[380px] h-auto md:h-[171px] flex-shrink-0 bg-[#EBEFF3] px-6 md:pl-[30px] md:pt-[24px] text-[#142137] font-poppins">
                <!-- Title -->
                <h2
                    class="text-xl md:text-[24px] font-semibold leading-relaxed md:leading-[34px] mb-6 tracking-tight md:tracking-[-0.48px]">
                    Follow Us
                </h2>

                <!-- Icons Row -->
                <div class="flex items-center gap-2 md:gap-2.5">

                        <a href="<?php echo esc_html(get_theme_mod('company_facebook'));?>" target="_blank" rel="noopener noreferrer"
                            class="flex items-center justify-center bg-white rounded-full shadow hover:bg-orange-500 hover:text-white transition">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50"
                                fill="none">
                                <circle cx="25" cy="25" r="25" fill="#1877F2" />
                                <path
                                    d="M31 14H27.7273C26.2806 14 24.8933 14.5795 23.8703 15.6109C22.8474 16.6424 22.2727 18.0413 22.2727 19.5V22.8H19V27.2H22.2727V36H26.6364V27.2H29.9091L31 22.8H26.6364V19.5C26.6364 19.2083 26.7513 18.9285 26.9559 18.7222C27.1605 18.5159 27.4379 18.4 27.7273 18.4H31V14Z"
                                    fill="white" />
                            </svg>
                        </a>

                        <a href="<?php echo esc_html(get_theme_mod('company_twitter'));?>" target="_blank" rel="noopener noreferrer"
                            class=" flex items-center justify-center bg-white rounded-full shadow hover:bg-orange-500 hover:text-white transition">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50"
                                fill="none">
                                <circle cx="25" cy="25" r="25" fill="#040618" />
                                <path
                                    d="M23.7255 27.0089C23.2439 27.5553 22.7731 28.0895 22.3024 28.624C20.7579 30.377 19.2128 32.1295 17.6709 33.8846C17.5961 33.9699 17.5193 34.0012 17.4072 33.9997C16.9966 33.9939 16.586 33.9977 16.1754 33.9971C16.1279 33.9971 16.0807 33.9928 16 33.9887C16.1604 33.8056 16.3021 33.6434 16.4443 33.482C18.4631 31.1907 20.4819 28.899 22.5007 26.6077C22.6514 26.4368 22.7984 26.2627 22.9544 26.0966C23.0177 26.0295 23.0139 25.9838 22.9629 25.9118C22.1478 24.7575 21.3357 23.6011 20.5224 22.4453C19.5782 21.1036 18.6332 19.7621 17.6888 18.4206C17.1459 17.6486 16.603 16.8767 16.0598 16.1047C16.0437 16.0816 16.0293 16.057 16.0006 16.0116C16.0683 16.0081 16.1191 16.0032 16.1695 16.0032C17.846 16.0026 19.5228 16.0038 21.1993 16C21.3122 15.9997 21.3756 16.0396 21.4369 16.1273C22.6244 17.8184 23.8149 19.5079 25.0043 21.1979C25.2996 21.6172 25.5938 22.0375 25.8888 22.4572C25.9246 22.5084 25.9619 22.5584 26.0091 22.6241C26.1642 22.4497 26.3118 22.2854 26.4578 22.1196C28.2203 20.1193 29.9827 18.1189 31.7431 16.1169C31.8126 16.0376 31.8821 15.9986 31.9921 16.0003C32.4074 16.0064 32.823 16.0026 33.2386 16.0029C33.2858 16.0029 33.333 16.0075 33.4128 16.0119C33.2257 16.2259 33.0594 16.4179 32.8913 16.6086C30.8658 18.9068 28.8409 21.2057 26.8121 23.501C26.7274 23.5968 26.7309 23.6598 26.8004 23.7582C28.5048 26.175 30.2059 28.5936 31.9082 31.0119C32.5713 31.9539 33.2354 32.8951 33.8985 33.8372C33.9287 33.8803 33.9569 33.9248 34 33.9899C33.9302 33.9931 33.8792 33.9971 33.8284 33.9971C32.1566 33.9974 30.4851 33.9962 28.8133 34C28.691 34.0003 28.6221 33.9595 28.5532 33.8612C27.3301 32.1179 26.1027 30.3776 24.8767 28.6364C24.5144 28.1222 24.1537 27.6067 23.7918 27.0919C23.775 27.0688 23.756 27.0474 23.7255 27.0089ZM31.8355 32.8827C31.7994 32.8257 31.7765 32.7849 31.7495 32.747C31.4791 32.369 31.2078 31.9918 30.9374 31.6141C28.923 28.8001 26.9086 25.9861 24.8943 23.1725C23.4911 21.2126 22.0871 19.2536 20.686 17.292C20.6236 17.2044 20.5608 17.165 20.4482 17.1656C19.7296 17.1708 19.0113 17.1679 18.2927 17.1682C18.2508 17.1682 18.2091 17.1729 18.1472 17.1766C18.1895 17.2391 18.2203 17.2865 18.2531 17.3325C19.9839 19.7485 21.7149 22.1639 23.4454 24.5799C25.404 27.3146 27.3624 30.0496 29.3178 32.7869C29.3776 32.8705 29.441 32.8922 29.536 32.8916C30.2496 32.8888 30.9632 32.8902 31.6771 32.8896C31.7228 32.8902 31.7695 32.8859 31.8355 32.8827Z"
                                    fill="white" />
                            </svg>
                        </a>

                        <a href="<?php echo esc_html(get_theme_mod('company_linkedin'));?>" target="_blank" rel="noopener noreferrer"
                            class="flex items-center justify-center bg-white rounded-full shadow hover:bg-orange-500 hover:text-white transition">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50"
                                fill="none">
                                <circle cx="25" cy="25" r="25" fill="#0A66C2" />
                                <path
                                    d="M28.732 21.3154C30.407 21.3154 32.0135 21.9808 33.198 23.1653C34.3825 24.3498 35.0479 25.9562 35.0479 27.6313V34.9998H30.8373V27.6313C30.8373 27.0729 30.6155 26.5374 30.2206 26.1426C29.8258 25.7478 29.2903 25.526 28.732 25.526C28.1736 25.526 27.6381 25.7478 27.2433 26.1426C26.8485 26.5374 26.6266 27.0729 26.6266 27.6313V34.9998H22.416V27.6313C22.416 25.9562 23.0814 24.3498 24.2659 23.1653C25.4504 21.9808 27.0569 21.3154 28.732 21.3154Z"
                                    fill="white" />
                                <path d="M18.2106 22.3682H14V34.9999H18.2106V22.3682Z" fill="white" />
                                <path
                                    d="M16.1053 19.2106C17.268 19.2106 18.2106 18.268 18.2106 17.1053C18.2106 15.9426 17.268 15 16.1053 15C14.9426 15 14 15.9426 14 17.1053C14 18.268 14.9426 19.2106 16.1053 19.2106Z"
                                    fill="white" />
                            </svg>
                        </a>

                        <a href="<?php echo esc_html(get_theme_mod('company_pinterest'));?>" target="_blank" rel="noopener noreferrer"
                            class="flex items-center justify-center bg-white rounded-full shadow hover:bg-orange-500 hover:text-white transition">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50"
                                fill="none">
                                <circle cx="25" cy="25" r="25" fill="#CB2027" />
                                <path
                                    d="M25.009 14C18.9289 14 14 18.9208 14 24.991C14 29.6496 16.8996 33.6298 20.9947 35.2309C20.8945 34.3629 20.814 33.0236 21.0305 32.0739C21.2297 31.2141 22.3169 26.6096 22.3169 26.6096C22.3169 26.6096 21.9911 25.9496 21.9911 24.9815C21.9911 23.4527 22.879 22.3132 23.9843 22.3132C24.9264 22.3132 25.38 23.0191 25.38 23.8605C25.38 24.8011 24.7822 26.2126 24.4646 27.5244C24.202 28.6188 25.0172 29.5143 26.0953 29.5143C28.0528 29.5143 29.557 27.4518 29.557 24.4844C29.557 21.8517 27.6637 20.0156 24.9544 20.0156C21.8198 20.0156 19.9799 22.3587 19.9799 24.783C19.9799 25.7236 20.3427 26.7372 20.795 27.2894C20.8867 27.3968 20.8962 27.4965 20.8686 27.6048C20.7869 27.9485 20.5971 28.6992 20.56 28.8534C20.5149 29.0524 20.3965 29.0971 20.1882 28.9982C18.8109 28.3559 17.9497 26.3565 17.9497 24.7375C17.9497 21.2725 20.4684 18.0889 25.2255 18.0889C29.0405 18.0889 32.0115 20.8032 32.0115 24.4397C32.0115 28.0761 29.6198 31.279 26.3032 31.279C25.1885 31.279 24.137 30.6998 23.7845 30.0123C23.7845 30.0123 23.2319 32.1105 23.0959 32.6265C22.8519 33.5852 22.1805 34.7797 21.7277 35.5123C22.7615 35.8277 23.8495 36 24.9909 36C31.0711 36 36 31.0792 36 25.009C36.0176 18.9208 31.0892 14 25.009 14Z"
                                    fill="white" />
                            </svg>
                        </a>
                </div>

            </div>
    </aside>