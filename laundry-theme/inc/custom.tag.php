<?php 
/**
 * Custom WordPress Tags
 */

function laundryclean_custom_tags($return, $tags, $args) {
    if (empty($tags)) {
        return '<p>No tags found.</p>';
    }

    $output = '<div class="flex mt-3 md:mt-4 flex-wrap gap-2 md:gap-3">';
    foreach ($tags as $tag) {
        $tag_link = get_tag_link($tag->term_id);
        $tag_name = esc_html($tag->name);
        $is_active = (is_tag() && get_queried_object_id() === $tag->term_id);

        $classes = $is_active 
            ? 'px-3 h-[28px] text-[15px] font-medium leading-[26px] text-white border border-[#14213723] bg-[#4375E7] flex items-center justify-center rounded'
            : 'px-3 h-[28px] text-[15px] font-medium leading-[26px] text-[#142137B3] border border-[#14213723] flex items-center justify-center rounded hover:bg-[#4375E7] hover:text-white transition';

        $output .= '<a href="' . esc_url($tag_link) . '" class="' . $classes . '">' . $tag_name . '</a>';
    }
    $output .= '</div>';

    return $output;
}
add_filter('wp_generate_tag_cloud', 'laundryclean_custom_tags', 10, 3);

