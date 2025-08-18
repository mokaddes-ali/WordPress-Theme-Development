<?php
$cta_title = get_theme_mod('cta_title', 'Take the next step toward your personal and professional goals with Lesson.');

$cta_description = get_theme_mod('cta_description', 'Join now to receive personalized recommendations from the full Coursera catalog.');

$cta_button_text = get_theme_mod('cta_button_text', 'Join now');

$cta_button_url = get_theme_mod('cta_button_url', '#');

$cta_image = get_theme_mod('cta_image', get_template_directory_uri() . '/assets/images/cta-right.png');

?>
        <!----- CTA section ----->
        <section class="cta">
            <div class="container">
                <div class="cta-wrapper">
                    <!----- text box ----->
                    <div class="cta-text">
                        <h3>
                            <?php if($cta_title):?>
                                <?php echo esc_html($cta_title); ?>
                            <?php endif; ?>
                        </h3>
                        <p>
                            <?php if($cta_description):?>
                                <?php echo esc_html($cta_description); ?>
                            <?php endif; ?>
                        </p>

                        <div class="yellow-bg-btn join-now">
                            <a href="<?php echo esc_url($cta_button_url); ?>">
                                <?php if($cta_button_text):?>
                                    <?php echo esc_html($cta_button_text); ?>
                                <?php endif; ?>
                            </a>
                        </div>
                    </div>

                    <!----- img box ----->
                    <div class="cta-img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cta-right.png" alt="">
                    </div>
                </div>
            </div>
        </section>
