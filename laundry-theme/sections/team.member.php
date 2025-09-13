<?php
/**
 * Team Member Section
 *
 * @package LaundryTheme
 */
?>
<section class="team-area bg-[#FFF] w-full mx-auto relative px-[5%] lg:px-[7.5%] py-5 md:py-6 lg:py-8 flex flex-col gap-4 md:gap-6">
  <!-- heading -->
  <div class="team-heading w-full max-w-[32rem] mx-auto flex items-center justify-center flex-col gap-3 text-center">
    <div class="border border-[rgba(20,33,55,0.14)] flex items-center gap-2 text-sm md:text-base font-medium leading-none text-[rgba(20,33,55,0.70)] py-2 px-3 font-poppins">
      <span class="w-1.5 h-1.5 bg-[#142137] rounded-full"></span>
      Meet Cleaning Expert!
    </div>
    
    <h1 class="text-[#142137] w-full text-[22px] sm:text-[28px] xl:text-[38px] font-semibold leading-tight sm:leading-snug lg:leading-[48px] tracking-tight font-poppins">
      Meet The Professional Behind Our Clean Services!
    </h1>
  </div>

  <!-- team cards -->
  <div class="team-cards w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8">
   <?php
$team_info = new WP_Query(array(
    'post_type'      => 'team_members',
    'post_status'    => 'publish',
    'posts_per_page' => -1, // sob post show korbe
    'orderby'        => 'date',
    'order'          => 'DESC'
));

if ($team_info->have_posts()) :
    while ($team_info->have_posts()) : $team_info->the_post();
        // Meta
        $designation = get_post_meta(get_the_ID(), '_team_members_designation', true);
        $facebook    = get_post_meta(get_the_ID(), '_team_members_facebook', true);
        $twitter     = get_post_meta(get_the_ID(), '_team_members_twitter', true);
        $linkedin    = get_post_meta(get_the_ID(), '_team_members_linkedin', true);
?>

<!-- Team Card -->
<div class="relative mx-auto h-auto overflow-hidden group bg-white shadow-lg hover:shadow-xl transition-shadow duration-300">
<?php if (has_post_thumbnail()) : ?>
    <div class="w-full aspect-[378/370]">
        <?php the_post_thumbnail('full', ['class' => 'w-full h-full object-cover', 'alt' => esc_attr(get_the_title()) ]); ?>
    </div>
<?php endif; ?>


  <!-- Card Body -->
  <div class="flex justify-between items-center p-6 bg-[#ECF2FE]">
    <div class="flex flex-col gap-1.5">
      <h1 class="text-[#142137] font-poppins text-base md:text-[18px] font-semibold leading-none"><?php the_title(); ?></h1>
      <p class="text-[rgba(20,33,55,0.70)] font-poppins text-sm font-medium leading-relaxed uppercase">
        <?php echo esc_html($designation); ?>
      </p>
    </div>

    <!-- Share Button -->
    <div class="relative">
      <a href="#" class="block">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/share.png" alt="Share" class="w-12 h-12 group-hover:hidden transition-opacity" />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sharehover.png" alt="Share Hover" class="w-12 h-12 hidden group-hover:block" />
      </a>

      <!-- Social Icons -->
      <div class="absolute top-[-10rem] right-0 space-y-2 opacity-0 group-hover:opacity-100 transition-all duration-300">
        <a href="<?php echo esc_url($facebook); ?>" class="block hover:scale-110 transition-transform">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.png" class="w-12 h-12" alt="Facebook" />
        </a>
        <a href="<?php echo esc_url($twitter); ?>" class="block hover:scale-110 transition-transform">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/twiter.png" class="w-12 h-12" alt="Twitter" />
        </a>
        <a href="<?php echo esc_url($linkedin); ?>" class="block hover:scale-110 transition-transform">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/linkedin.png" class="w-12 h-12" alt="LinkedIn" />
        </a>
      </div>
    </div>
  </div>
</div>

<?php
    endwhile;
    wp_reset_postdata();
endif;
?>
  </div>

  <!-- card button -->
  <div class="cart-btn flex justify-center items-center mx-auto pt-8">
    <svg xmlns="http://www.w3.org/2000/svg" width="86" height="26" viewBox="0 0 86 26" fill="none">
      <circle opacity="0.2" cx="81" cy="13" r="5" fill="#142137" />
      <circle opacity="0.2" cx="61" cy="13" r="5" fill="#142137" />
      <circle cx="33" cy="13" r="13" fill="#4375E7" />
      <circle cx="33" cy="13" r="3" fill="white" />
      <circle opacity="0.2" cx="5" cy="13" r="5" fill="#142137" />
    </svg>
  </div>
</section>

