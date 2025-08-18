<!----- our blog section ----->
<section class="blog">
    <div class="container">

        <div class="blog-heading">
            <h3>
                <?php echo esc_html(get_theme_mod('blog_section_title', 'Our Blog')); ?>
            </h3>
            <p>
                <?php echo esc_html(get_theme_mod('blog_section_description', 'Read our regular travel blog and know the latest update of tour and travel')); ?>
            </p>
        </div>


        <div class="blog-wrapper">
            <?php
            $blog_posts = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 6,
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
            ));

            if ($blog_posts->have_posts()):
                while ($blog_posts->have_posts()):
                    $blog_posts->the_post();
                    ?>
            <div class="sngle-blog">
                <div class="img">
                    <a href="<?php the_permalink(); ?>">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('large');
                        } else {
                            echo '<img src="' . get_template_directory_uri() . '/assets/images/blog-img1.png" alt="Default Image">';
                        }
                        ?>
                    </a>
                </div>

                <div class="single-blog-details">
                    <div class="date">
                        <div class="yellow-cercel"></div>
                        <span>
                            <?php echo get_the_date('d F Y'); ?>
                        </span>
                    </div>

                    <hr>

                    <div class="blog-title">
                        <span>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </span>
                    </div>

                    <div class="yellow-bg-btn read-more">
                        <a href="<?php the_permalink(); ?>">
                            <?php _e('Read More', 'lessonlms'); ?>
                        </a>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else:
                echo '<p>' . __('No Blog post found', 'lessonlms') . '</p>';
            endif;
            ?>
        </div>

    </div>
</section>