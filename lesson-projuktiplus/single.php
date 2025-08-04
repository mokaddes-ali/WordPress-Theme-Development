<?php
/**
 * Template Name: Blog Single Page
 * Description: Custom blog single page template based on SVG design
 */

get_header();
?>

<main id="primary" class="site-main blog-single-template">
  <div class="container">
    <div class="blog-layout">
      <!-- Main Content Area -->
      <div class="blog-content">
        
        <!-- Featured Image -->
        <?php if (has_post_thumbnail()) : ?>
          <div class="featured-image">
            <?php the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
          </div>
        <?php endif; ?>
        
        <!-- Post Meta -->
        <div class="post-meta">
          <div class="author-avatar">
            <?php echo get_avatar(get_the_author_meta('ID'), 54); ?>
          </div>
          <div class="meta-content">
            <span class="author-name"><?php the_author(); ?></span>
            <span class="post-category"><?php the_category(', '); ?></span>
            <span class="post-date"><?php the_date(); ?></span>
            <span class="comment-count"><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></span>
          </div>
        </div>
        
        <!-- Post Title -->
        <h1 class="post-title"><?php the_title(); ?></h1>
        
        <!-- Post Content -->
        <div class="post-content">
          <?php the_content(); ?>
        </div>
        
        <!-- Featured Points -->
        <div class="feature-points">
          <div class="point">
            <div class="point-icon">
              <svg width="22" height="22" viewBox="0 0 22 22">
                <circle cx="11" cy="11" r="11" fill="#4375E7"/>
                <path d="M15.5 8L9.3125 14L6.5 11.2727" stroke="white" stroke-width="2" fill="none"/>
              </svg>
            </div>
            <h3>Professional Dry Cleaning & Laundry</h3>
            <p>Cleaning is more than just visiting places creating memories discovering new cultures.</p>
          </div>
          
          <div class="point">
            <div class="point-icon">
              <svg width="22" height="22" viewBox="0 0 22 22">
                <circle cx="11" cy="11" r="11" fill="#4375E7"/>
                <path d="M15.5 8L9.3125 14L6.5 11.2727" stroke="white" stroke-width="2" fill="none"/>
              </svg>
            </div>
            <h3>Fast & Reliable Laundry Services</h3>
            <p>Cleaning is more than just visiting places creating memories discovering new cultures.</p>
          </div>
        </div>
        
        <!-- Quote Section -->
        <div class="quote-section">
          <blockquote>
            <p><?php echo get_theme_mod('blog_quote_text', 'Cleaning is more than just visiting places—it\'s about creating lasting memories, discovering new cultures experiencing the extraordinary.'); ?></p>
            <cite><?php echo get_theme_mod('blog_quote_author', 'Don Guidelines'); ?></cite>
          </blockquote>
        </div>
        
        <!-- Image with Text Section -->
        <div class="image-text-section">
          <div class="image-half">
            <?php 
            $secondary_image = get_theme_mod('blog_secondary_image');
            if ($secondary_image) : ?>
              <img src="<?php echo esc_url($secondary_image); ?>" alt="Secondary blog image">
            <?php else : ?>
              <div class="placeholder-image"></div>
            <?php endif; ?>
          </div>
          <div class="text-half">
            <h2>A picture speaks of quality—just like fresh, professionally cleaned clothes.</h2>
            <p><?php echo get_theme_mod('blog_secondary_text', 'Cleaning is more than just visiting places—it\'s about creating lasting memories, discovering new cultures, and experiencing the extraordinary.'); ?></p>
          </div>
        </div>
        
        <!-- Author Box -->
        <div class="author-box">
          <div class="author-image">
            <?php 
            $author_image = get_theme_mod('blog_author_image');
            if ($author_image) : ?>
              <img src="<?php echo esc_url($author_image); ?>" alt="Author image">
            <?php else : ?>
              <div class="placeholder-author"></div>
            <?php endif; ?>
          </div>
          <div class="author-info">
            <span class="author-badge"><?php echo get_theme_mod('blog_author_title', 'CEO & CO-FOUNDER'); ?></span>
            <h3><?php echo get_theme_mod('blog_author_name', 'Lurch Schpellchek'); ?></h3>
            <p><?php echo get_theme_mod('blog_author_bio', 'We believe that fresh clean clothes bring confidence and comfort. With a passion for quality and convenience, we provide top-notch laundry & dry cleaning services tailored to meet your needs.'); ?></p>
            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="author-posts-link">See All Posts →</a>
            <div class="author-social">
              <!-- Social icons would go here -->
            </div>
          </div>
        </div>
        
        <!-- Tags and Share -->
        <div class="tags-share-section">
          <div class="tags">
            <h4>Related Tags:</h4>
            <?php the_tags('', '', ''); ?>
          </div>
          <div class="share">
            <h4>Social Share:</h4>
            <div class="social-icons">
              <!-- Social share buttons would go here -->
            </div>
          </div>
        </div>
        
        <!-- Post Navigation -->
        <div class="post-navigation">
          <div class="nav-previous">
            <?php previous_post_link('%link', '← PREVIOUS POST'); ?>
          </div>
          <div class="nav-next">
            <?php next_post_link('%link', 'NEXT POST →'); ?>
          </div>
        </div>
        
        <!-- Comments Section -->
        <div class="comments-section">
          <h2><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></h2>
          
          <?php if (comments_open() || get_comments_number()) : ?>
            <?php comments_template(); ?>
          <?php endif; ?>
        </div>
        
      </div>
      
      <!-- Sidebar -->
      <aside class="blog-sidebar">
        <!-- Search Widget -->
        <div class="sidebar-widget search-widget">
          <h3>Search</h3>
          <?php get_search_form(); ?>
        </div>
        
        <!-- Recent Posts Widget -->
        <div class="sidebar-widget recent-posts">
          <h3>Recent Posts</h3>
          <ul>
            <?php
            $recent_posts = wp_get_recent_posts(array(
              'numberposts' => 3,
              'post_status' => 'publish'
            ));
            foreach($recent_posts as $post) : ?>
              <li>
                <a href="<?php echo get_permalink($post['ID']); ?>">
                  <?php echo get_the_post_thumbnail($post['ID'], 'thumbnail'); ?>
                  <div class="post-info">
                    <span class="post-date"><?php echo get_the_date('', $post['ID']); ?></span>
                    <h4><?php echo $post['post_title']; ?></h4>
                  </div>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        
        <!-- Categories Widget -->
        <div class="sidebar-widget categories">
          <h3>Categories</h3>
          <ul>
            <?php
            $categories = get_categories(array(
              'orderby' => 'name',
              'order'   => 'ASC'
            ));
            
            foreach($categories as $category) {
              echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . ' (' . $category->count . ')</a></li>';
            }
            ?>
          </ul>
        </div>
        
        <!-- Tags Widget -->
        <div class="sidebar-widget tags">
          <h3>Popular Tags</h3>
          <div class="tag-cloud">
            <?php
            $tags = get_tags();
            foreach($tags as $tag) {
              echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
            }
            ?>
          </div>
        </div>
        
        <!-- Social Widget -->
        <div class="sidebar-widget social">
          <h3>Follow Us</h3>
          <div class="social-icons">
            <!-- Social icons would go here -->
          </div>
        </div>
      </aside>
    </div>
  </div>
</main>

<?php
get_footer();