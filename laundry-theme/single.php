<?php get_header(); ?>


<!-- Single Services Area -->
<section class="relative mx-auto w-full px-[5%] lg:px-[7.5%] 
    flex items-center justify-start 
    h-[180px] sm:h-[200px] md:h-[220px] lg:h-[250px] 
    bg-cover bg-center bg-no-repeat z-0" style="background-image: url('<?php 
    if (has_post_thumbnail()) {
        echo esc_url(get_the_post_thumbnail_url()); 
    } else {
        echo esc_url(get_template_directory_uri() . '/assets/images/bg.png'); 
    }
?>');">

    <!-- Overlay -->
    <div class="absolute inset-0 z-10 bg-gradient-to-r from-[#142137] to-[#1421371A] opacity-100"></div>

    <!-- Content -->
    <div class="relative z-50 container mx-auto text-white 
              flex flex-col items-start justify-center gap-4 h-full">

        <!-- Blog Title -->
        <a href="<?php echo esc_url(the_permalink());?>">
            <h1
                class="text-white text-[24px] sm:text-[28px] md:text-[32px] lg:text-[38px] font-semibold leading-[1.2] tracking-[-0.8px] sm:tracking-[-1px] lg:tracking-[-1.2px] font-poppins">
                <?php echo esc_html(get_the_title()); ?>
            </h1>
        </a>

        <!-- Background Badge -->
        <div
            class="w-[250px] sm:w-[350px] max-w-[400px] h-[34px] rounded-[195px] bg-white/10 backdrop-blur-[7px] flex items-center justify-center gap-[10px] py-3 px-2">

            <!-- SVG Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16" fill="none"
                class="w-4 h-4 sm:w-5 sm:h-5">
                <path
                    d="M16.146 15.9992H11.0899V11.0576H8.29524V15.985H3.01103C3.0043 15.8855 2.99008 15.7786 2.99008 15.6716C2.98859 13.6145 2.99158 11.5581 2.9856 9.50094C2.9856 9.31169 3.02823 9.17928 3.18757 9.0581C5.25592 7.47523 7.31904 5.88563 9.38365 4.29827C9.44125 4.25413 9.50484 4.21673 9.58413 4.16437C9.74795 4.28854 9.90579 4.40674 10.0621 4.52717C12.0078 6.02402 13.9535 7.52161 15.8999 9.01696C16.051 9.1329 16.167 9.23539 16.1655 9.46504C16.1542 11.5715 16.1587 13.6788 16.158 15.7853C16.158 15.8459 16.1505 15.9057 16.1445 16L16.146 15.9992Z"
                    fill="white" />
                <path
                    d="M19.15 7.36603C18.699 7.9525 18.2741 8.50381 17.8282 9.08355C15.0784 6.96882 12.345 4.86605 9.57576 2.73561C6.83417 4.84436 4.09332 6.95236 1.32255 9.0828C0.87746 8.50456 0.446585 7.94577 0 7.36453C3.19267 4.90869 6.37038 2.46407 9.57352 0C10.9155 1.03081 12.2523 2.05788 13.6616 3.14031V1.82449H16.4443V2.21946C16.4443 3.11712 16.4571 4.01477 16.4369 4.91168C16.4301 5.19594 16.5289 5.36276 16.7503 5.52733C17.5492 6.12203 18.3332 6.73767 19.15 7.36603Z"
                    fill="white" />
            </svg>

            <!-- Breadcrumb -->
            <div class="flex  items-center gap-1 sm:gap-2">
                <span
                    class="text-white hover:text-blue-300 hover:underline text-xs sm:text-sm md:text-[16px] font-medium">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'laundryclean'); ?></a>
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" width="3" height="3" viewBox="0 0 3 3" fill="none">
                    <circle cx="1.5" cy="1.5" r="1.5" fill="white" fill-opacity="0.7" />
                </svg>
                <span
                    class="text-white hover:text-blue-300 hover:underline text-xs sm:text-sm md:text-[16px] font-medium">
                    <a
                        href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))) ?>"><?php esc_html_e('Blog', 'laundryclean'); ?></a>
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" width="3" height="3" viewBox="0 0 3 3" fill="none">
                    <circle cx="1.5" cy="1.5" r="1.5" fill="white" fill-opacity="0.7" />
                </svg>
                <span class="text-whitehover:text-blue-300 hover:underline text-xs md:text-[16px] font-medium">
                    <?php esc_html_e('Blog Details', 'laundryclean'); ?>
                </span>
            </div>
        </div>
    </div>
</section>


<section
    class="mx-auto w-full px-[2.5%] md:px-[3.5%] lg:px-[5%] 2xl:px-[8%] pt-6 md:pt-8 lg:pt-10 xl:pt-16 flex flex-col-reverse lg:flex-row gap-4 md:gap-6 xl:gap-12">
    <!-- Blog Left Content -->
    <?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
    <main class="blog-left  w-full lg:w-8/12">

        <!-- First Card Default -->
        <div class="w-full">
            <!-- Image Section -->
            <div class="w-full h-auto aspect-[1160/570]">
                <?php if (has_post_thumbnail()) : ?>
                <img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>"
                    alt="<?php echo esc_attr(get_the_title()); ?>" class="w-full h-full object-cover" />
                <?php endif; ?>
            </div>

            <!-- Text Section -->
            <div class="py-4 md:py-5 xl:pr-4 flex flex-col gap-3 md:gap-[12px]">
                <!-- First Row -->
                <div class="flex flex-col sm:flex-wrap sm:flex-row  gap-4 md:gap-6 lg:gap-3">

                    <!-- Mobile device only -->
                    <div class="w-full px-6 mt-2 flex justify-between sm:hidden">
                        <!-- Avatar + Name -->
                        <div class="flex items-center gap-3">
                            <?php
                                    $author_id = get_the_author_meta('ID');
                                    $default_avatar = get_template_directory_uri() . '/assets/images/postclient1.jpg';
                                    echo get_avatar($author_id, 60, '', '', ['class' => 'w-12 h-12 object-cover']);
                                    ?>,
                            <h2 class="text-[#142137] font-poppins text-[18px] font-semibold">
                                <?php echo get_the_author(); ?>
                            </h2>
                        </div>

                        <!-- Category -->
                        <div
                            class="flex items-center gap-1 text-[rgba(20,33,55,0.60)] font-poppins text-base font-medium">
                            <!-- Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                                fill="none" class="w-[22px] h-[22px] flex-shrink-0 aspect-square">
                                <path
                                    d="M16.3906 0.00652348C17.3671 0.00652348 18.3446 0.0285093 19.3211 0.00102703C20.8363 -0.0411124 22.0281 1.21941 21.9997 2.69245C21.9631 4.58415 21.9887 6.47767 21.9915 8.37028C21.9933 9.80119 21.4821 11.0177 20.4726 12.0263C17.4386 15.0576 14.4064 18.0907 11.3696 21.1202C10.1998 22.2864 8.67634 22.2946 7.51568 21.1367C5.28962 18.9161 3.06814 16.691 0.849406 14.4631C-0.0190321 13.5901 -0.237974 12.4798 0.268615 11.4492C0.40053 11.1808 0.583745 10.9215 0.795358 10.7099C3.87245 7.6136 6.95412 4.52094 10.0459 1.43926C11.0078 0.480134 12.1913 0.0120199 13.5517 0.00743955C14.498 0.00377525 15.4443 0.00743955 16.3906 0.00743955V0.00652348ZM16.3503 1.73241C15.48 1.73241 14.6098 1.74981 13.7395 1.72783C12.6823 1.70034 11.8166 2.0796 11.0755 2.82528C8.11662 5.80252 5.14671 8.7706 2.18229 11.7423C2.07511 11.8504 1.96244 11.9576 1.87816 12.0822C1.66929 12.3891 1.68395 12.7665 1.90747 13.0642C1.98076 13.1613 2.07053 13.2456 2.15664 13.3327C4.32408 15.5047 6.49242 17.6758 8.66077 19.8469C8.73589 19.922 8.81009 20.0008 8.89345 20.0667C9.22599 20.3287 9.61074 20.337 9.94877 20.0869C10.0468 20.0145 10.1329 19.9275 10.2199 19.8414C13.2127 16.8531 16.2019 13.8631 19.1975 10.8776C19.9157 10.1612 20.2839 9.31842 20.2702 8.29516C20.2528 6.90639 20.2656 5.51671 20.2656 4.12794C20.2656 3.60853 20.2766 3.08911 20.2601 2.57062C20.2436 2.05853 19.9331 1.76264 19.4191 1.73424C19.3129 1.72874 19.2057 1.73149 19.0985 1.73149C18.1824 1.73149 17.2664 1.73149 16.3503 1.73149V1.73241Z"
                                    fill="#1D92CD" />
                                <path
                                    d="M15.747 3.57547C17.1935 3.56815 18.3377 4.70408 18.3358 6.14598C18.334 7.56315 17.1962 8.7119 15.7873 8.71832C14.3555 8.72473 13.1893 7.56773 13.1912 6.1414C13.1921 4.72881 14.3344 3.5828 15.747 3.57547ZM16.6127 6.14415C16.6127 5.66412 16.2582 5.30502 15.7791 5.29953C15.2991 5.29403 14.9317 5.6458 14.9225 6.12033C14.9125 6.61684 15.2844 6.99426 15.7791 6.98785C16.2591 6.98235 16.6136 6.62325 16.6136 6.14415H16.6127Z"
                                    fill="#1D92CD" />
                            </svg>
                            <a href="<?php esc_html(the_permalink()); ?>">
                                <?php
                                        $categories = get_the_category();
                                        if (!empty($categories)) {
                                            echo esc_html($categories[0]->name);
                                        }
                                        ?>
                            </a>

                        </div>
                    </div>


                    <!-- Desktop Avatar and name -->
                    <div class="hidden sm:flex items-center gap-2">
                        <div class=" w-12 h-12 lg:w-14 lg:h-14 bg-[#CFD4C6] overflow-hidden">
                            <?php
                                    echo get_avatar($author_id, 80, '', '', ['class' => 'w-full h-full object-cover']);
                                    ?>
                        </div>

                        <!-- Desktop Name -->
                        <h2 class="hidden sm:flex text-[#142137] font-poppins text-[18px] font-semibold leading-none">
                            <?php echo get_the_author(); ?>
                        </h2>
                    </div>

                    <!-- Desktop Category -->
                    <div
                        class="hidden sm:flex items-center gap-1 text-[rgba(20,33,55,0.60)] font-poppins text-base font-medium">
                        <!-- Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none"
                            class="w-[22px] h-[22px] flex-shrink-0 aspect-square">
                            <path
                                d="M16.3906 0.00652348C17.3671 0.00652348 18.3446 0.0285093 19.3211 0.00102703C20.8363 -0.0411124 22.0281 1.21941 21.9997 2.69245C21.9631 4.58415 21.9887 6.47767 21.9915 8.37028C21.9933 9.80119 21.4821 11.0177 20.4726 12.0263C17.4386 15.0576 14.4064 18.0907 11.3696 21.1202C10.1998 22.2864 8.67634 22.2946 7.51568 21.1367C5.28962 18.9161 3.06814 16.691 0.849406 14.4631C-0.0190321 13.5901 -0.237974 12.4798 0.268615 11.4492C0.40053 11.1808 0.583745 10.9215 0.795358 10.7099C3.87245 7.6136 6.95412 4.52094 10.0459 1.43926C11.0078 0.480134 12.1913 0.0120199 13.5517 0.00743955C14.498 0.00377525 15.4443 0.00743955 16.3906 0.00743955V0.00652348ZM16.3503 1.73241C15.48 1.73241 14.6098 1.74981 13.7395 1.72783C12.6823 1.70034 11.8166 2.0796 11.0755 2.82528C8.11662 5.80252 5.14671 8.7706 2.18229 11.7423C2.07511 11.8504 1.96244 11.9576 1.87816 12.0822C1.66929 12.3891 1.68395 12.7665 1.90747 13.0642C1.98076 13.1613 2.07053 13.2456 2.15664 13.3327C4.32408 15.5047 6.49242 17.6758 8.66077 19.8469C8.73589 19.922 8.81009 20.0008 8.89345 20.0667C9.22599 20.3287 9.61074 20.337 9.94877 20.0869C10.0468 20.0145 10.1329 19.9275 10.2199 19.8414C13.2127 16.8531 16.2019 13.8631 19.1975 10.8776C19.9157 10.1612 20.2839 9.31842 20.2702 8.29516C20.2528 6.90639 20.2656 5.51671 20.2656 4.12794C20.2656 3.60853 20.2766 3.08911 20.2601 2.57062C20.2436 2.05853 19.9331 1.76264 19.4191 1.73424C19.3129 1.72874 19.2057 1.73149 19.0985 1.73149C18.1824 1.73149 17.2664 1.73149 16.3503 1.73149V1.73241Z"
                                fill="#1D92CD" />
                            <path
                                d="M15.747 3.57547C17.1935 3.56815 18.3377 4.70408 18.3358 6.14598C18.334 7.56315 17.1962 8.7119 15.7873 8.71832C14.3555 8.72473 13.1893 7.56773 13.1912 6.1414C13.1921 4.72881 14.3344 3.5828 15.747 3.57547ZM16.6127 6.14415C16.6127 5.66412 16.2582 5.30502 15.7791 5.29953C15.2991 5.29403 14.9317 5.6458 14.9225 6.12033C14.9125 6.61684 15.2844 6.99426 15.7791 6.98785C16.2591 6.98235 16.6136 6.62325 16.6136 6.14415H16.6127Z"
                                fill="#1D92CD" />
                        </svg>
                        <a href="<?php esc_html(the_permalink()); ?>">
                            <?php
                                    if (!empty($categories)) {
                                        echo esc_html($categories[0]->name);
                                    }
                                    ?>
                        </a>
                    </div>

                    <!-- Date and Comment Count -->
                    <div class="flex items-center gap-4">
                        <div
                            class="flex items-center gap-1 text-[rgba(20,33,55,0.60)] font-poppins text-base font-medium">
                            <!-- Calendar Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 19 20"
                                fill="none" class="w-[16.201px] h-[18px] flex-shrink-0">
                                <path d="M5.75195 1V3.70016" stroke="#1D92CD" stroke-width="2" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12.9531 1V3.70016" stroke="#1D92CD" stroke-width="2" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M17.4528 6.84927V14.4997C17.4528 17.1999 16.1027 19 12.9525 19H5.75218C2.60202 19 1.25195 17.1999 1.25195 14.4997V6.84927C1.25195 4.14911 2.60202 2.349 5.75218 2.349H12.9525C16.1027 2.349 17.4528 4.14911 17.4528 6.84927Z"
                                    stroke="#1D92CD" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M5.75195 9.09912H12.9523" stroke="#1D92CD" stroke-width="2"
                                    stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M5.75195 13.5994H9.35213" stroke="#1D92CD" stroke-width="2"
                                    stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <?php echo get_the_date('M d, Y'); ?>
                        </div>

                        <?php
                                $comments_count = get_comments_number();
                                if (comments_open()) :
                                    if ($comments_count == 0) {
                                        $comment_text = __('No Comments', 'laundryclean');
                                    } elseif ($comments_count == 1) {
                                        $comment_text = __('1 Comment', 'laundryclean');
                                    } else {
                                        $comment_text = $comments_count . ' ' . __('Comments', 'laundryclean');
                                    }
                                ?>
                        <div
                            class="flex items-center gap-1 text-[rgba(20,33,55,0.60)] font-poppins text-base font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none">
                                <path
                                    d="M14.1752 12.8638L14.4872 15.3918C14.5672 16.0558 13.8552 16.5197 13.2872 16.1757L9.93546 14.1838C9.56749 14.1838 9.20752 14.1598 8.85554 14.1118C9.4475 13.4158 9.79947 12.5358 9.79947 11.5838C9.79947 9.31185 7.8316 7.47192 5.39976 7.47192C4.47182 7.47192 3.61588 7.73589 2.90392 8.19989C2.87992 7.99989 2.87192 7.79989 2.87192 7.59189C2.87192 3.95195 6.03171 1 9.93546 1C13.8392 1 16.999 3.95195 16.999 7.59189C16.999 9.75185 15.8871 11.6638 14.1752 12.8638Z"
                                    stroke="#142137" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M9.79943 11.5836C9.79943 12.5356 9.44746 13.4156 8.8555 14.1116C8.06355 15.0716 6.80762 15.6875 5.39971 15.6875L3.31185 16.9275C2.95987 17.1435 2.5119 16.8475 2.5599 16.4395L2.75988 14.8636C1.68795 14.1196 1 12.9276 1 11.5836C1 10.1756 1.75196 8.93564 2.90388 8.19965C3.61583 7.73565 4.47177 7.47168 5.39971 7.47168C7.83156 7.47168 9.79943 9.31161 9.79943 11.5836Z"
                                    stroke="#142137" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <a
                                href="<?php echo esc_url(get_comments_link()); ?>"><?php echo esc_html($comment_text); ?></a>
                        </div>
                        <?php endif; ?>
                    </div>

                </div>

                <!-- Second Row - Title -->
                <div
                    class="text-[#142137] font-poppins text-2xl md:text-3xl lg:text-[34px] font-semibold leading-tight md:leading-[42px] tracking-tight md:tracking-[-0.68px]">
                    <h1>
                        <?php echo esc_html(the_title()); ?>
                    </h1>
                </div>

                <!-- Third Row - Description -->
                <div
                    class="text-[rgba(20,33,55,0.70)] font-poppins text-base md:text-[16px] font-normal leading-relaxed md:leading-[26px]">
                    <?php
$content = get_the_content();

$content = preg_replace('/<img[^>]+\>|<iframe.*?<\/iframe>|<video.*?<\/video>/is', '', $content);

$content = preg_replace('/https?:\/\/(www\.)?(youtube\.com|youtu\.be|vimeo\.com)\/[^\s<]+/i', '', $content);

$content = wp_strip_all_tags($content);


echo esc_html( $content);
?>

                </div>
            </div>
        </div>
        <!-- show click post format type template -->
        <?php
                $format = get_post_format();

                if ($format == 'gallery') {
                    get_template_part('template-parts/singlepost', 'gallery');
                } elseif ($format == 'video') {
                    get_template_part('template-parts/singlepost', 'video');
                } elseif ($format == 'quote') {
                    get_template_part('template-parts/singlepost', 'quote');
                } else {
                    get_template_part('template-parts/singlepost', 'standard');
                }
                ?>


        <?php
                $categories = wp_get_post_categories(get_the_ID());

                $related = new WP_Query(array(
                    'category__in' => $categories,
                    'post__not_in'   => array(get_the_ID()),
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'posts_per_page' => 3,
                )); ?>
        <?php if ($related->have_posts()): ?>
        <?php while ($related->have_posts()): $related->the_post(); ?>
        <div class="">
            <?php if (get_post_format() == 'quote'): ?>
            <div
                class="relative bg-[#EBEFF3] rounded-lg mt-5 lg:mt-10 p-4 md:p-6 flex flex-col items-center text-center gap-6">

                <!-- SVG Icon -->
                <div class="w-8 h-8 md:w-10 md:h-10 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full" viewBox="0 0 34 30" fill="none">
                        <path
                            d="M0 27.0588C3.52166 24.5098 6.11488 22.0588 7.77966 19.7059C9.44444 17.4183 10.2768 15.1961 10.2768 13.0392C10.2768 12.3856 10.0207 12.0588 9.50847 12.0588L7.39548 12.2549C5.41055 12.2549 3.80979 11.6993 2.59322 10.5882C1.37665 9.54248 0.768364 8.10457 0.768364 6.27451C0.768364 4.44444 1.40866 2.94118 2.68927 1.7647C3.90584 0.588234 5.44256 0 7.29943 0C9.73258 0 11.7175 0.882351 13.2542 2.64706C14.791 4.47712 15.5593 6.96078 15.5593 10.098C15.5593 13.7582 14.5028 17.1895 12.3898 20.3922C10.2128 23.6601 6.88324 26.8627 2.40113 30L0 27.0588ZM18.4407 27.0588C21.5141 25.098 24.0113 22.8105 25.9322 20.1961C27.8531 17.5817 28.8136 15.1961 28.8136 13.0392C28.8136 12.3856 28.5574 12.0588 28.0452 12.0588L26.0282 12.2549C23.9793 12.2549 22.3465 11.6993 21.1299 10.5882C19.9134 9.54248 19.3051 8.10457 19.3051 6.27451C19.3051 4.44444 19.9454 2.94118 21.226 1.7647C22.4426 0.588234 23.9793 0 25.8362 0C28.2693 0 30.2542 0.882351 31.791 2.64706C33.2637 4.47712 34 6.96078 34 10.098C34 13.7582 32.9435 17.1895 30.8305 20.3922C28.7175 23.6601 25.42 26.8627 20.9379 30L18.4407 27.0588Z"
                            fill="#181616" />
                    </svg>
                </div>

                <!-- Paragraph -->
                <p class="text-gray-700 text-base md:text-lg leading-relaxed max-w-4xl">
                    <?php echo esc_html(get_the_content()); ?>
                </p>

                <!-- Heading -->
                <h2 class="text-[#142137] text-xl md:text-2xl font-medium tracking-tight mt-4">
                    <?php echo esc_html(get_the_title()); ?>
                </h2>

            </div>
            <?php endif; ?>

            <?php if (get_post_format() == 'video'):
                                $content = apply_filters('the_content', get_the_content());

                                $video_found = false;
                                $video_url   = '';

                                //iframe detect
                                if (preg_match('/<iframe.*?src=["\'](.*?)["\'].*?<\/iframe>/', $content, $matches)) {
                                    $video_url   = $matches[1];
                                    $video_found = true;
                                }
                            ?>

            <div class='relative my-3 w-full h-auto flex-shrink-0 '>
                <div class="relative w-full h-auto aspect-[1160/570]">
                    <?php if ($video_found): ?>
                    <iframe class="w-full h-full aspect-video" src="<?php echo esc_url($video_url); ?>?autoplay=0"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                    <?php endif; ?>
                </div>

                <!-- Text Section -->
                <div class="pt-5 flex flex-col gap-[14px]">

                    <!--  Title -->
                    <div
                        class="text-[#142137] font-poppins text-[34px] font-semibold leading-[40px] tracking-[-0.68px]">
                        <h1>
                            <?php echo esc_html(the_title()); ?>
                        </h1>

                    </div>

                    <!-- Third Row - Description -->
                    <div
                        class="text-[rgba(20,33,55,0.70)] -mt-[8px] font-poppins text-[16px] font-normal leading-[26px]">
                        <?php
$content = get_the_content();

$content = preg_replace('/<img[^>]+\>|<iframe.*?<\/iframe>|<video.*?<\/video>/is', '', $content);

$content = preg_replace('/https?:\/\/(www\.)?(youtube\.com|youtu\.be|vimeo\.com)\/[^\s<]+/i', '', $content);

$content = wp_strip_all_tags($content);


echo esc_html( $content);
?>
                    </div>
                </div>
            </div>

            <?php endif; ?>

            <?php
                            $format = get_post_format();
                            if ($format === 'gallery'):

                                $content = apply_filters('the_content', get_the_content());

                                preg_match_all('/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/i', $content, $matches);

                                $images = $matches[1];
                            ?>



            <div class='relative w-full my-3 flex-shrink-0' ;>

                <!-- Next and preview Button -->
                <div class="absolute top-[25%] left-[5%] z-50 flex justify-between items-center w-[90%]">

                    <!-- Prev Button -->
                    <button id="blog-prev"
                        class="w-[44px] h-[44px] flex items-center justify-center rounded-full hover:bg-[#4375E7] transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                            <rect width="50" height="50" rx="25" fill="white" />
                            <path d="M32 25H18" stroke="#142137" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M25 18L18 25L25 32" stroke="#142137" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>

                    <!-- Next Button -->
                    <button id="blog-next"
                        class="w-[44px] h-[44px] flex items-center justify-center rounded-full hover:bg-[#4375E7] transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 54 54" fill="none">
                            <rect width="54" height="54" rx="27" transform="matrix(-1 0 0 1 54 0)" fill="#4375E7" />
                            <path d="M20 27.0007L34 27.0007" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M27 20.001L34 27.001L27 34.001" stroke="white" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>


                <!-- Image Section -->
                <?php if (!empty($images)): ?>
                <!-- Slick Slider -->
                <div class="blog-post-fade w-full h-auto">
                    <?php foreach ($images as $img_url): ?>
                    <div class="w-full flex justify-center">
                        <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"
                            class="w-full h-[350px] lg:h-[410px] 2xl:h-[550px] object-cover" />
                    </div>
                    <?php endforeach; ?>

                </div>
                <?php endif; ?>

                <!-- Text Section -->
                <div class="pt-6 flex flex-col gap-[14px]">


                    <!-- Second Row - Title -->
                    <h1 class="text-[#142137] font-poppins text-[34px] font-semibold leading-[40px] tracking-[-0.68px]">
                        <?php echo esc_html(the_title()); ?>

                    </h1>

                    <!-- Third Row -  Content -->
                    <div class="text-[rgba(20,33,55,0.70)] font-poppins text-[16px] font-normal leading-[26px]">
                        <div
                            class="text-[rgba(20,33,55,0.70)] -mt-[8px] font-poppins text-[16px] font-normal leading-[26px]">
                            <?php
$content = get_the_content();

$content = preg_replace('/<img[^>]+\>|<iframe.*?<\/iframe>|<video.*?<\/video>/is', '', $content);

$content = preg_replace('/https?:\/\/(www\.)?(youtube\.com|youtu\.be|vimeo\.com)\/[^\s<]+/i', '', $content);

$content = wp_strip_all_tags($content);


echo esc_html( $content);
?>
                        </div>

                    </div>

                </div>
            </div>



            <?php endif; ?>

            <?php
                            $format = get_post_format();
                            if (empty($format) || $format === 'standard'): ?>

            <!-- Third Card Post -->
            <div class="max-w-[1140px] mx-auto mt-20 flex flex-col gap-8 px-4 md:px-0">

                <!-- Image and Text -->
                <div class="flex flex-col lg:flex-row gap-4">
                    <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>"
                        alt="<?php echo esc_attr(get_the_title()); ?>"
                        class="w-full lg:w-1/2 h-64 lg:h-64 object-cover rounded-md shadow-md" />
                    <?php endif; ?>

                    <!-- Divider and Text -->
                    <div class="flex gap-6 lg:gap-8 w-full">
                        <!-- Divider -->
                        <div class="hidden lg:block">
                            <div class="w-[2px] h-full bg-blue-500"></div>
                        </div>

                        <!-- Text Content -->
                        <div class="flex flex-col gap-4 lg:pt-1">
                            <h1
                                class="text-[#142137] font-medium text-xl md:text-2xl lg:text-2xl leading-snug tracking-tight font-poppins">
                                <?php echo esc_html(get_the_title()); ?>
                            </h1>
                            <?php
                                                $content = get_the_content();
                                                $content = strip_tags($content);

                                                $words = explode(' ', $content);

                                                $first_part = implode(' ', array_slice($words, 0, 30));
                                                $second_part = implode(' ', array_slice($words, 30));
                                                ?>

                            <p class="text-slate-800/70 text-base md:text-base leading-relaxed font-poppins">
                                <?php echo esc_html($first_part); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Bottom Text -->
                <div>
                    <p class="text-slate-800/70 text-base md:text-base leading-relaxed font-poppins">
                        <?php echo esc_html($second_part); ?>
                    </p>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <?php endif; ?>

        <div>


            <!-- Four Card Author -->
            <div
                class="relative w-full mx-auto bg-[#EBEFF3] flex flex-col lg:flex-row gap-6 md:gap-9 lg:gap-12 p-2 md:p-4">

                <!-- Image Section -->
                <div class="w-full xl:w-[342px] h-72 md:w-[280px] md:h-[290px] flex-shrink-0 mx-auto md:mx-0">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blogdetail3.png" alt="images"
                        class="h-full w-full object-cover rounded-lg" />
                </div>

                <!-- Text Section -->
                <div class="w-full flex flex-col gap-4 md:gap-6">

                    <div class="h-7 w-44 bg-[#4375E7] pl-3 flex items-center">
                        <h2 class="text-white font-medium text-sm uppercase tracking-wide font-poppins">
                            ceo & co-founder
                        </h2>
                    </div>

                    <h3 class="text-[#142137] font-semibold text-lg md:text-2xl leading-snug font-poppins">
                        Lurch Schpellchek
                    </h3>

                    <p
                        class="text-[rgba(20,33,55,0.7)] w-full text-base lg:text-lg leading-relaxed font-medium font-poppins -mt-2">
                        We believe that fresh clean clothes bring confidence and comfort. With a passion for quality
                        and convenience, we provide top-notch laundry & dry cleaning services tailored to meet your
                        needs.
                    </p>

                    <!-- Button and Social Icons -->
                    <div class="flex flex-col sm:flex-row justify-between pt-2 gap-4 sm:gap-0">

                        <div class="flex items-center gap-2 text-[#142137] text-base font-medium font-poppins">
                            See All Post
                            <svg class="w-3 h-3 shrink-0" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                viewBox="0 0 14 14" fill="none">
                                <path d="M1 7.00024L13 7.00024" stroke="#142137" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7 1L13 7L7 13" stroke="#142137" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>

                        <!-- socila media icon -->
                        <div class="social-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="178" height="40" viewBox="0 0 178 40"
                                fill="none">
                                <circle cx="158" cy="20" r="20" fill="#CB2027" />
                                <path
                                    d="M158.008 11C153.033 11 149 15.0261 149 19.9926C149 23.8043 151.372 27.0608 154.723 28.3707C154.641 27.6605 154.575 26.5647 154.752 25.7878C154.915 25.0843 155.805 21.317 155.805 21.317C155.805 21.317 155.538 20.777 155.538 19.9849C155.538 18.734 156.265 17.8017 157.169 17.8017C157.94 17.8017 158.311 18.3793 158.311 19.0677C158.311 19.8372 157.822 20.9921 157.562 22.0654C157.347 22.9609 158.014 23.6935 158.896 23.6935C160.498 23.6935 161.729 22.006 161.729 19.5781C161.729 17.4241 160.18 15.9219 157.963 15.9219C155.398 15.9219 153.893 17.8389 153.893 19.8225C153.893 20.592 154.19 21.4214 154.56 21.8731C154.635 21.961 154.642 22.0426 154.62 22.1312C154.553 22.4124 154.398 23.0266 154.367 23.1528C154.33 23.3156 154.234 23.3521 154.063 23.2713C152.936 22.7457 152.232 21.1099 152.232 19.7852C152.232 16.9502 154.292 14.3455 158.185 14.3455C161.306 14.3455 163.737 16.5663 163.737 19.5416C163.737 22.5168 161.78 25.1374 159.066 25.1374C158.154 25.1374 157.294 24.6635 157.006 24.101C157.006 24.101 156.554 25.8177 156.442 26.2399C156.243 27.0242 155.693 28.0016 155.323 28.601C156.169 28.859 157.059 29 157.993 29C162.968 29 167 24.9739 167 20.0074C167.015 15.0261 162.982 11 158.008 11Z"
                                    fill="white" />
                                <circle cx="112" cy="20" r="20" fill="#0A66C2" />
                                <path
                                    d="M115.049 16.7368C116.306 16.7368 117.51 17.2359 118.399 18.1242C119.287 19.0125 119.786 20.2173 119.786 21.4736V26.9999H116.628V21.4736C116.628 21.0549 116.462 20.6533 116.166 20.3572C115.87 20.061 115.468 19.8947 115.049 19.8947C114.631 19.8947 114.229 20.061 113.933 20.3572C113.637 20.6533 113.47 21.0549 113.47 21.4736V26.9999H110.312V21.4736C110.312 20.2173 110.812 19.0125 111.7 18.1242C112.588 17.2359 113.793 16.7368 115.049 16.7368Z"
                                    fill="white" />
                                <path d="M107.158 17.5261H104V26.9997H107.158V17.5261Z" fill="white" />
                                <path
                                    d="M105.579 15.1579C106.451 15.1579 107.158 14.451 107.158 13.5789C107.158 12.7069 106.451 12 105.579 12C104.707 12 104 12.7069 104 13.5789C104 14.451 104.707 15.1579 105.579 15.1579Z"
                                    fill="white" />
                                <circle cx="66" cy="20" r="20" fill="#040618" />
                                <path
                                    d="M65.5022 21.9509C65.1592 22.3455 64.824 22.7313 64.4887 23.1173C63.3887 24.3834 62.2882 25.6491 61.1901 26.9167C61.1368 26.9783 61.0821 27.0008 61.0023 26.9998C60.7098 26.9956 60.4174 26.9983 60.1249 26.9979C60.0911 26.9979 60.0574 26.9948 60 26.9919C60.1143 26.8596 60.2152 26.7424 60.3165 26.6259C61.7543 24.971 63.1921 23.316 64.6299 21.6611C64.7373 21.5377 64.8419 21.4119 64.953 21.292C64.9982 21.2436 64.9955 21.2105 64.9591 21.1585C64.3786 20.3248 63.8002 19.4897 63.2209 18.655C62.5485 17.6859 61.8754 16.7171 61.2028 15.7482C60.8161 15.1907 60.4295 14.6332 60.0426 14.0756C60.0311 14.0589 60.0209 14.0412 60.0004 14.0084C60.0487 14.0059 60.0848 14.0023 60.1207 14.0023C61.3148 14.0019 62.509 14.0027 63.703 14C63.7835 13.9998 63.8286 14.0286 63.8722 14.0919C64.718 15.3133 65.5659 16.5334 66.413 17.754C66.6234 18.0569 66.8329 18.3604 67.043 18.6635C67.0685 18.7005 67.095 18.7366 67.1287 18.7841C67.2392 18.6581 67.3442 18.5394 67.4483 18.4197C68.7035 16.975 69.9587 15.5303 71.2125 14.0844C71.262 14.0272 71.3115 13.999 71.3899 14.0002C71.6856 14.0046 71.9816 14.0019 72.2776 14.0021C72.3113 14.0021 72.3449 14.0054 72.4017 14.0086C72.2685 14.1631 72.15 14.3019 72.0303 14.4395C70.5877 16.0994 69.1455 17.7596 67.7006 19.4174C67.6402 19.4866 67.6427 19.5321 67.6923 19.6031C68.9061 21.3486 70.1177 23.0954 71.3301 24.8419C71.8024 25.5223 72.2754 26.202 72.7477 26.8824C72.7692 26.9135 72.7892 26.9457 72.8199 26.9927C72.7702 26.995 72.7339 26.9979 72.6977 26.9979C71.507 26.9981 70.3166 26.9973 69.1259 27C69.0388 27.0002 68.9897 26.9708 68.9406 26.8997C68.0695 25.6407 67.1953 24.3838 66.3221 23.1263C66.0641 22.7549 65.8072 22.3826 65.5494 22.0108C65.5375 21.9941 65.5239 21.9786 65.5022 21.9509ZM71.2783 26.193C71.2526 26.1519 71.2363 26.1224 71.2171 26.0951C71.0245 25.8221 70.8313 25.5497 70.6387 25.2768C69.204 23.2445 67.7693 21.2122 66.3347 19.1801C65.3353 17.7647 64.3354 16.3498 63.3375 14.9331C63.293 14.8698 63.2483 14.8414 63.1681 14.8418C62.6563 14.8456 62.1447 14.8435 61.6329 14.8437C61.603 14.8437 61.5734 14.8471 61.5293 14.8498C61.5594 14.8949 61.5813 14.9292 61.6047 14.9624C62.8374 16.7072 64.0703 18.4517 65.3027 20.1966C66.6977 22.1717 68.0925 24.1469 69.4852 26.1239C69.5278 26.1843 69.5729 26.1999 69.6406 26.1995C70.1488 26.1974 70.6571 26.1985 71.1655 26.1981C71.1981 26.1985 71.2313 26.1953 71.2783 26.193Z"
                                    fill="white" />
                                <circle cx="20" cy="20" r="20" fill="#1877F2" />
                                <path
                                    d="M24.35 12H21.8C20.6728 12 19.5918 12.4478 18.7948 13.2448C17.9978 14.0418 17.55 15.1228 17.55 16.25V18.8H15V22.2H17.55V29H20.95V22.2H23.5L24.35 18.8H20.95V16.25C20.95 16.0246 21.0396 15.8084 21.199 15.649C21.3584 15.4896 21.5746 15.4 21.8 15.4H24.35V12Z"
                                    fill="white" />
                            </svg>
                        </div>
                    </div>

                </div>
            </div>



            <!-- Related tags and share -->
            <div class="flex flex-col lg:flex-row justify-between gap-3 pt-8 pb-5">
                <div class="flex items-center gap-2">
                    <h2
                        class="text-[#142137] text-base md:text-[20px] leading-relaxed md:leading-[34px] font-medium md:font-[500] tracking-tight md:tracking-[-0.48px] font-poppins">
                        <?php echo __('Related Tags:', 'laundryclean'); ?>
                    </h2>

                    <!-- Tag List -->
                    <div class="flex flex-wrap gap-2 md:gap-[9px]">
                        <?php
                                $tags = get_the_tags();
                                if (!empty($tags)):
                                    foreach ($tags as $tag):

                                ?>
                        <?php
                                        $tag_id = get_queried_object_id();
                                        $tag_link = get_tag_link($tag_id);
                                        ?>
                        <a href="<?php echo esc_url($tag_link); ?>">

                            <span
                                class="h-[28px] px-2 text-sm md:text-[15px] font-medium leading-relaxed md:leading-[26px] tracking-tight md:tracking-[-0.3px] text-[#142137B3] border border-[#14213723] flex items-center justify-center hover:bg-[#4375E7] hover:text-white transform transition ease-out">
                                <?php echo esc_html($tag->name); ?>
                            </span>
                        </a>
                        <?php
                                    endforeach;
                                    wp_reset_postdata();
                                endif;
                                ?>

                    </div>
                </div>

                <!-- social icon -->
                <div class="social-icon flex flex-col md:flex-row gap-2 items-center">
                    <h2
                        class="text-[#142137] text-base md:text-[20px] leading-relaxed md:leading-[34px] font-medium md:font-[500] tracking-tight md:tracking-[-0.48px] font-poppins">
                        <?php echo __('Social Share:', 'laundryclean'); ?>
                    </h2>

                    <i class="fa-brands fa-square-twitter"></i>
                    </a>

                    <i class="fa-brands fa-facebook"></i>
                    </a>

                    <i class="fa-brands fa-linkedin"></i>
                    </a>
                    <a href="https://api.whatsapp.com/send?text=<?php the_permalink(); ?>" target="_blank">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                    <!-- icon list -->
                    <div class="flex gap-2 md:gap-[5px]">
                        <!-- facebook -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"
                            target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"
                                fill="none">
                                <circle cx="20" cy="20" r="20" fill="#1877F2" />
                                <path
                                    d="M24.35 12H21.8C20.6728 12 19.5918 12.4478 18.7948 13.2448C17.9978 14.0418 17.55 15.1228 17.55 16.25V18.8H15V22.2H17.55V29H20.95V22.2H23.5L24.35 18.8H20.95V16.25C20.95 16.0246 21.0396 15.8084 21.199 15.649C21.3584 15.4896 21.5746 15.4 21.8 15.4H24.35V12Z"
                                    fill="white" />
                            </svg>
                        </a>
                        <!-- twitter -->
                        <a href="https://twitter.com/intent/tweet?url=&text=<?php the_permalink(); ?>" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"
                                fill="none">
                                <circle cx="20" cy="20" r="20" fill="#040618" />
                                <path
                                    d="M19.5022 21.9509C19.1592 22.3455 18.824 22.7313 18.4887 23.1173C17.3887 24.3834 16.2882 25.6491 15.1901 26.9167C15.1368 26.9783 15.0821 27.0008 15.0023 26.9998C14.7098 26.9956 14.4174 26.9983 14.1249 26.9979C14.0911 26.9979 14.0574 26.9948 14 26.9919C14.1143 26.8596 14.2152 26.7424 14.3165 26.6259C15.7543 24.971 17.1921 23.316 18.6299 21.6611C18.7373 21.5377 18.8419 21.4119 18.953 21.292C18.9982 21.2436 18.9955 21.2105 18.9591 21.1585C18.3786 20.3248 17.8002 19.4897 17.2209 18.655C16.5485 17.6859 15.8754 16.7171 15.2028 15.7482C14.8161 15.1907 14.4295 14.6332 14.0426 14.0756C14.0311 14.0589 14.0209 14.0412 14.0004 14.0084C14.0487 14.0059 14.0848 14.0023 14.1207 14.0023C15.3148 14.0019 16.509 14.0027 17.703 14C17.7835 13.9998 17.8286 14.0286 17.8722 14.0919C18.718 15.3133 19.5659 16.5334 20.413 17.754C20.6234 18.0569 20.8329 18.3604 21.043 18.6635C21.0685 18.7005 21.095 18.7366 21.1287 18.7841C21.2392 18.6581 21.3442 18.5394 21.4483 18.4197C22.7035 16.975 23.9587 15.5303 25.2125 14.0844C25.262 14.0272 25.3115 13.999 25.3899 14.0002C25.6856 14.0046 25.9816 14.0019 26.2776 14.0021C26.3113 14.0021 26.3449 14.0054 26.4017 14.0086C26.2685 14.1631 26.15 14.3019 26.0303 14.4395C24.5877 16.0994 23.1455 17.7596 21.7006 19.4174C21.6402 19.4866 21.6427 19.5321 21.6923 19.6031C22.9061 21.3486 24.1177 23.0954 25.3301 24.8419C25.8024 25.5223 26.2754 26.202 26.7477 26.8824C26.7692 26.9135 26.7892 26.9457 26.8199 26.9927C26.7702 26.995 26.7339 26.9979 26.6977 26.9979C25.507 26.9981 24.3166 26.9973 23.1259 27C23.0388 27.0002 22.9897 26.9708 22.9406 26.8997C22.0695 25.6407 21.1953 24.3838 20.3221 23.1263C20.0641 22.7549 19.8072 22.3826 19.5494 22.0108C19.5375 21.9941 19.5239 21.9786 19.5022 21.9509ZM25.2783 26.193C25.2526 26.1519 25.2363 26.1224 25.2171 26.0951C25.0245 25.8221 24.8313 25.5497 24.6387 25.2768C23.204 23.2445 21.7693 21.2122 20.3347 19.1801C19.3353 17.7647 18.3354 16.3498 17.3375 14.9331C17.293 14.8698 17.2483 14.8414 17.1681 14.8418C16.6563 14.8456 16.1447 14.8435 15.6329 14.8437C15.603 14.8437 15.5734 14.8471 15.5293 14.8498C15.5594 14.8949 15.5813 14.9292 15.6047 14.9624C16.8374 16.7072 18.0703 18.4517 19.3027 20.1966C20.6977 22.1717 22.0925 24.1469 23.4852 26.1239C23.5278 26.1843 23.5729 26.1999 23.6406 26.1995C24.1488 26.1974 24.6571 26.1985 25.1655 26.1981C25.1981 26.1985 25.2313 26.1953 25.2783 26.193Z"
                                    fill="white" />
                            </svg>
                        </a>
                        <!-- linkedin -->
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>"
                            target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"
                                fill="none">
                                <circle cx="20" cy="20" r="20" fill="#0A66C2" />
                                <path
                                    d="M23.0493 16.7368C24.3056 16.7368 25.5104 17.2359 26.3987 18.1242C27.2871 19.0125 27.7861 20.2173 27.7861 21.4736V26.9999H24.6282V21.4736C24.6282 21.0549 24.4619 20.6533 24.1658 20.3572C23.8697 20.061 23.4681 19.8947 23.0493 19.8947C22.6306 19.8947 22.2289 20.061 21.9328 20.3572C21.6367 20.6533 21.4704 21.0549 21.4704 21.4736V26.9999H18.3125V21.4736C18.3125 20.2173 18.8116 19.0125 19.6999 18.1242C20.5882 17.2359 21.793 16.7368 23.0493 16.7368Z"
                                    fill="white" />
                                <path d="M15.1579 17.5261H12V26.9997H15.1579V17.5261Z" fill="white" />
                                <path
                                    d="M13.5789 15.1579C14.451 15.1579 15.1579 14.451 15.1579 13.5789C15.1579 12.7069 14.451 12 13.5789 12C12.7069 12 12 12.7069 12 13.5789C12 14.451 12.7069 15.1579 13.5789 15.1579Z"
                                    fill="white" />
                            </svg>
                        </a>

                        <a href="https://www.pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>"
                            target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"
                                fill="none">
                                <circle cx="20" cy="20" r="20" fill="#CB2027" />
                                <path
                                    d="M20.0076 11C15.0328 11 11 15.0261 11 19.9926C11 23.8043 13.3724 27.0608 16.7231 28.3707C16.641 27.6605 16.5752 26.5647 16.7523 25.7878C16.9154 25.0843 17.8049 21.317 17.8049 21.317C17.8049 21.317 17.5383 20.777 17.5383 19.9849C17.5383 18.734 18.2648 17.8017 19.1691 17.8017C19.94 17.8017 20.3111 18.3793 20.3111 19.0677C20.3111 19.8372 19.822 20.9921 19.5621 22.0654C19.3473 22.9609 20.0143 23.6935 20.8964 23.6935C22.498 23.6935 23.7287 22.006 23.7287 19.5781C23.7287 17.4241 22.1796 15.9219 19.9628 15.9219C17.3982 15.9219 15.8927 17.8389 15.8927 19.8225C15.8927 20.592 16.1896 21.4214 16.5597 21.8731C16.6347 21.961 16.6425 22.0426 16.6199 22.1312C16.553 22.4124 16.3977 23.0266 16.3674 23.1528C16.3305 23.3156 16.2336 23.3521 16.0632 23.2713C14.9363 22.7457 14.2317 21.1099 14.2317 19.7852C14.2317 16.9502 16.2924 14.3455 20.1847 14.3455C23.3061 14.3455 25.737 16.5663 25.737 19.5416C25.737 22.5168 23.7801 25.1374 21.0665 25.1374C20.1544 25.1374 19.2941 24.6635 19.0057 24.101C19.0057 24.101 18.5536 25.8177 18.4423 26.2399C18.2426 27.0242 17.6933 28.0016 17.3228 28.601C18.1687 28.859 19.0589 29 19.9928 29C24.9676 29 29.0004 24.9739 29.0004 20.0074C29.0148 15.0261 24.9824 11 20.0076 11Z"
                                    fill="white" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Next and Previous Post -->
            <div class="flex flex-col lg:flex-row justify-between gap-4 py-6">
                <?php
                        $get_prev = get_previous_post();
                        if (!empty($get_prev)):
                            $get_prev_thumbnail = get_the_post_thumbnail($get_prev->ID, 'thumbnail', ['class' => 'h-full w-full object-cover rounded-md']);
                        ?>

                <!-- Previous Post Card -->

                <div
                    class="flex w-full h-auto items-center border border-[rgba(20,33,55,0.14)] bg-transparent p-3 gap-4">
                    <!-- Image -->
                    <div class="w-24 h-28">
                        <a href="<?php echo get_permalink($get_prev->ID) ?>">
                            <?php echo $get_prev_thumbnail ?>
                        </a>
                    </div>
                    <!-- Text Section -->
                    <a href="<?php echo get_permalink($get_prev->ID) ?>">
                        <div class="flex flex-col justify-center gap-2">
                            <div
                                class="flex items-center gap-2 text-sm font-medium uppercase text-[rgba(20,33,55,0.70)] font-poppins">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none"
                                    viewBox="0 0 14 14">
                                    <path d="M13 7H1" stroke="#5B6473" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M7 13L1 7L7 1" stroke="#5B6473" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <?php echo esc_html('Previous Post', 'laundryclean'); ?>
                            </div>
                            <h4 class="text-[#142137] text-lg md:text-xl font-semibold leading-snug font-poppins">
                                <?php echo esc_html(wp_trim_words(get_the_title($get_prev->ID), 9)); ?>
                            </h4>
                        </div>
                    </a>
                </div>
                <?php endif; ?>

                <!-- Next Post Card -->

                <?php
                        $get_next = get_next_post();
                        if (!empty($get_next)):
                            $get_next_thumbnail = get_the_post_thumbnail($get_next->ID, 'thumbnail', ['class' => 'h-full w-full object-cover rounded-md']);
                        ?>
                <div
                    class="flex w-full  h-auto items-center justify-end border border-[rgba(20,33,55,0.14)] bg-transparent p-3 gap-4">
                    <!-- Text Section -->
                    <a href="<?php echo get_permalink($get_prev->ID) ?>">
                        <div class="flex flex-col justify-center items-end gap-2">
                            <div
                                class="flex items-center gap-2 text-sm font-medium uppercase text-[rgba(20,33,55,0.70)] font-poppins">
                                <?php echo __('Next Post', 'laundryclean') ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none"
                                    viewBox="0 0 14 14">
                                    <path d="M1 7H13" stroke="#5B6473" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M7 13L13 7L7 1" stroke="#5B6473" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                            <h4
                                class="text-[#142137] text-right text-lg md:text-xl font-semibold leading-snug font-poppins">
                                <?php echo esc_html(wp_trim_words(get_the_title($get_next->ID), 9)); ?>
                            </h4>
                        </div>
                    </a>
                    <!-- Image -->
                    <div class="w-24 h-28 flex-shrink-0">
                        <a href="<?php echo get_permalink($get_prev->ID) ?>">
                            <?php echo $get_next_thumbnail ?>
                        </a>
                    </div>
                </div>
                <?php endif; ?>

            </div>


            <!-- Comments Section-->
            <?php if (comments_open()): ?>
            <div class="comment-area w-full flex flex-col gap-6 md:gap-4 py-4">
                <?php
                            $comments_count = get_comments_number();
                            if (comments_open()) :
                                if ($comments_count == 0) {
                                    $comment_text = __('No Comments', 'laundryclean');
                                } elseif ($comments_count == 1) {
                                    $comment_text = __('1 Comment', 'laundryclean');
                                } else {
                                    $comment_text = $comments_count . ' ' . __('Comments', 'laundryclean');
                                }
                            ?>
                <!-- heading -->
                <div class="comment-heading">
                    <h1
                        class="text-[#142137] font-poppins text-[25px] md:text-[32px] font-semibold leading-relaxed md:leading-[40px] tracking-tight md:tracking-[-0.88px]">
                        <?php echo esc_html($comment_text); ?></h1>
                </div>
                <?php endif; ?>

                <!-- Comment Wrapper -->
                <?php
                                $parent_comments = get_comments([
                                    'post_id' => get_the_ID(),
                                    'status' => 'approve',
                                    'orderby' => 'comment_date',
                                    'order' => 'ASC',
                                    'parent' => 0,
                                ]);
                                ?>
                <?php if ($parent_comments): ?>

                <div class="w-full">
                    <!-- comment start -->
                    <?php foreach ($parent_comments as $comment): ?>
                    <div class="w-full pt-2 border-b border-b-[rgba(28,28,28,0.14)] pb-1">
                        <!-- Top Row: Image + Info | Reply Button -->
                        <div class="flex flex-col sm:flex-row justify-between items-start md:items-center mb-1 gap-2"
                            id="comment-<?php echo $comment->comment_ID; ?>">

                            <!-- Left: Image, Name, Date -->
                            <div
                                class="flex flex-col xs:flex-row items-start xs:items-center gap-3 sm:gap-5 w-full sm:w-auto">

                                <?php 
echo get_avatar(
    $comment, 
    90, 
    'https://i.pravatar.cc/150?img=3',
    $comment->comment_author, 
    [
        'class' => 'w-[50px] h-[50px] sm:w-[60px] sm:h-[60px] rounded-[6px] object-cover'
    ]
); 
?>

                                <div class="flex flex-col gap-1 sm:gap-[13px]">
                                    <h4
                                        class="text-[#142137] font-poppins text-[16px] sm:text-[18px] font-semibold not-italic leading-none">
                                        <?php echo esc_html($comment->comment_author); ?>
                                    </h4>
                                    <p
                                        class="text-[#616161] font-inter text-[14px] sm:text-[16px] font-medium not-italic leading-[26px]">
                                        <?php echo get_comment_date('F j, Y \a\t g:i a', $comment); ?></p>
                                </div>
                            </div>

                            <!-- Right: Reply Button -->
                            <div class="reply-btn self-end md:self-auto ml-auto md:ml-0">
                                <button
                                    class="flex items-center gap-1 px-3 py-1.5 w-[91px] h-[30px] flex-shrink-0 border border-[rgba(28,28,28,0.1)] bg-transparent text-[14px] text-[#142137] hover:bg-gray-100 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="10" viewBox="0 0 13 10"
                                        fill="none">
                                        <path
                                            d="M12.1615 10C11.953 10 11.7721 9.92334 11.6187 9.77002C11.4654 9.61669 11.3888 9.43578 11.3888 9.22726V7.11141C11.3888 6.51039 11.1772 5.9983 10.754 5.57513C10.3308 5.15196 9.81874 4.94038 9.21772 4.94038H2.63101L4.71005 7.01942C4.85724 7.16661 4.93083 7.3414 4.93083 7.54378C4.93083 7.74617 4.85111 7.92709 4.69165 8.08654C4.54446 8.23373 4.36354 8.30733 4.14889 8.30733C3.93424 8.30733 3.75332 8.23373 3.60613 8.08654L0.239182 4.71959C0.153322 4.63373 0.0919932 4.5448 0.0551959 4.45281C0.0183986 4.36082 0 4.26576 0 4.16763C0 4.06951 0.0183986 3.97445 0.0551959 3.88245C0.0919932 3.79046 0.153322 3.70153 0.239182 3.61567L3.62453 0.230324C3.77172 0.0831346 3.94957 0.0064736 4.15809 0.000340716C4.36661 -0.00579216 4.5506 0.0708688 4.71005 0.230324C4.85724 0.377513 4.93083 0.558433 4.93083 0.773084C4.93083 0.987734 4.85724 1.16865 4.71005 1.31584L2.63101 3.39489H9.21772C10.248 3.39489 11.125 3.75673 11.8487 4.48041C12.5724 5.20409 12.9342 6.08109 12.9342 7.11141V9.22726C12.9342 9.43578 12.8576 9.61669 12.7043 9.77002C12.5509 9.92334 12.37 10 12.1615 10Z"
                                            fill="#616161" />
                                    </svg>
                                    <span
                                        class="text-[rgba(20,33,55,0.7)] font-poppins text-[14px] sm:text-[16px] font-normal not-italic leading-[26px]">
                                        <?php echo __('reply', 'laundryclean');?>
                                    </span>
                                </button>
                            </div>
                        </div>

                        <!-- Bottom: Message -->
                        <p
                            class="text-[rgba(20,33,55,0.7)] pl-[65px] sm:pl-[80px] mt-3 sm:mt-[20px] font-poppins text-[14px] sm:text-[16px] font-normal not-italic leading-[22px] sm:leading-[26px]">
                            <?php echo esc_html($comment->comment_content); ?>
                        </p>
                    </div>
                    <?php endforeach;
                                    endif; ?>

                    <?php 
                                    $replies = get_comments([
                                        'post_id' => get_the_ID(),
              'status' => 'approve',
              'orderby' => 'comment_date',
              'order' => 'ASC',
              'parent' => $comment->comment_ID
                                    ]);
                                    ?>

                    <!-- Comment Reply -->
                    <?php if($replies):
                                    foreach($replies as $reply):
                                    ?>
                    <div class="w-full sm:ml-[10px] pt-4 border-b border-b-[rgba(28,28,28,0.14)] pb-1.5"
                        id=comment-<?php echo $reply->comment_ID; ?>>
                        <!-- Top Row: Image + Info | Reply Button -->
                        <div class="flex pl-12 flex-col sm:flex-row gap-[50%] items-start sm:items-center mb-3">
                            <!-- Left: Image, Name, Date -->
                            <div
                                class="flex flex-col xs:flex-row items-start xs:items-center gap-3 sm:gap-5 w-full sm:w-auto">

                                <?php echo get_avatar($reply, 50,'','',['class'=>'w-[50px] h-[50px] sm:w-[60px] sm:h-[60px] rounded-[6px] object-cover']); ?>

                                <div class="flex flex-col gap-1 sm:gap-[10px] pt-0 sm:pt-[5px]">
                                    <h4
                                        class="text-[#142137] font-poppins text-[16px] sm:text-[18px] font-semibold not-italic leading-none">
                                        <?php echo esc_html($reply->comment_author); ?></h4>
                                    <p
                                        class="text-[#616161] font-inter text-[14px] sm:text-[16px] font-medium not-italic leading-[26px]">
                                        <?php echo get_comment_date('F j, Y \a\t g:i a', $reply); ?></p>
                                </div>
                            </div>

                            <!-- Right: Reply Button -->
                            <div class="reply-btn">
                                <button
                                    class="flex items-center gap-1 px-3 py-1.5 w-[91px] h-[30px] flex-shrink-0 border border-[rgba(28,28,28,0.1)] bg-transparent text-[14px] text-[#142137] hover:bg-gray-100 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="10" viewBox="0 0 13 10"
                                        fill="none">
                                        <path
                                            d="M12.1615 10C11.953 10 11.7721 9.92334 11.6187 9.77002C11.4654 9.61669 11.3888 9.43578 11.3888 9.22726V7.11141C11.3888 6.51039 11.1772 5.9983 10.754 5.57513C10.3308 5.15196 9.81874 4.94038 9.21772 4.94038H2.63101L4.71005 7.01942C4.85724 7.16661 4.93083 7.3414 4.93083 7.54378C4.93083 7.74617 4.85111 7.92709 4.69165 8.08654C4.54446 8.23373 4.36354 8.30733 4.14889 8.30733C3.93424 8.30733 3.75332 8.23373 3.60613 8.08654L0.239182 4.71959C0.153322 4.63373 0.0919932 4.5448 0.0551959 4.45281C0.0183986 4.36082 0 4.26576 0 4.16763C0 4.06951 0.0183986 3.97445 0.0551959 3.88245C0.0919932 3.79046 0.153322 3.70153 0.239182 3.61567L3.62453 0.230324C3.77172 0.0831346 3.94957 0.0064736 4.15809 0.000340716C4.36661 -0.00579216 4.5506 0.0708688 4.71005 0.230324C4.85724 0.377513 4.93083 0.558433 4.93083 0.773084C4.93083 0.987734 4.85724 1.16865 4.71005 1.31584L2.63101 3.39489H9.21772C10.248 3.39489 11.125 3.75673 11.8487 4.48041C12.5724 5.20409 12.9342 6.08109 12.9342 7.11141V9.22726C12.9342 9.43578 12.8576 9.61669 12.7043 9.77002C12.5509 9.92334 12.37 10 12.1615 10Z"
                                            fill="#616161" />
                                    </svg>
                                    <span
                                        class="text-[rgba(20,33,55,0.7)] font-poppins text-[14px] sm:text-[16px] font-normal not-italic leading-[26px]">
                                        <?php
                                                        echo __('Reply', 'laundryclean');
                                                        ?>
                                    </span>
                                </button>
                            </div>
                        </div>

                        <!-- Bottom: Message -->
                        <p
                            class="text-[rgba(20,33,55,0.7)] pl-[65px] sm:pl-[80px] mt-3 sm:mt-[20px] font-poppins text-[14px] sm:text-[16px] font-normal not-italic leading-[22px] sm:leading-[26px]">
                            <?php echo esc_html($reply->comment_content);?>
                        </p>
                    </div>
                    <?php endforeach; endif;?>

                </div>

                <!-- Write Comment -->
                <div class="write-comment-area mb-2 md:mb-[8px]">
                    <!-- heading -->
                    <div class="heading mb-3 md:mb-3">
                        <h2
                            class="text-[#142137] font-poppins text-[25px] md:text-[32px] font-semibold leading-relaxed md:leading-[40px] tracking-tight md:tracking-[-0.88px]">
                            <?php echo esc_html_e('Leave a Comment', 'laundryclean'); ?>
                        </h2>
                    </div>

                    <?php
                                comment_form([
                                    // Input fields
                                    'fields' => [
                                        'author' =>
                                        '<div class="flex flex-col sm:flex-row gap-4 sm:gap-[30px]">' .
                                            '<div class="w-full sm:w-1/2 my-4">
                    <label for="author" class="block mb-1 sm:mb-2 cursor-text">Your Name *</label>
                    <input id="author" name="author" type="text" placeholder="Your Name"
                        class="w-full h-10 sm:h-[50px] border border-[rgba(20,33,55,0.1)] bg-transparent px-3 sm:px-4 text-[rgba(20,33,55,0.7)] placeholder:text-[rgba(20,33,55,0.7)] focus:outline-none rounded"
                        required />
                </div>',

                                        'email' =>
                                        '<div class="w-full sm:w-1/2 my-4">
                    <label for="email" class="block mb-1 sm:mb-2 cursor-text">Your Email *</label>
                    <input id="email" name="email" type="email" placeholder="Your Email"
                        class="w-full h-10 sm:h-[50px] border border-[rgba(20,33,55,0.1)] bg-transparent px-3 sm:px-4 text-[rgba(20,33,55,0.7)] placeholder:text-[rgba(20,33,55,0.7)] focus:outline-none rounded"
                        required />
                </div>
                </div>',
                                    ],

                                    'comment_field' => '
<div>
    <textarea id="comment" name="comment" placeholder="Your Comment"
        class="w-full h-32 sm:h-[210px] border border-[rgba(20,33,55,0.1)] bg-transparent px-3 sm:px-4 py-2 sm:py-3 resize-none text-[rgba(20,33,55,0.7)] placeholder:text-[rgba(20,33,55,0.7)] focus:outline-none rounded"
        required></textarea>
</div>',


                                   'submit_button' => '
<button
   class="relative flex items-center gap-3 py-3 px-4 rounded-full border border-[rgba(20,33,55,0.20)] bg-[#142137] text-white font-poppins text-[16px] font-medium
          overflow-hidden group">

    <!-- Background Animation -->
    <span class="absolute inset-0 bg-white group-hover:translate-x-0 -translate-x-full transition-transform duration-500 ease-in-out"></span>

    <!-- Text + Icon -->
    <span class="relative z-10 flex items-center gap-3 group-hover:text-black">
        '.esc_html__('Post Comment', 'laundryclean').'
        <div class="w-[34px] h-[34px] flex items-center justify-center rounded-full bg-white text-black group-hover:text-white group-hover:bg-[#142137] transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 15 14" fill="none"
                 class="transition-colors duration-300 group-hover:stroke-white">
                <path d="M0.853516 7.1615L12.8535 7.1615" stroke="currentColor" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" />
                <path d="M7.85352 13.1611L13.8535 7.16113L7.85352 1.16113" stroke="currentColor"
                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </div>
    </span>
</button>',


                                    'label_submit' => 'Post Comment',
                                ]);
                                ?>
                </div>


            </div>
        </div>

        <?php endif; ?>

        </div>

    </main>
    <?php
        endwhile;
        wp_reset_postdata();
    endif;

    ?>
    <!-- Right Sidebar from sidebar.php -->
    <?php get_sidebar(); ?>

</section>

<div class="mt-4">
    <?php get_footer(); ?>
</div>