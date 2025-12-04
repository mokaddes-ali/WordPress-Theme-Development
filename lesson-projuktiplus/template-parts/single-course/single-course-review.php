<?php

/**
 * Template Name: Single Course Review
 * 
 * @package LessonLMS
 */
  $user_id = get_current_user_id();
  $course_id = get_the_ID();
  $user_enrollments = get_user_meta($user_id, '_user_enrollments', true);
  $is_enrolled = false;

  if( is_array($user_enrollments)){
    foreach( $user_enrollments as $enrollment){
        if( intval($enrollment['course_id']) === $course_id){
           $is_enrolled = true;
           break;
        }
    }
  }

?>

<!-- Reviews Section -->
<div class="courses-tab-content" id="reviews">
    <h2 class="section-title">Students Review</h2>

    <!-- Warning (default: visible if not enrolled) -->
    <p class="review-warning" style="<?php echo (!empty($is_enrolled)) ? 'display:none;' : 'display:block;'; ?>">
        Please purchase course and login to submit a review.
    </p>

   <!-- Review Form -->
    <div class="student-form-wrapper" style="<?php echo (!empty($is_enrolled)) ? 'display:block;' : 'display:none;'; ?>">
    <div class="student-form">
        <h2 class="form-title"> 
            <?php echo esc_attr__("Add Review", "lessonlms");?>
            <span>*</span>
        </h2>
        <form method="post" action="<?php echo esc_url(get_permalink()); ?>" class="review-form">
            <input type="hidden" name="course_id" value="<?php echo get_the_ID(); ?>">

            <!-- Star Rating -->
            <div class="star-rating">
                <?php for ($i = 5; $i >= 1; $i--): ?>

                    <input type="radio" name="rating" id="rating-<?php echo $i; ?>" value="<?php echo $i; ?>" required>

                    <label for="rating-<?php echo $i; ?>">★</label>
                <?php endfor; ?>
            </div>

            <!-- Name -->
            <div class="form-group">
                <label for="reviewer_name">Your Name <span>*</span></label>
                <input type="text" name="reviewer_name" id="reviewer_name" required />
            </div>

            <!-- Message -->
            <div class="form-group">
                <label for="review_text">Your Message <span>*</span></label>
                <textarea name="review_text" id="review_text" required></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" name="submit_review" class="review-btn">Submit Review</button>
        </form>
    </div>
    </div>

    <!-- Reviews List -->
    <div class="student-reviews">
        <h2 class="section-title">All Reviews</h2>
        <?php
        $reviews = lessonlms_get_total_course_reviews(get_the_ID());
        if (!empty($reviews)) :
            foreach (array_reverse($reviews) as $review) : ?>
                <div class="single-review">

                    <div class="review-header">
                        <div class="reviewer-name">
                            <?php echo esc_html($review['name']); ?>
                        </div>
                        <div class="review-rating">
                            <?php
                            for ($i = 1; $i <= 5; $i++) {
                                echo ($i <= $review['rating']) ? '<span> ★ </span>' : '<span> ☆ </span>';
                            }
                            ?>
                        </div>
                    </div>

                    <div class="review-text">
                        <?php echo esc_html($review['review']); ?>
                    </div>
                    <div class="review-date">
                        <?php echo date('F j, Y', strtotime($review['date'])); ?>
                    </div>
                </div>
            <?php endforeach;
        else: ?>
            <p>No reviews yet. Be the first to review!</p>
        <?php endif; ?>
    </div>
</div>