<?php
/**
 * Theme Function
 * 
 * @package lessonlms
 */
function lessonlms_login_header() {
get_header();
}
add_action( 'login_header', 'lessonlms_login_header' );

function lessonlms_login_footer() {
 get_footer();
}
add_action( 'login_footer', 'lessonlms_login_footer' );


    // Theme includes
    $theme_dir = get_template_directory();
    $user = wp_get_current_user();

    // Core functions
    include_once $theme_dir . '/inc/enqueue.php';
    include_once $theme_dir . '/inc/default.php';

    // Pagination
    include_once $theme_dir . '/inc/pagination.php';

    // Reviews & enroll
    include_once $theme_dir . '/inc/reviews.php';
    include_once $theme_dir . '/inc/enroll.php';

    // Submit feedback
    include_once $theme_dir . '/inc/submit-feedback.php'; 

    // Custom Post Types
    include_once $theme_dir . '/inc/cpt/courses.php';
    include_once $theme_dir . '/inc/cpt/testimonial.php';

    // Customizer
    include_once $theme_dir . './inc/customizer.php';

    // Customer registration
    include_once $theme_dir . '/inc/admin/customer-user-register.php';

    if ( is_admin() && ! wp_doing_ajax() ) {

        $admin_paths = array(
        '/inc/admin/admin-access-control.php',
        '/inc/admin/dashboard-redirect.php',
        '/inc/admin/post-capabilities.php',
        '/inc/admin/user-roles.php',
    );
       foreach ( $admin_paths as $admin ) {
        require_once $theme_dir . $admin;
    }
}

if ( 
    ! is_admin() 
    && is_user_logged_in() 
    && in_array( 'student', (array) $user->roles, true )
) {
	require_once $theme_dir . '/inc/admin/hide-admin-bar.php';
}


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
function lessonlms_reset_password_link_action() {

    check_ajax_referer( 'lessonlms_reset_password_nonce', 'security' );

    $user_login = sanitize_text_field( $_POST['user_login'] ?? '' );

    if ( ! $user_login ) {
        wp_send_json_error( [
            'message' => 'User name / Email field is required.',
        ] );
    }

    // Check user by login or email
    $user = get_user_by( 'login', $user_login );
    if ( ! $user ) {
        $user = get_user_by( 'email', $user_login );
    }

    if ( ! $user ) {
        wp_send_json_error( [
            'message' => 'User not found with this username or email.',
        ] );
    }
    
    $otp = rand( 1000, 9999 );
    update_user_meta( $user->ID, 'store_user_otp', $otp );
    update_user_meta( $user->ID, 'store_user_time', time() );

    $message = "Hello {$user->user_login},\n\n";
    $message .= "You requested a password reset. Click the link below to reset your password:\n";
    $message .= "use this OTP to reset your password: {$otp}\n\n";
    $message .= "This OTP is valid for 10 minutes.";

    wp_mail(
        $user->user_email,
        'Password Reset Request',
        $message,
        [ 'Content-Type: text/plain; charset=UTF-8' ]
    );

    wp_send_json_success( [
        'message'      => 'Password reset link sent successfully. Please check your email.',
        'redirect_url' => home_url('/verify-otp/'),
    ] );
}

add_action( 'wp_ajax_lessonlms_reset_password_link_action', 'lessonlms_reset_password_link_action' );
add_action( 'wp_ajax_nopriv_lessonlms_reset_password_link_action', 'lessonlms_reset_password_link_action' );

add_filter( 'send_password_change_email', '__return_false' );
add_filter( 'send_email_change_email', '__return_false' );



function lessonlms_block_unverified_otp_user_login() {

    check_ajax_referer( 'lessonlms_ajax_nonce', 'security' );

    $username = sanitize_user( $_POST['log'] ?? '' );
    $password = $_POST['pwd'] ?? '';
    $remember = ! empty( $_POST['rememberme'] );

    if ( empty( $username ) || empty( $password ) ) {
        wp_send_json_error([ 'message' => 'Username or password is empty' ]);
    }

    $user = get_user_by( 'login', $username );
    if ( ! $user ) {
        $user = get_user_by( 'email', $username );
    }

    if ( ! $user ) {
        wp_send_json_error([ 'message' => 'Invalid username or password' ]);
    }

    $roles = (array) $user->roles;

    if ( in_array( 'student', $roles, true ) ) {

        $verified = (int) get_user_meta( $user->ID, 'otp_verified', true );

        if ( $verified !== 1 ) {
            lessonlms_generate_otp_send_otp( $user->ID );
             wp_send_json_success([
        'message'      => 'OTP sent successfully.',
        'redirect_url' => home_url('/verify-otp/'),
    ]);
            // wp_send_json_error([
            //     'message' => 'Your account is not verified. Please verify OTP first.'
            // ]);
        }
    }

    $credential_data = [
        'user_login'    => $username,
        'user_password' => $password,
        'remember'      => $remember,
    ];

    $signed_user = wp_signon( $credential_data, false );

    if ( is_wp_error( $signed_user ) ) {
        wp_send_json_error([
            'message' => $signed_user->get_error_message()
        ]);
    }

    if (
        in_array( 'administrator', $roles, true ) ||
        in_array( 'instructor', $roles, true )
    ) {
        wp_send_json_success( array(
            'redirect_url' => admin_url(),
        ) );
    }

    wp_send_json_success([
        'message'      => 'Login successful',
        'redirect_url' => home_url('/student-dashboard/'),
    ]);
}

add_action( 'wp_ajax_lessonlms_block_unverified_otp_user_login', 'lessonlms_block_unverified_otp_user_login' );
add_action( 'wp_ajax_nopriv_lessonlms_block_unverified_otp_user_login', 'lessonlms_block_unverified_otp_user_login' );

// Disable default registration email
add_filter( 'wp_new_user_notification_email', '__return_false' );
add_filter( 'wp_new_user_notification_email_admin', '__return_false' );

function lessonlms_custom_register_fields() {
    ?>
    <div class="custom-register-wrap">
        <p>
            <label for="user_password">
                 <?php echo esc_html__('Password', 'lessonlms') ?><br>
                <input type="password" name="user_password" id="user_password" class="input" value="" size="20" autocapitalize="off" autocomplete="user_password">
            </label>
        </p>

        <p>
            <label for="user_confirm_password">
                <?php echo esc_html__('Confirm Password', 'lessonlms') ?>
                <br>
                <input type="password" id="user_confirm_password" autocomplete="off" autocapitalize="off" name="user_confirm_password">
            </label>
        </p>

    </div>
    <?php
}
add_action('register_form', 'lessonlms_custom_register_fields');

function lessonlms_custom_register_validation_action() {

    // Verify nonce first
    check_ajax_referer( 'lessonlms_custom_register_nonce', 'security' );

    // Sanitize form inputs
    $user_name       = sanitize_text_field( $_POST['user_login'] ?? '' );
    $user_email      = sanitize_email( $_POST['user_email'] ?? '' );
    $user_pass       = $_POST['user_password'] ?? '';
    $user_confi_pass = $_POST['user_confirm_password'] ?? '';

    // Validation
    if ( ! $user_name ) {
        wp_send_json_error([ 'message' => 'User name field is required.' ]);
    }
    if ( ! $user_email ) {
        wp_send_json_error([ 'message' => 'User email field is required.' ]);
    }
    if ( ! $user_pass ) {
        wp_send_json_error([ 'message' => 'Password field is required.' ]);
    }
    if ( $user_pass !== $user_confi_pass ) {
        wp_send_json_error([ 'message' => 'Passwords do not match.' ]);
    }

    // Check if username or email exists
    if ( username_exists( $user_name ) ) {
        wp_send_json_error([ 'message' => 'Username already exists.' ]);
    }
    if ( email_exists( $user_email ) ) {
        wp_send_json_error([ 'message' => 'Email already exists.' ]);
    }

    // Create user
    $user_id = wp_create_user( $user_name, $user_pass, $user_email );
    if ( is_wp_error( $user_id ) ) {
        wp_send_json_error([ 'message' => $user_id->get_error_message() ]);
    }

    // Mark unverified and generate OTP
    update_user_meta( $user_id, 'lessonlms_otp_verified', 0 );
    lessonlms_generate_otp_send_otp( $user_id );

    // Return JSON success
    wp_send_json_success([
        'message'      => 'OTP sent successfully.',
        'redirect_url' => home_url('/verify-otp/'),
    ]);
}
add_action( 'wp_ajax_lessonlms_custom_register_validation_action', 'lessonlms_custom_register_validation_action' );
add_action( 'wp_ajax_nopriv_lessonlms_custom_register_validation_action', 'lessonlms_custom_register_validation_action' );


/**
 *  Generate OTP & send custom email
 */
function lessonlms_generate_otp_send_otp( $user_id ) {

    // Generate random 4-digit OTP
    $generate_otp = rand( 1000, 9999 );
    update_user_meta( $user_id, 'store_user_otp', $generate_otp );
    update_user_meta( $user_id, 'store_user_time', time() );

    // Get user data
    $user_data = get_userdata( $user_id );
    if ( ! $user_data ) return;

    // Send custom OTP email
    wp_mail(
        $user_data->user_email,
        'Verify your account',
        "Hello {$user_data->user_login},\n\nYour OTP is: {$generate_otp}\nThis OTP is valid for 5 minutes.",
        [ 'Content-Type: text/plain; charset=UTF-8' ]
    );
}


/**
 *  Disable default WordPress new user registration emails
 */
add_filter( 'wp_new_user_notification_email', '__return_false' );
add_filter( 'wp_new_user_notification_email_admin', '__return_false' );


/**
 * Save user password after registration
 */
function save_custom_register_data( $user_id ) {
    if ( ! empty( $_POST['user_password'] ) ) {
        wp_set_password( $_POST['user_password'], $user_id );
    }
}
add_action( 'user_register', 'save_custom_register_data' );


//delete otp after 5minute expire
function lessonlms_otp_expire_after_five_minute( $user_id ) {
    $get_otp_time = get_user_meta( $user_id, 'store_user_time', time() );

    if ( ! $get_otp_time ) {
        return true;
    }

    if ( time() - (int) $get_otp_time > 300 ) {
    delete_user_meta( $user_id, 'store_user_otp', true);
    delete_user_meta( $user_id, 'store_user_time', true );
    return true;
    }
    return false;
}

//! verify otp
function lessonlms_verify_user_otp( $user_id,  $input_otp ) {
    $stored_otp  = get_user_meta( $user_id, 'store_user_otp', true );
    $stored_time = get_user_meta( $user_id, 'store_user_time', true );

     if ( ! $stored_otp || ! $stored_time ) {
        return new WP_Error( 'otp_missing', 'OTP not found. Please resend OTP.' );
    }

     // Expire check (5 minutes = 300 sec)
    if ( time() - (int) $stored_time > 300 ) {

        delete_user_meta( $user_id, 'store_user_otp' );
        delete_user_meta( $user_id, 'store_user_time' );

        return new WP_Error( 'otp_expired', 'OTP expired. Please resend OTP.' );
    }

    if ( (string) $stored_otp !== (string) $input_otp ) {
        return new WP_Error( 'otp_invalid', 'Invalid OTP.' );
    }

    // SUCCESS
    update_user_meta( $user_id, 'lessonlms_otp_verified', 1 );

    delete_user_meta( $user_id, 'store_user_otp' );
    delete_user_meta( $user_id, 'store_user_time' );
    return true;
}



