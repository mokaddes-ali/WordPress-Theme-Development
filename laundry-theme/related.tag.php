<?php 

function laundryclean(){
    

$categories = get_the_category();
$separator = ', ';
$output = '';
$i = 1;

if(!empty($categories)) :
    foreach($categories as $category) :
        if($i > 1): $output .= $separator; endif;

        $output .= '<a href=" '. esc_url(get_category_link( $category->term_id )) .'" alt="' . esc_attr( 'View all posts in$s', $category->name ) .'">' . esc_html($category->name).'</a>';

        $i++;
    endforeach;
endif;
}
