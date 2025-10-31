<div class="blog-header" style="display: flex; align-items: center; justify-content: space-between; width: 100%;">
    <div class="blog-heading">
        <h3><?php echo esc_html(get_theme_mod('blog_section_title', 'Our Blog')); ?></h3>
        <p><?php echo esc_html(get_theme_mod('blog_section_description', 'Read our regular travel blog and know the latest update of tour and travel')); ?></p>
    </div>

    <?php
    $blog_button_url = get_theme_mod('blog_button_url', get_permalink(get_option('page_for_posts')));
    $blog_button_text = get_theme_mod('blog_button_text', 'See Blogs');
    ?>
    <div class="yellow-bg-btn See-Courses-btn">
        <a href="<?php echo esc_url($blog_button_url); ?>">
            <?php echo esc_html($blog_button_text); ?>
        </a>
    </div>
</div>
