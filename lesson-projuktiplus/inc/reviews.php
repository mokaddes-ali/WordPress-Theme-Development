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

        // If user not login
        if ($user_id == 0) {
            wp_die('Please login to submit a review.');
        }

        // Validate
        if ($rating >= 1 && $rating <= 5 && !empty($review_text) && !empty($reviewer_name)) {

            $reviews = get_post_meta($course_id, '_course_reviews', true);
            if (!is_array($reviews)) {
                $reviews = [];
            }

            $updated = false;

            // Check if this user already reviewed?
            foreach ($reviews as &$review) {
                if ($review['user_id'] == $user_id) {

                    // Update old review
                    $review['rating'] = $rating;
                    $review['review'] = $review_text;
                    $review['name'] = $reviewer_name;
                    $review['date'] = current_time('mysql');

                    $updated = true;
                    break;
                }
            }

            // If no previous review, insert new
            if (!$updated) {
                $reviews[] = [
                    'rating' => $rating,
                    'review' => $review_text,
                    'name'   => $reviewer_name,
                    'user_id' => $user_id,
                    'date' => current_time('mysql'),
                ];
            }

            // Save meta
            update_post_meta($course_id, '_course_reviews', $reviews);

            // Update counts + avg rating
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


// Admin Menu
add_action('admin_menu', function() {
    add_menu_page(
        'Course Reviews',           // Page Title
        'Reviews',                  // Menu Title
        'manage_options',           // Capability
        'course-reviews',           // Menu Slug
        'lessonlms_reviews_page',   // Callback
        'dashicons-star-filled',    // Icon
        25                          // Position
    );
});

// Admin Page Callback
function lessonlms_reviews_page() {
    echo '<div class="wrap"><h1>Course Reviews</h1>';

    // All courses
    $courses = get_posts(['post_type'=>'courses','numberposts'=>-1]);

    foreach($courses as $course){
        $reviews = get_post_meta($course->ID,'_course_reviews',true);
        $reviews = is_array($reviews) ? $reviews : [];

        $review_count = count($reviews);
        $latest_review = end($reviews); // latest review

        echo '<h2>'.$course->post_title.' ('.$review_count.' Reviews)</h2>';

        if($review_count){
            echo '<table class="wp-list-table widefat fixed striped">';
            echo '<tr>
                <th>Author</th>
                <th>Message</th>
                <th>Rating</th>
                <th>Status</th>
                <th>Submitted On</th>
                <th>Actions</th>
            </tr>';

            // Show latest review only
            $author_id = isset($latest_review['user_id']) ? intval($latest_review['user_id']) : 0;
            $author_name = isset($latest_review['name']) ? $latest_review['name'] : 'Guest';
            $author_img = $author_id ? get_avatar($author_id, 32) : '';

            echo '<tr>';
            echo '<td>'.$author_img.' '.$author_name.'</td>';
            echo '<td>'.esc_html($latest_review['review']).'</td>';
            echo '<td>'.str_repeat('★',$latest_review['rating']).str_repeat('☆',5-$latest_review['rating']).'</td>';
            echo '<td>'.(isset($latest_review['status'])?$latest_review['status']:'pending').'</td>';
            echo '<td>'.date('F j, Y', strtotime($latest_review['date'])).'</td>';
            echo '<td>
                <a href="'.add_query_arg(['course'=>$course->ID,'approve'=>key($reviews)]).'">Approve</a> | 
                <a href="'.add_query_arg(['course'=>$course->ID,'reject'=>key($reviews)]).'">Reject</a> | 
                <a href="'.add_query_arg(['course'=>$course->ID,'delete'=>key($reviews)]).'">Delete</a> | 
                <a href="'.add_query_arg(['course'=>$course->ID,'all_reviews'=>1]).'">All Reviews</a>
            </td>';
            echo '</tr>';

            echo '</table>';
        } else {
            echo '<p>No reviews yet.</p>';
        }

        // Show all reviews if clicked
        if(isset($_GET['course']) && intval($_GET['course']) == $course->ID && isset($_GET['all_reviews'])){
            echo '<h3>All Reviews</h3>';
            echo '<table class="wp-list-table widefat fixed striped">';
            echo '<tr>
                <th>Author</th>
                <th>Message</th>
                <th>Rating</th>
                <th>Status</th>
                <th>Submitted On</th>
                <th>Actions</th>
            </tr>';
            foreach($reviews as $key => $review){
                $author_id = isset($review['user_id']) ? intval($review['user_id']) : 0;
                $author_name = isset($review['name']) ? $review['name'] : 'Guest';
                $author_img = $author_id ? get_avatar($author_id, 32) : '';

                echo '<tr>';
                echo '<td>'.$author_img.' '.$author_name.'</td>';
                echo '<td>'.esc_html($review['review']).'</td>';
                echo '<td>'.str_repeat('★',$review['rating']).str_repeat('☆',5-$review['rating']).'</td>';
                echo '<td>'.(isset($review['status'])?$review['status']:'pending').'</td>';
                echo '<td>'.date('F j, Y', strtotime($review['date'])).'</td>';
                echo '<td>
                    <a href="'.add_query_arg(['course'=>$course->ID,'approve'=>$key]).'">Approve</a> | 
                    <a href="'.add_query_arg(['course'=>$course->ID,'reject'=>$key]).'">Reject</a> | 
                    <a href="'.add_query_arg(['course'=>$course->ID,'delete'=>$key]).'">Delete</a>
                </td>';
                echo '</tr>';
            }
            echo '</table>';
        }
    }

    echo '</div>';
}

add_action('admin_init', function(){

    if(isset($_GET['course'])){

        $course_id = intval($_GET['course']);
        $reviews = get_post_meta($course_id,'_course_reviews', true);
        if(!is_array($reviews)) $reviews = [];

        // === APPROVE ===
        if(isset($_GET['approve'])){
            $reviews[intval($_GET['approve'])]['status'] = 'approved';
            update_post_meta($course_id,'_course_reviews',$reviews);

            wp_redirect(admin_url('admin.php?page=course-reviews'));
            exit;
        }

        // === REJECT ===
        if(isset($_GET['reject'])){
            $reviews[intval($_GET['reject'])]['status'] = 'rejected';
            update_post_meta($course_id,'_course_reviews',$reviews);

            wp_redirect(admin_url('admin.php?page=course-reviews'));
            exit;
        }

        // === DELETE (WORKS FROM BOTH NORMAL + ALL REVIEWS PAGE) ===
        if(isset($_GET['delete'])){
            unset($reviews[intval($_GET['delete'])]);
            $reviews = array_values($reviews);

            update_post_meta($course_id,'_course_reviews',$reviews);

            // যদি all_reviews page থেকে delete করে → normal page এ redirect করবে
            wp_redirect(admin_url('admin.php?page=course-reviews'));
            exit;
        }
    }

});
