<?php 
/**
 * Default Pagination
 */

function laundryclean_all_pagenav(){
    global $wp_query, $wp_rewrite;
    $pages = '';
    $big   = 999999999;
    $max   = $wp_query->max_num_pages;
    $total = 1;
    $current = max(1, get_query_var('paged'));

    if($max <= 1) return;

     if($total == 1 && $max > 1) {
        $pages = '<p class="pages"> Page ' . $current . ' <span>' . __('of', 'laundryclean') . '</span> ' . $max . '</p>';
    }
    echo '<div class="flex items-center justify-center pt-14 pb-2">' . $pages . '</div>';
    echo '<div class="flex items-center justify-center pt-2 pb-6">';
   
    echo '<div class="flex gap-2.5">';

    $links = paginate_links(array(
        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'    => '?paged=%#%',
        'current'   => $current,
        'total'     => $max,
        'prev_text' => '<button class="w-[44px] h-[44px] flex items-center justify-center border border-[#1421371A]">
                            <svg xmlns=\'http://www.w3.org/2000/svg\' width=\'44\' height=\'44\' viewBox=\'0 0 44 44\' fill=\'none\'>
                                <path d=\'M43.5 0.5V43.5H0.5V0.5H43.5Z\' stroke=\'#142137\' stroke-opacity=\'0.1\' />
                                <path opacity=\'0.6\' d=\'M25 17L20 22L25 27\' stroke=\'#142137\' stroke-width=\'1.5\' stroke-linecap=\'round\' stroke-linejoin=\'round\' />
                            </svg>
                        </button>',

                        'next_text' => '<button class="w-[44px] h-[44px] flex items-center justify-center border border-[#1421371A]">
                            <svg xmlns=\'http://www.w3.org/2000/svg\' width=\'44\' height=\'44\' viewBox=\'0 0 44 44\' fill=\'none\'>
                                <path d=\'M43.5 0.5V43.5H0.5V0.5H43.5Z\' stroke=\'#142137\' stroke-opacity=\'0.1\' />
                                <path opacity=\'0.6\' d=\'M20 17L25 22L20 27\' stroke=\'#142137\' stroke-width=\'1.5\' stroke-linecap=\'round\' stroke-linejoin=\'round\' />
                            </svg>
                        </button>',
        'type' => 'array',
    ));

    if(is_array($links)){
        foreach($links as $link){
            // current page
            if(strpos($link, 'current') !== false){
                echo str_replace(
                    'page-numbers current',
                    'page-numbers current w-[44px] h-[44px] flex items-center justify-center rounded-md bg-[#4375E7] text-white text-[16px] font-medium leading-[26px] font-poppins',
                    $link
                );
            } else {
                // normal page number
                echo str_replace(
                    'page-numbers',
                    'page-numbers w-[44px] h-[44px] flex items-center justify-center border border-[#1421371A] bg-transparent text-[#14213799] text-[16px] font-medium leading-[26px] font-[Poppins] hover:bg-[#4375E7] hover:text-white rounded-md transition',
                    $link
                );
            }
        }
    }

    echo '</div>';
    echo '</div>';
}
