<?php get_header(); ?>

<section class="page-section">
    <div class="overlay">
        <?php
        if (have_posts()):
            while (have_posts()) : the_post();
                echo '<h1 class="page-title"  data-aos="fade-down"
                 data-aos-easing="linear"
                 data-aos-duration="1000">' . get_the_title() . '</h1>';
            endwhile;
        endif;
        ?>
    </div>
</section>

<?php get_footer(); ?>