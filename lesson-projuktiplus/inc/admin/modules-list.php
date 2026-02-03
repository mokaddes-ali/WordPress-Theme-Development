<?php
function lessonlms_modules_page_callback() {
    $course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;

    if( ! $course_id ) {
        echo '<p>' . esc_html__( 'Please select a valid course to view modules.', 'lessonlms' ) . '</p>';
        return;
    }

    $course_title = get_the_title($course_id);
    $modules = get_posts(array(
        'post_type' => 'course_modules',
        'meta_key' => '_lessonlms_course_id',
        'meta_value' => $course_id,
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'ASC'
    ));
    ?>
    <div class="wrap">
        <h2>
            <?php echo esc_html( 'Modules for: ' . $course_title ); ?>
        </h2>

        <table class="wp-list-table widefat fixed striped modules-table">
            <thead>
                <tr>
                    <th>
                        <?php echo esc_html__( 'Module Name', 'lessonlms' ); ?>
                    </th>
                    <th>
                        <?php echo esc_html__( 'Status', 'lessonlms' ); ?>
                    </th>
                    <th>
                        <?php echo esc_html__( 'Actions', 'lessonlms' ); ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php if ( ! empty($modules) ) : ?>
                    <?php foreach($modules as $module) : 
                        $status = get_post_meta($module->ID, '_lessonlms_module_status', true);
                    ?>
                    <tr>
                        <td>
                            <?php echo esc_html( $module->post_title ); ?>
                        </td>
                        <td>
                            <?php echo esc_html( ucfirst($status) ); ?>
                        </td>
                        <td>
                            <button class="button lessonlms-edit" 
                                    data-nonce="<?php echo wp_create_nonce( 'module-edit-nonce' ); ?>" 
                                    data-id="<?php echo esc_attr( $module->ID ); ?>">
                                <?php echo esc_html__( 'Edit', 'lessonlms' ); ?>
                            </button>
                           <button class="button lessonlms-module-delete" 
        data-nonce="<?php echo wp_create_nonce( 'lessonlms_delete_module' ); ?>" 
        data-id="<?php echo esc_attr( $module->ID ); ?>">
    <?php echo esc_html__( 'Delete', 'lessonlms' ); ?>
</button>

                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3"><?php echo esc_html__( 'No modules found for this course.', 'lessonlms' ); ?></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php
}
add_action( 'wp_ajax_lessonlms_delete_module', 'lessonlms_delete_module_callback' );

function lessonlms_delete_module_callback() {

    if (
        ! isset($_POST['nonce']) ||
        ! wp_verify_nonce($_POST['nonce'], 'lessonlms_delete_module')
    ) {
        wp_send_json_error('Invalid nonce');
    }

    if ( ! current_user_can('manage_options') ) {
        wp_send_json_error('Permission denied');
    }

    $module_id = intval($_POST['module_id']);

    if ( ! $module_id || get_post_type($module_id) !== 'course_modules' ) {
        wp_send_json_error('Invalid module');
    }

    wp_delete_post($module_id, true);

    wp_send_json_success('Module deleted');
}
