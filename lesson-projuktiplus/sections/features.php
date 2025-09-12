  <?php
  $features_title = get_theme_mod('features_title', 'Learner outcomes through our awesome platform');
  $features_description_one = get_theme_mod('features_description_one', '87% of people learning for professional development report career benefits like getting a promotion, a raise, or starting a new career.');
  $features_description_two = get_theme_mod('features_description_two', 'Lesson Impact Report (2022)');
  $features_button_text = get_theme_mod('features_button_text', 'sign up');
  $features_button_url = get_theme_mod('features_button_url', '#');
  $features_image_one = get_theme_mod('features_image_one', get_template_directory_uri() . '/assets/images/feature1.png');
  $features_image_two = get_theme_mod('features_image_two', get_template_directory_uri() . '/assets/images/feature2.png');
  ?>
  
  <!----- features section ----->
        <section class="features">
            <div class="container">
                <div class="features-wrapper">
                    <!----- img box ----->
                    <div class="features-img">
                        <?php if($features_image_one): ?>
                        <img class="img-1" src="<?php echo esc_url($features_image_one); ?>" alt="">
                        <?php endif; ?>

                        <?php if($features_image_two): ?>
                        <img class="img-2" src="<?php echo esc_url($features_image_two); ?>" alt="">
                        <?php endif; ?>

                    </div>

                    <!----- text box ----->
                    <div class="features-text">
                        <h3><?php if($features_title): echo esc_html($features_title); endif; ?></h3>
                        <p><?php if($features_description_one): echo esc_html($features_description_one); endif; ?></p>
                        <span><?php if($features_description_two): echo esc_html($features_description_two); endif; ?></span>

                        <div class="yellow-bg-btn sign-up">
                            <a href="<?php if($features_button_url): echo esc_url($features_button_url); endif; ?>"><?php if($features_button_text): echo esc_html($features_button_text); endif; ?></a>
                        </div>

                    </div>
                </div>
            </div>
        </section>