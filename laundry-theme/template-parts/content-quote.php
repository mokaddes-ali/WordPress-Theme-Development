<?php
/**
 * Template part for displaying quote post format
 *
 * @package LaundryTheme
 */
?>
    <!-- Second Card -->
<article id="post-<?php the_ID(); ?>" <?php post_class('relative bg-[#EBEFF3] rounded-lg my-3 flex flex-col items-center text-center gap-6'); ?>>  
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
    <?php
        $content = get_the_content();
        $content_text = preg_replace('/<img[^>]+\>/i', '', $content);
        echo esc_html( wp_trim_words( $content_text, 45 ) );
       ?>
  </p>

  <!-- Heading -->
  <h2 class="text-[#142137] text-xl md:text-2xl font-medium tracking-tight mt-4">
    <?php echo esc_html(the_title()); ?>
  </h2>

</article>