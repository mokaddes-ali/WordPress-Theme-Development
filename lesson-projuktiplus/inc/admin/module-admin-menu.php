<?php
/**
 * Course Module In Admin Dashboard with Edit/Delete
 * 
 * @package lessonlms
 */

function lessonlms_add_course_module_in_admin() {
    add_menu_page(
        'Course Modules',
        'Course Modules',
        'manage_options',
        'courses-modules',
        'lessonlms_add_module_callback',
        'dashicons-welcome-learn-more',
        43
    );
}
add_action( 'admin_menu', 'lessonlms_add_course_module_in_admin' );


function lessonlms_add_module_callback() {
    ?>
    <div class="wrap lessonlms-wrap">
        <h1>Course Modules</h1>

        <form id="lessonlms-module-form">
            <?php wp_nonce_field( 'lessonlms_course_module_nonce', 'lessonlms_course_module_nonce_field' ); ?>
            <input type="hidden" name="module_id" id="module_id" value="">

            <p>
                <label for="select_courses"><strong>Select Course</strong></label>
                <select name="lessonlms_select_course" id="select_courses" required>
                    <option value="">— Select Course —</option>
                    <?php
                    $courses = get_posts(array(
                        'post_type' => 'courses',
                        'posts_per_page' => -1,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'post_status' => 'publish',
                        'author' => get_current_user_id()
                    ));
                    foreach($courses as $course) {
                        echo '<option value="'.esc_attr($course->ID).'">'.esc_html($course->post_title).'</option>';
                    }
                    ?>
                </select>
            </p>

            <p>
                <label for="course_modules_name">Module Name</label>
                <input type="text" name="course_modules_name" id="course_modules_name" required>
            </p>

            <p>
                <label>
                    <input type="checkbox" name="lessonlms_course_status" value="enabled"> Enable this Course Module
                </label>
            </p>

            <p>
                <button type="submit" class="button button-primary">Save Module</button>
            </p>
        </form>

        <div class="modules-lists">
            <h2>Modules List</h2>
            <table class="wp-list-table widefat fixed striped modules-table" id="course-modules-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Course</th>
                        <th>Module Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $modules = get_posts(array(
                        'post_type' => 'courses_contents',
                        'posts_per_page' => -1,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'author' => get_current_user_id()
                    ));

                    if($modules) {
                        foreach($modules as $module) {
                            $course_title = get_the_title(get_post_meta($module->ID,'_lessonlms_selected_course_module',true));
                            $module_name = get_post_meta($module->ID,'_lessonlms_module_name',true);
                            $status = get_post_meta($module->ID,'_lessonlms_course_module_status',true);
                            ?>
                            <tr data-id="<?php echo esc_attr($module->ID); ?>">
                                <td><?php echo esc_html($module->ID); ?></td>
                                <td><?php echo esc_html($course_title); ?></td>
                                <td class="module-name"><?php echo esc_html($module_name); ?></td>
                                <td class="module-status"><?php echo esc_html(ucfirst($status)); ?></td>
                                <td>
                                    <button class="button lessonlms-edit" data-id="<?php echo esc_attr($module->ID); ?>">Edit</button>
                                    <button class="button lessonlms-delete" data-id="<?php echo esc_attr($module->ID); ?>">Delete</button>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo '<tr><td colspan="5">No modules found.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .lessonlms-wrap { max-width: 900px; background: #fff; padding:20px; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.1); }
        .lessonlms-wrap input[type="text"], .lessonlms-wrap select { width:100%; padding:8px; border-radius:4px; border:1px solid #ccc; margin-bottom:12px; }
        .modules-table th, .modules-table td { padding:8px 12px; }
    </style>

    <script>
    jQuery(document).ready(function($){
        // Save or update module
        $('#lessonlms-module-form').on('submit', function(e){
            e.preventDefault();
            var data = {
                action: 'lessonlms_save_module_ajax',
                security: '<?php echo wp_create_nonce("lessonlms_module_ajax_nonce"); ?>',
                module_id: $('#module_id').val(),
                course_id: $('#select_courses').val(),
                module_name: $('#course_modules_name').val(),
                status: $('input[name="lessonlms_course_status"]').is(':checked') ? 'enabled' : 'disabled'
            };

            $.post(ajaxurl, data, function(response){
                if(response.success){
                    alert(response.data.message);
                    location.reload(); // Reload to show updated table
                } else {
                    alert(response.data.message);
                }
            });
        });

        // Edit button
        $('.lessonlms-edit').on('click', function(){
            var row = $(this).closest('tr');
            var id = $(this).data('id');
            var course = row.find('td:nth-child(2)').text();
            var name = row.find('.module-name').text();
            var status = row.find('.module-status').text().toLowerCase();

            $('#module_id').val(id);
            $('#course_modules_name').val(name);
            $('#select_courses option').filter(function(){ return $(this).text() === course; }).prop('selected', true);
            $('input[name="lessonlms_course_status"]').prop('checked', status === 'enabled');
        });

        // Delete button
        $('.lessonlms-delete').on('click', function(){
            if(!confirm('Are you sure to delete this module?')) return;
            var id = $(this).data('id');
            $.post(ajaxurl, {
                action: 'lessonlms_delete_module_ajax',
                security: '<?php echo wp_create_nonce("lessonlms_module_ajax_nonce"); ?>',
                module_id: id
            }, function(response){
                if(response.success){
                    alert(response.data.message);
                    location.reload();
                } else {
                    alert(response.data.message);
                }
            });
        });
    });
    </script>
    <?php
}

// AJAX save/update module
add_action('wp_ajax_lessonlms_save_module_ajax', function(){
    check_ajax_referer('lessonlms_module_ajax_nonce','security');

    $module_id = intval($_POST['module_id']);
    $course_id = intval($_POST['course_id']);
    $module_name = sanitize_text_field($_POST['module_name']);
    $status = sanitize_text_field($_POST['status']);

    if($module_id) {
        // Update existing
        wp_update_post(array('ID'=>$module_id, 'post_title'=>$module_name));
        update_post_meta($module_id,'_lessonlms_selected_course_module',$course_id);
        update_post_meta($module_id,'_lessonlms_module_name',$module_name);
        update_post_meta($module_id,'_lessonlms_course_module_status',$status);
        wp_send_json_success(array('message'=>'Module updated successfully!'));
    } else {
        // Create new
        $new_module_id = wp_insert_post(array(
            'post_type'=>'courses_contents',
            'post_title'=>$module_name,
            'post_status'=>'publish',
            'post_author'=>get_current_user_id()
        ));
        if($new_module_id){
            update_post_meta($new_module_id,'_lessonlms_selected_course_module',$course_id);
            update_post_meta($new_module_id,'_lessonlms_module_name',$module_name);
            update_post_meta($new_module_id,'_lessonlms_course_module_status',$status);
            wp_send_json_success(array('message'=>'Module created successfully!'));
        } else {
            wp_send_json_error(array('message'=>'Failed to create module.'));
        }
    }
});

// AJAX delete module
add_action('wp_ajax_lessonlms_delete_module_ajax', function(){
    check_ajax_referer('lessonlms_module_ajax_nonce','security');

    $module_id = intval($_POST['module_id']);
    if($module_id && wp_delete_post($module_id, true)){
        wp_send_json_success(array('message'=>'Module deleted successfully!'));
    } else {
        wp_send_json_error(array('message'=>'Failed to delete module.'));
    }
});

