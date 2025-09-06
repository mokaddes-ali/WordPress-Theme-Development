<?php

/**
 * 
 */
get_header();

$default_image = get_template_directory_uri() . '/assets/images/courses-image1.png';

if (has_post_thumbnail()) {
    $bg_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
} else {
    $bg_image = $default_image;
}
$title = get_the_title();
?>

<section class="page-section" style="background-image: url('<?php echo esc_url($bg_image); ?>') ;">
    <div class="overlay">
        <div class="container">
            <h1 class="page-title" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000">
                <?php echo esc_html(wp_trim_words($title, 5)); ?>
            </h1>

            <!-- Breadcrumb Start -->
            <nav class="custom-breadcrumb" aria-label="breadcrumb" data-aos="fade-up" data-aos-easing="linear"
                data-aos-duration="1000">
                <ul>
                    <li>
                        <a href="<?php echo home_url(); ?>">
                            <?php echo esc_html__('Home', 'lessonlms'); ?>
                        </a>
                    </li>
                    <li class="breadcrumb-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                        </svg>
                    </li>
                    <li>
                        <a href="<?php echo get_post_type_archive_link('courses'); ?>">
                            <?php echo __('Courses', 'lessonlms'); ?>
                        </a>

                    </li>
                    <li class="breadcrumb-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                        </svg>
                    </li>
                    <li>
                        <?php echo esc_html(wp_trim_words($title, 5)); ?>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>


<div class="single-courses">
    <div class="container">
        <div class="single-courses-wrapper">
            <!-- left -->
            <div class="left-courses-image-details">
                <div class="single-couses-image-box">
                   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/heor-img.png" alt="">
                    <!----- absolute card box ----->
                    <div class="courses-card-box">
                        <!-- prices -->
                         <div class="course-price-list">
                            <h2>$200</h2>
                            <h3>$300</h3>
                            <p>30% off</p>
                         </div>
                         <div class="enroll-btn">
                            <a href="#">
                                Enroll Now
                            </a>
                         </div>
                         <h3>This courses includes:</h3>
                        <div class="courses-card-items item1">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="36" height="36" role="img" aria-label="Play">
  <title>Play</title>
  <circle cx="12" cy="12" r="11" fill="none" stroke="#FFB900" stroke-width="2"/>
  <polygon points="10,8 16,12 10,16" fill="#FFB900"/>
</svg>

                            <div class="text">
                                <p>42 hours on-demand vedio </p>
                            </div>
                        </div>

                        <div class="courses-card-items item2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFB900" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
</svg>


                            <div class="text">
                                <p>18 articles</p>
                            </div>
                        </div>

                        <div class="courses-card-items item3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFB900" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
</svg>

                            <div class="text">
                                <p>58 downable resource</p>
                            </div>
                        </div>

                         <div class="courses-card-items item3">
                             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFB900" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
</svg>

                            <div class="text">
                                <p>Full lifetime Access</p>
                            </div>
                        </div>
                         <div class="courses-card-items item3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFB900" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
</svg>


                            <div class="text">
                                <p>Access on mobile and TV</p>
                            </div>
                        </div>
                         <div class="courses-card-items item3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFB900" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
</svg>


                            <div class="text">
                                <p>58 downable resource</p>
                            </div>
                        </div>
                       

                    </div>
                </div>

                   

                    <!-- single courses wrapper -->

            </div>
            <!-- right -->
            <div class="courses-card-right">
                <!-- first card -->
                <div class="course-right-info-card1">
                    <h2>Course Details</h2>
                    <div class="course-right-info-card1-items item1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="#f3b841" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                        <div class="text">
                            <span>Duration</span>
                            <p>42 hours</p>
                        </div>
                    </div>

                    <div class="course-right-info-card1-items item2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="#f3b841" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>


                        <div class="text">
                            <span>Last Updated</span>
                            <p>June 15, 2023</p>
                        </div>
                    </div>

                    <div class="course-right-info-card1-items item3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40"
                            class="size-6">
                            <!-- Background -->
                            <rect width="24" height="24" rx="4" fill="#f3b841" />

                            <!-- Globe Icon (Language) -->
                             <path fill="white" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm6.93 6h-2.95a15.9 15.9 0 0 0-1.24-3.02A8.03 8.03 0 0 1 18.93 8zM12 4c.83 1.2 1.48 2.58 1.91 4H10.1A11.72 11.72 0 0 1 12 4zM4.26 14a7.96 7.96 0 0 1 0-4h3.48c-.09.66-.14 1.32-.14 2s.05 1.34.14 2H4.26zm1.81 4h2.95c.34 1.07.77 2.07 1.24 3.02A8.03 8.03 0 0 1 6.07 18zM8.19 8H5.24a8.03 8.03 0 0 1 3.26-3.02A15.9 15.9 0 0 0 8.19 8zm1.91 12a11.72 11.72 0 0 1-1.91-4h3.81c-.43 1.42-1.08 2.8-1.9 4zm0-12h3.81c-.43-1.42-1.08-2.8-1.9-4a11.72 11.72 0 0 0-1.91 4zm2 10c.83-1.2 1.48-2.58 1.91-4h-3.81c.43 1.42 1.08 2.8 1.9 4zm.19-6h3.81a11.72 11.72 0 0 0-1.9-4h-3.82c.42 1.42 1.08 2.8 1.91 4zm0 2c-.83 1.2-1.48 2.58-1.91 4h3.81a11.72 11.72 0 0 0-1.9-4zm2.81 6c.47-.95.9-1.95  1.24-3.02h2.95a8.03 8.03 0 0 1-3.26 3.02zM16.26 14c.09-.66.14-1.32.14-2s-.05-1.34-.14-2h3.48a7.96 7.96 0 0 1 0 4h-3.48z" />
                        </svg>


                        <div class="text">
                            <span>Language</span>
                            <p>English</p>
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
                            <span>Sub titles</span>
                            <p>English, Spanish</p>
                        </div>
                    </div>


                </div>

            </div>
            <!-- second card -->
            <div class="course-info-card2">

            </div>
        </div>
    </div>
</div>
</div>

<?php get_footer(); ?>