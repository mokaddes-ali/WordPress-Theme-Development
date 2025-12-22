<?php

include_once get_template_directory() .'/inc/enqueue.php';

include_once get_template_directory() .'/inc/default.php';

include_once get_template_directory() .'/inc/wideget.php';

// Default pagination
include_once get_template_directory() .'/inc/pagination.php';

include_once get_template_directory() .'/inc/reviews.php';
include_once get_template_directory() .'/inc/enroll.php';

 get_template_part('inc/submit-feedback');



// Custom Post Type
include_once get_template_directory() .'/inc/CPT/courses.php';
include_once get_template_directory() .'/inc/CPT/testimonial.php';

// Customizer
include_once get_template_directory() ."/inc/customizer/hero.php";
include_once get_template_directory() ."/inc/customizer/courses.php";
include_once get_template_directory() ."/inc/customizer/blog.php";
include_once get_template_directory() ."/inc/customizer/blogpage.php";
include_once get_template_directory() ."/inc/customizer/coursespage.php";
include_once get_template_directory() ."/inc/customizer/cta.php";
include_once get_template_directory() ."/inc/customizer/features.php";
include_once get_template_directory() ."/inc/customizer/footer.php";
require_once get_template_directory() . '/inc/customer-user-register.php';




// Modify default register form
add_action('register_form', 'custom_register_fields');
function custom_register_fields() {
    ?>
    <style>
        /* Hide username field */
        #user_login {
            display: none;
        }

        .custom-register-wrap p {
            margin-bottom: 12px;
        }

        .custom-register-wrap input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
        }
    </style>

    <div class="custom-register-wrap">

        <p>
            <label>Full Name<br>
                <input type="text" name="full_name"
                       value="<?php echo esc_attr($_POST['full_name'] ?? ''); ?>">
            </label>
        </p>

        <p>
            <label>Password<br>
                <input type="password" name="password">
            </label>
        </p>

        <p>
            <label>Confirm Password<br>
                <input type="password" name="confirm_password">
            </label>
        </p>

    </div>
    <?php
}

add_filter('registration_errors', 'custom_register_validation', 10, 3);
function custom_register_validation($errors, $sanitized_user_login, $user_email) {

    if (empty($_POST['full_name'])) {
        $errors->add('full_name_error', __('Full name is required.'));
    }

    if (empty($_POST['password'])) {
        $errors->add('password_error', __('Password is required.'));
    }

    if ($_POST['password'] !== $_POST['confirm_password']) {
        $errors->add('confirm_password_error', __('Passwords do not match.'));
    }

    return $errors;
}


add_filter('pre_user_login', 'generate_username_from_email');
function generate_username_from_email($username) {

    if (!empty($_POST['user_email'])) {
        $email = sanitize_email($_POST['user_email']);
        $username = sanitize_user(current(explode('@', $email)));
    }

    // If username exists, add random number
    if (username_exists($username)) {
        $username .= rand(100, 999);
    }

    return $username;
}

add_action('user_register', 'save_custom_register_data');
function save_custom_register_data($user_id) {

    // Save full name
    if (!empty($_POST['full_name'])) {
        update_user_meta(
            $user_id,
            'full_name',
            sanitize_text_field($_POST['full_name'])
        );
    }

    // Set password manually
    if (!empty($_POST['password'])) {
        wp_set_password($_POST['password'], $user_id);
    }
}


add_action('wp_ajax_filter_courses', 'lessonlms_filter_courses');
add_action('wp_ajax_nopriv_filter_courses', 'lessonlms_filter_courses');

function lessonlms_filter_courses(){

    $tax_query = [];
    $meta_query = [];

    if (!empty($_POST['category'])) {
        $tax_query[] = [
            'taxonomy' => 'course_category',
            'field' => 'term_id',
            'terms' => array_map('intval', $_POST['category']),
        ];
    }

    if (!empty($_POST['level'])) {
        $tax_query[] = [
            'taxonomy' => 'course_level',
            'field' => 'term_id',
            'terms' => array_map('intval', $_POST['level']),
        ];
    }

    if (!empty($_POST['language'])) {
        $meta_query[] = [
            'key' => 'language',
            'value' => array_map('sanitize_text_field', $_POST['language']),
            'compare' => 'IN',
        ];
    }

    $args = [
        'post_type' => 'courses',
        'post_status' => 'publish',
        'posts_per_page' => -1,
    ];

    if (!empty($tax_query)) {
        $args['tax_query'] = array_merge(['relation' => 'AND'], $tax_query);
    }

    if (!empty($meta_query)) {
        $args['meta_query'] = $meta_query;
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            get_template_part('template-parts/commom/course', 'card');
        endwhile;
    else :
        echo '<h2>Courses Not Found</h2>';
    endif;

    wp_die();
}


