<?php
global $post;

// Get the correct post ID
$post_id = is_singular() ? get_queried_object_id() : 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // Basic validation
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])) {
        wp_die('Please fill all required fields.');
    }
    
    $comment_data = [
        'comment_post_ID' => $post_id,
        'comment_author' => sanitize_text_field($_POST['name']),
        'comment_author_email' => sanitize_email($_POST['email']),
        'comment_content' => sanitize_textarea_field($_POST['message']),
        'comment_approved' => 1,
        'comment_type' => 'comment'
    ];
    
    $comment_id = wp_insert_comment(wp_slash($comment_data));
    
    if ($comment_id) {
        wp_redirect(get_permalink($post_id) . '?comment=success');
        exit;
    } else {
        wp_die('Error submitting comment. Please try again.');
    }
}
?>

