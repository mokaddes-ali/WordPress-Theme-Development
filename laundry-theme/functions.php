<?php

/**
 * Theme Functions
 */


// Include Default Theme Support
include_once get_template_directory() . '/inc/default.php';
include_once get_template_directory() .'/inc/pagination.php';

// Include Enqueue Scripts

include_once get_template_directory() . '/inc/enqueue.php';

// Register Slider Custom Post Type

include_once get_template_directory() . '/inc/CPT/slider.php';
include_once get_template_directory() . '/inc/CPT/services.php';
include_once get_template_directory() . '/inc/CPT/testimonial.php';

// Include Customizer Settings
include_once get_template_directory() . '/inc/customizer/top.header.php';
include_once get_template_directory() . '/inc/customizer/header.php';
include_once get_template_directory() . '/inc/customizer/about.php';
include_once get_template_directory() . '/inc/customizer/services.php';
include_once get_template_directory() . '/inc/customizer/testimonial.php';
include_once get_template_directory() . '/inc/customizer/blog.php';
include_once get_template_directory() . '/inc/customizer/footer.php';

//Include Custom Tags

include_once get_template_directory() . '/inc/custom.tag.php';


?>
