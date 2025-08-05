<?php

function save_slider_meta_fields($post_id){
    if(array_key_exists('slider_btn1_text', $_POST)){
        update_post_meta($post_id, '_slider_btn1_text', sanitize_text_field($_POST['slider_btn1_text']));
    }
     if (array_key_exists('slider_btn2_text', $_POST)) {
        update_post_meta($post_id, '_slider_btn2_text', sanitize_text_field($_POST['slider_btn2_text']));
    }

}
add_action('save_post_slider', 'save_slider_meta_fields');