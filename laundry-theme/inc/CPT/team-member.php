<?php 
/**
 * Register Team Members custom post type
 */

function laundryclean_team_members_register()
{
    $labels = array(
        'name'                  => __('Team Members', 'laundryclean'),
        'singular_name'         => __('Team Members', 'laundryclean'),
        'add_new'               => __('Add New Team Member', 'laundryclean'),
        'add_new_item'          => __('Add New Team Member', 'laundryclean'),
        'edit_item'             => __('Edit Team Member', 'laundryclean'),
        'new_item'              => __('New Team Member', 'laundryclean'),
        'all_items'             => __('All Team Member', 'laundryclean'),
        'view_item'             => __('View Team Member', 'laundryclean'),
        'search_items'          => __('Search Team Members', 'laundryclean'),
        'not_found'             => __('No Team Members found', 'laundryclean'),
        'not_found_in_trash'    => __('No Team Members found in Trash', 'laundryclean'),
        'menu_name'             => __('Team Members', 'laundryclean')
    );

   $args = array(
    'labels'                => $labels,
    'description'           => __('Custom post type for homepage Team Members', 'laundryclean'),
    'public'                => true,
    'publicly_queryable'    => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'query_var'             => true,
    'rewrite'               => array('slug' => 'team_members'),
    'capability_type'       => 'post',
    'has_archive'           => true,
    'hierarchical'          => false,
    'menu_position'         => 9,
    'menu_icon'             => 'dashicons-businessman',
    'supports'              => array(
        'title',
        'editor',
        'thumbnail',
        'excerpt',
        'revisions'
    ),
);

    register_post_type('team_members', $args);
}
add_action('init', 'laundryclean_team_members_register');


// Add Custom Meta Box
function laundryclean_team_members_meta_box()
{
    add_meta_box(
        'team_members_meta_box',
        __('Team Members Settings', 'laundryclean'),
        'laundryclean_team_members_meta_box_callback',
        'team_members',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'laundryclean_team_members_meta_box');

function laundryclean_team_members_meta_box_callback($post) {
 
    $team_members_facebook  = get_post_meta($post->ID, '_team_members_facebook', true) ?: '';
    $team_members_linkedin  = get_post_meta($post->ID, '_team_members_linkedin', true) ?: '';
    $team_members_twitter  = get_post_meta($post->ID, '_team_members_twitter', true) ?: '';
    $team_members_designation = get_post_meta($post->ID,'_team_members_designation', true) ?: '';

    ?>
     <!-- 'team_members_designation'-->
      <p style="margin-bottom:20px;">
    <label for="team_members_designation" style="display:block; font-weight:bold; font-size:16px; color:#333; margin-bottom:5px;">
        <?php _e('* Team Members Designation:', 'laundryclean'); ?>
    </label>
    <input 
        type="text" 
        name="team_members_designation" 
        id="team_members_designation" 
        value="<?php echo esc_attr( $team_members_designation); ?>" 
        required
        style="width:100%; padding:8px 10px; border:1px solid #ccc; border-radius:5px; font-size:14px; outline:none;"
        onfocus="this.style.borderColor='#ff7f50'; this.style.boxShadow='0 0 5px rgba(255,127,80,0.5)';" 
        onblur="this.style.borderColor='#ccc'; this.style.boxShadow='none';"
    >
    <small style="color:#666; font-size:14px;">
        <?php _e('Please must fill up the field.', 'laundryclean'); ?>
    </small>
</p>
    <!-- facebook -->
    <p style="margin-bottom:20px;">
    <label for=" team_members_facebook" style="display:block; font-weight:bold; font-size:16px; color:#333; margin-bottom:5px;">
        <?php _e('* Team Members Facebook URL:', 'laundryclean'); ?>
    </label>
    <input 
        type="url" 
        name="team_members_facebook" 
        id="team_members_facebook" 
        value="<?php echo esc_attr( $team_members_facebook); ?>" 
        required
        style="width:100%; padding:8px 10px; border:1px solid #ccc; border-radius:5px; font-size:14px; outline:none;"
        onfocus="this.style.borderColor='#ff7f50'; this.style.boxShadow='0 0 5px rgba(255,127,80,0.5)';" 
        onblur="this.style.borderColor='#ccc'; this.style.boxShadow='none';"
    >
    <small style="color:#666; font-size:14px;">
        <?php _e('Please must fill up the field.', 'laundryclean'); ?>
    </small>
</p>
<!-- $team_members_twitter -->
<p style="margin-bottom:20px;">
    <label for="team_members_twitter" style="display:block; font-weight:bold; font-size:16px; color:#333; margin-bottom:5px;">
        <?php _e('* Team Members Twitter URL:', 'laundryclean'); ?>
    </label>
    <input 
        type="url" 
        name="team_members_twitter" 
        id="team_members_twitter" 
        value="<?php echo esc_attr($team_members_twitter); ?>" 
        required
        style="width:100%; padding:8px 10px; border:1px solid #ccc; border-radius:5px; font-size:14px; outline:none;"
        onfocus="this.style.borderColor='#ff7f50'; this.style.boxShadow='0 0 5px rgba(255,127,80,0.5)';" 
        onblur="this.style.borderColor='#ccc'; this.style.boxShadow='none';"
    >
    <small style="color:#666; font-size:14px;">
        <?php _e('Please must fill up the field.', 'laundryclean'); ?>
    </small>
</p>
<!-- team_members_linkedin -->

<p style="margin-bottom:20px;">
    <label for="team_members_linkedin" style="display:block; font-weight:bold; font-size:16px; color:#333; margin-bottom:5px;">
        <?php _e('* Team Members Linkedin URL:', 'laundryclean'); ?>
    </label>
    <input 
        type="url" 
        name="team_members_linkedin" 
        id="team_members_linkedin" 
        value="<?php echo esc_attr( $team_members_linkedin); ?>" 
        required
        style="width:100%; padding:8px 10px; border:1px solid #ccc; border-radius:5px; font-size:14px; outline:none;"
        onfocus="this.style.borderColor='#ff7f50'; this.style.boxShadow='0 0 5px rgba(255,127,80,0.5)';" 
        onblur="this.style.borderColor='#ccc'; this.style.boxShadow='none';"
    >
    <small style="color:#666; font-size:14px;">
        <?php _e('Please must fill up the field.', 'laundryclean'); ?>
    </small>
</p>

    <?php
}

// Save Meta Box Data
function laundryclean_save_team_members_meta($post_id)
{
    $fields = [
         'team_members_facebook'  => '_team_members_facebook',
         'team_members_linkedin'  => '_team_members_linkedin',
         'team_members_twitter'  => '_team_members_twitter',
         'team_members_designation' => '_team_members_designation',
    ];

    foreach ($fields as $form_field => $meta_key) {
        if (array_key_exists($form_field, $_POST)) {
            update_post_meta($post_id, $meta_key, sanitize_text_field($_POST[$form_field]));
        }
    }
}
add_action('save_post', 'laundryclean_save_team_members_meta');