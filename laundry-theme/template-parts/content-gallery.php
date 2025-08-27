<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h2 class="entry-title">', '</h2>'); ?>
    </header>

    <div class="entry-gallery">
        <h2><?php echo get_post_format(); ?></h2>

    </div>
</article>
