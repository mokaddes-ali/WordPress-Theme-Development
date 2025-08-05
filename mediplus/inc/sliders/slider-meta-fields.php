<?php
function add_slider_meta_boxes() {
    add_meta_box(
        'slider_buttons',
        'Slider Buttons',
        'render_slider_buttons_meta_box',
        'slider',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_slider_meta_boxes');

function render_slider_buttons_meta_box($post) {
    $btn1_text = get_post_meta($post->ID, '_slider_btn1_text', true);
    $btn1_link = get_permalink();

    $btn2_text = get_post_meta($post->ID, '_slider_btn2_text', true);
    $btn2_link = get_permalink();

    ?>
    <p>
        <label for="slider_btn1_text">Button 1 Text:</label><br>
        <input type="text" name="slider_btn1_text" id="slider_btn1_text" value="<?php echo esc_attr($btn1_text); ?>" class="regular-text">
    </p>
    <p>
        <label for="slider_btn2_text">Button 2 Text:</label><br>
        <input type="text" name="slider_btn2_text" id="slider_btn2_text" value="<?php echo esc_attr($btn2_text); ?>" class="regular-text">
    </p>
    <p><i>Buttons will use this post's permalink as the URL.</i></p>
    <?php
}
