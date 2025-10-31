  <?php
  /**
   * Template Name: Course Details Card
   */

    $video_hours  = get_post_meta(get_the_ID(), "video_hours", true) ?: '0.00';
                    
    $language  = get_post_meta(get_the_ID(), "language", true) ?: 'English';
    $sub_title_language  = get_post_meta(get_the_ID(), "sub_title_language", true) ?: 'English';
  ?>
  
  <div class="course-right-info-card1">
            <h2>Course Details</h2>
             <div class="course-right-info-card1-items item1">

                        <?php get_template_part('template-parts/single-course/svg/video-time', 'svg'); ?>

                        <div class="text">
                            <span>
                                <?php echo esc_html_e('Duration', 'lessonlms') ?>
                            </span>
                            <?php if ($video_hours): ?>
                                <p>
                                    <?php echo esc_html($video_hours) . ' ' . __('hours', 'lessonlms'); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="course-right-info-card1-items item2">
                         <?php get_template_part('template-parts/single-course/svg/video-time', 'svg'); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="#f3b841" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>

                        <div class="text">
                            <span><?php echo esc_html_e('Last Updated', 'lessonlms'); ?></span>
                            <p><?php echo get_the_modified_date('M j, Y') ?></p>
                        </div>
                    </div>

                    <div class="course-right-info-card1-items item3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40"
                            class="size-6">
                            <!-- Background -->
                            <rect width="24" height="24" rx="4" fill="#f3b841" />

                            <!-- Globe Icon (Language) -->
                            <path fill="white"
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm6.93 6h-2.95a15.9 15.9 0 0 0-1.24-3.02A8.03 8.03 0 0 1 18.93 8zM12 4c.83 1.2 1.48 2.58 1.91 4H10.1A11.72 11.72 0 0 1 12 4zM4.26 14a7.96 7.96 0 0 1 0-4h3.48c-.09.66-.14 1.32-.14 2s.05 1.34.14 2H4.26zm1.81 4h2.95c.34 1.07.77 2.07 1.24 3.02A8.03 8.03 0 0 1 6.07 18zM8.19 8H5.24a8.03 8.03 0 0 1 3.26-3.02A15.9 15.9 0 0 0 8.19 8zm1.91 12a11.72 11.72 0 0 1-1.91-4h3.81c-.43 1.42-1.08 2.8-1.9 4zm0-12h3.81c-.43-1.42-1.08-2.8-1.9-4a11.72 11.72 0 0 0-1.91 4zm2 10c.83-1.2 1.48-2.58 1.91-4h-3.81c.43 1.42 1.08 2.8 1.9 4zm.19-6h3.81a11.72 11.72 0 0 0-1.9-4h-3.82c.42 1.42 1.08 2.8 1.91 4zm0 2c-.83 1.2-1.48 2.58-1.91 4h3.81a11.72 11.72 0 0 0-1.9-4zm2.81 6c.47-.95.9-1.95  1.24-3.02h2.95a8.03 8.03 0 0 1-3.26 3.02zM16.26 14c.09-.66.14-1.32.14-2s-.05-1.34-.14-2h3.48a7.96 7.96 0 0 1 0 4h-3.48z" />
                        </svg>


                        <div class="text">
                            <span><?php echo esc_html_e('Language', 'lessonlms'); ?></span>
                            <?php if ($language): ?>
                                <p><?php echo esc_html($language); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="course-right-info-card1-items item4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40"
                            class="size-6">
                            <rect x="3" y="5" width="40" height="22" rx="2" ry="2" fill="#f3b841" />
                            <text x="7" y="16" font-size="8" font-family="Arial, sans-serif" fill="white"
                                font-weight="bold">CC</text>
                        </svg>

                        <div class="text">
                            <span><?php echo esc_html_e('Sub titles', 'lessonlms'); ?></span>
                            <?php if ($language): ?>
                                <p>
                                    <?php echo esc_html($sub_title_language); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>