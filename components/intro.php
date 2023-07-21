<?php

$intro_text = get_field('intro_text');
$text_color = get_field('intro_text_color');
$alignment = get_field_object('intro_alignment');
$text_margin_bottom_ld = get_field('text_margin_bottom_ld');
$text_margin_bottom_mt = get_field('text_margin_bottom_mt');
$list_columns = get_field_object('list_columns');

$content_custom_width = get_field('content_custom_width');

$class = 'il_block_intro';
$intro_in_style = 'style="';

if ( ! empty( $alignment) ) {
	$class .=  ' ' . $alignment['value'];
}
if ( ! empty( $list_columns) ) {
	$class .=  ' ' . $list_columns['value'];
}
if ( ! empty( $content_custom_width ) ) {
	$intro_in_style .= 'flex-basis: ' . $content_custom_width . '%;';
}

?>

<!-- Intro Spacing -->
<?php if ( have_rows('intro_spacing_group')) {
	while (have_rows('intro_spacing_group')) {
		the_row();
		$custom_padding = get_sub_field('custom_padding');
		$padding = get_sub_field_object('padding');
		$paddings = '';
		
		if( $custom_padding ) {
		
			if ( have_rows('custom_padding_ld')) {
				while (have_rows('custom_padding_ld')) {
					the_row();
					$padding_top = get_sub_field('padding_top');
					$padding_bottom = get_sub_field('padding_bottom');
					$padding_left = get_sub_field('padding_left');
					$padding_right = get_sub_field('padding_right');
		
					if( ! empty($padding_top) ) {
						$paddings .= ' --b-intro-space-top-ld: ' . $padding_top . ';';
					}
					if( ! empty($padding_bottom) ) {
						$paddings .= ' --b-intro-space-bottom-ld: ' . $padding_bottom . ';';
					}
					if( ! empty($padding_left) ) {
						$paddings .= ' --b-intro-space-left-ld: ' . $padding_left . ';';
					}
					if( ! empty($padding_right) ) {
						$paddings .= ' --b-intro-space-right-ld: ' . $padding_right . ';';
					}
				}
			}
			if ( have_rows('custom_padding_mt')) {
				while (have_rows('custom_padding_mt')) {
					the_row();
					$padding_top = get_sub_field('padding_top');
					$padding_bottom = get_sub_field('padding_bottom');
					$padding_left = get_sub_field('padding_left');
					$padding_right = get_sub_field('padding_right');
		
					if( ! empty($padding_top) ) {
						$paddings .= ' --b-intro-space-top-mt: ' . $padding_top . ';';
					}
					if( ! empty($padding_bottom) ) {
						$paddings .= ' --b-intro-space-bottom-mt: ' . $padding_bottom . ';';
					}
					if( ! empty($padding_left) ) {
						$paddings .= ' --b-intro-space-left-mt: ' . $padding_left . ';';
					}
					if( ! empty($padding_right) ) {
						$paddings .= ' --b-intro-space-right-mt: ' . $padding_right . ';';
					}
				}
			}
		}
	}
	$intro_in_style .= $paddings;
	
	if ( ! empty( $padding) ) {
		$class .=  ' ' . $padding['value'];
	}
}
?>

<div class="<?php echo $class; ?>" <?php if ( ! empty( $content_custom_width ) || ! empty(get_field('intro_spacing_group'))) { echo $intro_in_style . '"'; } ?>>

<!-- Intro Background -->
<?php if ( have_rows('intro_background_group')) {
	while (have_rows('intro_background_group')) {
		the_row();
		get_template_part('components/intro-background');
	}
}
?>

<?php 
$image_before_content = get_field('image_before_content');
$size = 'full';

if( $image_before_content ) { ?>
	<div class="image-before-content <?php echo $alignment['value']; ?>">
		<?php echo wp_get_attachment_image( $image_before_content, $size, false ); ?>
	</div>
<?php }
	get_template_part('components/title');
	get_template_part('components/subtitle');

if( $intro_text ) { 

	$text_style = 'style="';

	if ( ! empty($text_margin_bottom_ld) ) {
		$text_style .= '--text_margin_bottom_ld: ' . $text_margin_bottom_ld . ';';
	}
	if ( ! empty($text_margin_bottom_mt) ) {
		$text_style .= '--text_margin_bottom_mt: ' . $text_margin_bottom_mt . ';';
	}

	$text_style .= '"';
	?>
	<div class="intro_text <?php echo $text_color; ?>" <?php if( ! empty($text_margin_bottom_ld) || ! empty($text_margin_bottom_mt) ) { echo $text_style; } ?>>
		<?php echo $intro_text; ?>
	</div>
<?php }
	
	get_template_part('components/buttons'); 

	$image_after_content = get_field('image_after_content');
	$size = 'full';

	if( $image_after_content ) { ?>
		<div class="image_after_content <?php echo $alignment['value']; ?>">
			<?php echo wp_get_attachment_image( $image_after_content, $size, false ); ?>
		</div>
	<?php } ?>

</div>