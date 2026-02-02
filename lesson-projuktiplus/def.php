<?php
// ============================================
// 1. ENQUEUE SCRIPTS & STYLES
// ============================================

function amars_lms_enqueue_assets() {
    
    // Localize script
    wp_localize_script('amars-admin-js', 'amars_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'admin_url' => admin_url(),
        'nonce' => wp_create_nonce('amars_ajax_nonce'),
        'confirm_delete' => 'Are you sure you want to delete this?',
        'confirm_update' => 'Are you sure you want to update?',
        'processing' => 'Processing...',
        'success' => 'Operation successful!',
        'error' => 'Something went wrong!'
    ));
}
add_action('admin_enqueue_scripts', 'amars_lms_enqueue_assets');

// ============================================
// 2. CUSTOM POST TYPES & TAXONOMIES
// ============================================

// Register Custom Post Types and Taxonomies
function amars_register_custom_post_types() {
    
    // 1. COURSE Post Type
    register_post_type('amars_course',
        array(
            'labels' => array(
                'name' => 'Courses',
                'singular_name' => 'Course',
                'add_new' => 'Add New Course',
                'add_new_item' => 'Add New Course',
                'edit_item' => 'Edit Course',
                'all_items' => 'All Courses'
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'courses'),
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'author'),
            'menu_icon' => 'dashicons-welcome-learn-more',
            'show_in_rest' => true,
            'capability_type' => 'amars_course',
            'map_meta_cap' => true,
        )
    );
    
    // 2. LESSON Post Type
    register_post_type('amars_lesson',
        array(
            'labels' => array(
                'name' => 'Lessons',
                'singular_name' => 'Lesson',
                'add_new' => 'Add New Lesson',
                'add_new_item' => 'Add New Lesson',
                'edit_item' => 'Edit Lesson',
                'all_items' => 'All Lessons'
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'lesson'),
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions'),
            'menu_icon' => 'dashicons-book-alt',
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'amars_register_custom_post_types');


// Set Course Capabilities
function amars_set_course_capabilities() {
    $admin_caps = array(
        'edit_amars_course',
        'read_amars_course',
        'delete_amars_course',
        'edit_amars_courses',
        'edit_others_amars_courses',
        'publish_amars_courses',
        'read_private_amars_courses',
        'delete_amars_courses',
        'delete_private_amars_courses',
        'delete_published_amars_courses',
        'delete_others_amars_courses',
        'edit_private_amars_courses',
        'edit_published_amars_courses',
        'create_amars_courses'
    );
    
    // Administrator capabilities
    $admin_role = get_role('administrator');
    foreach ($admin_caps as $cap) {
        $admin_role->add_cap($cap);
    }
    
    // Instructor capabilities
    $instructor_role = get_role('amars_instructor');
    $instructor_caps = array(
        'edit_amars_course',
        'read_amars_course',
        'delete_amars_course',
        'edit_amars_courses',
        'publish_amars_courses',
        'delete_amars_courses',
        'delete_published_amars_courses',
        'edit_published_amars_courses',
        'create_amars_courses'
    );
    
    foreach ($instructor_caps as $cap) {
        $instructor_role->add_cap($cap);
    }
}
add_action('admin_init', 'amars_set_course_capabilities');

// ============================================
// 4. MODULE MANAGEMENT SYSTEM
// ============================================

// Register module meta
function amars_register_module_meta() {
    register_meta('term', '_module_course_id', array(
        'type' => 'integer',
        'description' => 'Associated Course ID',
        'single' => true,
        'show_in_rest' => true,
    ));
    
    register_meta('term', '_module_instructor_id', array(
        'type' => 'integer',
        'description' => 'Module Instructor ID',
        'single' => true,
        'show_in_rest' => true,
    ));
}
add_action('init', 'amars_register_module_meta');

// Add Module Manager Menu
function amars_add_module_manager_menu() {
    add_menu_page(
        'Module Manager',
        'Module Manager',
        'manage_options',
        'amars-module-manager',
        'amars_module_manager_page',
        'dashicons-category',
        30
    );
    
    add_submenu_page(
        'amars-module-manager',
        'Consistency Checker',
        'Consistency Checker',
        'manage_options',
        'amars-module-checker',
        'amars_module_consistency_checker'
    );
}
add_action('admin_menu', 'amars_add_module_manager_menu');

// Module Manager Page
function amars_module_manager_page() {
    ?>
    <div class="wrap">
        <h1>Module Manager <span class="badge" id="module-count">Loading...</span></h1>
        
        <div class="amars-module-manager">
            <!-- Create Module Form -->
            <div class="module-form-section">
                <h2><span class="dashicons dashicons-plus"></span> Create New Module</h2>
                <form id="create-module-form">
                    <?php wp_nonce_field('amars_create_module', 'amars_module_nonce'); ?>
                    
                    <div class="form-group">
                        <label for="module_name">Module Name *</label>
                        <input type="text" name="module_name" id="module_name" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="module_course">Assign to Course *</label>
                        <select name="module_course" id="module_course" class="form-control course-selector" required>
                            <option value="">-- Select Course --</option>
                            <?php
                            $user_id = get_current_user_id();
                            $args = array(
                                'post_type' => 'amars_course',
                                'posts_per_page' => -1,
                                'orderby' => 'title',
                                'order' => 'ASC'
                            );
                            
                            // If instructor, show only their courses
                            if (in_array('amars_instructor', (array) wp_get_current_user()->roles)) {
                                $args['author'] = $user_id;
                            }
                            
                            $courses = get_posts($args);
                            foreach ($courses as $course) {
                                echo '<option value="' . $course->ID . '">' . esc_html($course->post_title) . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="module_description">Description</label>
                        <textarea name="module_description" id="module_description" class="form-control" rows="4"></textarea>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <span class="dashicons dashicons-plus-alt"></span> Create Module
                        </button>
                        <button type="reset" class="btn btn-secondary">Clear Form</button>
                    </div>
                </form>
            </div>
            
            <!-- Modules List -->
            <div class="modules-list-section">
                <div class="section-header">
                    <h2><span class="dashicons dashicons-category"></span> Existing Modules</h2>
                    <div class="bulk-actions">
                        <button id="refresh-modules" class="btn btn-secondary btn-sm">
                            <span class="dashicons dashicons-update"></span> Refresh
                        </button>
                    </div>
                </div>
                
                <div id="modules-list-container">
                    <div style="text-align: center; padding: 40px;">
                        <div class="loading-spinner" style="width: 40px; height: 40px; margin: 0 auto;"></div>
                        <p>Loading modules...</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Edit Module Modal -->
        <div id="edit-module-modal" class="amars-modal">
            <div class="modal-content">
                <!-- AJAX loaded content -->
            </div>
        </div>
        
        <!-- Quick Stats -->
        <div class="quick-stats">
            <h3>Module Statistics</h3>
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number" id="total-modules">0</div>
                    <div class="stat-label">Total Modules</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" id="total-lessons">0</div>
                    <div class="stat-label">Total Lessons</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" id="unique-courses">0</div>
                    <div class="stat-label">Courses with Modules</div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
    jQuery(document).ready(function($) {
        // Load modules list
        function loadModulesList() {
            $.ajax({
                url: amars_ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'amars_get_modules_list',
                    nonce: amars_ajax.nonce
                },
                success: function(response) {
                    if (response.success) {
                        $('#modules-list-container').html(response.data.html);
                        bindModuleActions();
                    }
                }
            });
        }
        
        // Update stats
        function updateModuleStats() {
            $.ajax({
                url: amars_ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'amars_get_module_stats',
                    nonce: amars_ajax.nonce
                },
                success: function(response) {
                    if (response.success) {
                        $('#total-modules').text(response.data.total_modules);
                        $('#total-lessons').text(response.data.total_lessons);
                        $('#unique-courses').text(response.data.unique_courses);
                        $('#module-count').text(response.data.total_modules);
                    }
                }
            });
        }
        
        // Refresh button
        $('#refresh-modules').click(function() {
            loadModulesList();
            updateModuleStats();
        });
        
        // Initial load
        loadModulesList();
        updateModuleStats();
    });
    </script>
    <?php
}

// ============================================
// 5. LESSON MANAGEMENT SYSTEM
// ============================================

// Add Lesson Manager Menu
function amars_add_lesson_manager_menu() {
    add_menu_page(
        'Lesson Manager',
        'Lesson Manager',
        'manage_options',
        'amars-lesson-manager',
        'amars_lesson_manager_page',
        'dashicons-book-alt',
        31
    );
}
add_action('admin_menu', 'amars_add_lesson_manager_menu');

// Lesson Manager Page
function amars_lesson_manager_page() {
    ?>
    <div class="wrap">
        <h1>Lesson Manager <span class="badge" id="lesson-count">Loading...</span></h1>
        
        <!-- Quick Actions -->
        <div class="quick-actions">
            <button id="create-lesson-quick" class="button button-primary">
                <span class="dashicons dashicons-plus-alt"></span> Create New Lesson
            </button>
            <button id="refresh-lessons" class="button button-secondary">
                <span class="dashicons dashicons-update"></span> Refresh List
            </button>
        </div>
        
        <!-- Lesson Filters -->
        <div class="lesson-filters">
            <div class="filter-grid">
                <div>
                    <label><strong>Course Filter:</strong></label>
                    <select id="filter-course" class="form-control course-filter">
                        <option value="">All Courses</option>
                        <?php
                        $user_id = get_current_user_id();
                        $args = array(
                            'post_type' => 'amars_course',
                            'posts_per_page' => -1,
                            'orderby' => 'title',
                            'order' => 'ASC'
                        );
                        
                        if (in_array('amars_instructor', (array) wp_get_current_user()->roles)) {
                            $args['author'] = $user_id;
                        }
                        
                        $courses = get_posts($args);
                        foreach ($courses as $course) {
                            echo '<option value="' . $course->ID . '">' . esc_html($course->post_title) . '</option>';
                        }
                        ?>
                    </select>
                </div>
                
                <div>
                    <label><strong>Module Filter:</strong></label>
                    <select id="filter-module" class="form-control module-filter">
                        <option value="">All Modules</option>
                    </select>
                </div>
                
                <div>
                    <label><strong>Status:</strong></label>
                    <select id="filter-status" class="form-control">
                        <option value="">All Status</option>
                        <option value="publish">Published</option>
                        <option value="draft">Draft</option>
                        <option value="pending">Pending</option>
                    </select>
                </div>
                
                <div>
                    <label><strong>Search:</strong></label>
                    <input type="text" id="lesson-search" class="form-control" placeholder="Search lessons...">
                </div>
            </div>
            
            <div class="filter-actions">
                <button id="apply-filters" class="button button-primary">Apply Filters</button>
                <button id="clear-filters" class="button button-secondary">Clear All</button>
            </div>
        </div>
        
        <!-- Lessons List Container -->
        <div id="lessons-list-container">
            <div style="text-align: center; padding: 50px;">
                <div class="loading-spinner" style="width: 50px; height: 50px; margin: 0 auto;"></div>
                <p>Loading lessons...</p>
            </div>
        </div>
        
        <!-- Create/Edit Lesson Modal -->
        <div id="lesson-modal" class="amars-modal">
            <div class="modal-content">
                <!-- AJAX loaded content -->
            </div>
        </div>
        
        <!-- Lesson Statistics -->
        <div class="lesson-stats">
            <h3>Lesson Statistics</h3>
            <div class="stats-grid" id="lesson-stats-grid">
                <div class="stat-item">
                    <div class="stat-number">0</div>
                    <div class="stat-label">Total Lessons</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">0</div>
                    <div class="stat-label">Published</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">0</div>
                    <div class="stat-label">Draft</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">0</div>
                    <div class="stat-label">Pending</div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
    jQuery(document).ready(function($) {
        let currentFilters = {};
        
        // Load lessons
        function loadLessons() {
            $.ajax({
                url: amars_ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'amars_get_lessons_list',
                    nonce: amars_ajax.nonce,
                    filters: currentFilters
                },
                success: function(response) {
                    if (response.success) {
                        $('#lessons-list-container').html(response.data.html);
                        $('#lesson-count').text(response.data.count);
                        bindLessonActions();
                    }
                }
            });
        }
        
        // Load lesson stats
        function loadLessonStats() {
            $.ajax({
                url: amars_ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'amars_get_lesson_stats',
                    nonce: amars_ajax.nonce
                },
                success: function(response) {
                    if (response.success) {
                        $('#lesson-stats-grid').html(`
                            <div class="stat-item">
                                <div class="stat-number">${response.data.total}</div>
                                <div class="stat-label">Total Lessons</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">${response.data.published}</div>
                                <div class="stat-label">Published</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">${response.data.draft}</div>
                                <div class="stat-label">Draft</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">${response.data.pending}</div>
                                <div class="stat-label">Pending</div>
                            </div>
                        `);
                    }
                }
            });
        }
        
        // Refresh button
        $('#refresh-lessons').click(function() {
            loadLessons();
            loadLessonStats();
        });
        
        // Create lesson button
        $('#create-lesson-quick').click(function() {
            loadLessonForm();
        });
        
        // Apply filters
        $('#apply-filters').click(function() {
            currentFilters = {
                course: $('#filter-course').val(),
                module: $('#filter-module').val(),
                status: $('#filter-status').val(),
                search: $('#lesson-search').val()
            };
            loadLessons();
        });
        
        // Clear filters
        $('#clear-filters').click(function() {
            $('#filter-course').val('');
            $('#filter-module').html('<option value="">All Modules</option>');
            $('#filter-status').val('');
            $('#lesson-search').val('');
            currentFilters = {};
            loadLessons();
        });
        
        // Course filter change
        $('#filter-course').change(function() {
            const courseId = $(this).val();
            const moduleSelect = $('#filter-module');
            
            if (courseId) {
                $.ajax({
                    url: amars_ajax.ajax_url,
                    type: 'POST',
                    data: {
                        action: 'amars_get_course_modules',
                        nonce: amars_ajax.nonce,
                        course_id: courseId
                    },
                    success: function(response) {
                        if (response.success) {
                            let options = '<option value="">All Modules</option>';
                            response.data.modules.forEach(function(module) {
                                options += `<option value="${module.id}">${module.name}</option>`;
                            });
                            moduleSelect.html(options);
                        }
                    }
                });
            } else {
                moduleSelect.html('<option value="">All Modules</option>');
            }
        });
        
        // Initial load
        loadLessons();
        loadLessonStats();
    });
    </script>
    <?php
}

// ============================================
// 6. COURSE MANAGEMENT ENHANCEMENTS
// ============================================

// Add course columns
function amars_course_admin_columns($columns) {
    $new_columns = array();
    foreach ($columns as $key => $value) {
        $new_columns[$key] = $value;
        if ($key == 'title') {
            $new_columns['instructor'] = 'Instructor';
            $new_columns['modules'] = 'Modules';
            $new_columns['lessons'] = 'Lessons';
        }
    }
    return $new_columns;
}
add_filter('manage_amars_course_posts_columns', 'amars_course_admin_columns');

function amars_course_admin_column_content($column, $post_id) {
    if ($column == 'instructor') {
        $author_id = get_post_field('post_author', $post_id);
        $author = get_userdata($author_id);
        echo $author ? $author->display_name : 'Unknown';
    }
    
    if ($column == 'modules') {
        $modules = get_terms(array(
            'taxonomy' => 'amars_module',
            'hide_empty' => false,
            'meta_key' => '_module_course_id',
            'meta_value' => $post_id,
            'meta_compare' => '='
        ));
        echo !is_wp_error($modules) ? count($modules) : '0';
    }
    
    if ($column == 'lessons') {
        $lessons = get_posts(array(
            'post_type' => 'amars_lesson',
            'posts_per_page' => -1,
            'meta_key' => '_amars_lesson_course',
            'meta_value' => $post_id,
            'meta_compare' => '='
        ));
        echo count($lessons);
    }
}
add_action('manage_amars_course_posts_custom_column', 'amars_course_admin_column_content', 10, 2);

// ============================================
// 7. AJAX HANDLERS
// ============================================

// Module AJAX Handlers

function amars_get_modules_list_ajax() {
    check_ajax_referer('amars_ajax_nonce', 'nonce');
    
    $user_id = get_current_user_id();
    $user = wp_get_current_user();
    
    $args = array(
        'taxonomy' => 'amars_module',
        'hide_empty' => false,
        'orderby' => 'name',
        'order' => 'ASC'
    );
    
    // If instructor, show only their modules
    if (in_array('amars_instructor', (array) $user->roles)) {
        $my_courses = get_posts(array(
            'post_type' => 'amars_course',
            'author' => $user_id,
            'posts_per_page' => -1,
            'fields' => 'ids'
        ));
        
        if (!empty($my_courses)) {
            $args['meta_query'] = array('relation' => 'OR');
            foreach ($my_courses as $course_id) {
                $args['meta_query'][] = array(
                    'key' => '_module_course_id',
                    'value' => $course_id,
                    'compare' => '='
                );
            }
        } else {
            wp_send_json_success(array('html' => '<p>No modules found. Create a course first.</p>'));
        }
    }
    
    $modules = get_terms($args);
    $html = '';
    
    if (!empty($modules) && !is_wp_error($modules)) {
        $html .= '<div class="module-grid">';
        foreach ($modules as $module) {
            $course_id = get_term_meta($module->term_id, '_module_course_id', true);
            $course = $course_id ? get_post($course_id) : null;
            $lesson_count = wp_count_posts('amars_lesson')->publish; // Simplified
            
            $html .= '
            <div class="module-card">
                <div class="module-header">
                    <h3>' . esc_html($module->name) . '</h3>
                    <span class="lesson-count">' . $lesson_count . ' Lessons</span>
                </div>
                <div class="module-body">
                    <p><strong>Course:</strong> ' . ($course ? esc_html($course->post_title) : 'Not assigned') . '</p>
                    ' . ($module->description ? '<p class="module-desc">' . esc_html($module->description) . '</p>' : '') . '
                </div>
                <div class="module-actions">
                    <button class="btn-edit btn-edit-module" 
                            data-id="' . $module->term_id . '"
                            data-name="' . esc_attr($module->name) . '"
                            data-course="' . $course_id . '"
                            data-description="' . esc_attr($module->description) . '">
                        Edit
                    </button>
                    <button class="btn-delete btn-delete-module"
                            data-id="' . $module->term_id . '"
                            data-name="' . esc_attr($module->name) . '">
                        Delete
                    </button>
                </div>
            </div>';
        }
        $html .= '</div>';
    } else {
        $html = '<p>No modules created yet.</p>';
    }
    
    wp_send_json_success(array('html' => $html));
}
add_action('wp_ajax_amars_get_modules_list', 'amars_get_modules_list_ajax');

function amars_create_module_ajax() {
    // check_ajax_referer('amars_create_module', 'amars_module_nonce');
    
    $module_name = sanitize_text_field($_POST['module_name']);
    $course_id = intval($_POST['module_course']);
    $description = sanitize_textarea_field($_POST['module_description']);
    
    if (empty($module_name) || !$course_id) {
        wp_send_json_error('Please fill all required fields.');
    }
    
    // Check if user has permission for this course
    $user_id = get_current_user_id();
    $course = get_post($course_id);
    
    if (!$course || $course->post_type != 'amars_course') {
        wp_send_json_error('Invalid course selected.');
    }
    
    if (in_array('amars_instructor', (array) wp_get_current_user()->roles) && $course->post_author != $user_id) {
        wp_send_json_error('You do not have permission to add modules to this course.');
    }
    
    // Create module
    $term = wp_insert_term(
        $module_name,
        'amars_module',
        array('description' => $description)
    );
    
    if (is_wp_error($term)) {
        wp_send_json_error($term->get_error_message());
    }
    
    // Save course association
    update_term_meta($term['term_id'], '_module_course_id', $course_id);
    update_term_meta($term['term_id'], '_module_instructor_id', $user_id);
    
    wp_send_json_success(array(
        'message' => 'Module created successfully!',
        'module_id' => $term['term_id']
    ));
}
add_action('wp_ajax_amars_create_module', 'amars_create_module_ajax');

function amars_get_module_form_ajax() {
    check_ajax_referer('amars_ajax_nonce', 'nonce');
    
    $module_id = intval($_POST['module_id']);
    $module_name = sanitize_text_field($_POST['module_name']);
    $course_id = intval($_POST['course_id']);
    $description = sanitize_textarea_field($_POST['description']);
    
    $user_id = get_current_user_id();
    $args = array(
        'post_type' => 'amars_course',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC'
    );
    
    if (in_array('amars_instructor', (array) wp_get_current_user()->roles)) {
        $args['author'] = $user_id;
    }
    
    $courses = get_posts($args);
    
    ob_start();
    ?>
    <div class="modal-header">
        <h2>Edit Module</h2>
        <button class="modal-close">&times;</button>
    </div>
    <form id="update-module-form">
        <input type="hidden" name="module_id" value="<?php echo $module_id; ?>">
        <div class="form-group">
            <label for="edit_module_name">Module Name</label>
            <input type="text" id="edit_module_name" name="module_name" 
                   value="<?php echo esc_attr($module_name); ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="edit_module_course">Course</label>
            <select id="edit_module_course" name="course_id" class="form-control" required>
                <option value="">-- Select Course --</option>
                <?php foreach ($courses as $course): ?>
                    <option value="<?php echo $course->ID; ?>" <?php selected($course_id, $course->ID); ?>>
                        <?php echo esc_html($course->post_title); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="edit_module_description">Description</label>
            <textarea id="edit_module_description" name="description" 
                      class="form-control" rows="4"><?php echo esc_textarea($description); ?></textarea>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Update Module</button>
            <button type="button" class="btn btn-secondary modal-close">Cancel</button>
        </div>
    </form>
    <?php
    $html = ob_get_clean();
    wp_send_json_success(array('html' => $html));
}
add_action('wp_ajax_amars_get_module_form', 'amars_get_module_form_ajax');

function amars_update_module_ajax() {
    check_ajax_referer('amars_ajax_nonce', 'nonce');
    
    $module_id = intval($_POST['module_id']);
    $module_name = sanitize_text_field($_POST['module_name']);
    $course_id = intval($_POST['course_id']);
    $description = sanitize_textarea_field($_POST['description']);
    
    // Check permission
    $current_course = get_term_meta($module_id, '_module_course_id', true);
    $course = get_post($current_course);
    
    if (in_array('amars_instructor', (array) wp_get_current_user()->roles) && 
        $course && $course->post_author != get_current_user_id()) {
        wp_send_json_error('You do not have permission to edit this module.');
    }
    
    $result = wp_update_term($module_id, 'amars_module', array(
        'name' => $module_name,
        'description' => $description
    ));
    
    if (is_wp_error($result)) {
        wp_send_json_error($result->get_error_message());
    }
    
    update_term_meta($module_id, '_module_course_id', $course_id);
    
    wp_send_json_success(array(
        'message' => 'Module updated successfully.',
        'module_id' => $module_id
    ));
}
add_action('wp_ajax_amars_update_module', 'amars_update_module_ajax');

function amars_delete_module_ajax() {
    check_ajax_referer('amars_ajax_nonce', 'nonce');
    
    $module_id = intval($_POST['module_id']);
    $module = get_term($module_id, 'amars_module');
    
    if (is_wp_error($module) || !$module) {
        wp_send_json_error('Module not found.');
    }
    
    // Check permission
    $course_id = get_term_meta($module_id, '_module_course_id', true);
    $course = get_post($course_id);
    
    if (in_array('amars_instructor', (array) wp_get_current_user()->roles) && 
        $course && $course->post_author != get_current_user_id()) {
        wp_send_json_error('You do not have permission to delete this module.');
    }
    
    $result = wp_delete_term($module_id, 'amars_module');
    
    if (is_wp_error($result)) {
        wp_send_json_error($result->get_error_message());
    }
    
    wp_send_json_success(array(
        'message' => 'Module deleted successfully.',
        'module_name' => $module->name
    ));
}
add_action('wp_ajax_amars_delete_module', 'amars_delete_module_ajax');

function amars_get_module_stats_ajax() {
    check_ajax_referer('amars_ajax_nonce', 'nonce');
    
    $user_id = get_current_user_id();
    $user = wp_get_current_user();
    
    $args = array(
        'taxonomy' => 'amars_module',
        'hide_empty' => false
    );
    
    if (in_array('amars_instructor', (array) $user->roles)) {
        $my_courses = get_posts(array(
            'post_type' => 'amars_course',
            'author' => $user_id,
            'posts_per_page' => -1,
            'fields' => 'ids'
        ));
        
        if (!empty($my_courses)) {
            $args['meta_query'] = array('relation' => 'OR');
            foreach ($my_courses as $course_id) {
                $args['meta_query'][] = array(
                    'key' => '_module_course_id',
                    'value' => $course_id,
                    'compare' => '='
                );
            }
        }
    }
    
    $modules = get_terms($args);
    $course_ids = array();
    
    if (!is_wp_error($modules)) {
        foreach ($modules as $module) {
            $course_id = get_term_meta($module->term_id, '_module_course_id', true);
            if ($course_id && !in_array($course_id, $course_ids)) {
                $course_ids[] = $course_id;
            }
        }
    }
    
    wp_send_json_success(array(
        'total_modules' => !is_wp_error($modules) ? count($modules) : 0,
        'total_lessons' => wp_count_posts('amars_lesson')->publish,
        'unique_courses' => count($course_ids)
    ));
}
add_action('wp_ajax_amars_get_module_stats', 'amars_get_module_stats_ajax');

// Lesson AJAX Handlers

function amars_get_lessons_list_ajax() {
    check_ajax_referer('amars_ajax_nonce', 'nonce');
    
    $filters = isset($_POST['filters']) ? $_POST['filters'] : array();
    $user_id = get_current_user_id();
    $user = wp_get_current_user();
    
    $args = array(
        'post_type' => 'amars_lesson',
        'posts_per_page' => 20,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    
    // Apply filters
    if (!empty($filters['course'])) {
        $args['meta_query'][] = array(
            'key' => '_amars_lesson_course',
            'value' => intval($filters['course']),
            'compare' => '='
        );
    }
    
    if (!empty($filters['module'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'amars_module',
            'field' => 'term_id',
            'terms' => intval($filters['module'])
        );
    }
    
    if (!empty($filters['status'])) {
        $args['post_status'] = sanitize_text_field($filters['status']);
    } else {
        $args['post_status'] = array('publish', 'draft', 'pending');
    }
    
    if (!empty($filters['search'])) {
        $args['s'] = sanitize_text_field($filters['search']);
    }
    
    // If instructor, filter by their courses
    if (in_array('amars_instructor', (array) $user->roles)) {
        $my_courses = get_posts(array(
            'post_type' => 'amars_course',
            'author' => $user_id,
            'posts_per_page' => -1,
            'fields' => 'ids'
        ));
        
        if (!empty($my_courses)) {
            $args['meta_query'][] = array(
                'key' => '_amars_lesson_course',
                'value' => $my_courses,
                'compare' => 'IN'
            );
        } else {
            wp_send_json_success(array('html' => '<p>No lessons found. Create a course first.</p>', 'count' => 0));
        }
    }
    
    $lessons = new WP_Query($args);
    $html = '';
    
    if ($lessons->have_posts()) {
        $html .= '<div class="grid-view">';
        while ($lessons->have_posts()) {
            $lessons->the_post();
            $lesson_id = get_the_ID();
            $status = get_post_status();
            $status_class = $status == 'publish' ? 'status-publish' : ($status == 'draft' ? 'status-draft' : 'status-pending');
            $status_text = $status == 'publish' ? 'Published' : ($status == 'draft' ? 'Draft' : 'Pending');
            
            $course_id = get_post_meta($lesson_id, '_amars_lesson_course', true);
            $module_id = get_post_meta($lesson_id, '_amars_lesson_module', true);
            $duration = get_post_meta($lesson_id, '_lesson_duration', true);
            $video = get_post_meta($lesson_id, '_lesson_video', true);
            
            $course = $course_id ? get_post($course_id) : null;
            $module = $module_id ? get_term($module_id, 'amars_module') : null;
            
            $html .= '
            <div class="lesson-card">
                <div class="lesson-status ' . $status_class . '">' . $status_text . '</div>
                <h3 class="lesson-title">' . get_the_title() . '</h3>
                <div class="lesson-meta">
                    <span><span class="dashicons dashicons-book"></span> ' . ($course ? esc_html($course->post_title) : 'No Course') . '</span>
                    <span><span class="dashicons dashicons-category"></span> ' . ($module ? esc_html($module->name) : 'No Module') . '</span>
                    ' . ($duration ? '<span><span class="dashicons dashicons-clock"></span>' . $duration . ' min</span>' : '') . '
                    ' . ($video ? '<span><span class="dashicons dashicons-video-alt3"></span>Has Video</span>' : '') . '
                </div>
                <div class="lesson-excerpt">' . wp_trim_words(get_the_excerpt(), 20) . '</div>
                <div class="lesson-actions">
                    <button class="button button-small btn-edit-lesson" 
                            data-id="' . $lesson_id . '"
                            data-title="' . esc_attr(get_the_title()) . '">
                        Edit
                    </button>
                    <button class="button button-small btn-delete-lesson" 
                            data-id="' . $lesson_id . '"
                            data-title="' . esc_attr(get_the_title()) . '">
                        Delete
                    </button>
                    <a href="' . get_edit_post_link($lesson_id) . '" class="button button-small" target="_blank">
                        Advanced Edit
                    </a>
                </div>
            </div>';
        }
        $html .= '</div>';
    } else {
        $html = '<p>No lessons found. Create your first lesson.</p>';
    }
    
    wp_reset_postdata();
    
    wp_send_json_success(array(
        'html' => $html,
        'count' => $lessons->found_posts
    ));
}
add_action('wp_ajax_amars_get_lessons_list', 'amars_get_lessons_list_ajax');

function amars_get_lesson_form_ajax() {
    check_ajax_referer('amars_ajax_nonce', 'nonce');
    
    $lesson_id = isset($_POST['lesson_id']) ? intval($_POST['lesson_id']) : 0;
    $is_edit = $lesson_id > 0;
    
    $user_id = get_current_user_id();
    $args = array(
        'post_type' => 'amars_course',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC'
    );
    
    if (in_array('amars_instructor', (array) wp_get_current_user()->roles)) {
        $args['author'] = $user_id;
    }
    
    $courses = get_posts($args);
    
    $lesson_data = array(
        'title' => '',
        'content' => '',
        'course_id' => '',
        'module_id' => '',
        'duration' => '',
        'video_url' => '',
        'assignment_url' => '',
        'status' => 'draft'
    );
    
    if ($is_edit) {
        $lesson = get_post($lesson_id);
        if ($lesson) {
            $lesson_data['title'] = $lesson->post_title;
            $lesson_data['content'] = $lesson->post_content;
            $lesson_data['course_id'] = get_post_meta($lesson_id, '_amars_lesson_course', true);
            $lesson_data['module_id'] = get_post_meta($lesson_id, '_amars_lesson_module', true);
            $lesson_data['duration'] = get_post_meta($lesson_id, '_lesson_duration', true);
            $lesson_data['video_url'] = get_post_meta($lesson_id, '_lesson_video', true);
            $lesson_data['assignment_url'] = get_post_meta($lesson_id, '_lesson_assignment', true);
            $lesson_data['status'] = $lesson->post_status;
        }
    }
    
    ob_start();
    ?>
    <div class="modal-header">
        <h2><?php echo $is_edit ? 'Edit Lesson' : 'Create New Lesson'; ?></h2>
        <button class="modal-close">&times;</button>
    </div>
    <form id="lesson-form">
        <input type="hidden" name="lesson_id" value="<?php echo $lesson_id; ?>">
        
        <div class="form-group">
            <label for="lesson_title">Lesson Title *</label>
            <input type="text" id="lesson_title" name="lesson_title" 
                   value="<?php echo esc_attr($lesson_data['title']); ?>" class="form-control" required>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="lesson_course">Course *</label>
                <select id="lesson_course" name="lesson_course" class="form-control course-selector" required>
                    <option value="">-- Select Course --</option>
                    <?php foreach ($courses as $course): ?>
                        <option value="<?php echo $course->ID; ?>" 
                                <?php selected($lesson_data['course_id'], $course->ID); ?>>
                            <?php echo esc_html($course->post_title); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="lesson_module">Module *</label>
                <select id="lesson_module" name="lesson_module" class="form-control module-selector" required>
                    <option value="">-- Select Course First --</option>
                </select>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="lesson_duration">Duration (minutes)</label>
                <input type="number" id="lesson_duration" name="lesson_duration" 
                       value="<?php echo esc_attr($lesson_data['duration']); ?>" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="lesson_status">Status</label>
                <select id="lesson_status" name="lesson_status" class="form-control">
                    <option value="draft" <?php selected($lesson_data['status'], 'draft'); ?>>Draft</option>
                    <option value="pending" <?php selected($lesson_data['status'], 'pending'); ?>>Pending</option>
                    <option value="publish" <?php selected($lesson_data['status'], 'publish'); ?>>Published</option>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label for="lesson_video">Video URL</label>
            <input type="url" id="lesson_video" name="lesson_video" 
                   value="<?php echo esc_attr($lesson_data['video_url']); ?>" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="lesson_content">Lesson Content *</label>
            <textarea id="lesson_content" name="lesson_content" class="form-control" rows="8" required><?php echo esc_textarea($lesson_data['content']); ?></textarea>
        </div>
        
        <div class="form-actions">
            <button type="submit" class="button button-primary">
                <?php echo $is_edit ? 'Update Lesson' : 'Create Lesson'; ?>
            </button>
            <button type="button" class="button button-secondary modal-close">Cancel</button>
        </div>
    </form>
    <?php
    $html = ob_get_clean();
    wp_send_json_success(array('html' => $html));
}
add_action('wp_ajax_amars_get_lesson_form', 'amars_get_lesson_form_ajax');

function amars_save_lesson_ajax() {
    check_ajax_referer('amars_ajax_nonce', 'nonce');
    
    $lesson_id = isset($_POST['lesson_id']) ? intval($_POST['lesson_id']) : 0;
    $is_edit = $lesson_id > 0;
    
    // Validate
    $required = array('lesson_title', 'lesson_content', 'lesson_course', 'lesson_module');
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            wp_send_json_error('Please fill all required fields.');
        }
    }
    
    // Check permission for course
    $course_id = intval($_POST['lesson_course']);
    $course = get_post($course_id);
    
    if (in_array('amars_instructor', (array) wp_get_current_user()->roles) && 
        $course && $course->post_author != get_current_user_id()) {
        wp_send_json_error('You do not have permission to add lessons to this course.');
    }
    
    $lesson_data = array(
        'post_title' => sanitize_text_field($_POST['lesson_title']),
        'post_content' => wp_kses_post($_POST['lesson_content']),
        'post_type' => 'amars_lesson',
        'post_status' => sanitize_text_field($_POST['lesson_status'])
    );
    
    if ($is_edit) {
        $lesson_data['ID'] = $lesson_id;
        $result = wp_update_post($lesson_data);
    } else {
        $result = wp_insert_post($lesson_data);
    }
    
    if (is_wp_error($result)) {
        wp_send_json_error($result->get_error_message());
    }
    
    $lesson_id = $result;
    
    // Save meta
    update_post_meta($lesson_id, '_amars_lesson_course', $course_id);
    update_post_meta($lesson_id, '_amars_lesson_module', intval($_POST['lesson_module']));
    
    if (!empty($_POST['lesson_duration'])) {
        update_post_meta($lesson_id, '_lesson_duration', intval($_POST['lesson_duration']));
    }
    
    if (!empty($_POST['lesson_video'])) {
        update_post_meta($lesson_id, '_lesson_video', esc_url_raw($_POST['lesson_video']));
    }
    
    // Set module taxonomy
    wp_set_object_terms($lesson_id, array(intval($_POST['lesson_module'])), 'amars_module');
    
    wp_send_json_success(array(
        'message' => $is_edit ? 'Lesson updated successfully!' : 'Lesson created successfully!',
        'lesson_id' => $lesson_id
    ));
}
add_action('wp_ajax_amars_save_lesson', 'amars_save_lesson_ajax');

function amars_delete_lesson_ajax() {
    check_ajax_referer('amars_ajax_nonce', 'nonce');
    
    $lesson_id = intval($_POST['lesson_id']);
    $lesson = get_post($lesson_id);
    
    if (!$lesson || $lesson->post_type != 'amars_lesson') {
        wp_send_json_error('Lesson not found.');
    }
    
    // Check permission
    $course_id = get_post_meta($lesson_id, '_amars_lesson_course', true);
    $course = get_post($course_id);
    
    if (in_array('amars_instructor', (array) wp_get_current_user()->roles) && 
        $course && $course->post_author != get_current_user_id()) {
        wp_send_json_error('You do not have permission to delete this lesson.');
    }
    
    $result = wp_delete_post($lesson_id, true);
    
    if (!$result) {
        wp_send_json_error('Failed to delete lesson.');
    }
    
    wp_send_json_success(array(
        'message' => 'Lesson deleted successfully!',
        'lesson_title' => $lesson->post_title
    ));
}
add_action('wp_ajax_amars_delete_lesson', 'amars_delete_lesson_ajax');

function amars_get_lesson_stats_ajax() {
    check_ajax_referer('amars_ajax_nonce', 'nonce');
    
    $total = wp_count_posts('amars_lesson');
    
    wp_send_json_success(array(
        'total' => $total->publish + $total->draft + $total->pending,
        'published' => $total->publish,
        'draft' => $total->draft,
        'pending' => $total->pending
    ));
}
add_action('wp_ajax_amars_get_lesson_stats', 'amars_get_lesson_stats_ajax');

// Course-Module AJAX Handlers

function amars_get_course_modules_ajax() {
    check_ajax_referer('amars_ajax_nonce', 'nonce');
    
    $course_id = intval($_POST['course_id']);
    $modules = array();
    
    if ($course_id > 0) {
        $terms = get_terms(array(
            'taxonomy' => 'amars_module',
            'hide_empty' => false,
            'meta_query' => array(
                array(
                    'key' => '_module_course_id',
                    'value' => $course_id,
                    'compare' => '='
                )
            ),
            'orderby' => 'name',
            'order' => 'ASC'
        ));
        
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $modules[] = array(
                    'id' => $term->term_id,
                    'name' => $term->name,
                    'description' => $term->description
                );
            }
        }
    }
    
    wp_send_json_success(array('modules' => $modules));
}
add_action('wp_ajax_amars_get_course_modules', 'amars_get_course_modules_ajax');

// ============================================
// 8. META BOXES FOR COURSE & LESSON
// ============================================

// Course meta box for modules
function amars_course_modules_metabox() {
    add_meta_box(
        'amars_course_modules',
        'Course Modules',
        'amars_course_modules_metabox_callback',
        'amars_course',
        'side',
        'high'
    );
}
add_action('add_meta_boxes', 'amars_course_modules_metabox');

function amars_course_modules_metabox_callback($post) {
    $modules = get_terms(array(
        'taxonomy' => 'amars_module',
        'hide_empty' => false,
        'meta_key' => '_module_course_id',
        'meta_value' => $post->ID,
        'meta_compare' => '='
    ));
    
    echo '<p><strong>Modules in this course:</strong></p>';
    
    if (!empty($modules) && !is_wp_error($modules)) {
        echo '<ul>';
        foreach ($modules as $module) {
            echo '<li>' . esc_html($module->name) . '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No modules created yet.</p>';
    }
    
    echo '<p><a href="' . admin_url('admin.php?page=amars-module-manager') . '" target="_blank">Manage Modules</a></p>';
}

// Lesson meta box for course & module
function amars_lesson_details_metabox() {
    add_meta_box(
        'amars_lesson_details',
        'Lesson Details',
        'amars_lesson_details_metabox_callback',
        'amars_lesson',
        'side',
        'high'
    );
}
add_action('add_meta_boxes', 'amars_lesson_details_metabox');

function amars_lesson_details_metabox_callback($post) {
    wp_nonce_field('amars_lesson_details_save', 'amars_lesson_details_nonce');
    
    $course_id = get_post_meta($post->ID, '_amars_lesson_course', true);
    $module_id = get_post_meta($post->ID, '_amars_lesson_module', true);
    $duration = get_post_meta($post->ID, '_lesson_duration', true);
    $video = get_post_meta($post->ID, '_lesson_video', true);
    
    // Get courses
    $user_id = get_current_user_id();
    $args = array(
        'post_type' => 'amars_course',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC'
    );
    
    if (in_array('amars_instructor', (array) wp_get_current_user()->roles)) {
        $args['author'] = $user_id;
    }
    
    $courses = get_posts($args);
    ?>
    
    <p>
        <label for="amars_lesson_course"><strong>Course:</strong></label>
        <select name="amars_lesson_course" id="amars_lesson_course" style="width:100%;">
            <option value="">-- Select Course --</option>
            <?php foreach ($courses as $course): ?>
                <option value="<?php echo $course->ID; ?>" <?php selected($course_id, $course->ID); ?>>
                    <?php echo esc_html($course->post_title); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>
    
    <p>
        <label for="amars_lesson_module"><strong>Module:</strong></label>
        <select name="amars_lesson_module" id="amars_lesson_module" style="width:100%;">
            <option value="">-- Select Module --</option>
            <?php
            if ($course_id) {
                $modules = get_terms(array(
                    'taxonomy' => 'amars_module',
                    'hide_empty' => false,
                    'meta_query' => array(
                        array(
                            'key' => '_module_course_id',
                            'value' => $course_id,
                            'compare' => '='
                        )
                    )
                ));
                
                if (!empty($modules) && !is_wp_error($modules)) {
                    foreach ($modules as $module) {
                        $selected = ($module_id == $module->term_id) ? 'selected' : '';
                        echo '<option value="' . $module->term_id . '" ' . $selected . '>' . esc_html($module->name) . '</option>';
                    }
                }
            }
            ?>
        </select>
    </p>
    
    <p>
        <label for="lesson_duration"><strong>Duration (minutes):</strong></label>
        <input type="number" name="lesson_duration" id="lesson_duration" 
               value="<?php echo esc_attr($duration); ?>" style="width:100%;" min="0">
    </p>
    
    <p>
        <label for="lesson_video"><strong>Video URL:</strong></label>
        <input type="url" name="lesson_video" id="lesson_video" 
               value="<?php echo esc_attr($video); ?>" style="width:100%;" 
               placeholder="https://youtube.com/watch?v=...">
    </p>
    
    <script>
    jQuery(document).ready(function($) {
        $('#amars_lesson_course').change(function() {
            var courseId = $(this).val();
            var moduleSelect = $('#amars_lesson_module');
            
            if (!courseId) {
                moduleSelect.html('<option value="">-- Select Course First --</option>');
                return;
            }
            
            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'POST',
                data: {
                    action: 'amars_get_course_modules',
                    course_id: courseId
                },
                success: function(response) {
                    if (response.success) {
                        var options = '<option value="">-- Select Module --</option>';
                        
                        response.data.modules.forEach(function(module) {
                            options += '<option value="' + module.id + '">' + module.name + '</option>';
                        });
                        
                        moduleSelect.html(options);
                    }
                }
            });
        });
    });
    </script>
    <?php
}

// Save lesson meta
function amars_save_lesson_meta($post_id) {
    // if (!isset($_POST['amars_lesson_details_nonce']) || 
    //     !wp_verify_nonce($_POST['amars_lesson_details_nonce'], 'amars_lesson_details_save')) {
    //     return;
    // }
    
    // if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    // if (!current_user_can('edit_post', $post_id)) return;
    
    if (isset($_POST['amars_lesson_course'])) {
        update_post_meta($post_id, '_amars_lesson_course', intval($_POST['amars_lesson_course']));
    }
    
    if (isset($_POST['amars_lesson_module'])) {
        $module_id = intval($_POST['amars_lesson_module']);
        update_post_meta($post_id, '_amars_lesson_module', $module_id);
        
        if ($module_id) {
            wp_set_object_terms($post_id, array($module_id), 'amars_module', false);
        }
    }
    
    if (isset($_POST['lesson_duration'])) {
        update_post_meta($post_id, '_lesson_duration', intval($_POST['lesson_duration']));
    }
    
    if (isset($_POST['lesson_video'])) {
        update_post_meta($post_id, '_lesson_video', esc_url_raw($_POST['lesson_video']));
    }
}
add_action('save_post_amars_lesson', 'amars_save_lesson_meta');



function amars_display_course_content($content) {
    if (is_singular('amars_course')) {
        global $post;
        $course_id = $post->ID;
        
        $modules = get_terms(array(
            'taxonomy' => 'amars_module',
            'hide_empty' => false,
            'meta_key' => '_module_course_id',
            'meta_value' => $course_id,
            'meta_compare' => '='
        ));
        
        ob_start();
        ?>
        <div class="amars-course-content">
            <?php echo $content; ?>
            
            <?php if (!empty($modules) && !is_wp_error($modules)): ?>
                <div class="course-modules">
                    <h2>Course Modules</h2>
                    <?php foreach ($modules as $module): ?>
                        <div class="module">
                            <h3><?php echo esc_html($module->name); ?></h3>
                            <?php if ($module->description): ?>
                                <p class="module-desc"><?php echo esc_html($module->description); ?></p>
                            <?php endif; ?>
                            
                            <?php
                            $lessons = get_posts(array(
                                'post_type' => 'amars_lesson',
                                'posts_per_page' => -1,
                                'orderby' => 'menu_order',
                                'order' => 'ASC',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'amars_module',
                                        'field' => 'term_id',
                                        'terms' => $module->term_id
                                    )
                                ),
                                'meta_query' => array(
                                    array(
                                        'key' => '_amars_lesson_course',
                                        'value' => $course_id,
                                        'compare' => '='
                                    )
                                )
                            ));
                            
                            if ($lessons):
                            ?>
                                <div class="module-lessons">
                                    <h4>Lessons:</h4>
                                    <ul>
                                        <?php foreach ($lessons as $lesson): ?>
                                            <li>
                                                <a href="<?php echo get_permalink($lesson->ID); ?>">
                                                    <?php echo esc_html($lesson->post_title); ?>
                                                </a>
                                                <?php
                                                $duration = get_post_meta($lesson->ID, '_lesson_duration', true);
                                                if ($duration):
                                                    echo '<span class="lesson-duration">(' . $duration . ' min)</span>';
                                                endif;
                                                ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>No modules available for this course yet.</p>
            <?php endif; ?>
        </div>
        
        <?php
        return ob_get_clean();
    }
    return $content;
}


