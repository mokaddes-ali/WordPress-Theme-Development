<?php
if( has_post_format('gallery') ) {
    $gallery_images = get_post_meta(get_the_ID(), 'gallery_images', true); // array of image URLs
    if($gallery_images):
?>
<div class="gallery-container">
    <?php foreach($gallery_images as $image): ?>
        <div class="gallery-item">
            <img src="<?php echo esc_url($image); ?>" alt="Gallery image" class="w-full h-auto object-cover rounded-md"/>
        </div>
    <?php endforeach; ?>
</div>


<?php
    endif;
}
?>
