<?php
/**
 * Template Part for Post Content
 *
 * @package LaundryTheme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h2 class="entry-title">', '</h2>'); ?>
    </header>
    <?php
    if(has_post_thumbnail()):
    ?>
    <div class="post-thumbnail">
        <?php the_post_thumbnail('full'); ?>
        
    </div>
    <?php endif; ?>
    <div class="entry-footer">
        <div class="post-meta">
            <span class="post-date"><?php echo get_the_date(); ?></span>
            <span class="post-author"><?php echo get_the_author(); ?></span>
        </div>
    </div>
</article>
