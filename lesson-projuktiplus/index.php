
<?php get_header();?> 

 <section class="page-section">
    <div class="overlay">
        <?php
    
                echo '<h1 class="page-title"  data-aos="fade-down"
                 data-aos-easing="linear"
                 data-aos-duration="1000">' . get_the_title(get_queried_object_id()) . '</h1>';
        ?>
    </div>
  </section>


<section class="see-all-blog">
    <div class="container">
  

      <div class="blog-" style="display: grid; gap: 20px; grid-template-columns: repeat(3, 1fr); margin: 60px 0px;">
                   <?php
             $args = array(
                'post_type'=> 'post',
                'posts_per_page' => get_option('posts_per_page'),
                'post_status' => 'publish',
                'orderby'=> 'date',
                'order' => 'DESC',
                'paged' => $paged,
             );

             $blog_post = new WP_Query($args);
            if ($blog_post->have_posts()):
            while ($blog_post->have_posts()) : $blog_post->the_post(); 
        ?>
            <div class="sngle-blog">
                <div class="img">
                    <a href="<?php the_permalink(); ?>">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('large');
                        } else {
                            echo '<img src="' . get_template_directory_uri() . '/assets/images/blog-img1.png" alt="Default Image">';
                        }
                        ?>
                    </a>
                </div>

                <div class="single-blog-details">
                    <div class="date">
                        <div class="yellow-cercel"></div>
                        <span>
                            <?php echo get_the_date('d F Y'); ?>
                        </span>
                    </div>

                    <hr>

                    <div class="blog-title">
                        <span>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </span>
                    </div>

                    <div class="yellow-bg-btn read-more">
                        <a href="<?php the_permalink(); ?>">
                            <?php _e('Read More', 'lessonlms'); ?>
                        </a>
                    </div>
                </div>
            </div>
                <?php 
                endwhile;
                 endif; 
                 ?>
        </div>
        <?php echo lessonlms_all_pagenav(); ?>
        
     </div>

</section>

    <?php get_footer();?>

   