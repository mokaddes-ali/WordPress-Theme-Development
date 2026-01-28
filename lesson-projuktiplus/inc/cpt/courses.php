<?php 
/**
 * Template Name: Register Courses
 * 
 * @package lessonlms
 */

function lessonlms_custome_courses_register(){
    $labels = array(
        'name'                  => __( 'Courses', 'lessonlms' ),
        'singular_name'         => __( 'Course', 'lessonlms' ),
        'menu_name'             => __( 'Courses', 'lessonlms' ),
        'name_admin_bar'        => __( 'Course', 'lessonlms' ),
        'add_new'               => __( 'Add New', 'lessonlms' ),
        'add_new_item'          => __( 'Add New Course', 'lessonlms' ),
        'new_item'              => __( 'New Course', 'lessonlms' ),
        'edit_item'             => __( 'Edit Course', 'lessonlms' ),
        'view_item'             => __( 'View Course', 'lessonlms' ),
        'all_items'             => __( 'All Courses', 'lessonlms' ),
        'search_items'          => __( 'Search Courses', 'lessonlms' ),
        'parent_item_colon'     => __( 'Parent Courses:', 'lessonlms' ),
        'not_found'             => __( 'No Courses found.', 'lessonlms' ),
        'not_found_in_trash'    => __( 'No Courses found in Trash.', 'lessonlms' ),
    );     
    $args = array(
        'labels'             => $labels,
        'description'        => 'Courses custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
         'rewrite'            => array( 'slug' => 'courses'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'thumbnail'),
        'taxonomies'         => array( 'course_category', 'course_level'),
        'show_in_rest'       => true
    );
  
    register_post_type('courses', $args);
}
add_action('init', 'lessonlms_custome_courses_register');

// Course Category
function lessonlms_register_course_category() {
    $labels = array(
        'name' => 'Course Categories',
        'singular_name' => 'Course Category',
        'menu_name' => 'Course Categories'
    );
    register_taxonomy('course_category', 'courses', array(
        'labels' => $labels,
        'hierarchical' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'course-category'),
    ));
}
add_action('init', 'lessonlms_register_course_category');


function lessonlms_courses_add_meta_box(){
    add_meta_box(
        'courses_details',
        'Courses Details',
        'lessonlms_couses_add_meta_box_callback',
        'courses',
        'normal',
        'high'
    );

}
add_action('add_meta_boxes', 'lessonlms_courses_add_meta_box');

function lessonlms_couses_add_meta_box_callback($post){
    $regular_price = get_post_meta($post->ID,'regular_price', true);
    $original_price = get_post_meta($post->ID,'original_price', true);
    $video_hours = get_post_meta($post->ID,'video_hours', true);
    $downlable_resource = get_post_meta($post->ID,'downlable_resource', true);
    $total_articles = get_post_meta($post->ID,'total_articles', true);
    $language = get_post_meta($post->ID,'language', true);
    $sub_title_language = get_post_meta($post->ID,'sub_title_language', true);
    ?>

     <div class="" style="margin: 15px 0px;">
        <label for="video_hours">Video Hours</label>
        <input type="number" step="0.1" name="video_hours" id="video_hours" value="<?php echo esc_attr($video_hours);?>">
    </div>
     <div class="" style="margin: 15px 0px;">
        <label for="downlable_resource">Downlable Resource</label>
        <input type="number" name="downlable_resource" id="downlable_resource" value="<?php echo esc_attr($downlable_resource);?>">
    </div>
     <div class="" style="margin: 15px 0px;">
        <label for="total_articles">Total Articles</label>
        <input type="number" name="total_articles" id="total_articles" value="<?php echo esc_attr($total_articles);?>">
    </div>
     <div class="" style="margin: 15px 0px;">
        <label for="language">Course Language</label>
        <input type="text" name="language" id="language" value="<?php echo esc_attr($language);?>">
    </div>
     <div class="" style="margin: 15px 0px;">
        <label for="sub_title_language"> Sub Title Language</label>
        <input type="text" name="sub_title_language" id="sub_title_language" value="<?php echo esc_attr($sub_title_language);?>">
    </div>

      <div class="couse-pricing">
        <h3>Pricing</h3>
        <div class="">
        <label for="regular_price">Regular Price</label>
        <input type="number" step="0.01" name="regular_price" id="regular_price" value="<?php echo esc_attr($regular_price);?>">
    </div>
     <div class="" style="margin: 15px 0px;">
        <label for="original_price">Original Price</label>
        <input type="number" step="0.01" name="original_price" id="original_price" value="<?php echo esc_attr($original_price);?>">
    </div>
    </div>
    <?php
}

function lessonlms_courses_save_meta_data($post_id){
    $fields = [
         'regular_price',
         'original_price',
         'video_hours',
         'downlable_resource',
         'total_articles',
         'language',
         'sub_title_language',
    ];
    
    foreach($fields as $field){
        if(isset($_POST[$field])){
        update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
    }

}
}
add_action('save_post_courses', 'lessonlms_courses_save_meta_data');


/**
 * Course Level Taxonomy (Checkbox Sidebar)
 */
function lessonlms_register_course_level_taxonomy() {

    $labels = array(
        'name'              => 'Course Levels',
        'singular_name'     => 'Course Level',
        'search_items'      => 'Search Levels',
        'all_items'         => 'All Levels',
        'edit_item'         => 'Edit Level',
        'update_item'       => 'Update Level',
        'add_new_item'      => 'Add New Level',
        'new_item_name'     => 'New Level Name',
        'menu_name'         => 'Course Level',
    );


    register_taxonomy('course_level', 'courses', array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'rewrite'           => array('slug' => 'course-level'),
    ));
}
add_action('init', 'lessonlms_register_course_level_taxonomy');


function lessonlms_add_default_course_levels() {
    $levels = ['Beginner', 'Intermediate', 'Advanced'];

    foreach ($levels as $level) {
        if (!term_exists($level, 'course_level')) {
            wp_insert_term($level, 'course_level');
        }
    }
}
add_action('init', 'lessonlms_add_default_course_levels');

function lessonlms_courses_featured_meta_box(){
    add_meta_box(
        'courses_featured',
        'Featured',
        'lessonlms_courses_featured_callback',
        'courses',
        'side',
        'high'
    );
}
add_action('add_meta_boxes', 'lessonlms_courses_featured_meta_box');

function lessonlms_courses_featured_callback($post){
    // Save value
    $featured = get_post_meta($post->ID, '_is_featured', true);
    ?>
    <div class="featured-check">
        <label for="_is_featured">Show Featured Course:</label>
        <input type="checkbox" value="yes" name="_is_featured" id="_is_featured" <?php checked( $featured, 'yes' ); ?>>
    </div>

    <style>

.featured-check{
  position: absolute;
  height: 150px;
  margin-top: -15px;
}

.featured-check label{
 padding-right: 20px;
 padding-bottom: 20px;
}

.featured-check input[type="checkbox"]{
   -webkit-appearance: none !important;
  -moz-appearance: none !important;
  appearance: none !important;

  position: relative;
  width: 80px;
  height: 40px;
  background: #c6c6c6 !important;
  outline: none;
  border-radius: 20px;
  box-shadow: inset 0 0 5px rgba(0, 0, 0, .2);
  transition: 0.5s;
}

.featured-check input[type="checkbox"]:checked{
  background: #FFB900 !important;
  outline: none;

}

.featured-check input[type="checkbox"]::before{
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 40px;
  height: 40px;
  border-radius: 20px;
  background: #fff;
  transition: .5s;
  transform: scale(1.1);
  box-shadow: 0 2px 5px rgba(0, 0, 0, .2);

}

.featured-check input[type="checkbox"]:checked::before{
     left: 40px;
       background: #fff;
  
}
    </style>
    <?php
}

function lessonlms_courses_save_featured_meta($post_id){
    if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;

    if ( !current_user_can('edit_post', $post_id) ) return;

    if ( isset($_POST['_is_featured']) && $_POST['_is_featured'] === 'yes' ) {
        update_post_meta($post_id, '_is_featured', sanitize_text_field($_POST['_is_featured']));
    } else {
        delete_post_meta($post_id, '_is_featured');
    }
}
add_action('save_post_courses', 'lessonlms_courses_save_featured_meta');

// Add meta box
function add_module_meta_box() {
    add_meta_box(
        'module_manager',
        'Module Manager',
        'module_manager_callback',
        'courses',
        'side',
        'high'
    );
}
add_action('add_meta_boxes', 'add_module_meta_box');

// Meta box HTML
function module_manager_callback($post) {
    ?>
    <div class="module-manager">
        <button type="button" id="add-module-btn" class="button button-primary">
            <span class="dashicons dashicons-plus"></span> Add Module
        </button>
        <div id="modules-list">
            <!-- Modules will load via AJAX -->
        </div>
    </div>
    <?php
}

// Admin CSS
function module_admin_styles() {
    echo '<style>
    .module-manager { padding: 10px 0; }
    .module-list { margin-top: 15px; list-style: none; padding: 0; }
    .module-list li { 
        background: #fff; 
        border: 1px solid #ccd0d4; 
        padding: 12px; 
        margin-bottom: 8px; 
        border-radius: 4px; 
        display: flex; 
        justify-content: space-between; 
        align-items: center;
        box-shadow: 0 1px 1px rgba(0,0,0,.04);
    }
    .module-list li:hover { border-color: #8c8f94; }
    .module-name { 
        font-weight: 500; 
        flex: 1;
        padding-right: 10px;
    }
    .module-actions { display: flex; gap: 8px; }
    .btn-action { 
        background: none; 
        border: 1px solid #dcdcde; 
        cursor: pointer; 
        padding: 4px 8px; 
        font-size: 12px; 
        border-radius: 3px;
        line-height: 1;
    }
    .btn-edit { color: #2271b1; }
    .btn-delete { color: #d63638; }
    .btn-action:hover { background: #f0f0f1; }
    .no-modules { 
        color: #8c8f94; 
        font-style: italic; 
        margin-top: 15px;
        text-align: center;
        padding: 15px;
        background: #f6f7f7;
        border-radius: 4px;
    }
    .loading { 
        text-align: center; 
        padding: 20px; 
        color: #646970;
    }
    .spinner { 
        display: inline-block; 
        margin-right: 5px; 
        vertical-align: middle;
    }
    </style>';
}
add_action('admin_head', 'module_admin_styles');

// Enqueue scripts
function enqueue_module_scripts($hook) {
    global $post;
    
    if (!in_array($hook, array('post.php', 'post-new.php'))) return;
    if (!isset($post) || 'courses' != $post->post_type) return;
    
    wp_enqueue_style('sweetalert2', 'https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css');
    wp_enqueue_script('sweetalert2', 'https://cdn.jsdelivr.net/npm/sweetalert2@11', array(), null, true);
    
    wp_enqueue_script('module-manager', get_template_directory_uri() . '/assets/js/ajax-module.js', 
        array('jquery', 'sweetalert2'), '1.0', true);
    
    wp_localize_script('module-manager', 'module_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('module_ajax_nonce'),
        'post_id' => $post->ID
    ));
}
add_action('admin_enqueue_scripts', 'enqueue_module_scripts');

// AJAX: Save Module
function save_module_callback() {
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'module_ajax_nonce')) {
        wp_send_json_error('Security check failed');
    }
    
    $module_name = isset($_POST['module_name']) ? sanitize_text_field($_POST['module_name']) : '';
    $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;
    
    if (empty($module_name) || !$post_id) {
        wp_send_json_error('Invalid data');
    }
    
    // Get existing modules
    $modules = get_post_meta($post_id, '_modules', true);
    $modules = $modules ? json_decode($modules, true) : array();
    
    // Generate unique ID
    $module_id = uniqid('mod_', true);
    
    // Add new module
    $new_module = array(
        'id' => $module_id,
        'name' => $module_name,
        'time' => current_time('mysql')
    );
    
    $modules[] = $new_module;
    
    // Save to post meta
    update_post_meta($post_id, '_modules', json_encode($modules));
    
    // Return the new module data for instant update
    wp_send_json_success(array(
        'module' => $new_module,
        'message' => 'Module added successfully'
    ));
}

// AJAX: Update Module
function update_module_callback() {
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'module_ajax_nonce')) {
        wp_send_json_error('Security check failed');
    }
    
    $module_id = isset($_POST['module_id']) ? sanitize_text_field($_POST['module_id']) : '';
    $module_name = isset($_POST['module_name']) ? sanitize_text_field($_POST['module_name']) : '';
    $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;
    
    if (empty($module_id) || empty($module_name) || !$post_id) {
        wp_send_json_error('Invalid data');
    }
    
    // Get existing modules
    $modules = get_post_meta($post_id, '_modules', true);
    $modules = $modules ? json_decode($modules, true) : array();
    
    // Find and update module
    $updated = false;
    foreach ($modules as &$module) {
        if ($module['id'] === $module_id) {
            $module['name'] = $module_name;
            $updated = true;
            break;
        }
    }
    
    if ($updated) {
        update_post_meta($post_id, '_modules', json_encode($modules));
        wp_send_json_success(array(
            'module' => array('id' => $module_id, 'name' => $module_name),
            'message' => 'Module updated successfully'
        ));
    } else {
        wp_send_json_error('Module not found');
    }
}

// AJAX: Delete Module
function delete_module_callback() {
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'module_ajax_nonce')) {
        wp_send_json_error('Security check failed');
    }
    
    $module_id = isset($_POST['module_id']) ? sanitize_text_field($_POST['module_id']) : '';
    $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;
    
    if (!$module_id || !$post_id) {
        wp_send_json_error('Invalid data');
    }
    
    $modules = get_post_meta($post_id, '_modules', true);
    $modules = $modules ? json_decode($modules, true) : array();
    
    // Filter out the module to delete
    $new_modules = array();
    $deleted = false;
    
    foreach ($modules as $module) {
        if ($module['id'] !== $module_id) {
            $new_modules[] = $module;
        } else {
            $deleted = true;
        }
    }
    
    if ($deleted) {
        update_post_meta($post_id, '_modules', json_encode($new_modules));
        wp_send_json_success(array(
            'module_id' => $module_id,
            'message' => 'Module deleted successfully'
        ));
    } else {
        wp_send_json_error('Module not found');
    }
}

// AJAX: Get Modules
function get_modules_callback() {
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'module_ajax_nonce')) {
        wp_send_json_error('Security check failed');
    }
    
    $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;
    
    if (!$post_id) {
        wp_send_json_error('Invalid post ID');
    }
    
    $modules = get_post_meta($post_id, '_modules', true);
    $modules = $modules ? json_decode($modules, true) : array();
    
    wp_send_json_success($modules);
}

// Register AJAX actions
add_action('wp_ajax_save_module', 'save_module_callback');
add_action('wp_ajax_update_module', 'update_module_callback');
add_action('wp_ajax_delete_module', 'delete_module_callback');
add_action('wp_ajax_get_modules', 'get_modules_callback');