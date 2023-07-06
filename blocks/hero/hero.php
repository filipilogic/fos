<?php
$subtitle = get_field('subtitle');
$content = get_field('content');
$height = get_field_object('height');
$margin = get_field_object('margin');
$padding = get_field_object('padding');

$class = 'il_block il_hero';
if ( ! empty( $block['className'] ) ) {
    $class .= ' ' . $block['className'];
}
if ( ! empty( $height ) ) {
    $class .=  ' ' . $height['value'];
}

if ( ! empty( $margin ) ) {
    $class .=  ' ' . $margin['value'];
}

if ( ! empty( $padding) ) {
    $class .=  ' ' . $padding['value'];
}
?>

<div class="<?php echo $class; ?>">
<?php get_template_part('components/background'); ?>
	<div class="container il_hero_inner">
	<?php get_template_part('components/title'); ?>
	<h2 class="il_hero_subtitle"><?php echo $subtitle ?></h2>
	<div><?php echo $content ?></div>
	<?php get_template_part('components/buttons'); ?>
	</div>
</div>
