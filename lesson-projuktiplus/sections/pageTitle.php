<?php 
/**
 * 
 * Page Title
 * @package lessonlms
 */

$default_image = get_template_directory_uri() . '/assets/images/courses-image1.png';

if(is_singular() && has_post_thumbnail()){
    $bg_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
}else{
    $bg_image = $default_image;
}

$title =is_singular('post') ? get_the_title() :
       (is_singular('page') ? get_the_title() :
        (is_post_type_archive('courses') ? post_type_archive_title('', false) :
        (is_home() ? 'Blog' : 
         (is_archive() ? get_the_archive_title() : get_the_title()))));
?>

<section class="page-section" style="background-image: url('<?php echo esc_url($bg_image);?>') ;">
    <div class="overlay">
        <div class="container">
            <h1 class="page-title" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000">
                <?php echo esc_html(wp_trim_words($title, 5));?>
            </h1>

            <!-- Breadcrumb Start -->
            <nav class="custom-breadcrumb" aria-label="breadcrumb" data-aos="fade-up" data-aos-easing="linear"
                data-aos-duration="1000">
                <ul>
                    <li>
                        <a href="<?php echo home_url(); ?>">
                            <?php echo esc_html__('Home', 'lessonlms');?>
                        </a>
                    </li>
                    <li class="breadcrumb-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                        </svg>
                    </li>
                    <li>
                        <?php echo esc_html(wp_trim_words($title, 5));?>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>