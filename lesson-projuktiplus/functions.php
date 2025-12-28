<?php
/**
 * Theme Function
 * 
 * @package lessonlms
 */
    // Theme includes
    $theme_dir = get_template_directory();

    // Core functions
    include_once $theme_dir . '/inc/enqueue.php';
    include_once $theme_dir . '/inc/default.php';
    include_once $theme_dir . '/inc/handle-role.php';

    // Pagination
    include_once $theme_dir . '/inc/pagination.php';

    // Reviews & enroll
    include_once $theme_dir . '/inc/reviews.php';
    include_once $theme_dir . '/inc/enroll.php';

    // Submit feedback
    include_once $theme_dir . '/inc/submit-feedback.php'; 

    // Custom Post Types
    include_once $theme_dir . '/inc/admin/CPT/courses.php';
    include_once $theme_dir . '/inc/admin/CPT/testimonial.php';

    // Customizer
    include_once $theme_dir . '/inc/customizer/hero.php';
    include_once $theme_dir . '/inc/admin/customizer/courses.php';
    include_once $theme_dir . '/inc/admin/customizer/blog.php';
    include_once $theme_dir . '/inc/admin/customizer/blogpage.php';
    include_once $theme_dir . '/inc/admin/customizer/coursespage.php';
    include_once $theme_dir . '/inc/admin/customizer/cta.php';
    include_once $theme_dir . '/inc/admin/customizer/features.php';
    include_once $theme_dir . '/inc/admin/customizer/footer.php';

    // Customer registration
    include_once $theme_dir . '/inc/admin/customer-user-register.php';

    // Helpers
    include_once $theme_dir . '/inc/helpers/number-format.php';
    include_once $theme_dir . '/inc/helpers/image-structure.php';
    include_once $theme_dir . '/inc/helpers/enroll-course-count.php';


if ( isset( $_POST['student_change_password_submit'] ) ) {

    if ( ! isset( $_POST['student_change_password_nonce'] ) 
        || ! wp_verify_nonce( $_POST['student_change_password_nonce'], 'student_change_password' ) ) {
        wp_die( esc_html__( 'Security check failed.', 'lessonlms' ) );
    }

    $current_user = wp_get_current_user();
    $current_password = sanitize_text_field( $_POST['current_password'] );
    $new_password     = sanitize_text_field( $_POST['new_password'] );
    $confirm_password = sanitize_text_field( $_POST['confirm_password'] );

    // Check current password
    if ( ! wp_check_password( $current_password, $current_user->user_pass, $current_user->ID ) ) {
        echo '<p style="color:red;">' . esc_html__( 'Current password is incorrect.', 'lessonlms' ) . '</p>';
    } 
    // Check new password match
    elseif ( $new_password !== $confirm_password ) {
        echo '<p style="color:red;">' . esc_html__( 'New passwords do not match.', 'lessonlms' ) . '</p>';
    } 
    // Change password
    else {
        wp_set_password( $new_password, $current_user->ID );
        echo '<p style="color:green;">' . esc_html__( 'Password changed successfully.', 'lessonlms' ) . '</p>';
    }
}


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

add_action('init', function () {
    if (!session_id()) {
        session_start();
    }
});



function my_ajax_function() {
    if( isset($_POST['nonce']) && wp_verify_nonce($_POST['nonce'], 'my_ajax_action') ) :
        // echo 'Test';
          $arg = array(
            // 'post_type' => 'post',
            'post_type' => 'page',
            'post_per_page' => 1,
            'p' => $_POST['page_id_get'],
            // 'post_per_page' => 3,
            'post_status' => 'publish',
            'order' => 'date',
            'orderby' => 'DESC',
          );
    $blog_posts = new WP_Query( $arg );
    if ( $blog_posts->have_posts() ):
                while ( $blog_posts->have_posts() ):
                    $blog_posts->the_post();
                    ?>
                    <li><?php echo esc_html(get_the_content()); ?></li>
                    <?php
                endwhile;
                wp_reset_postdata();
                else : '<p> No post found';
            endif;
    else :
        echo 'error';
    endif;
    wp_die();
}
add_action( 'wp_ajax_my_ajax_action', 'my_ajax_function' );
add_action( 'wp_ajax_nopriv_my_ajax_action', 'my_ajax_function' );

function my_shortcode() {
    ob_start();
    ?>
 <!-- <button data-nonce="<?php echo wp_create_nonce( 'my_ajax_action' )?>" class="my-ajax-trigger">Test</button> -->
 <button data_id="8" data-nonce="<?php echo wp_create_nonce( 'my_ajax_action' )?>" class="my-ajax-trigger">Test</button>
 <ul class="show-data"></ul>
    <script>
    jQuery(document).ready(function($){
    $(".my-ajax-trigger").on("click", function(){
        const $nonce = $(this).data('nonce');
        // const $data = $(this).data('id');
        const $data = $(this).attr('data_id');
        $.ajax({
            url: '<?php echo esc_url( admin_url("admin-ajax.php")); ?>',
            type : 'POST',
            data : {
                action: 'my_ajax_action',
                nonce: $nonce,
                page_id_get : $data,
            },
            beforeSend: function( reponse){
                $(".show-data").empty();
                $(".show-data").append( 'loading.....' );
            },
            success: function( response ){
               $(".show-data").empty();
               $(".show-data").append( response );
            }
        })
    });
});
    </script>
<?php
return ob_get_clean();
}
add_shortcode( 'contact_test', 'my_shortcode' );

function sidebar_menu_ajax_handler() {

    check_ajax_referer(
        'sidebar_menu_ajax_action',
        'nonce'
    );

    if ( empty($_POST['tab']) ) {
        wp_send_json_error('No tab found');
    }

    $tab = sanitize_text_field($_POST['tab']);

    ob_start();

    if ( $tab === 'dashboard' ) {
        get_template_part('template-parts/student-dashboard/student', 'dashboard');
    }

    if ( $tab === 'profile' ) {
        get_template_part('template-parts/student-dashboard/student', 'profile');
    }

    if ( $tab === 'enrollments' ) {
        get_template_part('template-parts/student-dashboard/student', 'enrollemts');
    }

    wp_send_json_success( ob_get_clean() );
}
add_action( 'wp_ajax_sidebar_menu_ajax_action', 'sidebar_menu_ajax_handler' );




