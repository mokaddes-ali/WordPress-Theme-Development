<section class="testimonial">
    <div class="container">
        <div class="testimonial-items">
            <?php
            $testimonial = new WP_Query(array(
                'post_type' => 'testimonials',
                'posts_per_page' => 3,
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

    <div class="testimonial-submit">

        <div class="show-all-testimonial yellow-bg-btn See-Courses-btn">
            <a href="<?php echo esc_url( get_post_type_archive_link('testimonials')); ?>" > All Testimonial </a>
        </div>


        <div class="testimonial-submit-form black-btn See-Courses-btn">
            <a href="<?php echo home_url('/testimonial-submit');?>">Submit Feedback </a>
        </div>
    </div>
</section>
