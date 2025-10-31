<div class="courses-sidebar">

    <!-- Category -->
    <div class="course-category">
        <h1>Category</h1>
        <ul>
            <?php 
            $categories = get_terms(array(
                'taxonomy' => 'course_category',
                'hide_empty' => true,
            )); 
            foreach($categories as $cat): ?>
                <li>
                    <input type="checkbox" class="filter-category" value="<?php echo $cat->term_id; ?>" id="cat-<?php echo $cat->term_id; ?>">
                    <label for="cat-<?php echo $cat->term_id; ?>"><?php echo $cat->name; ?></label>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Tag / Level -->
    <div class="course-level">
        <h1>Tag</h1>
        <ul>
            <?php 
            $tags = get_terms(array(
                'taxonomy' => 'course_tag',
                'hide_empty' => true,
            )); 
            foreach($tags as $tag): ?>
                <li>
                    <input type="checkbox" class="filter-tag" value="<?php echo $tag->term_id; ?>" id="tag-<?php echo $tag->term_id; ?>">
                    <label for="tag-<?php echo $tag->term_id; ?>"><?php echo $tag->name; ?></label>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Language -->
    <div class="course-language">
        <h1>Language</h1>
        <ul>
            <?php
            // Unique languages from courses meta
            global $wpdb;
            $results = $wpdb->get_col("SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key='language'");
            foreach($results as $lang): ?>
                <li>
                    <input type="checkbox" class="filter-language" value="<?php echo esc_attr($lang); ?>" id="lang-<?php echo sanitize_title($lang); ?>">
                    <label for="lang-<?php echo sanitize_title($lang); ?>"><?php echo esc_html($lang); ?></label>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

</div>

