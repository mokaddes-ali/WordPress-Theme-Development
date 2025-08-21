<?php
if ( have_posts() ) :
  while ( have_posts() ) : the_post();

    if ( has_post_format( 'gallery' ) ) {
      echo 'this is the gallery format';
    } else {
      echo 'this is not the gallery format';
    }

  endwhile;
endif;
?>

