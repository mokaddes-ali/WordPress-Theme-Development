<?php
/**
 * Enroll Functionality
 * 
 */
function lessonlms_handle_enrollmemt()
{
     $course = $_POST['course_id'];
    $course_id = isset($course) ? intval($course) : 0;

    if ($course_id <= 0) {
        wp_send_json_error('Invalid course ID');
    }

    $user_id = get_current_user_id();

    if ($user_id == 0) {
        wp_send_json_error('Please login first to enroll');
    }

    $current_enroll = get_post_meta($course_id, '_enrolled_students', true) ?: 0;
    $new_enroll_count = intval($current_enroll + 1);

    update_post_meta($course_id, '_enrolled_students', $new_enroll_count);

    $user_enrollments = get_user_meta($user_id, '_user_enrollments', true);
    if (!is_array($user_enrollments)) {
        $user_enrollments = array();
    }

    $user_enrollments[] = array(
        'course_id' => $course_id,
        'date'      => current_time('mysql'),
    );

    update_user_meta($user_id, '_user_enrollments', $user_enrollments);
    $formatted_enroll_count = number_format($new_enroll_count);
    wp_send_json_success($formatted_enroll_count);
}

add_action('wp_ajax_lessonlms_enroll_course', 'lessonlms_handle_enrollmemt');

add_action('wp_ajax_nopriv_lessonlms_enroll_course', 'lessonlms_handle_enrollmemt');


function lessonlms_ajax_script() {
    ?>
    <script type="text/javascript">
        var ajax_object = {
            ajaxurl: '<?php echo admin_url('admin-ajax.php') ?>',
        }
    </script>
    <?php

}
add_action('wp_head', 'lessonlms_ajax_script');


function lessonlms_dashboard_enrollment_widget(){
    global $wpdb;

$total_enrollments = $wpdb->get_var(
    "SELECT SUM(meta_value) FROM $wpdb->postmeta WHERE meta_key = '_enrolled_students'"
);


        $recent_enrollments = $wpdb->get_results(
            "SELECT u.user_login, p.post_title, um.meta_value
            FROM $wpdb->usermeta um
            JOIN $wpdb->users u ON u.ID = um.user_id 
            JOIN $wpdb->posts p ON um.meta_value LIKE CONCAT('%i:', p.ID, ';%')
            WHERE um.meta_key = '_user_enrollments'
            ORDER BY um.umeta_id DESC
            LIMIT 5 "
        );

    ?>
    <div class="enrollment-dashboard-widget">
        <h3> Enrollment Status </h3>

        <div class="enrollment-stats">
            <div class="stat-item">
                <span class="stat-number"> <?php echo number_format( $total_enrollments ?: 0 ); ?> </span>
                <span class="stat-label"> Total Enrollments: </span>
            </div>
        </div>

        <?php if ( $recent_enrollments) : ?>
            <div class="recent-enrollments">
                <h4> Last Enrollment </h4>

                <ul>
                    <?php foreach( $recent_enrollments as $recent_enrollment ) : ?>
                    <?php
                    $data_text = '';
                    $meta_value = maybe_unserialize( $recent_enrollment->meta_value );

                    if( is_array($meta_value)){
                        foreach ( $meta_value as $enroll_item ){
                            if( is_array($enroll_item) && isset($enroll_item['course_id']) && isset($enroll_item['date'])){
                                 $date_text = esc_html($enroll_item['date']);
                            }
                        }
                    }
                         ?>
                    <li>
                        <strong> <?php echo esc_html( $recent_enrollment->user_login ); ?> </strong>
                        - <?php echo esc_html($recent_enrollment->post_title ) ?>
                        <em style="color: #888;">(<?php echo $date_text ?: 'N/A'; ?>)</em>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php else : ?>
            <p>No recent enrollments found.</p>
         <?php endif; ?>
    </div>

    <?php

}

function lessonlms_add_enrollment_dashboard_widget(){
    wp_add_dashboard_widget(
        'enrollment_dashboard_widget',
        'Course Enrollment Status',
        'lessonlms_dashboard_enrollment_widget'
    );

}
add_action('wp_dashboard_setup', 'lessonlms_add_enrollment_dashboard_widget');