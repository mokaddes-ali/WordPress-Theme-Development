<?php

/**
 * 
 * Blog Page
 * 
 * @package lessonlms
 */
get_header();
get_template_part("sections/pageTitle");

$blog_page_heading = get_theme_mod("blog_page_title", "Our All Blog");

$blog_page_description = get_theme_mod("blog_page_description", "Read our regular travel blog and know the latest update of tour and travel");
?>


<section class="see-all-blog" style="padding: 80px 0px 80px 0px;">
    <div class="container">
        <div class="blog-heading">
            <h3>
                <?php if ($blog_page_heading): ?>
                <?php echo esc_html($blog_page_heading); ?>
                <?php endif; ?>
            </h3>
            <p>
                <?php if ($blog_page_heading): ?>
                <?php echo esc_html($blog_page_description); ?>
                <?php endif; ?>
            </p>
        </div>


        <div class="" style="display: grid; gap: 20px; grid-template-columns: repeat(3, 1fr); margin: 60px 0px;">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => get_option('posts_per_page'),
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
                'paged' => $paged,
            );

            $blog_post = new WP_Query($args);
            if ($blog_post->have_posts()):
                while ($blog_post->have_posts()) : $blog_post->the_post();
            ?>
            <div class="sngle-blog">
                <div class="img">
                    <a href="<?php the_permalink(); ?>">
                        <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('post_custom-thumb', [
                                        'alt' => esc_attr(get_the_title()),
                                    ]);
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
            endif;
            ?>
        </div>
        <?php echo lessonlms_all_pagenav(); ?>

    </div>

</section>

<?php get_footer(); ?>