<section class="testimonial">
    <div class="container">
        <div class="testimonial-items">
            <?php
            $testimonial = new WP_Query(array(
                'post_type' => 'testimonials',
                'posts_per_page' => 3, // 🔧 fixed key name
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
            ));

            if ($testimonial->have_posts()) :
                while ($testimonial->have_posts()) :
                    $testimonial->the_post();
                    get_template_part('template-parts/testimonial/testimonial', 'item');
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>' . __('No testimonials found', 'lessonlms') . '</p>';
            endif;
            ?>
        </div>
    </div>
</section>
