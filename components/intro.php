<?php

$intro_text = get_field('intro_text');
$text_color = get_field_object('intro_text_color');
$alignment = get_field_object('intro_alignment');

$class = 'il_block_intro';

if ( ! empty($text_color) ) {
	$class .=  ' ' . $text_color['value'];
}
if ( ! empty( $alignment) ) {
	$class .=  ' ' . $alignment['value'];
}

?>

<div class="<?php echo $class; ?>">

<?php get_template_part('components/title');

if( $intro_text ) { ?>
	<div class="intro_text">
		<?php echo $intro_text; ?>
	</div>
<?php } ?>

</div>