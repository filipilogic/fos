<?php

if ( have_rows('accordion') ) :

	$margin = get_field_object('margin');
	$padding = get_field_object('padding');

	$anchor = 'il_accordion';
	if ( ! empty( $block['anchor'] ) ) {
		$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
	}
	$class = 'il_block il_accordion';
	if ( ! empty( $block['className'] ) ) {
		$class .= ' ' . $block['className'];
	}
	if ( ! empty( $margin ) ) {
		$class .=  ' ' . $margin['value'];
	}

	if ( ! empty( $padding) ) {
		$class .=  ' ' . $padding['value'];
	}

?>
<div id="<?php echo $anchor; ?>"class="<?php echo $class ?>">
<?php get_template_part('components/background'); ?>
	<div class="il_accordion_inner container">
	<?php get_template_part('components/intro');

		$item=1;?>
		<?php while( have_rows('accordion') ) : the_row();

		$accordion_title = get_sub_field('title');
		$accordion_content = get_sub_field('content');

		if($item == 1 && get_field('first_open') ){

			$open = 'open';
			$display = 'display: block';

			}else{
				$open = '';
				$display = 'display: none';
			}
			?>
			<div class="il_accordion-item <?php echo $open ?>">
				<h3 class="il_accordion-header">
					<?php echo $accordion_title; ?>
				</h3>
				<div class="il_accordion-body" style="<?php echo $display ?>">
					<?php echo $accordion_content; ?>
				</div>
			</div>

		<?php $item++;?>
		<?php endwhile; ?>
		</div>
	</div>
<?php endif; ?>
