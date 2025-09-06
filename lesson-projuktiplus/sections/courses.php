<!----- Courses section ----->
<section class="courses">
    <div class="container">
        <div class="heading courses-heading">
            <h2>Our popular courses</h2>
            <p>Build new skills with new trendy courses and shine for the next future career.</p>
        </div>

        <div class="courses-wrapper slick-items">
            <?php
            $couses = new WP_Query(array(
                "post_type" => "courses",
                "posts_per_page" => 6,
                "orderby" => "date",
                "order" => "DESC",
            ));
            if ($couses->have_posts()):
                while ($couses->have_posts()): $couses->the_post();

                    $rating = get_post_meta(get_the_ID(), "rating", true);
                    $price  = get_post_meta(get_the_ID(), "price", true);


                    $rating = !empty($rating) ? $rating : "0.00";
                    $price = !empty($price) ? $price : '0.00';

            ?>
            <!----- course-1 ----->
            <div class="course course-1 active-btn">
                <div class="img">
                    <?php if (has_post_thumbnail()): ?>
                    <a href="<?php echo esc_url(get_permalink()); ?>">
                        <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>"
                            alt="<?php echo esc_attr(get_the_title()); ?>">
                    </a>
                    <?php else: ?>
                    <a href="<?php echo esc_url(get_permalink()); ?>">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/courses-image1.png'); ?>"
                            alt="course-1">
                    </a>
                    <?php endif; ?>
                </div>


                <div class="course-details">
                    <!----- course title and rating ----->
                    <div class="flex">
                        <span class="c-title">
                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                <?php echo esc_html(the_title()); ?>
                            </a>
                        </span>

                        <div class="rating">
                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z"
                                    fill="#FEA31B" />
                            </svg>

                            <span><?php echo esc_html($rating); ?></span>
                        </div>
                    </div>

                    <p>

                        <?php echo esc_html(wp_trim_words(get_the_excerpt(), 10)); ?>
                    </p>


                    <!----- price and btn ----->
                    <div class="price-btn">
                        <span class="price">$<?php echo esc_html($price); ?></span>


                        <div class="yellow-bg-btn book-now">
                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                <?php esc_html_e('Book Now', 'lessonlms'); ?>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <?php else: ?>
            <h2>Courses Not Found</h2>

            <?php endif;
            wp_reset_postdata(); ?>

        </div>


        <!-- cources button div -->
        <div class="" style="display: flex; margin-top:20px; align-items: center; justify-content: center;">
            <div class="yellow-bg-btn See-Courses-btn">
                <a href="<?php echo get_post_type_archive_link('courses'); ?>">
                    <?php echo esc_html_e('See Courses', 'lessonlms'); ?>
                </a>
            </div>
        </div>
    </div>
    </div>
</section>