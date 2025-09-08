   <?php
   /**
    * single post template
    */
    if (get_post_format() == 'gallery'):
                    $content = apply_filters('the_content', get_the_content());


                    preg_match_all('/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/i', $content, $matches);

                    $images = $matches[1];
                ?>
                    <div class="relative py-5 w-full h-auto aspect-[1160/570]">

                        <!-- Next and preview Button -->
                        <div class="absolute top-[25%] left-[5%] z-50 flex justify-between items-center w-[90%]">

                            <!-- Prev Button -->
                            <button id="blog-prev"
                                class="w-[44px] h-[44px] flex items-center justify-center rounded-full hover:bg-[#4375E7] transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                                    <rect width="50" height="50" rx="25" fill="white" />
                                    <path d="M32 25H18" stroke="#142137" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M25 18L18 25L25 32" stroke="#142137" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </button>

                            <!-- Next Button -->
                            <button id="blog-next"
                                class="w-[44px] h-[44px] flex items-center justify-center rounded-full hover:bg-[#4375E7] transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 54 54" fill="none">
                                    <rect width="54" height="54" rx="27" transform="matrix(-1 0 0 1 54 0)" fill="#4375E7" />
                                    <path d="M20 27.0007L34 27.0007" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M27 20.001L34 27.001L27 34.001" stroke="white" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                        <!-- Image Section -->
                        <?php if (!empty($images)): ?>
                            <!-- Slick Slider -->
                            <div class="blog-post-fade w-full h-auto">
                                <?php foreach ($images as $img_url): ?>
                                    <div class="w-full flex justify-center">
                                        <a href="<?php esc_html(the_permalink()); ?>">
                                            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"
                                                class="w-full h-[350px] lg:h-[410px] 2xl:h-[550px] object-cover" />
                                        </a>
                                    </div>
                                <?php endforeach; ?>

                            <?php endif; ?>
                            </div>
                    </div>
                    <?php endif; ?>