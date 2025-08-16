<section class="blog-detials-section">
  <div class="overlay">
    <div class="container">
      <?php
      if (have_posts()):
        while (have_posts()) : the_post();
          echo '<h1 class="page-title" data-aos="fade-down"
                   data-aos-easing="linear"
                   data-aos-duration="1000">' .  esc_html__('Blog Details :', 'lessonlms'). ' ' . get_the_title() . '</h1>';
        endwhile;
      endif;
      ?>

      <!-- Breadcrumb Start -->
      <nav class="custom-breadcrumb" aria-label="breadcrumb">
        <ul>
          <li>
            <a href="<?php echo home_url(); ?>">
              Home
            </a>
          </li>
          <li class="breadcrumb-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
            </svg>
          </li>

          <?php if (is_single()) : ?>
            <?php
            $blog_page_id = get_option('page_for_posts');
            $blog_page_url = $blog_page_id ? get_permalink($blog_page_id) : site_url('/blog');
            ?>
            <li>
              <a href="<?php echo esc_url($blog_page_url); ?>">
                Blog
              </a>
            </li>
            <li class="breadcrumb-icon">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
              </svg>

            </li>
            <li><span class="current"><?php the_title(); ?></span></li>

          <?php elseif (is_page()) : ?>
            <li><span class="current"><?php the_title(); ?></span></li>
          <?php endif; ?>
        </ul>
      </nav>
      <!-- ✅ Breadcrumb End -->
    </div>
  </div>
</section>