<section class="blog-detials-section">
  <div class="overlay">
    <div class="container">
     <h1 class="page-title" data-aos="fade-down"
                   data-aos-easing="linear"
                   data-aos-duration="1000">
                    <?php echo esc_html(wp_trim_words(get_the_title(), 8, '...'));?>
                  </h1>

      <!-- Breadcrumb Start -->
      <nav class="custom-breadcrumb" aria-label="breadcrumb">
        <ul>
          <li>
            <a href="<?php echo home_url(); ?>">
              <?php echo esc_html__('Home', 'lessonlms');?>
            </a>
          </li>
          <li class="breadcrumb-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
            </svg>
          </li>
            <li>
              <a href="<?php echo esc_url($blog_page_url); ?>">
              <?php echo esc_html__('Blog', 'lessonlms');?>
              </a>
            </li>
            <li class="breadcrumb-icon">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
              </svg>

            </li>
            <li><span class="current"><?php echo esc_html(wp_trim_words(get_the_title(), 8, '...'));?></span></li>
        </ul>
      </nav>
      <!-- ✅ Breadcrumb End -->
    </div>
  </div>
</section>