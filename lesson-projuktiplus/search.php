<?php
get_header();
?>


    <!-- section heading -->
    <?php get_template_part('sections/searchheading'); ?>

<section >
  <div class="container " style="display: flex; gap: 40px; padding: 40px 0px 40px 0px;">
    <!-- left bloge search details -->
    <div class="blog-details" style="width: 70%;">
    <?php
    if (have_posts()) : ?>
   
    <?php
     $count = 0;
      while ( have_posts() ) : the_post();
      $count++;
      $is_even = $count % 2 === 0;
      ?>
  
        <div class="single-card <?php echo $is_even ? 'reverse' : ''; ?>">
          <div class="card-img">
            <a href="<?php the_permalink(); ?>">
              <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium'); ?>
              <?php endif; ?>
            </a>
          </div>
          <div class="card-content">
            <p class="post-date"><?php echo get_the_date('d M Y'); ?></p>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
            <a class="read-more" href="<?php the_permalink(); ?>">
              <?php _e('Read More', 'lessonlms'); ?>
            </a>
          </div>
        </div>
    <?php
      endwhile;
    ?>
       <!-- Pagination -->
       <?php lessonlms_all_pagenav()?>

   <?php else : ?>
    <div class="no-results-box">
        <h2 class="no-results-title">
            <?php _e( 'No Results Found', 'lessonlms' ); ?>
        </h2>
        <p class="no-results-text">
            <?php _e( 'Your search for', 'lessonlms' ); ?>
            <strong class="no-results-query">"<?php echo esc_html( get_search_query() ); ?>"</strong>
            <?php _e( 'did not match any results.', 'lessonlms' ); ?>
        </p>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="no-results-btn">
            <?php _e( 'Go Back Home', 'lessonlms' ); ?>
        </a>
    </div>
<?php endif; ?>


</div>
    
<?php  
get_sidebar();
?>
  </div>
</section>

<?php 
get_footer();
?>