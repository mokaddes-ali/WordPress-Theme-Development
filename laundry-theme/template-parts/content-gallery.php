<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h2 class="entry-title">', '</h2>'); ?>
    </header>

    <div class="entry-gallery">
        <?php
        $content = get_the_content();
        preg_match_all('/<img[^>]+src="([^">]+)"/i', $content, $matches);

        if (!empty($matches[1])): ?>
            <div class="gallery">
                <?php foreach ($matches[1] as $img_url): ?>
                    <div class="gallery-thumbnail">
                        <img src="<?php echo esc_url($img_url); ?>" alt="">
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</article>
