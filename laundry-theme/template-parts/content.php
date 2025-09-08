<?php
/**
 * Template Part for Post Content
 *
 * @package LaundryTheme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('w-full my-3 flex-shrink-0 bg-[#EBEFF3] mt-6'); ?>>

    <!-- Image Section -->
    <div class="w-full h-auto aspect-[1160/570]">
        <a href="<?php esc_html(the_permalink()); ?>">
        <?php if (has_post_thumbnail()) : ?>
            <img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>"
                alt="<?php echo esc_attr(get_the_title()); ?>" class="w-full h-full object-cover" />
        <?php endif; ?>
        </a>
    </div>

    <!-- Text Section -->
    <div class="px-4 py-3 lg:px-8 lg:py-6 flex flex-col gap-[14px]">

        <!-- First Row -->
        <div class="flex flex-col sm:flex-row items-center gap-4 md:gap-6 lg:gap-3">

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
                <div class="flex items-center gap-1 text-[rgba(20,33,55,0.60)] font-poppins text-base font-medium">
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
            <h2 class=" text-[#142137] font-poppins text-[18px] font-semibold leading-none">
                <?php echo get_the_author(); ?>
            </h2>
            </div>

            <!-- Desktop Category -->
            <div class="hidden sm:flex items-center gap-1 text-[rgba(20,33,55,0.60)] font-poppins text-base font-medium">
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
                                    if (!empty($categories)) {
                                        echo esc_html($categories[0]->name);
                                    }
                                    ?>
                                </a>
            </div>

            <!-- Date and Comment Count -->
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-1 text-[rgba(20,33,55,0.60)] font-poppins text-base font-medium">
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
                    <div class="flex items-center gap-1 text-[rgba(20,33,55,0.60)] font-poppins text-base font-medium">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none">
            <path d="M14.1752 12.8638L14.4872 15.3918C14.5672 16.0558 13.8552 16.5197 13.2872 16.1757L9.93546 14.1838C9.56749 14.1838 9.20752 14.1598 8.85554 14.1118C9.4475 13.4158 9.79947 12.5358 9.79947 11.5838C9.79947 9.31185 7.8316 7.47192 5.39976 7.47192C4.47182 7.47192 3.61588 7.73589 2.90392 8.19989C2.87992 7.99989 2.87192 7.79989 2.87192 7.59189C2.87192 3.95195 6.03171 1 9.93546 1C13.8392 1 16.999 3.95195 16.999 7.59189C16.999 9.75185 15.8871 11.6638 14.1752 12.8638Z" stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M9.79943 11.5836C9.79943 12.5356 9.44746 13.4156 8.8555 14.1116C8.06355 15.0716 6.80762 15.6875 5.39971 15.6875L3.31185 16.9275C2.95987 17.1435 2.5119 16.8475 2.5599 16.4395L2.75988 14.8636C1.68795 14.1196 1 12.9276 1 11.5836C1 10.1756 1.75196 8.93564 2.90388 8.19965C3.61583 7.73565 4.47177 7.47168 5.39971 7.47168C7.83156 7.47168 9.79943 9.31161 9.79943 11.5836Z" stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
                        <a href="<?php echo esc_url(get_comments_link()); ?>"><?php echo esc_html($comment_text); ?></a>
                    </div>
                <?php endif; ?>
            </div>

        </div>

        <!-- Second Row - Title -->
        <h1 class="text-[#142137] font-poppins text-[34px] font-semibold leading-[64px] tracking-[-0.68px]">
            <a href="<?php esc_html(the_permalink()); ?>">
            <?php esc_html(the_title()); ?>
            </a>
        </h1>

        <!-- Third Row - Excerpt -->
        <div class="text-[rgba(20,33,55,0.70)] -mt-[8px] font-poppins text-[16px] font-normal leading-[26px]">
            <?php esc_html(the_excerpt()); ?>
        </div>

        <!-- Fourth Row - Read More Button -->
        <div class="flex flex-col items-start gap-3 mt-[38px]">
            <a href="<?php esc_html(the_permalink()); ?>"
                class="w-[173px] h-[54px] flex items-center gap-3 pl-[30px] py-[22px] rounded-full border border-[rgba(20,33,55,0.20)] bg-[#142137] text-white font-poppins text-[16px] font-medium">
                <?php esc_html_e('Read More', 'laundryclean'); ?>
                <div class="w-[34px] h-[34px] flex items-center justify-center rounded-full bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 15 14" fill="none">
                        <path d="M0.853516 7.1615L12.8535 7.1615" stroke="#142137" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7.85352 13.1611L13.8535 7.16113L7.85352 1.16113" stroke="#142137"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </a>
        </div>

    </div>

</article>
