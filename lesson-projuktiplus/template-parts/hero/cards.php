<?php
$cards = [
    [
        'bg' => '#FFF9E8',
        'count' => get_theme_mod('uiux_design_count','20'),
        'label' => get_theme_mod('uiux_design_label','UI/UX Design'),
        'svg' => 'uiux-svg', // যদি আলাদা svg রাখতে চাও
    ],
    [
        'bg' => '#FCEFFF',
        'count' => get_theme_mod('development_count','20'),
        'label' => get_theme_mod('development_label_text','Development'),
        'svg' => 'development-svg',
    ],
    [
        'bg' => '#EBEAFF',
        'count' => get_theme_mod('marketing_count','20'),
        'label' => get_theme_mod('marketing_label_text','Marketing'),
        'svg' => 'marketing-svg',
    ],
];

foreach($cards as $index => $card): ?>
<div class="card-items item<?php echo esc_attr($index+1); ?>">
    <!-- SVG can be included here dynamically -->
    <svg width="48" height="48" ...> ... </svg>
    <div class="text">
        <span><?php echo esc_html($card['count']); ?> Courses</span>
        <p><?php echo esc_html($card['label']); ?></p>
    </div>
</div>
<?php endforeach; ?>
