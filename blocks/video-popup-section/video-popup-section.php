<?php
$layout = get_field_object('layout');
$stack = get_field_object('stack');

$margin = get_field_object('margin');
$padding = get_field_object('padding');

$border_top_left_radius = get_field('border_top_left_radius');
$border_top_right_radius = get_field('border_top_right_radius');
$border_bottom_left_radius = get_field('border_bottom_left_radius');
$border_bottom_right_radius = get_field('border_bottom_right_radius');

$blue_gradient = get_field('blue_gradient');

$class = 'il_block il_video-popup-section';
if ( ! empty( $block['className'] ) ) {
    $class .= ' ' . $block['className'];
}
if ( $blue_gradient ) {
    $class .= ' ' . 'has-blue-gradient';
}
if ( ! empty( $margin ) ) {
    $class .=  ' ' . $margin['value'];
}

if ( ! empty( $padding) ) {
    $class .=  ' ' . $padding['value'];
}

$sec_in_class = 'il_section_inner container';
if ( ! empty( $layout ) ) {
    $sec_in_class .=  ' ' . $layout['value'];
}
if ( ! empty( $stack ) ) {
    $sec_in_class .=  ' ' . $stack['value'];
}

?>


<div class="<?php echo $class; ?>">
<?php get_template_part('components/background'); ?>
<div class="<?php echo $sec_in_class ?>">
<?php get_template_part('components/intro'); ?>
<div class="right">
	
	<?php while( have_rows('videos') ) : the_row();
		$image = get_sub_field('media');
		$video_link = get_sub_field('video_link');
	
		if( $video_link ): ?>
			<div class="column">
				<a data-fancybox='video' data-type="iframe" data-preload="true" data-width="1270" data-height="720" href="<?php echo $video_link; ?>"  rel="lightbox">
				<?php if( $image ) {
					$size = 'full';
					$img_style = [ 'style' => 'border-top-left-radius: ' . $border_top_left_radius . 'px; border-top-right-radius: ' . $border_top_right_radius . 'px; border-bottom-left-radius: ' . $border_bottom_left_radius . 'px; border-bottom-right-radius: ' . $border_bottom_right_radius . 'px;' ];
					echo wp_get_attachment_image( $image, $size, false, $img_style );
				} ?>
				</a>
			</div>
		<?php endif; ?>
	<?php endwhile; ?>

	</div>


	<?php if ( have_rows('buttons_after_videos_group')) { ?>
		<div class="buttons-after-videos">
			<?php while (have_rows('buttons_after_videos_group')) {
				the_row();
				get_template_part('components/buttons');
			} ?>
		</div>
	<?php } ?>
</div>
</div>
