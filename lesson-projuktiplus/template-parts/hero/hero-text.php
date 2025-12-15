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
            <h3><?php echo esc_html(get_theme_mod('student_count_text','50K')); ?> 
                <span><?php echo esc_html(get_theme_mod('student_label_text','Students')); ?></span>
            </h3>
            <h3><?php echo esc_html(get_theme_mod('course_count_text','70+')); ?> 
                <span><?php echo esc_html(get_theme_mod('course_label_text','Courses')); ?></span>
            </h3>
        </div>
    </div>
</div>
