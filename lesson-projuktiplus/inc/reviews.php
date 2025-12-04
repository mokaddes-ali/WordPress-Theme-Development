<?php

/**
 * Course Reviews System Function
 */

function lessonlms_get_user_review($course_id, $user_id) {
    $reviews = get_post_meta($course_id, '_course_reviews', true);

    if (empty($reviews) || !is_array($reviews)) return false;

    foreach ($reviews as $review) {
        if (isset($review['user_id']) && intval($review['user_id']) === intval($user_id)) {
            return $review; 
        }
    }
    return false;
}


/*============= User Review Submit Process and Save =============*/ 
function lessonlms_handle_review_submission() {

    if (isset($_POST['submit_review']) && isset($_POST['course_id'])) {

        $course_id = intval($_POST['course_id']);
        $rating = intval($_POST['rating']);
        $review_text = sanitize_text_field($_POST['review_text']);
        $reviewer_name = sanitize_text_field($_POST['reviewer_name']);
        $user_id = get_current_user_id();

        // If user login
        if ($user_id == 0) {
            wp_die('Please login to submit a review.');
        }

        // Review process
        if ($rating >= 1 && $rating <= 5 && !empty($review_text) && !empty($reviewer_name)) {
            $reviews = get_post_meta($course_id, '_course_reviews', true);
            if (!is_array($reviews)) {
                $reviews = array();
            }

            $updated = false;

            $new_review = array(
                'rating' => $rating,
                'review' => $review_text,
                'name' => $reviewer_name,
                'user_id' => $user_id,
                'date' => current_time('mysql'),
            );

            $reviews[] = $new_review;
            update_post_meta($course_id, '_course_reviews', $reviews);

            lessonlms_update_review_stats($course_id);

            wp_redirect(add_query_arg('review_submitted', 'true', get_permalink($course_id)));
            exit;
        }
    }
}
add_action('init', 'lessonlms_handle_review_submission');




/*==== Course Review Total Count and get Average Rating Update ====*/

function lessonlms_update_review_stats($course_id)
{
    $reviews = get_post_meta($course_id, '_course_reviews', true);

    if (is_array($reviews) && !empty($reviews)) {
        $total_rating = 0;
        $review_count = count($reviews);

        foreach ($reviews as $review) {
            $total_rating = $total_rating + $review['rating'];
        }
        $average_rating = round($total_rating / $review_count, 1);

        update_post_meta($course_id, '_total_reviews', $review_count);
        update_post_meta($course_id, '_average_rating', $average_rating);
    }
}


/*====== Return Total Course Review and Average Rating =======*/
function lessonlms_get_review_stats($course_id)
{
    $total_reviews = get_post_meta($course_id, '_total_reviews', true) ?: 0;
    $average_rating = get_post_meta($course_id, '_average_rating', true) ?: 0;

    return array(
        'total_reviews' => $total_reviews,
        'average_rating' => $average_rating
    );
}


/*======== Return All Course Review in A Array ========*/
function lessonlms_get_total_course_reviews($course_id)
{
    $reviews = get_post_meta($course_id, '_course_reviews', true);
    return is_array($reviews) ? $reviews : array();
}