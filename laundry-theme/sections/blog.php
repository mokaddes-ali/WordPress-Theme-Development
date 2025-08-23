<?php 

/**
 * Blog Section
 *
 * @package LaundryTheme
 */

        $blog_title = get_theme_mod('blog_title', __('Latest News & Blog', 'laundryclean'));
 
        $blog_sub_title = get_theme_mod('blog_sub_title', __('Clothing Care & Laundry Best Practices.', 'laundryclean'));
       
       $blog_button_text = get_theme_mod('blog_button_text', __('See More Blog', 'laundryclean'));


       $blog_posts = new WP_Query(array(
       'post_type' => 'post',
       'posts_per_page' => 8,
       'orderby' => 'date',
       'order' => 'DESC',
    ));

?>
<!-- Blog Section -->
<section class="blog-area w-full px-[2.5%] lg:px-[5%] 2xl:px-[8%] py-16 md:py-24 lg:py-[149px] flex flex-col items-center justify-center md:items-start md:justify-start gap-5">

     <!-- Latest News Label -->
     <div
        class="w-[194px] h-[29px] border border-[rgba(20,33,55,0.14)] flex items-center gap-2 flex-shrink-0 text-base font-medium leading-none text-[rgba(20,33,55,0.70)] py-2 px-3 font-poppins">
        <span class="w-[5px] h-[5px] bg-[#142137] flex-shrink-0 aspect-square"></span>
        <?php if($blog_title): ?>
        <?php echo esc_html($blog_title); ?>
        <?php endif; ?>
    </div>

    <!-- Heading and Button -->
    <div class="flex flex-col md:flex-row justify-between items-center gap-6 w-full">
         <h1
             class="text-[#142137] font-semibold text-3xl sm:text-4xl md:text-5xl lg:text-[54px] leading-tight tracking-tight text-center md:text-left lg:leading-[64px] lg:tracking-[-1.08px] font-poppins max-w-[660px]">
            <?php if($blog_sub_title): ?>
            <?php echo esc_html($blog_sub_title); ?>
            <?php endif; ?>
         </h1>
         <button
            class="w-[188px] h-[44px] shrink-0 border border-[rgba(20,33,55,0.14)] text-[#142137] font-poppins text-[15px] font-medium flex items-center justify-center gap-2 group mt-0 md:mt-[60px]">
            <?php if($blog_button_text): ?>
            <a href="<?php echo get_permalink(get_option('page_for_posts')) ?>">
                <?php echo esc_html($blog_button_text); ?>
            </a>
            <?php endif; ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none"
                class="transition-transform duration-300 group-hover:translate-x-1">
                <path d="M1 7L13 7" stroke="#142137" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M8 13L14 7L8 1" stroke="#142137" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
          </button>
      </div>

    <!-- Blog Cards -->
    <div
        class="blog-cards grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 gap-6 auto-rows-fr mt-9">

        <?php 
         if($blog_posts->have_posts()) :
          while($blog_posts->have_posts()) : $blog_posts->the_post();
         ?>

        <!-- Card -->
        <div class="w-full h-full bg-white overflow-hidden font-poppins relative flex flex-col">
            <div class="w-full aspect-[3/2] overflow-hidden relative">
                <a href="<?php the_permalink(); ?>">

                    <?php 
                      if(has_post_thumbnail()) {
          the_post_thumbnail('full', ['class' => 'w-full h-full object-cover']);
                       }else{
                       echo '<img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog1.png" alt="Card Image"
                       class="w-full h-full object-cover" />';
                      }
                      ?>
                </a>

                 <div
                       class="absolute top-5 right-5 bg-[#4375E7] text-white text-[15px]  font-medium leading-[26px] w-[98px] h-[26px] flex items-center justify-center rounded-sm">
                   <?php echo esc_html('Eco Wash', 'laundryclean'); ?>
                </div>
            </div>
            <div
                 class="pt-4 flex justify-start gap-2 text-[15px] font-medium text-[rgba(20,33,55,0.7)] leading-[26px]">
                <div class="flex items-center gap-[4px]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none">
                        <path
                            d="M17 9C17 13.416 13.416 17 9 17C4.584 17 1 13.416 1 9C1 4.584 4.584 1 9 1C13.416 1 17 4.584 17 9Z"
                            stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M11.9681 11.5442L9.4881 10.0642C9.0561 9.8082 8.7041 9.1922 8.7041 8.6882V5.4082"
                            stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>
                        <?php echo get_the_date('M d, Y'); ?>
                    </span>
                </div>
                <div class="flex items-center gap-1 hover:underline hover:underline-offset-auto">
                    <?php
                     $comments_count = get_comments_number(); 
                     $comments_open  = comments_open();

                    if ( ! $comments_open ) {
                       $comment = esc_html__('Comment close', 'laundryclean');
                   } else {
                   if ( $comments_count === 0 ) {
                         $comment = esc_html__('No Comments', 'laundryclean');
                    } elseif ( $comments_count === 1 ) {
                          $comment = esc_html__('1 Comment', 'laundryclean');
                   } else {
                       $comment = esc_html($comments_count) . ' ' . esc_html__('Comments', 'laundryclean');
                  }

                   $comment = '<a href="' . esc_url(get_comments_link()) . '">' . $comment . '</a>';
            }

           echo ' <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none">
            <path d="M14.1752 12.8638L14.4872 15.3918C14.5672 16.0558 13.8552 16.5197 13.2872 16.1757L9.93546 14.1838C9.56749 14.1838 9.20752 14.1598 8.85554 14.1118C9.4475 13.4158 9.79947 12.5358 9.79947 11.5838C9.79947 9.31185 7.8316 7.47192 5.39976 7.47192C4.47182 7.47192 3.61588 7.73589 2.90392 8.19989C2.87992 7.99989 2.87192 7.79989 2.87192 7.59189C2.87192 3.95195 6.03171 1 9.93546 1C13.8392 1 16.999 3.95195 16.999 7.59189C16.999 9.75185 15.8871 11.6638 14.1752 12.8638Z" stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M9.79943 11.5836C9.79943 12.5356 9.44746 13.4156 8.8555 14.1116C8.06355 15.0716 6.80762 15.6875 5.39971 15.6875L3.31185 16.9275C2.95987 17.1435 2.5119 16.8475 2.5599 16.4395L2.75988 14.8636C1.68795 14.1196 1 12.9276 1 11.5836C1 10.1756 1.75196 8.93564 2.90388 8.19965C3.61583 7.73565 4.47177 7.47168 5.39971 7.47168C7.83156 7.47168 9.79943 9.31161 9.79943 11.5836Z" stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
          </svg>' . '<span>' . $comment . '</span>';
             ?>
         </div>
        </div>
     <div class="w-full h-[1px] bg-[rgba(0,0,0,0.2)] mt-4"></div>
                <div class="pt-4">
                <h2
                    class="text-[#142137] text-xl md:text-2xl font-semibold leading-[1.3] tracking-tight hover:underline hover:underline-offset-auto">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
            </div>
        </div>
        <?php
                endwhile;
                wp_reset_postdata();

               else: ?>

        <!-- First Card -->
        <div class="w-full h-auto bg-white overflow-hidden font-poppins relative">
            <div class="w-full aspect-[3/2] overflow-hidden relative">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog1.png" alt="Card Image"
                    class="w-full h-full object-cover" />
                <div
                    class="absolute top-5 right-5 bg-[#4375E7] text-white text-[15px] font-medium leading-[26px] w-[98px] h-[26px] flex items-center justify-center rounded-sm">
                    Eco Wash
                </div>
            </div>
            <div
                class="pt-4 flex justify-start gap-[18px] text-[15px] font-medium text-[rgba(20,33,55,0.7)] leading-[26px]">
                <div class="flex items-center gap-[4px]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none">
                        <path
                            d="M17 9C17 13.416 13.416 17 9 17C4.584 17 1 13.416 1 9C1 4.584 4.584 1 9 1C13.416 1 17 4.584 17 9Z"
                            stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M11.9681 11.5442L9.4881 10.0642C9.0561 9.8082 8.7041 9.1922 8.7041 8.6882V5.4082"
                            stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>March 23, 2025</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none">
                        <path
                            d="M14.1752 12.8638L14.4872 15.3918C14.5672 16.0558 13.8552 16.5197 13.2872 16.1757L9.93546 14.1838C9.56749 14.1838 9.20752 14.1598 8.85554 14.1118C9.4475 13.4158 9.79947 12.5358 9.79947 11.5838C9.79947 9.31185 7.8316 7.47192 5.39976 7.47192C4.47182 7.47192 3.61588 7.73589 2.90392 8.19989C2.87992 7.99989 2.87192 7.79989 2.87192 7.59189C2.87192 3.95195 6.03171 1 9.93546 1C13.8392 1 16.999 3.95195 16.999 7.59189C16.999 9.75185 15.8871 11.6638 14.1752 12.8638Z"
                            stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M9.79943 11.5836C9.79943 12.5356 9.44746 13.4156 8.8555 14.1116C8.06355 15.0716 6.80762 15.6875 5.39971 15.6875L3.31185 16.9275C2.95987 17.1435 2.5119 16.8475 2.5599 16.4395L2.75988 14.8636C1.68795 14.1196 1 12.9276 1 11.5836C1 10.1756 1.75196 8.93564 2.90388 8.19965C3.61583 7.73565 4.47177 7.47168 5.39971 7.47168C7.83156 7.47168 9.79943 9.31161 9.79943 11.5836Z"
                            stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>05 Comment</span>
                </div>
            </div>
            <div class="w-full h-[1px] bg-[rgba(0,0,0,0.2)] mt-4"></div>
            <div class="pt-4">
                <h2 class="text-[#142137] text-xl md:text-2xl font-semibold leading-[1.3] tracking-tight">
                    Natural Laundry Detergents Explained.
                </h2>
            </div>
        </div>

        <!-- Second Card -->
        <div class="w-full h-auto bg-white overflow-hidden font-poppins relative">
            <div class="w-full aspect-[3/2] overflow-hidden relative">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog2.png" alt="Card Image"
                    class="w-full h-full object-cover" />
                <div
                    class="absolute top-5 right-5 bg-[#4375E7] text-white text-[15px] font-medium leading-[26px] w-[98px] h-[26px] flex items-center justify-center rounded-sm">
                    Eco Wash
                </div>
            </div>
            <div
                class="pt-4 flex justify-start gap-[18px] text-[15px] font-medium text-[rgba(20,33,55,0.7)] leading-[26px]">
                <div class="flex items-center gap-[4px]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none">
                        <path
                            d="M17 9C17 13.416 13.416 17 9 17C4.584 17 1 13.416 1 9C1 4.584 4.584 1 9 1C13.416 1 17 4.584 17 9Z"
                            stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M11.9681 11.5442L9.4881 10.0642C9.0561 9.8082 8.7041 9.1922 8.7041 8.6882V5.4082"
                            stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>April 15, 2025</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none">
                        <path
                            d="M14.1752 12.8638L14.4872 15.3918C14.5672 16.0558 13.8552 16.5197 13.2872 16.1757L9.93546 14.1838C9.56749 14.1838 9.20752 14.1598 8.85554 14.1118C9.4475 13.4158 9.79947 12.5358 9.79947 11.5838C9.79947 9.31185 7.8316 7.47192 5.39976 7.47192C4.47182 7.47192 3.61588 7.73589 2.90392 8.19989C2.87992 7.99989 2.87192 7.79989 2.87192 7.59189C2.87192 3.95195 6.03171 1 9.93546 1C13.8392 1 16.999 3.95195 16.999 7.59189C16.999 9.75185 15.8871 11.6638 14.1752 12.8638Z"
                            stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M9.79943 11.5836C9.79943 12.5356 9.44746 13.4156 8.8555 14.1116C8.06355 15.0716 6.80762 15.6875 5.39971 15.6875L3.31185 16.9275C2.95987 17.1435 2.5119 16.8475 2.5599 16.4395L2.75988 14.8636C1.68795 14.1196 1 12.9276 1 11.5836C1 10.1756 1.75196 8.93564 2.90388 8.19965C3.61583 7.73565 4.47177 7.47168 5.39971 7.47168C7.83156 7.47168 9.79943 9.31161 9.79943 11.5836Z"
                            stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>02 Comment</span>
                </div>
            </div>
            <div class="w-full h-[1px] bg-[rgba(0,0,0,0.2)] mt-4"></div>
            <div class="pt-4">
                <h2
                    class="text-[#142137] text-xl md:text-2xl font-semibold leading-[1.3] tracking-tight underline underline-offset-auto decoration-solid decoration-1">
                    Complete Guide to Green & Natural Laundry.
                </h2>
            </div>
        </div>

        <!-- Third Card -->
        <div class="w-full h-auto bg-white overflow-hidden font-poppins relative">
            <div class="w-full aspect-[3/2] overflow-hidden relative">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog3.png" alt="Card Image"
                    class="w-full h-full object-cover" />
                <div
                    class="absolute top-5 right-5 bg-[#4375E7] text-white text-[15px] font-medium leading-[26px] w-[98px] h-[26px] flex items-center justify-center rounded-sm">
                    Eco Wash
                </div>
            </div>
            <div
                class="pt-4 flex justify-start gap-[18px] text-[15px] font-medium text-[rgba(20,33,55,0.7)] leading-[26px]">
                <div class="flex items-center gap-[4px]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none">
                        <path
                            d="M17 9C17 13.416 13.416 17 9 17C4.584 17 1 13.416 1 9C1 4.584 4.584 1 9 1C13.416 1 17 4.584 17 9Z"
                            stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M11.9681 11.5442L9.4881 10.0642C9.0561 9.8082 8.7041 9.1922 8.7041 8.6882V5.4082"
                            stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>June 23, 2025</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none">
                        <path
                            d="M14.1752 12.8638L14.4872 15.3918C14.5672 16.0558 13.8552 16.5197 13.2872 16.1757L9.93546 14.1838C9.56749 14.1838 9.20752 14.1598 8.85554 14.1118C9.4475 13.4158 9.79947 12.5358 9.79947 11.5838C9.79947 9.31185 7.8316 7.47192 5.39976 7.47192C4.47182 7.47192 3.61588 7.73589 2.90392 8.19989C2.87992 7.99989 2.87192 7.79989 2.87192 7.59189C2.87192 3.95195 6.03171 1 9.93546 1C13.8392 1 16.999 3.95195 16.999 7.59189C16.999 9.75185 15.8871 11.6638 14.1752 12.8638Z"
                            stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M9.79943 11.5836C9.79943 12.5356 9.44746 13.4156 8.8555 14.1116C8.06355 15.0716 6.80762 15.6875 5.39971 15.6875L3.31185 16.9275C2.95987 17.1435 2.5119 16.8475 2.5599 16.4395L2.75988 14.8636C1.68795 14.1196 1 12.9276 1 11.5836C1 10.1756 1.75196 8.93564 2.90388 8.19965C3.61583 7.73565 4.47177 7.47168 5.39971 7.47168C7.83156 7.47168 9.79943 9.31161 9.79943 11.5836Z"
                            stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>07 Comment</span>
                </div>
            </div>
            <div class="w-full h-[1px] bg-[rgba(0,0,0,0.2)] mt-4"></div>
            <div class="pt-4">
                <h2 class="text-[#142137] text-xl md:text-2xl font-semibold leading-[1.3] tracking-tight">
                    15 Reasons Let Experts Handle Dry Cleaning.
                </h2>
            </div>
        </div>

        <!-- Fourth Card -->
        <div class="w-full h-auto bg-white overflow-hidden font-poppins relative">
            <div class="w-full aspect-[3/2] overflow-hidden relative">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog4.png" alt="Card Image"
                    class="w-full h-full object-cover" />
                <div
                    class="absolute top-5 right-5 bg-[#4375E7] text-white text-[15px] font-medium leading-[26px] w-[98px] h-[26px] flex items-center justify-center rounded-sm">
                    Eco Wash
                </div>
            </div>
            <div
                class="pt-4 flex justify-start gap-[18px] text-[15px] font-medium text-[rgba(20,33,55,0.7)] leading-[26px]">
                <div class="flex items-center gap-[4px]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none">
                        <path
                            d="M17 9C17 13.416 13.416 17 9 17C4.584 17 1 13.416 1 9C1 4.584 4.584 1 9 1C13.416 1 17 4.584 17 9Z"
                            stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M11.9681 11.5442L9.4881 10.0642C9.0561 9.8082 8.7041 9.1922 8.7041 8.6882V5.4082"
                            stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>July 28, 2025</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none">
                        <path
                            d="M14.1752 12.8638L14.4872 15.3918C14.5672 16.0558 13.8552 16.5197 13.2872 16.1757L9.93546 14.1838C9.56749 14.1838 9.20752 14.1598 8.85554 14.1118C9.4475 13.4158 9.79947 12.5358 9.79947 11.5838C9.79947 9.31185 7.8316 7.47192 5.39976 7.47192C4.47182 7.47192 3.61588 7.73589 2.90392 8.19989C2.87992 7.99989 2.87192 7.79989 2.87192 7.59189C2.87192 3.95195 6.03171 1 9.93546 1C13.8392 1 16.999 3.95195 16.999 7.59189C16.999 9.75185 15.8871 11.6638 14.1752 12.8638Z"
                            stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M9.79943 11.5836C9.79943 12.5356 9.44746 13.4156 8.8555 14.1116C8.06355 15.0716 6.80762 15.6875 5.39971 15.6875L3.31185 16.9275C2.95987 17.1435 2.5119 16.8475 2.5599 16.4395L2.75988 14.8636C1.68795 14.1196 1 12.9276 1 11.5836C1 10.1756 1.75196 8.93564 2.90388 8.19965C3.61583 7.73565 4.47177 7.47168 5.39971 7.47168C7.83156 7.47168 9.79943 9.31161 9.79943 11.5836Z"
                            stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>08 Comment</span>
                </div>
            </div>
            <div class="w-full h-[1px] bg-[rgba(0,0,0,0.2)] mt-4"></div>
            <div class="pt-4">
                <h2 class="text-[#142137] text-xl md:text-2xl font-semibold leading-[1.3] tracking-tight">
                    Benefits of Using Professional Dry Cleaning Services.
                </h2>
            </div>
            <?php
            endif;
            ?>
        </div>
</section>