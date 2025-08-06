<?php
/*
Template Name: Blog Page
Template Post Type: page
*/
get_header(); 
?>

<section class="blog">
  <div class="container">
    <h2>All Blog Posts</h2>

    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => 3,
      'post_status' => 'publish',
      'orderby' => 'date',
      'order' => 'DESC',
      'paged' => $paged
    );
    $blog_query = new WP_Query($args);
    $count = 0;

    if ($blog_query->have_posts()) :
      while ($blog_query->have_posts()) : $blog_query->the_post();
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
            <p><?php echo wp_trim_words(get_the_excerpt(), 10); ?></p>
            <a class="read-more" href="<?php the_permalink(); ?>">
              <?php _e('Read More', 'mediplus'); ?>
            </a>
          </div>
        </div>
    <?php
      endwhile;
    ?>

      <div class="pagination">
        <?php
        echo paginate_links(array(
          'total' => $blog_query->max_num_pages,
          'current' => $paged,
        ));
        ?>
      </div>

    <?php else :
      echo '<p>No posts found.</p>';
    endif;

    wp_reset_postdata();
    ?>
  </div>
</section>

<?php get_footer(); ?>
