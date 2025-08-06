<?php
/**
 * Template Name: Blog Single Page
 * Description: Custom blog single page template based on SVG design
 */

get_header();
?>

<section class="blog-detials-section">
  <div class="overlay">
    <div class="container">
      <?php
      if (have_posts()):
          while (have_posts()) : the_post();
              echo '<h1 class="page-title" data-aos="fade-down"
                   data-aos-easing="linear"
                   data-aos-duration="1000">' . get_the_title() . '</h1>';
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


<section class="single-page-container">
  <!-- Left Section -->
  <div class="left-single-blog">
    <div class="date">
                        <div class="yellow-cercel"></div>
                        <span>
                           21 November 2024
                        </span>
                    </div>
    <div class="single-blog-details-title">This is the blog title heading</div>
    <div class="single-blog-author">
      <img src="https://i.pravatar.cc/40" alt="author">
      <div>By Mokaddes Ali</div>
    </div>
    <img class="single-blog-img" src="https://via.placeholder.com/800x400" alt="Blog Image">
    <div class="paragraph">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec nisl id lorem tincidunt pharetra. Donec vel nisi vitae dolor feugiat tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec nisl id lorem tincidunt pharetra. Donec vel nisi vitae dolor feugiat tempor
    </div>

    <div class="tags">
      <strong>Tags:</strong>
       <span>Web Design</span> 
       <span>Development</span>
        <span>Design</span>
    </div>

   <div class="blog-share">
    <div class="share">
        <strong>Share:</strong>
    </div>
    <div class="blog-social-links">
        <a href=""><i class="fa-brands fa-square-twitter"></i></a>
        <a href=""><i class="fa-brands fa-facebook"></i></a>
        <a href=""><i class="fa-brands fa-linkedin"></i></a>
        <a href=""><i class="fa-brands fa-square-instagram"></i></a>
    </div>
</div>

     <!-- user buttom detial -->
    <div class="bottom-user">
      <img src="https://i.pravatar.cc/80" alt="">
      <div class="user-information-section">
      <div class="bottom-user-info">
        <strong>Mokaddes Ali</strong>
        <p>Web Developer | Designer Web Developer | Designer</p>
      </div>
      <div class="socil-icon">
         <div class="user-social-links">
        <a href=""><i class="fa-brands fa-square-twitter"></i></a>
        <a href=""><i class="fa-brands fa-facebook"></i></a>
        <a href=""><i class="fa-brands fa-linkedin"></i></a>
        <a href=""><i class="fa-brands fa-square-instagram"></i></a>
    </div>
    </div>
      </div>
    </div>
<div class="comments">
  <h3>Comments: (3)</h3>
  <div class="divider"></div>

  <!-- Comment 1 -->
  <div class="comment-item">
    <img src="https://i.pravatar.cc/40?img=1" alt="User 1">
    <div class="comment-content">
      <strong>John Doe</strong> - <span class="time">2 days ago</span>
      <p>Great blog post. Really informative and helpful.</p>
      <button class="reply-btn">
        <i class="fa-solid fa-reply"></i> Reply
      </button>
    </div>
  </div>

  <!-- Comment 2 -->
  <div class="comment-item reverse">
    <div class="comment-content">
      <strong>Jane Smith</strong> - <span class="time">2 days ago</span>
      <p>Thanks for sharing this content!</p>
      <button class="reply-btn">
        <i class="fa-solid fa-reply"></i> Reply
      </button>
    </div>
    <img src="https://i.pravatar.cc/40?img=2" alt="User 2">
  </div>
</div>


    <div class="leave-comment">
      <h3>Leave a Comment</h3>
      <div class="divider"></div>
      <form>
        <div class="form-row">
          <input type="text" placeholder="Your Name">
          <input type="email" placeholder="Your Email">
        </div>
        <div class="form-row">
          <textarea placeholder="Your Comment"></textarea>
        </div>
        <div class="comment-button-wrapper">
  <button class="comment-button">
    <i class="fa-solid fa-paper-plane"></i> Submit
  </button>
</div>

      </form>
    </div>
  </div>

  <!-- Right Section -->
  <div class="right">

    <div class="card">
      <h4 class="blog-detail-right-heading">Search Posts</h4>
     <div class="search-box">
  <input type="text" placeholder="Search here...">
  <button><i class="fa-solid fa-magnifying-glass"></i></button>
</div>

    </div>

 <div class="card">
  <h4  class="blog-detail-right-heading">Recent Posts</h4>

  <div class="recent-post">
    <img src="https://via.placeholder.com/60" alt="">
    <div class="recent-post-info">
      <div class="recent-title">Post Title One</div>
      <div class="recent-date">1 day ago</div>
    </div>
  </div>

  <div class="recent-post">
    <img src="https://via.placeholder.com/60" alt="">
    <div class="recent-post-info">
      <div class="recent-title">Post Title Two</div>
      <div class="recent-date">2 days ago</div>
    </div>
  </div>

  <div class="recent-post">
    <img src="https://via.placeholder.com/60" alt="">
    <div class="recent-post-info">
      <div class="recent-title">Post Title Three</div>
      <div class="recent-date">3 days ago</div>
    </div>
  </div>
</div>


    <div class="card">
      <h4 class="blog-detail-right-heading">Categories</h4>
      <div class="category">
        <span>Web Design</span><span>(12)</span>
      </div>
      <div class="category">
        <span>Development</span><span>(8)</span>
      </div>
      <div class="category">
        <span>Marketing</span><span>(5)</span>
      </div>
    </div>

    <div class="card">
      <h4 class="blog-detail-right-heading">Follow Us</h4>
     <div class="social-icons">
  <!-- Facebook -->
  <a href="#" class="icon facebook"><i class="fa-brands fa-facebook-f"></i></a>
  
  <!-- Twitter/X -->
  <a href="#" class="icon twitter"><i class="fa-brands fa-x-twitter"></i></a>
  
  <!-- LinkedIn -->
  <a href="#" class="icon linkedin"><i class="fa-brands fa-linkedin-in"></i></a>
  
  <!-- Instagram -->
  <a href="#" class="icon instagram"><i class="fa-brands fa-instagram"></i></a>
</div>


  </div>
</div>
</section>


<?php
get_footer();
?>