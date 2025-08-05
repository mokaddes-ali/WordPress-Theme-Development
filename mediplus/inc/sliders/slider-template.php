<?php
// inc/slider/slider-template.php

function mediplus_show_slider() {
    $args = [
        'post_type' => 'slider',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order' => 'DESC',
    ];

    $slider_query = new WP_Query($args);

    if ($slider_query->have_posts()) :
        echo '<section class="slider"><div class="hero-slider">';
        while ($slider_query->have_posts()) : $slider_query->the_post();

            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            $heading = get_the_title();
            $description = get_the_content();
            $btn_text1 = get_field('slider_btn1_text');
            $btn_text2 = get_field('slider_btn2_text');
            ?>

            <div class="single-slider" style="background-image:url('<?php echo esc_url($thumbnail_url); ?>')">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="text">
                                <?php if ($heading): ?>
                                    <h1><?php echo esc_html($heading); ?></h1>
                                <?php endif; ?>

                                <?php if ($description): ?>
                                    <p><?php echo esc_html($description); ?></p>
                                <?php endif; ?>

                                <div class="button">
                                    <?php if ($btn_text1): ?>
                                        <a href="#" class="btn"><?php echo esc_html($btn_text1); ?></a>
                                    <?php endif; ?>

                                    <?php if ($btn_text2): ?>
                                        <a href="#" class="btn primary"><?php echo esc_html($btn_text2); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        endwhile;
        echo '</div></section>';
        wp_reset_postdata();
    endif;
}
