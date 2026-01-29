<?php
/**
 * Courses Post Type Meta Box
 * 
 * @package lessonlms
 */

require_once get_template_directory() . '/inc/meta-fields/course-meta-fields.php';

/**
 * Add Courses Meta Box
 */
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

/**
 * Courses Meta Box Callback
 */
function lessonlms_couses_add_meta_box_callback($post) {
    wp_nonce_field( 'lessonlms_courses_meta_nonce', 'lessonlms_courses_meta_nonce_field' );

    $section_fields = lessonlms_get_course_meta_fields();

    foreach( $section_fields as $section_key => $fields ) :
    ?>
    <div class="lessonlms-meta-section lessonlms-meta-section-<?php echo esc_attr( $section_key ); ?>">

        <h3 class="lessonlms-section-title">
            <?php echo esc_html( ( $section_key === 'pricing' ) ? 'Pricing' : 'Course Details' ); ?>
        </h3>

        <div class="lessonlms-fields-wrap">
            <?php foreach ( $fields as $key => $field ) :
                $field_value = get_post_meta( $post->ID, $key, true );
            ?>
                <div class="lessonlms-field">
                    <label for="<?php echo esc_attr( $key ); ?>">
                        <?php echo esc_html( $field['label'] ); ?>
                    </label>

                    <?php if ( $field['type'] === 'textarea' ) : ?>
                        <textarea
                            name="<?php echo esc_attr( $key ); ?>"
                            id="<?php echo esc_attr( $key ); ?>"
                            rows="<?php echo esc_attr( $field['rows'] ); ?>"
                            <?php if ( isset( $field['required'] ) && $field['required'] ) : ?>
                                required
                            <?php endif; ?>
                        ><?php echo esc_textarea( $field_value ); ?></textarea>
                    <?php else : ?>
                        <input
                            type="<?php echo esc_attr( $field['type'] ); ?>"
                            name="<?php echo esc_attr( $key ); ?>"
                            id="<?php echo esc_attr( $key ); ?>"
                            value="<?php echo esc_attr( $field_value ); ?>"
                            <?php if ( isset( $field['step'] ) ) : ?>
                                step="<?php echo esc_attr( $field['step'] ); ?>"
                            <?php endif; ?>
                            <?php if ( isset( $field['required'] ) && $field['required'] ) : ?>
                                required
                            <?php endif; ?>
                        >
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
    <?php
    endforeach;
}

/**
 * Save Courses Meta Data
 */
function lessonlms_courses_save_meta_data($post_id){

    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
    if ( ! current_user_can('edit_post', $post_id) ) return;

    if (
        ! isset($_POST['lessonlms_courses_meta_nonce_field']) ||
        ! wp_verify_nonce(
            $_POST['lessonlms_courses_meta_nonce_field'],
            'lessonlms_courses_meta_nonce'
        )
    ) {
        return;
    }

    $sections = lessonlms_get_course_meta_fields();

    foreach ( $sections as $fields ) {
        foreach ( $fields as $key => $field ) {
            if ( isset( $_POST[$key] ) ) {

                if ( $field['type'] === 'textarea' ) {
                    update_post_meta(
                        $post_id,
                        $key,
                        sanitize_textarea_field( $_POST[$key] )
                    );
                } else {
                    update_post_meta(
                        $post_id,
                        $key,
                        sanitize_text_field( $_POST[$key] )
                    );
                }

            }
        }
    }
}
add_action('save_post_courses', 'lessonlms_courses_save_meta_data');

/**
 * Featured Courses Meta Box
 */
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
    $featured = get_post_meta($post->ID, '_is_featured', true);
    ?>
    <div class="featured-check">
        <label for="_is_featured">Show Featured Course:</label>
        <input type="checkbox" value="yes" name="_is_featured" id="_is_featured" <?php checked( $featured, 'yes' ); ?>>
    </div>
    <?php
}

/**
 * Save Featured Courses Meta
 */
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
