<?php
/**
 * 404 Not Found Page
 */
get_header();
?>

<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">

        <div class="page-header">
            <h1 class="page-title"><?php _e('Not Found', 'lessonlms'); ?></h1>
        </div>

        <div class="page-wrapper">
            <div class="page-content">
                <h2><?php _e('This is somewhat embarrassing, isn’t it?', 'lessonlms'); ?></h2>
                <p><?php _e('It looks like nothing was found at this location. Maybe try a search?', 'lessonlms'); ?></p>
                <form class="search-form" role="search" method="get" action="<?php echo home_url('/'); ?>">
                    <input type="search" name="s" placeholder="<?php _e('Search...', 'lessonlms'); ?>">
                    <input type="submit" value="<?php _e('Search', 'lessonlms'); ?>">
                </form>
            </div>
        </div>

    </div>
</div>

<?php
get_footer();
?>
