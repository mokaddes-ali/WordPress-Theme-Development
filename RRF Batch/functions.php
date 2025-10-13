<?php
// Enqueue/Link scripts and style
function rrf_theme_scripts()
{
    // Google Fonts
    // wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@100..900&family=Poppins:wght@400;700&family=Sen:wght@400..800&display=swap', null);


}
add_action('wp_enqueue_scripts', 'rrf_theme_scripts');