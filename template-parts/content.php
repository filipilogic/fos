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


<?php get_template_part('components/title'); ?>
		<?php get_template_part('components/subtitle'); ?>
		<?php get_template_part('components/background'); ?>

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
