<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ilogic
 */

 $categories = get_the_category();
 $post_subtitle = get_field('post_subtitle');

get_header();

?>

	<main id="primary" class="site-main">
		<div class="container">
			<?php the_breadcrumb(); ?>
			<?php
			while ( have_posts() ) :
				the_post();
				the_title('<h1 class="il_single_post_title">','</h1>');
				echo $post_subtitle;
				// echo $content;
				echo il_social_share();
				?>
				<div class="il_bp_post_date_category_wrapper">
					<span class="date"><?php echo get_the_date('d M Y'); ?></span>
					<?php
					if(count($categories)){ ?>
						<?php
							foreach($categories as $post_category){
						?>
							<span class="il_bp_post_category"><?php echo $post_category->name; ?></span>
					<?php } 
					}?>
				</div>
				<?php
				get_template_part( 'template-parts/content', get_post_type() ); ?>
				<div class="post_container nav-container">
				<?php the_post_navigation(
					array(
						'prev_text' => '',
						'next_text' => '',
					)
				); ?>
				</div>

			<?php endwhile; // End of the loop.
			?>
		</div>
	</main><!-- #main -->

<?php
get_footer();
