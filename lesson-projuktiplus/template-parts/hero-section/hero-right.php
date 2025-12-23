<?php 
/**
 * Template Name: Hero Section Right Text
 * 
 * @package lessonlms
 */

global $wpdb;
$total_course_count = $wpdb->get_var(
    " SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_type = 'courses' AND post_status = 'publish'"
);

$total_enrollments = $wpdb->get_var(
    "SELECT SUM( meta_value ) FROM $wpdb->postmeta WHERE meta_key = '_enrolled_students'"
);

if(!empty($total_enrollments) && $total_enrollments >=999){
    return $total_enrollments;
}elseif(!empty($total_enrollments) && $total_enrollments <= 1000 && $total_enrollments >=10000){
    $total_enrollments = $total_enrollments/1000 . 'K';
    return $total_enrollments;

}

?>

<div class="hero-text-box">
    <h1><?php echo esc_html(get_theme_mod('hero_section_title','Learn without limits and spread knowledge.')); ?></h1>
    <p><?php echo esc_html(get_theme_mod('hero_section_description','Build new skills for that “this is my year” feeling...')); ?></p>

    <div class="hero-btns">
        <div class="yellow-bg-btn See-Courses-btn">
            <a href="<?php echo esc_url(get_post_type_archive_link('courses')); ?>">
                <?php echo esc_html(get_theme_mod('courses_button_text','See Courses')); ?>
            </a>
        </div>

        <div class="watch-video-btn">
            <div class="play-btn">
                <svg width="10" height="12">...</svg>
            </div>
            <span>
                <a href="<?php echo esc_url(get_theme_mod('watch_button_url','#')); ?>">
                    <?php echo esc_html(get_theme_mod('watch_button_text','Watch Video')); ?>
                </a>
            </span>
        </div>
    </div>

    <div class="engagement">
        <span><?php echo esc_html(get_theme_mod('recent_engagement_text','Recent engagement')); ?></span>
        <div class="engagement-wrapper">
            <h3><?php echo esc_html($total_enrollments); ?> 
                <span><?php echo esc_html(get_theme_mod('student_label_text','Students')); ?></span>
            </h3>
            <h3>
                <?php echo $total_course_count . get_template_part("assets/svg/hero-section/plus-icon");  ?>
        
                <span><?php echo esc_html(get_theme_mod('course_label_text','Courses')); ?></span>
            </h3>
        </div>
    </div>
</div>
