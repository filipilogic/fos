<?php

$title = get_field('title');
$tag = get_field('heading_tag');
$title_color = get_field('title_color');
$style = get_field('title_style');

if( $title ) { ?>
<<?php echo esc_html($tag); ?> class="intro_title <?php echo $style; ?>" style="color: <?php echo $title_color; ?>;"><?php echo $title; ?></<?php echo esc_html($tag); ?>>
<?php }