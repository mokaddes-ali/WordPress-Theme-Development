<?php

/**
 * Template Name: Single Course Review
 * 
 * @package LessonLMS
 */
?>

<!-- Reviews Section -->
<div class="courses-tab-content" id="reviews">
    <h2 class="section-title">Students Review</h2>

    <!-- Review Form -->
    <div class="student-form">
        <h2 class="form-title">Add Review</h2>
        <form method="post" action="<?php echo esc_url(get_permalink()); ?>" class="review-form">
            <input type="hidden" name="course_id" value="<?php echo get_the_ID(); ?>">

            <!-- Star Rating -->
            <div class="star-rating">
                <?php for ($i = 5; $i >= 1; $i--): ?>

                    <input type="radio" name="rating" id="rating-<?php echo $i; ?>" value="<?php echo $i; ?>">

                    <label for="rating-<?php echo $i; ?>">★</label>
                <?php endfor; ?>
            </div>

            <!-- Name -->
            <div class="form-group">
                <label for="reviewer_name">Your Name</label>
                <input type="text" name="reviewer_name" id="reviewer_name" required />
            </div>

            <!-- Message -->
            <div class="form-group">
                <label for="review_text">Your Message</label>
                <textarea name="review_text" id="review_text" required></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" name="submit_review" class="review-btn">Submit Review</button>
        </form>
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