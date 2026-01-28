<?php
/**
 * Add Course Module
 * 
 * @package lessonlms
 */
function lessonlms_add_course_module() {
        $id       = 'course_module_box';
        $title    = 'Add Course Modules';
        $callback = 'lessonlms_add_course_module_callback';
        $screen   = 'courses';
        $context  = 'normal';
        $priority = 'high';

    add_meta_box( 
        $id,
        $title,
        $callback,
        $screen,
        $context,
        $priority,
     );
}

function lessonlms_add_course_module_callback( $post ) {
    $modules = get_post_meta( $post->ID, 'course_modules', true );
    if ( ! is_array( $modules ) ) {
        $modules = array();
    }

    wp_nonce_field( 'save_course_modules', 'course_modules_nonce' );
}
?>

<div class="add-module-button">
    <button id="add-module-btn" type="button" class="black-btn">
        Add Module
    </button>
</div>

<script>
    $add_module_btn =document.querySelector( '#add-module-btn' );
    const inputOptions = new Promise((resolve) => {
  setTimeout(() => {
    resolve({
      "#ff0000": "Red",
      "#00ff00": "Green",
      "#0000ff": "Blue"
    });
  }, 1000);
});
const { value: color } = await Swal.fire({
  title: "Select color",
  input: "radio",
  inputOptions,
  inputValidator: (value) => {
    if (!value) {
      return "You need to choose something!";
    }
  }
});
if (color) {
  Swal.fire({ html: `You selected: ${color}` });
}
</script>