<?php
/**
 * Enqueue CSS and JavaScript for Admin Panel
 * 
 * @package  lessonlms
 */
function lessonlms_admin_enqueue() {
    
require __DIR__ . '/css-enqueue.php';
require __DIR__ . '/js-enqueue.php';

}
add_action( 'admin_enqueue_scripts', 'lessonlms_admin_enqueue' );

// add_action( 'admin_enqueue_scripts', $stye_loader );
// function lessonlms_admin_enqueue_css_js() {
//        // jQuery
//     wp_enqueue_script('jquery');
    
//     // Custom Admin JS
//     wp_enqueue_script('amars-admin-js', get_template_directory_uri() . '/js/amars-admin.js', array('jquery', 'sweetalert-js'), '1.0.0', true);
//     wp_enqueue_style(
//         'lessonlms-admin-css',
//         get_template_directory_uri() . '/assets/css/admin.css',
//         array(),
//         time()
//     );
// }
// add_action( 'admin_enqueue_scripts', 'lessonlms_admin_enqueue_css_js' );