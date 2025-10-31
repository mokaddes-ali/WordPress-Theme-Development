<div class="hero-img-box">
    <?php if(get_theme_mod('hero_image')): ?>
        <img src="<?php echo esc_url(get_theme_mod('hero_image')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
    <?php else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/heor-img.png" alt="hero-img">
    <?php endif; ?>

    <div class="card-box">
        <?php get_template_part('template-parts/hero/cards'); ?>
    </div>
</div>
