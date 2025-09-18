<?php 
/**
 * Register Courses
 */



// Register Course 
function lessonlms_custome_courses_register(){
    $labels = array(
        'name'                  => _x( 'Courses', 'Post type general name', 'lessonlms' ),
        'singular_name'         => _x( 'Course', 'Post type singular name', 'lessonlms' ),
        'menu_name'             => _x( 'Courses', 'Admin Menu text', 'lessonlms' ),
        'name_admin_bar'        => _x( 'Course', 'Add New on Toolbar', 'lessonlms' ),
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
        'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'         => array( 'category', 'post_tag' ),
        'show_in_rest'       => true
    );
  
    register_post_type('courses', $args);
}
add_action('init', 'lessonlms_custome_courses_register');

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
    $rating = get_post_meta($post->ID,'rating', true);
    $original_price = get_post_meta($post->ID,'original_price', true);
    $video_hours = get_post_meta($post->ID,'video_hours', true);
    $downlable_resource = get_post_meta($post->ID,'downlable_resource', true);
    $total_articles = get_post_meta($post->ID,'total_articles', true);
    $language = get_post_meta($post->ID,'language', true);
    $sub_title_language = get_post_meta($post->ID,'sub_title_language', true);
    ?>
     <div class="" style="margin: 15px 0px;">
        <label for="rating">Course Rating</label>
        <input type="number" step="0.1" name="rating" id="rating" value="<?php echo esc_attr($rating);?>">
    </div>
    <div class="">
        <label for="regular_price">Regular Price</label>
        <input type="number" step="0.01" name="regular_price" id="regular_price" value="<?php echo esc_attr($regular_price);?>">
    </div>
     <div class="" style="margin: 15px 0px;">
        <label for="original_price">Original Price</label>
        <input type="number" step="0.01" name="original_price" id="original_price" value="<?php echo esc_attr($original_price);?>">
    </div>
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
    <?php
}

function lessonlms_courses_save_meta_data($post_id){
    $fields = [
         'regular_price',
         'rating',
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
