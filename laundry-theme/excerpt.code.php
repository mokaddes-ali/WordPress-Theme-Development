<?php 
// Excerpt Settings

function laundryclean_excerpt_more($more) {
    global $post;
   return '<a class="read-more-btn" href="' . get_permalink($post->ID) . '">' . 'Read More' . '</a>';
}
add_filter('excerpt_more', 'laundryclean_excerpt_more');


function laundryclean_excerpt_length($length){
    return 44;
}
add_filter('excerpt_length', 'laundryclean_excerpt_length');
?>
