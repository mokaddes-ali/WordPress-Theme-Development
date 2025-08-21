
<?php
/**
 * Template part for displaying posts with Gallery format
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <!-- Post Title -->
    <header class="entry-header">
        <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
    </header>

    <!-- Gallery Images -->
    <div class="entry-gallery">
        <?php
        $gallery = get_post_gallery( get_the_ID(), false );
        if ( ! empty( $gallery['ids'] ) ) {
            $ids = explode( ",", $gallery['ids'] );
            echo '<div class="post-gallery">';
            foreach ( $ids as $id ) {
                $img = wp_get_attachment_image( $id, 'large' );
                echo '<div class="gallery-item">' . $img . '</div>';
            }
            echo '</div>';
        } else {
            the_content(); // fallback
        }
        ?>
    </div>

    <!-- Post Content -->
    <div class="entry-content">
        <?php the_excerpt(); ?>
    </div>

</article>