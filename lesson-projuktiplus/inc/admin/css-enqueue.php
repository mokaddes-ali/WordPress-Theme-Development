<?php
/**
 * Enqueue CSS for admin panel
 * 
 * @package lessonlms
 */
function lessonlms_admin_css_loader( $hook ) {

    $theme_uri = get_template_directory_uri();

    $admin_styles = array(

        'amars-admin-css' => array(
            'path'      => '/css/amars-admin.css',
            'deps'      => array(),
            'version'   => time(),
            'condition' => array(
                'toplevel_page_lessonlms_courses_slug',
            ),
        ),

        'admin-module-css' => array(
            'path'      => '/assets/css/admin-modules.css',
            'deps'      => array(),
            'version'   => time(),
            'condition' => array(
                 'toplevel_page_lesslms_courses_modules_slug',
            ),
        ),

    );
    if ( empty( $admin_styles ) || ! is_array( $admin_styles ) ) {
        return;
    }
    foreach ( $admin_styles as $handle => $style ) {

        if ( empty( $style['condition'] ) || ! is_array( $style['condition'] ) ) {
            continue;
        }

        if ( ! in_array( $hook, $style['condition'], true ) ) {
            continue;
        }

        wp_enqueue_style(
            $handle,
            $theme_uri . $style['path'],
            $style['deps'],
            $style['version']
        );
    }
}

return 'lessonlms_admin_css_loader';