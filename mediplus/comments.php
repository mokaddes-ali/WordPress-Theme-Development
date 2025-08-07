
<div id="comments" class="comments-area">
<?php 

if(!comments_open() && get_comments_number() && get_type_supports(get_post_type(), 'comments')):
?>
<p class="no-comments">
    <?php 
    esc_html_e('Comments are Closed!')
    ?>
</p>

<?php 
endif;

$custom_comment_form_path = get_template_directory(). '/custom-comment-form.php';

if(file_exists($custom_comment_form_path)){
    require $custom_comment_form_path;
}else{
    comment_form();
}
?>

</div>

