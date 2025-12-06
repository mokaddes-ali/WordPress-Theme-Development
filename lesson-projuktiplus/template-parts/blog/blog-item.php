<div class="sngle-blog">
    <div class="img">
        <a href="<?php the_permalink(); ?>">
            <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail('custom-blog-image', ['class' => 'blog-image']);
            } else {
                echo '<img src="' . get_template_directory_uri() . '/assets/images/blog-img1.png" alt="Default Image">';
            }
            ?>
        </a>
    </div>

    <div class="single-blog-details">
        <div class="date">
            <div class="yellow-cercel"></div>
            <span><?php echo get_the_date('d F Y'); ?></span>
        </div>

        <hr>

        <div class="blog-title">
            <span>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </span>
        </div>

        <div class="black-btn read-more">
            <a href="<?php the_permalink(); ?>"><?php _e('Read More', 'lessonlms'); ?></a>
        </div>
    </div>
</div>
