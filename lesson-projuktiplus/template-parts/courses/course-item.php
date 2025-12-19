<?php 
/**
 * Template Name: Course Item
 * 
 * @package lessonlms
 */

$stats = lessonlms_get_review_stats(get_the_ID());
$average_rating = $stats['average_rating']; 
?>

<div class="course">
    <div class="img">
        <a href="<?php echo esc_url(get_permalink()); ?>">
            <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail('custom-courses-image', ['class' => 'courses-image-size', 'alt' => get_the_title()]);
            } else {
                echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/courses-image1.png') . '" alt="course">';
            }
            ?>
        </a>
    </div>

    <div class="course-details">
        <!-- course title & rating -->
        <div class="flex">
            <span class="c-title">
                <a href="<?php echo esc_url(get_permalink()); ?>">
                    <?php the_title(); ?>
                </a>
            </span>

            <div class="rating">
                <?php get_template_part('template-parts/courses/course', 'rating-svg'); ?>
                <span>
                    <?php
                    echo esc_html(!empty( $average_rating ) ? $average_rating  : '0.0');
                    ?>
                </span>
            </div>
        </div>

        <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 10)); ?></p>

        <!-- price & button -->
        <div class="price-btn">
            <?php
            $price = get_post_meta(get_the_ID(), 'regular_price', true);
            $price = !empty($price) ? $price : '0.00';
            ?>
            <span class="price">$<?php echo esc_html($price); ?></span>

            <div class="black-btn book-now">
                <a href="<?php echo esc_url(get_permalink()); ?>">
                    <?php esc_html_e('Book Now', 'lessonlms'); ?>
                </a>
            </div>
        </div>
    </div>
</div>
