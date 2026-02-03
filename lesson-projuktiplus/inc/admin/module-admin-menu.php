<?php

/**
 * Course Module In Admin Dashboard with Edit/Delete
 * 
 * @package lessonlms
 */

function lessonlms_add_course_module_in_admin()
{
    add_menu_page(
        'Course Modules',
        'Course Modules',
        'manage_options',
        'lesslms_courses_modules_slug',
        'lessonlms_add_module_callback',
        'dashicons-welcome-learn-more',
        35
    );
}
add_action('admin_menu', 'lessonlms_add_course_module_in_admin');

add_action( 'admin_post_lessonlms_save_module', 'lessonlms_save_course_module' );
function lessonlms_save_course_module() {

    // 1️⃣ Nonce verify
    if ( ! isset( $_POST['lessonlms_course_module_nonce_field'] ) 
        || ! wp_verify_nonce( $_POST['lessonlms_course_module_nonce_field'], 'lessonlms_course_module_nonce' ) ) {
        wp_die( 'Nonce verification failed!' );
    }

    // 2️⃣ Capability check
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( 'You are not allowed to do this.' );
    }

    // 3️⃣ Sanitize input
    $module_id   = isset( $_POST['course_module_id'] ) ? intval( $_POST['course_module_id'] ) : 0;
    $course_id   = isset( $_POST['lessonlms_select_course'] ) ? intval( $_POST['lessonlms_select_course'] ) : 0;
    $module_name = isset( $_POST['course_modules_name'] ) ? sanitize_text_field( $_POST['course_modules_name'] ) : '';
    $status      = isset( $_POST['lessonlms_course_status'] ) ? 'enabled' : 'disabled';

    // 4️⃣ Save as custom post (module)
    $module_data = array(
        'post_title'  => $module_name,
        'post_type'   => 'course_modules',
        'post_status' => 'publish',
        'post_author' => get_current_user_id(),
    );

    // Update or insert
    if ( $module_id > 0 ) {
        $module_data['ID'] = $module_id;
        $module_id = wp_update_post( $module_data );
    } else {
        $module_id = wp_insert_post( $module_data );
    }

    if ( $module_id ) {
        // save course relation & status as post meta
        update_post_meta( $module_id, '_lessonlms_course_id', $course_id );
        update_post_meta( $module_id, '_lessonlms_module_status', $status );
    }

    // 5️⃣ Redirect back with message
    $redirect_url = add_query_arg( 'message', 'saved', wp_get_referer() );
    wp_redirect( $redirect_url );
    exit;
}

add_action( 'admin_notices', function() {
    if ( isset($_GET['message']) && $_GET['message'] === 'saved' ) {
        echo '<div class="notice notice-success is-dismissible"><p>Module saved successfully!</p></div>';
    }
});

function lessonlms_add_module_callback()
{
    $user_id = get_current_user_id();
?>
    <div class="lessonlms-wrap">
        <div class="course-module-form">
            <h2><?php echo esc_html__( 'Add Course Module', 'lessonlms' ); ?></h2>

            <form id="lessonlms-module-form" method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>">
                <input type="hidden" name="action" value="lessonlms_save_module">
                <input type="hidden" name="course_module_id" value="">
                <?php wp_nonce_field('lessonlms_course_module_nonce', 'lessonlms_course_module_nonce_field'); ?>

                <p>
                    <label for="select_courses"><?php echo esc_html__( 'Select Course', 'lessonlms' ); ?></label>
                    <select name="lessonlms_select_course" id="select_courses" required>
                        <option value=""> --- <?php echo esc_html__( 'Select Course', 'lessonlms' ); ?> --- </option>
                        <?php
                        $courses = get_posts( array(
                            'post_type'      => 'courses',
                            'posts_per_page' => -1,
                            'orderby'        => 'date',
                            'order'          => 'DESC',
                            'post_status'    => 'publish',
                            'author'         => $user_id,
                        ) );
                        foreach ( $courses as $course ) :
                        ?>
                            <option value="<?php echo esc_attr( $course->ID ); ?>">
                                <?php echo esc_html( $course->post_title ); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </p>

                <p>
                    <label for="course_modules_name"><?php echo esc_html__( 'Module Name', 'lessonlms' ); ?></label>
                    <input type="text" name="course_modules_name" id="course_modules_name" required>
                </p>

                <p>
                    <label>
                        <input type="checkbox" name="lessonlms_course_status" value="enabled">
                        <?php echo esc_html__( 'Enable this Course Module', 'lessonlms' ); ?>
                    </label>
                </p>

                <p>
                    <button type="submit" class="button button-primary">
                        <?php echo esc_html__( 'Save Module', 'lessonlms' ); ?>
                    </button>
                </p>
            </form>
        </div>

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
    </div>
<?php
}

add_action('admin_menu', function() {
    add_submenu_page(
        null,
        'Course Modules', 
        'Course Modules', 
        'manage_options',
        'lessonlms_show_modules',
        'lessonlms_modules_page_callback'
    );
});

require __DIR__ . '/modules-list.php';





