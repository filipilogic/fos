<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ilogic
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="il_blog_hero">
		<div class="il_block_bg il_blog_featured">
		<?php
		$size = 'full';
		if ( has_post_thumbnail() ) {
			the_post_thumbnail($size, array( 'class' => 'desk_bg' ));
		}
		$mob_bg = get_field('post_mob_bg');
			if( $mob_bg ) {
				echo wp_get_attachment_image( $mob_bg, $size, "",array( 'class' => 'mob_bg' ) );
			}
		?>
		</div>
		<div class="il_blog_hero_inner">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1349 446" class="il_blog_hero_svg">
				<defs>
					<clipPath id="clip-path">
					<rect id="Rectangle_910" data-name="Rectangle 910" width="1349" height="446" transform="translate(-22883 326)" fill="#fff" stroke="#707070" stroke-width="1"/>
					</clipPath>
					<linearGradient id="linear-gradient" x1="0.892" y1="0.141" x2="0.037" y2="0.781" gradientUnits="objectBoundingBox">
					<stop offset="0" stop-color="#06286f"/>
					<stop offset="1" stop-color="#021031"/>
					</linearGradient>
				</defs>
				<g id="Mask_Group_261" data-name="Mask Group 261" transform="translate(22883 -326)" clip-path="url(#clip-path)">
					<g id="Group_2117" data-name="Group 2117">
					<path id="Path_1390" data-name="Path 1390" d="M-20618,267V717l143.924-143.5h897.746l306.342-305.431Z" transform="translate(-2265 53)" fill="url(#linear-gradient)"/>
					<path id="Path_1391" data-name="Path 1391" d="M-20640.828,737.834l166.74-164.316h900.125l304.969-304.056" transform="translate(-2265.172 53)" fill="none" stroke="#F21971" stroke-width="5"/>
					</g>
				</g>
			</svg>
			<div class="il_blog_hero_title_wrap">
				<div class="container">
					<h1 class="il_blog_hero_title" style="color: var(--color-2);"><span>Knowledge Center</span>
					</h1>
				</div>
			</div>
		</div>
	</div>

	<div class="entry-content post_container">
		<h1 class="intro_title title-style-1"><?php the_title(); ?></h1>
		<span class="date"><?php echo get_the_date(); ?></span>
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'ilogic' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ilogic' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
