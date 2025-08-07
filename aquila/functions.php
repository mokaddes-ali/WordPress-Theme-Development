<?php

/**
 * Theme Functions.
 * 
 * 
 * @package Aquila
 */


// for test
// echo '<pre>';

// print_r(get_template_directory());
// wp_die();

// echo '<pre>';

// print_r(filemtime( get_template_directory() .'/style.css'));
// wp_die();

function aquila_enqueue_scripts()
{

    // wp_enqueue_style('stylesheet', get_template_directory_uri() .'/style.css');

    //         wp_enqueue_style('stylesheet', get_stylesheet_uri(), [], filemtime( get_template_directory() .'/style.css') , 'all');


    //         wp_enqueue_script('', get_template_directory_uri() .'/assets/main.js', [], filemtime( get_template_directory() .   '/assets/main.js' ),true);
// }

    // Best practice

    // Register Style



    //Boostrap css
    wp_register_style('boostrap-css', get_template_directory_uri() . '/assets/src/library/css/bootstrap.min.css', [], false, 'all');

wp_register_style(
    'style-css',
    get_template_directory_uri() . '/style.css', 
    [],
    filemtime(get_template_directory() . '/style.css'),
    'all'
);

    // custome css
    wp_register_style(
    'custom-css',
    get_template_directory_uri() . '/assets/style.css',
    [],
    filemtime(get_template_directory() . '/assets/style.css'),
    'all'
);


    // Register Script
    wp_register_script('main-js', get_template_directory_uri() . '/assets/main.js', [], filemtime(get_template_directory() . '/assets/main.js'), true);

    wp_register_script('boostrap-js', get_template_directory_uri() . '/assets/src/library/css/bootstrap.min.js', ['jquery'], false, true);

    //   enqueue_style
    
    wp_enqueue_style('style-css');
    wp_enqueue_style('custom-css');
    wp_enqueue_style('boostrap-css');

    //   enqueue_script
    wp_enqueue_script('main-js');
    wp_enqueue_script('boostrap-js');
}

add_action("wp_enqueue_scripts", "aquila_enqueue_scripts");

?>