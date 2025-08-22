<?php 

/**
 * Enqueue scripts and styles.
 */

function laundryclean_enqueue_scripts() {
    // Tailwind & style
    wp_enqueue_style('tailwind-css', get_template_directory_uri() . '/assets/tailwindcss/output.css', [], filemtime(get_template_directory() . '/assets/tailwindcss/output.css'));
    wp_enqueue_style('style-css', get_template_directory_uri() . '/style.css', [], filemtime(get_template_directory() . '/style.css'));

    // Slick CSS
    wp_enqueue_style('slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css', [], '1.9.0');
    wp_enqueue_style('slick-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css', [], '1.9.0');

    // jQuery
    wp_enqueue_script('jquery');

    // Slick JS
    wp_enqueue_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', ['jquery'], '1.9.0', true);

    // Custom JS after Slick
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/custom-js.js', ['jquery', 'slick-js'], filemtime(get_template_directory() . '/assets/js/custom-js.js'), true);
}
add_action('wp_enqueue_scripts', 'laundryclean_enqueue_scripts');
