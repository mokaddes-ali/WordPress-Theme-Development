<section class="courses">
    <div class="container">
        <?php get_template_part('template-parts/courses/courses', 'heading'); ?>

        <div class="courses-wrapper slick-items">
            <?php
            $courses = new WP_Query([
                'post_type'      => 'courses',
                'posts_per_page' => 6,
                'orderby'        => 'date',
                'order'          => 'DESC',
            ]);

            if ($courses->have_posts()):
                while ($courses->have_posts()):
                    $courses->the_post();
                    get_template_part('template-parts/courses/course', 'item');
                endwhile;
                wp_reset_postdata();
            else:
                echo '<h2>' . __('Courses Not Found', 'lessonlms') . '</h2>';
            endif;
            ?>
        </div>

        <div class="flex justify-center mt-5">
            <div class="yellow-bg-btn See-Courses-btn">
                <a href="<?php echo esc_url(get_post_type_archive_link('courses')); ?>">
                    <?php esc_html_e('See Courses', 'lessonlms'); ?>
                </a>
            </div>
        </div>
    </div>
</section>
