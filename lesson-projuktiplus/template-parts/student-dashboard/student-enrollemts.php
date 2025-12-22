<?php

/**
 * Template Name: Student Enrollemts
 * 
 * @package lessonlms
 */

$current_user_id = get_current_user_id();
$enrolled_courses = get_user_meta($current_user_id, '_user_enrollments', true);

if (!empty($enrolled_courses) && is_array($enrolled_courses)) :

?>


    <div class="student-enrollment-section-wrapper">
        <div class="student-enrollment-card-grid">

            <?php foreach ($enrolled_courses as $enrollment):
            ?>
                <?php
                $course_id = intval($enrollment['course_id']);
                $course    = get_post($course_id);

                if ($course && $course->post_status == 'publish') :

                    $thumbnail = get_the_post_thumbnail_url($course_id, 'medium');
                ?>

                    <div class="student-enrollment-card-item">


                        <div class="student-enrollment-card-image">
                            <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($course->post_title); ?>">
                        </div>

                        <div class="student-enrollment-card-content">
                            <h3 class="student-enrollment-course-title">
                                <?php echo esc_html($course->post_title); ?>
                            </h3>

                            <p class="student-enrollment-date">
                                <?php echo date('M j, Y'); ?>
                            </p>
                              <a href="<?php echo esc_url(home_url('/start-your-learning/?course_id=' . $course_id)); ?>" class="student-enrollment-start-learning-btn">
                              <?php esc_html_e('Start Learning', 'lessonlms'); ?>
                            </a>
                        </div>
                    </div>
            <?php endif;
            endforeach; ?>

        </div>
    </div>
<?php endif; ?>