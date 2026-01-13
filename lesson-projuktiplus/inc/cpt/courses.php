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


function lessonlms_courses_requirement_meta_box() {
    add_meta_box(
        'courses_requirement',
        'Course Requirements',
        'lessonlms_courses_requirement_callback',
        'courses',
        'side',  // sidebar
        'high'
    );
}
add_action('add_meta_boxes', 'lessonlms_courses_requirement_meta_box');

function lessonlms_courses_requirement_callback($post) {
    // Existing requirements বের করা
    $requirements = get_post_meta($post->ID, 'course_requirements', true);
    if(!$requirements) $requirements = [];

    // Nonce field security এর জন্য
    wp_nonce_field('save_course_requirements', 'course_requirements_nonce');
    ?>
    <div id="requirement-wrapper">
        <ul id="requirement-list" style="list-style:none; margin:0; padding:0;">
            <?php foreach($requirements as $req): ?>
                <li class="requirement-item" style="margin-bottom:5px;">
                    <input type="text" name="course_requirements[]" value="<?php echo esc_attr($req); ?>" style="width:90%;" />
                    <button type="button" class="remove-requirement" style="cursor:pointer;">&times;</button>
                </li>
            <?php endforeach; ?>
        </ul>
        <button type="button" id="add-requirement" style="margin-top:5px;">Add Requirement</button>
    </div>

    <script>
jQuery(document).ready(function($){
    // Add new input
    $('#add-requirement').click(function(){
        $('#requirement-list').append('<li class="requirement-item" style="margin-bottom:5px;"><input type="text" name="course_requirements[]" style="width:90%;"/><button type="button" class="remove-requirement" style="cursor:pointer;">&times;</button></li>');
    });

    // Remove input
    $('#requirement-list').on('click', '.remove-requirement', function(){
        $(this).parent().remove();
    });

    // Make sortable
    $('#requirement-list').sortable();
});

    </script>

    <style>
    /* Optional styling */
    .requirement-item input { padding: 2px 5px; }
    .requirement-item button { background:none; border:none; color:red; font-weight:bold; }
    </style>

    <?php
}
function lessonlms_courses_save_requirement_meta($post_id) {
    // Nonce verify
    if(!isset($_POST['course_requirements_nonce']) || !wp_verify_nonce($_POST['course_requirements_nonce'], 'save_course_requirements')) return;

    if(isset($_POST['course_requirements']) && is_array($_POST['course_requirements'])){
        // Clean empty items
        $requirements = array_filter(array_map('sanitize_text_field', $_POST['course_requirements']));
        update_post_meta($post_id, 'course_requirements', $requirements);
    } else {
        delete_post_meta($post_id, 'course_requirements');
    }
}
add_action('save_post_courses', 'lessonlms_courses_save_requirement_meta');


function lessonlms_enqueue_admin_scripts($hook){
    global $post_type;
    if($post_type == 'courses'){
        wp_enqueue_script('jquery-ui-sortable');
        wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
        wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);
    }
}
add_action('admin_enqueue_scripts', 'lessonlms_enqueue_admin_scripts');




add_action('add_meta_boxes', function(){
    add_meta_box(
        'course_modules_box',
        'Course Modules',
        'lessonlms_modules_callback',
        'courses',
        'normal',
        'high'
    );
});

function lessonlms_modules_callback($post){

    $modules = get_post_meta($post->ID, 'course_modules', true);
    if(!is_array($modules)) $modules = [];

    wp_nonce_field('save_course_modules','course_modules_nonce');
    ?>

    <!-- ADD MODULE -->
    <input type="text" id="new-module-title" class="widefat" placeholder="Module title">
    <button type="button" id="add-module" class="button button-primary" style="margin:8px 0;width:100%;">
        + Add Module
    </button>

    <!-- MODULE LIST -->
    <ul id="modules-list">

        <?php foreach($modules as $module): ?>
        <li class="module-item">
            <span class="module-title"><?php echo esc_html($module); ?></span>

            <div class="module-actions">
                <button type="button" class="edit-module button button-small">Edit</button>
                <button type="button" class="delete-module button button-small">Delete</button>
            </div>

            <input type="hidden" name="course_modules[]" value="<?php echo esc_attr($module); ?>">
        </li>
        <?php endforeach; ?>

    </ul>

    <!-- EDIT MODAL -->
    <div id="moduleModal" style="display:none;">
        <input type="text" id="module-modal-input" class="widefat">
        <button type="button" class="button button-primary" id="update-module" style="margin-top:8px;width:100%;">
            Update Module
        </button>
    </div>

<script>
jQuery(function($){

    let currentItem = null;

    // SORT
    $('#modules-list').sortable();

    // ADD MODULE
    $('#add-module').on('click', function(){
        let title = $('#new-module-title').val().trim();
        if(!title) return;

        $('#modules-list').append(`
            <li class="module-item">
                <span class="module-title">${title}</span>

                <div class="module-actions">
                    <button type="button" class="edit-module button button-small">Edit</button>
                    <button type="button" class="delete-module button button-small">Delete</button>
                </div>

                <input type="hidden" name="course_modules[]" value="${title}">
            </li>
        `);

        $('#new-module-title').val('');
    });

    // DELETE MODULE
    $(document).on('click','.delete-module',function(){
    // alert('delete');
    Swal.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire({
      title: "Deleted!",
      text: "Your file has been deleted.",
      icon: "success"
    });
  }
});
        $(this).closest('.module-item').remove();
    });

    // EDIT MODULE
    $(document).on('click','.edit-module',function(){
        currentItem = $(this).closest('.module-item');
        $('#module-modal-input').val(currentItem.find('.module-title').text());

        tb_show('Edit Module', '#TB_inline?inlineId=moduleModal&width=300');
    });

    // UPDATE MODULE
    $('#update-module').on('click', function(){
        let value = $('#module-modal-input').val().trim();
        if(!value) return;

        currentItem.find('.module-title').text(value);
        currentItem.find('input[type="hidden"]').val(value);

        tb_remove();
    });

});
</script>

<style>
#modules-list{
    margin-top:10px;
}
.module-item{
    background:#f9f9f9;
    padding:8px;
    margin-bottom:6px;
    border:1px solid #ddd;
    display:flex;
    justify-content:space-between;
    align-items:center;
    cursor:move;
}
.module-actions button{
    margin-left:4px;
}
</style>

<?php
}
add_action('save_post_courses', function($post_id){

    if(!isset($_POST['course_modules_nonce']) ||
       !wp_verify_nonce($_POST['course_modules_nonce'],'save_course_modules')){
        return;
    }

    if(isset($_POST['course_modules']) && is_array($_POST['course_modules'])){
        $modules = array_map('sanitize_text_field', $_POST['course_modules']);
        update_post_meta($post_id, 'course_modules', $modules);
    } else {
        delete_post_meta($post_id,'course_modules');
    }
});


add_action('add_meta_boxes', function(){
    add_meta_box(
        'course_lessons_box',
        'Course Lessons',
        'lessonlms_lessons_callback',
        'courses',
        'normal',
        'high'
    );
});


function lessonlms_lessons_callback($post){

    $modules = get_post_meta($post->ID,'course_modules',true);
    $lessons = get_post_meta($post->ID,'course_lessons',true);

    if(!is_array($modules)) $modules=[];
    if(!is_array($lessons)) $lessons=[];

    wp_nonce_field('save_course_lessons','course_lessons_nonce');
?>
<select id="lesson-module" class="widefat">
    <option value="">Select Module</option>
    <?php foreach($modules as $m): ?>
        <option value="<?php echo esc_attr($m); ?>"><?php echo esc_html($m); ?></option>
    <?php endforeach; ?>
</select>

<input type="text" id="new-lesson-title" class="widefat" placeholder="Lesson title" style="margin-top:6px;">
<button type="button" id="add-lesson" class="button button-primary" style="margin-top:6px;width:100%;">
Add Lesson
</button>

<div id="lesson-lists">
<?php foreach($lessons as $module => $items): ?>
<h4><?php echo esc_html($module); ?></h4>
<ul class="lesson-list">
<?php foreach($items as $l): ?>
<li>
    <?php echo esc_html($l); ?>
    <button class="delete-lesson">×</button>
    <input type="hidden" name="course_lessons[<?php echo esc_attr($module); ?>][]" value="<?php echo esc_attr($l); ?>">
</li>
<?php endforeach; ?>
</ul>
<?php endforeach; ?>
</div>

<script>
jQuery(function($){

$('#add-lesson').click(function(){
    let module=$('#lesson-module').val();
    let title=$('#new-lesson-title').val().trim();
    if(!module || !title){
        alert('Select module & enter lesson');
        return;
    }

    let box=$(`#lesson-lists h4:contains("${module}")`).next('ul');

    if(!box.length){
        $('#lesson-lists').append(`<h4>${module}</h4><ul class="lesson-list"></ul>`);
        box=$('#lesson-lists ul').last();
    }

    box.append(`
        <li>
            ${title}
            <button class="delete-lesson">×</button>
            <input type="hidden" name="course_lessons[${module}][]" value="${title}">
        </li>
    `);

    $('#new-lesson-title').val('');
});

$(document).on('click','.delete-lesson',function(){
    $(this).parent().remove();
});

$('.lesson-list').sortable();
});
</script>

<style>
.lesson-list li{padding:6px;border:1px dashed #ccc;margin-bottom:4px;cursor:move;}
</style>
<?php }

add_action('save_post_courses', function($post_id){

    if(isset($_POST['course_modules_nonce'])){
        update_post_meta($post_id,'course_modules',
            array_map('sanitize_text_field',$_POST['course_modules'] ?? [])
        );
    }

    if(isset($_POST['course_lessons_nonce'])){
        $clean=[];
        if(!empty($_POST['course_lessons'])){
            foreach($_POST['course_lessons'] as $m=>$ls){
                $clean[sanitize_text_field($m)] =
                    array_map('sanitize_text_field',$ls);
            }
        }
        update_post_meta($post_id,'course_lessons',$clean);
    }
});


