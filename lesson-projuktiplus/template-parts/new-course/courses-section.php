<section class="courses">
    <div class="container">
        <?php get_template_part('template-parts/new-course/courses', 'heading'); ?>

        <div class="courses-wrapper slick-items">
            <?php
            $courses = new WP_Query([
                'post_type'      => 'courses',
                'posts_per_page' => 6,
                'meta_query'     =>[
                                  [
                                    'key'      => '_is_featured',
                                    'value'    => 'yes',
                                    'compare'  => '='
                                  ]
                              
                                   ],
                'orderby'        => 'date',
                'order'          => 'DESC',
            ]);

            if ($courses->have_posts()):
                while ($courses->have_posts()):
                    $courses->the_post();
                   get_template_part('template-parts/commom/course','card');
                endwhile;
                wp_reset_postdata();
            else:
                echo '<h2>' . __('Courses Not Found', 'lessonlms') . '</h2>';
            endif;
            ?>
        </div>
    </div>
</section>
