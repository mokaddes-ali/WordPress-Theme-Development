<?php
/**
 * Add module ajax call function
 * 
 * @package lessonlms
 */
function lessonlms_add_course_module() {

    check_ajax_referer( 'add_module_nonce', 'add_module_nonce_field' );

    if ( ! current_user_can( 'manage_options' ) ) {
        wp_send_json_error( 'Permission denied' );
    }

    $course_id   = intval( $_POST['select_course'] ?? 0 );
    $module_name = sanitize_text_field( $_POST['module_name'] ?? '' );
    $status      = sanitize_text_field( $_POST['module_status'] ?? 'disabled' );

    if ( ! $course_id || ! $module_name ) {
        wp_send_json_error( 'Required fields missing' );
    }

    $module_id = wp_insert_post([
        'post_title'  => $module_name,
        'post_type'   => 'course_modules',
        'post_status' => 'publish',
        'post_author' => get_current_user_id(),
    ]);

    if ( is_wp_error( $module_id ) ) {
        wp_send_json_error( 'Insert failed' );
    }

    update_post_meta( $module_id, '_lessonlms_course_id', $course_id );
    update_post_meta( $module_id, '_lessonlms_module_status', $status );
    ob_start();
    lessonlms_modules_table_callback();
    $table_html = ob_get_clean();

    wp_send_json_success([
        'message' => 'Module saved successfully',
        'html'    => $table_html,
    ]);
}
add_action( 'wp_ajax_lessonlms_add_module', 'lessonlms_add_course_module' );
function  lessonlms_modules_table_callback() {
    $user_id = get_current_user_id();
    ?>
 <div class="modules-lists">
            <h2>
                <?php echo esc_html__( 'Course List with module', 'lessonlms' ); ?>
            </h2>
            <table class="wp-list-table widefat fixed striped modules-table" id="course-modules-table">
                <thead>
                    <tr>
                        <th>
                            <?php echo esc_html__( 'Course Name', 'lessonlms' ); ?>
                        </th>
                        <th>
                            <?php echo esc_html__( 'Module Count', 'lessonlms' ); ?>
                        </th>
                        <th>
                            <?php echo esc_html__( 'Actions', 'lessonlms' ); ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                      $courses = get_posts( array(
                            'post_type'      => 'courses',
                            'posts_per_page' => -1,
                            'orderby'        => 'date',
                            'order'          => 'DESC',
                            'post_status'    => 'publish',
                            'author'         => $user_id,
                        ) );
                        if ( ! empty( $courses ) ) :
                        foreach ( $courses as $course ) :
                            $modules_count = count( get_posts( array(
                                'post_type'      => 'course_modules',
                                'meta_key'       => '_lessonlms_course_id',
                                'meta_value'     => $course->ID,
                                'posts_per_page' => -1,
                                'author'         => $user_id,
                            ) ) );

                            if ( $modules_count === 0 ) {
                                continue;
                            }
                            $has_module = true;
                            $course_title = $course->post_title ? $course->post_title : '-';
                    ?>
                        <tr>
                            <td>
                                <?php echo esc_html( $course_title ); ?>
                            </td>
                            <td class="module-name">
                                <?php echo esc_html( $modules_count ); ?>
                            </td>
                            <td>
                            <a href="<?php echo admin_url('admin.php?page=lessonlms_show_modules&course_id=' . $course->ID); ?>">
                                <?php echo esc_html__( 'View Modules', 'lessonlms' ); ?>
                            </a>

                            </td>
                        </tr>
                    <?php
                        endforeach;
                        if ( ! $has_module ) :
                    ?>
                    <tr>
                        <td colspan="3"><?php echo esc_html__( 'No courses with modules found.', 'lessonlms' ); ?></td>
                    </tr>
                    <?php
                    endif;
                    else :
                    ?>
                        <tr>
                            <td colspan="4"><?php echo esc_html__( 'No modules found.', 'lessonlms' ); ?></td>
                        </tr>
                    <?php
                    endif;
                    ?>
                </tbody>
            </table>
        </div>
<?php
}