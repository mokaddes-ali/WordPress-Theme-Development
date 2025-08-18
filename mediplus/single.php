<?php
/**
 * Template Name: Blog Single Page
 * Description: Custom blog single page template with comment form
 */

get_header();
?>

<?php get_template_part('sections/blogheading'); ?>

<section class="single-page-container">
  <!-- Left Section -->
  <div class="left-single-blog">

    <?php if (have_posts()):
      while (have_posts()):
        the_post(); ?>
        <div class="date">
          <div class="yellow-cercel"></div>
          <span><?php echo get_the_date(); ?></span>
        </div>
        <div class="single-blog-details-title"><?php echo get_the_title(); ?></div>

        <?php
        $author_id = get_the_author_meta('ID');
        $avatar_url = get_avatar_url($author_id, ['size' => 50]);
        if (!$avatar_url) {
          $avatar_url = 'https://via.placeholder.com/60';
        }
        ?>
        <div class="blog-meta-box">
          <div class="left-author">
            <img src="<?php echo esc_url($avatar_url); ?>" alt="Author" />
            <span>By <?php the_author(); ?></span>
          </div>
          <div class="right-comments">
            <i class="fa-regular fa-comments"></i>
            <span><?php echo get_comments_number(); ?> Comments</span>
          </div>
        </div>

        <div class="single-blog-img-wrapper">
          <?php if (has_post_thumbnail()): ?>
            <?php the_post_thumbnail('full', ['class' => 'single-blog-img']); ?>
          <?php else: ?>
            <img src="https://via.placeholder.com/800x400" alt="Blog Image" class="single-blog-img" />
          <?php endif; ?>
        </div>

        <div class="paragraph">
          <?php the_content(); ?>
        </div>

        <div class="tags">
          <strong>Tags:</strong>
          <?php
          if (get_the_tags()) {
            the_tags('<span>', '</span><span>', '</span>');
          } else {
            echo '<span>No Tags</span>';
          }
          ?>
        </div>

        <div class="blog-share">
          <div class="share">
            <strong>Share:</strong>
          </div>
          <div class="blog-social-links">
            <a href="https://twitter.com/intent/tweet?url=&text=<?php the_permalink(); ?>" target="_blank">
              <i class="fa-brands fa-square-twitter"></i>
            </a>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank">
              <i class="fa-brands fa-facebook"></i>
            </a>
            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" target="_blank">
              <i class="fa-brands fa-linkedin"></i>
            </a>
            <a href="https://api.whatsapp.com/send?text=<?php the_permalink(); ?>" target="_blank">
              <i class="fa-brands fa-whatsapp"></i>
            </a>
          </div>
        </div>

        <!-- Author Section -->
        <div class="bottom-user">
          <?php
          $author_id = get_the_author_meta('ID');
          $avatar_url = get_avatar_url($author_id, ['size' => 70]);
          $author_name = get_the_author();
          $author_description = get_the_author_meta('description', $author_id);

          if (!$avatar_url) {
            $avatar_url = 'https://via.placeholder.com/70';
          }
          ?>

          <img src="<?php echo esc_url($avatar_url); ?>" alt="">
          <div class="user-information-section">
            <div class="bottom-user-info">
              <?php if (!empty($author_name)): ?>
                <strong><?php echo esc_html($author_name); ?></strong>
              <?php else: ?>
                <strong>No author name found.</strong>
              <?php endif; ?>

              <?php if (!empty($author_description)): ?>
                <p><?php echo esc_html($author_description); ?></p>
              <?php else: ?>
                <p>No author description available.</p>
              <?php endif; ?>
            </div>
            <div class="socil-icon">
              <div class="user-social-links">
                <?php if (get_the_author_meta('user_url')): ?>
                  <a href="<?php echo get_the_author_meta('user_url'); ?>">
                    <i class="fa-brands fa-square-twitter"></i>
                  </a>
                <?php endif; ?>
                <?php if (get_the_author_meta('user_url')): ?>
                  <a href="<?php echo get_the_author_meta('user_url'); ?>">
                    <i class="fa-brands fa-facebook"></i>
                  </a>
                <?php endif; ?>
                <?php if (get_the_author_meta('user_url')): ?>
                  <a href="<?php echo get_the_author_meta('user_url'); ?>">
                    <i class="fa-brands fa-linkedin"></i>
                  </a>
                <?php endif; ?>
                <?php if (get_the_author_meta('user_url')): ?>
                  <a href="<?php echo get_the_author_meta('user_url'); ?>">
                    <i class="fa-brands fa-square-instagram"></i>
                  </a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>

        <!-- Comment Section -->
        <div class="comments">
          <h3>Comments (<?php echo get_comments_number(); ?>)</h3>
          <div class="divider"></div>

          <?php
          // Display existing comments
          $comments = get_comments(array(
            'post_id' => get_the_ID(),
            'status' => 'approve'
          ));
          
          if ($comments):
            foreach ($comments as $comment):
          ?>
              <div class="comment-item">
                <?php echo get_avatar($comment, 40); ?>
                <div class="comment-content">
                  <strong><?php echo $comment->comment_author; ?></strong> - 
                  <span class="time"><?php printf(__('%1$s ago'), human_time_diff(strtotime($comment->comment_date))); ?></span>
                  <p><?php echo $comment->comment_content; ?></p>
                </div>
              </div>
          <?php
            endforeach;
          else:
            echo '<p>No comments yet. Be the first to comment!</p>';
          endif;
          ?>
        </div>

        <!-- Comment Form -->
        <div class="leave-comment">
          <h3>Leave a Comment</h3>
          <?php
          // Handle form submission
          if (isset($_POST['submit_comment'])) {
            $comment_data = array(
              'comment_post_ID' => get_the_ID(),
              'comment_author' => sanitize_text_field($_POST['name']),
              'comment_author_email' => sanitize_email($_POST['email']),
              'comment_content' => sanitize_textarea_field($_POST['message']),
              'comment_type' => '',
              'comment_parent' => 0,
              'user_id' => get_current_user_id(),
              'comment_approved' => 1,
            );
            
            $comment_id = wp_insert_comment($comment_data);
            
            if ($comment_id) {
              echo '<div class="comment-success">Thank you for your comment!</div>';
            } else {
              echo '<div class="comment-error">There was an error submitting your comment.</div>';
            }
          }
          ?>
          
          <form method="post" class="comment-form">
            <div class="form-row-name-email">
              <input type="text" name="name" placeholder="Your Name" required>
              <input type="email" name="email" placeholder="Your Email" required>
            </div>
            <div class="form-row">
              <textarea name="message" placeholder="Your Comment" rows="5" required></textarea>
            </div>
            <div class="comment-button-wrapper">
              <button type="submit" name="submit_comment" class="comment-button">
                Submit Comment
              </button>
            </div>
          </form>
        </div>
        
      <?php endwhile; else: ?>
      <p>No posts found.</p>
    <?php endif; ?>

  </div>

  <!-- Right Section Sidebar -->
  <?php get_template_part('sections/sidebar'); ?>
</section>

<style>
/* Comment Section Styling */
.comments {
  margin: 40px 0;
  padding: 20px;
  background: #f9f9f9;
  border-radius: 8px;
}

.comments h3 {
  font-size: 24px;
  margin-bottom: 20px;
  color: #333;
}

.divider {
  height: 1px;
  background: #ddd;
  margin: 15px 0;
}

.comment-item {
  display: flex;
  margin: 20px 0;
  align-items: flex-start;
}

.comment-item img {
  border-radius: 50%;
  margin-right: 15px;
  width: 40px;
  height: 40px;
}

.comment-item.reverse {
  flex-direction: row-reverse;
}

.comment-item.reverse img {
  margin-right: 0;
  margin-left: 15px;
}

.comment-content {
  flex: 1;
}

.comment-content strong {
  color: #333;
  font-weight: 600;
}

.comment-content .time {
  color: #777;
  font-size: 13px;
}

.comment-content p {
  margin: 8px 0;
  color: #555;
  line-height: 1.5;
}

.reply-btn {
  background: none;
  border: none;
  color: #666;
  cursor: pointer;
  font-size: 13px;
  padding: 0;
}

.reply-btn:hover {
  color: #333;
}

/* Comment Form Styling */
.leave-comment {
  margin: 40px 0;
  padding: 30px;
  background: #f9f9f9;
  border-radius: 8px;
}

.leave-comment h3 {
  font-size: 24px;
  margin-bottom: 20px;
  color: #333;
}

.comment-form {
  margin-top: 20px;
}

.form-row-name-email {
  display: flex;
  gap: 20px;
  margin-bottom: 20px;
}

.form-row-name-email input {
  flex: 1;
  padding: 12px 15px;
  border: 1px solid #ddd;
  border-radius: 4px;
  font-size: 14px;
}

.form-row textarea {
  width: 100%;
  padding: 12px 15px;
  border: 1px solid #ddd;
  border-radius: 4px;
  font-size: 14px;
  min-height: 150px;
  margin-bottom: 20px;
}

.comment-button-wrapper {
  text-align: right;
}

.comment-button {
  background: #ffc107;
  color: #333;
  border: none;
  padding: 12px 25px;
  border-radius: 4px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s;
}

.comment-button:hover {
  background: #e0a800;
}

.comment-success {
  background: #d4edda;
  color: #155724;
  padding: 10px 15px;
  border-radius: 4px;
  margin-bottom: 20px;
}

.comment-error {
  background: #f8d7da;
  color: #721c24;
  padding: 10px 15px;
  border-radius: 4px;
  margin-bottom: 20px;
}

/* Responsive Design */
@media (max-width: 768px) {
  .form-row-name-email {
    flex-direction: column;
    gap: 15px;
  }
  
  .comment-item, 
  .comment-item.reverse {
    flex-direction: column;
  }
  
  .comment-item img,
  .comment-item.reverse img {
    margin: 0 0 15px 0;
  }
}
</style>

<?php
get_footer();
?>