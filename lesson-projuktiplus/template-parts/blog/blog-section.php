<section class="blog">
    <div class="container">
        <!-- Header -->
        <?php get_template_part('template-parts/blog/blog', 'header'); ?>

        <!-- Blog Posts -->
        <div class="blog-wrapper">
            <?php
            $blog_posts = new WP_Query([
                'post_type' => 'post',
                'posts_per_page' => 6,
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
            ]);

            if ($blog_posts->have_posts()):
                while ($blog_posts->have_posts()):
                    $blog_posts->the_post();
             get_template_part("template-parts/commom/blog", "card");
                endwhile;
                wp_reset_postdata();
            else:
                echo '<p>' . __('No Blog post found', 'lessonlms') . '</p>';
            endif;
            ?>
        </div>
    </div>
</section>
