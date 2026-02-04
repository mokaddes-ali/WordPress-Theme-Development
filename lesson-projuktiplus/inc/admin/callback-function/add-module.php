<?php
/**
 * Add module callback function
 * 
 * @package lessonlms
 */
function lessonlms_add_module_callback()
{
    $user_id = get_current_user_id();
?>
    <div class="lessonlms-wrap">
        <div class="course-module-form">
            <h2><?php echo esc_html__( 'Add Course Module', 'lessonlms' ); ?></h2>

            <form id="lessonlms-module-form" method="post">
                    <input type="hidden" name="action" value="lessonlms_add_module">
                    <input type="hidden" name="course_module_id" value="">

                    <?php wp_nonce_field(
                        'lessonlms_add_module_nonce',
                        'lessonlms_add_module_nonce_field'
                    ); ?>
                <p>
                    <label for="select_courses"><?php echo esc_html__( 'Select Course', 'lessonlms' ); ?></label>
                    <select name="lessonlms_select_course" id="select_courses">
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
                    <input type="text" name="course_modules_name" id="course_modules_name">
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