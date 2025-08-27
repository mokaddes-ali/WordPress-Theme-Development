<?php
/**
 * Template Part for Post Content
 *
 * @package LaundryTheme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('w-full flex-shrink-0 bg-[#EBEFF3] mt-6'); ?>>

    <!-- Image Section -->
    <div class="w-full h-auto aspect-[1160/570]">
        <?php if (has_post_thumbnail()) : ?>
            <img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>"
                alt="<?php echo esc_attr(get_the_title()); ?>" class="w-full h-full object-cover" />
        <?php endif; ?>
    </div>

    <!-- Text Section -->
    <div class="px-4 py-3 lg:px-8 lg:py-6 flex flex-col gap-[14px]">

        <!-- First Row -->
        <div class="flex flex-col sm:flex-row items-center gap-4 md:gap-8 lg:gap-5">

            <!-- Mobile device only -->
            <div class="w-full px-6 mt-2 flex justify-between sm:hidden">
                <!-- Avatar + Name -->
                <div class="flex items-center gap-3">
                    <?php
                    $author_id = get_the_author_meta('ID');
                    $default_avatar = get_template_directory_uri() . '/assets/images/postclient1.jpg';
                    echo get_avatar($author_id, 48, '', '', ['class' => 'w-12 h-12 rounded-full object-cover']);
                    ?>
                    <h2 class="text-[#142137] font-poppins text-[18px] font-semibold">
                        <?php echo get_the_author(); ?>
                    </h2>
                </div>

                <!-- Category -->
                <div class="flex items-center gap-1 text-[rgba(20,33,55,0.60)] font-poppins text-base font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                        <path d="..." fill="#1D92CD" />
                    </svg>
                    <?php
                    $categories = get_the_category();
                    if (!empty($categories)) {
                        echo esc_html($categories[0]->name);
                    }
                    ?>
                </div>
            </div>

            <!-- Desktop Avatar -->
            <div class="hidden sm:flex w-12 h-12 lg:w-14 lg:h-14 rounded-full bg-[#CFD4C6] overflow-hidden">
                <?php
                echo get_avatar($author_id, 56, '', '', ['class' => 'w-full h-full object-cover']);
                ?>
            </div>

            <!-- Desktop Name -->
            <h2 class="hidden sm:flex text-[#142137] font-poppins text-[18px] font-semibold leading-none">
                <?php echo get_the_author(); ?>
            </h2>

            <!-- Desktop Category -->
            <div class="hidden sm:flex items-center gap-1 text-[rgba(20,33,55,0.60)] font-poppins text-base font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                    <path d="..." fill="#1D92CD" />
                </svg>
                <?php
                if (!empty($categories)) {
                    echo esc_html($categories[0]->name);
                }
                ?>
            </div>

            <!-- Date and Comment Count -->
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-1 text-[rgba(20,33,55,0.60)] font-poppins text-base font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" fill="none">
                        <path d="..." stroke="#1D92CD" stroke-width="2" />
                    </svg>
                    <?php echo get_the_date('M d, Y'); ?>
                </div>

                <?php
                $comments_count = get_comments_number();
                if ($comments_count || comments_open()) :
                    if ($comments_count === 0) {
                        $comment_text = __('No Comments', 'laundryclean');
                    } elseif ($comments_count === 1) {
                        $comment_text = __('1 Comment', 'laundryclean');
                    } else {
                        $comment_text = $comments_count . ' ' . __('Comments', 'laundryclean');
                    }
                ?>
                    <div class="flex items-center gap-1 text-[rgba(20,33,55,0.60)] font-poppins text-base font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="18" fill="none">
                            <path d="..." stroke="#1D92CD" stroke-width="2" />
                        </svg>
                        <a href="<?php echo esc_url(get_comments_link()); ?>"><?php echo esc_html($comment_text); ?></a>
                    </div>
                <?php endif; ?>
            </div>

        </div>

        <!-- Second Row - Title -->
        <h1 class="text-[#142137] font-poppins text-[34px] font-semibold leading-[64px] tracking-[-0.68px]">
            <?php the_title(); ?>
        </h1>

        <!-- Third Row - Excerpt -->
        <div class="text-[rgba(20,33,55,0.70)] -mt-[8px] font-poppins text-[16px] font-normal leading-[26px]">
            <?php the_excerpt(); ?>
        </div>

        <!-- Fourth Row - Read More Button -->
        <div class="flex flex-col items-start gap-3 mt-[38px]">
            <a href="<?php the_permalink(); ?>"
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
