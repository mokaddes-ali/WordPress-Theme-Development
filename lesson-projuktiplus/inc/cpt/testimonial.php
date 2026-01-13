    <?php 
    /**
     * Register Testimonial
     */
    function lessonlms_testimonial_register()
    {
        $labels = array(
            "name"=> __("Testimonials", "lessonlms"),
            "singular_name"=> __("Testimonial", "lessonlms"),
            "name_admin_bar"=>  __("Testimonial", "lessonlms"),
            "add_new"=> __("Add New", "lessonlms"),
            "add_new_item"=> __("Add New Testimonial", "lessonlms"),
            "new_item"=> __("New Testimonial", "lessonlms"),
            "edit_item"=> __("Edit Testimonial", ""),
            "view_item"=> __("View Testimonial", ""),
            "all_items"=> __("All Testimonials", ""),
            "search_item"=> __("Search Testimonials", ""),
            "not_found" => __("No Testimonials found.", ""),
            "not_found_in_trash"=> __("No Testimonials found in trash.", ""),
        );
        $args = array(
            "labels"=> $labels,
            'description'        => 'Testimonial custom post type.',
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'show_in_rest'       => true,
            'rewrite'            => array( 'slug' => 'testimonials' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_icon'          => 'dashicons-format-quote',
            'menu_position'      => 33,
            'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        );

        register_post_type('testimonials', $args);
    }
    add_action('init', 'lessonlms_testimonial_register');

    function lessonlms_testimonial_add_meta_box()
    {
        add_meta_box(
            'testimonial_details',
            'Testimonial Details',
            'lessonlms_testimonial_add_meta_box_callback',
            'testimonials',
            'normal',
            'high'
        );

    }
    add_action('add_meta_boxes', 'lessonlms_testimonial_add_meta_box');

    function lessonlms_testimonial_add_meta_box_callback($post)
    {

        $student_designation = get_post_meta($post->ID, 'student_designation', true);
        ?>
        <div class="">
            <label for="student_designation"> Student Destination / Course Name </label>
            <input type="text" name="student_designation" id="student_designation" value="<?php echo esc_attr($student_designation);?>">
        </div>
        <?php
    }

    function lessonlms_testimonial_save_meta_data($post_id)
    {
        $fields = [
            'student_designation',
        ];
        
        foreach($fields as $field){
            if(isset($_POST[$field])) {
                update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));

            }
        }
    }
    add_action('save_post_testimonials', 'lessonlms_testimonial_save_meta_data');

