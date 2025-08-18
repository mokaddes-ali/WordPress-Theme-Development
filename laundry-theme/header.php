<!DOCTYPE html>
<html style="scroll-behavior: smooth;" <?php language_attributes();?> >
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name');?>- <?php bloginfo('description');?></title>


<?php wp_head();?>
</head>
<body <?php body_class();?>></body>

<?php 
get_template_part('sections/header-top');
?>