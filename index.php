<?php

get_header();
if (is_home()) :
	$blog_title = get_field('blog_title', 'option');
	$blog_subtitle = get_field('blog_subtitle', 'option');
	$image = get_field('blog_background', 'option');
	$image_mob = get_field('blog_mobile_background', 'option');
endif;
if(is_category()) :
	$blog_title = get_field('category_blog_title', 'option');
	$blog_subtitle = get_field('category_blog_subtitle', 'option');
	$image = get_field('category_blog_background', 'option');
	$image_mob = get_field('category_blog_mobile_background', 'option');
endif;

$load_more_text = get_field('load_more_button_text', 'option');
$load_more_color = get_field('load_more_button_color', 'option');
$load_more_background = get_field('load_more_button_background', 'option');
?>

	<main id="primary" class="site-main block_space_1_2">
		<div class="il_blog_archive_header">
			<div class="bg_el_wrapper">
				<?php
					$image_atts = [ 'class' => 'bg_element', 'style' => $bg_elem_style];
					echo wp_get_attachment_image( $image, $size, "", $image_atts );

					$image_atts = [ 'class' => 'bg_mob_element', 'style' => $bg_elem_style];
					echo wp_get_attachment_image( $image_mob, $size, "", $image_atts );
				?>
			</div>
			<div class="container">
				<div class="il_blog_archive_header-inner">
					<?php if($blog_title): 
					      $title_color = get_field('blog_title_color', 'option');
					?>
					<h1 <?php echo $title_color ?  'style="color:'.$title_color.'"' : '' ?> class="il_blog_archive_header-title"><?php echo $blog_title; ?></h1>
					<?php endif; 
						if($blog_subtitle): 
						$subtitle_color = get_field('blog_subtitle_color', 'option');
					?>
					<h3 <?php echo $subtitle_color ?  'style="color:'.$subtitle_color.'"' : '' ?> class="il_blog_archive_header-subtitle"><?php echo $blog_subtitle ?></h3>
					<?php endif; ?>
					<img src="<?php echo get_stylesheet_directory_uri().'/assets/icons/dots.svg' ?>" alt="dots">
				</div>
			</div>
		</div>
		
	    <div class="il_blog_archive_content">
			<div class="container">
				<?php if (is_home()) :?>
					<h2><?php echo single_post_title(); ?></h2>
				<?php endif; ?>
				<div class="il_blog_archive_wrapper">
					<div class="il_blog_posts_container_wrapper">
						<div class="il_blog_posts_container">
								<?php
								if ( have_posts() ) :

								/* Start the Loop */
								while ( have_posts() ) :
									the_post(); ?>
										<div class="il_blog_post">
											<div class="il_bp_left">
											<a class="il_bp_title" href="<?php echo get_permalink(get_the_ID()) ?>"><h2 class="tg_title_1 tg_dark"><?php the_title(); ?><?php ?></h2></a>
												<span class="date"><?php echo get_the_date(); ?></span>
												<div class="il_bp_text">
												<?php if (get_the_excerpt()) {
													echo get_the_excerpt();
												} else {
													echo wp_trim_words(get_the_content(), 25);
												} ?>
											</div>
											<a class="il_btn" href="<?php echo get_permalink(get_the_ID()) ?>"><span class="il_btn_text">Read More</span><span class="il_btn_icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="27.109" height="29.565" viewBox="0 0 27.109 29.565"><defs><clipPath id="a"><rect width="24.1" height="17.388" fill="#fec000"></rect></clipPath></defs><g transform="translate(12.05 29.565) rotate(-120)" style="isolation:isolate"><g transform="translate(0 0)" style="mix-blend-mode:multiply;isolation:isolate"><g clip-path="url(#a)"><path d="M23.773,11.863H9.918L3.069,0,0,5.316,6.97,17.388h13.94l3.19-5.525h-.326Z" transform="translate(0 0)" fill="#fec000"></path></g></g></g></svg></span></a>
											</div>
											<div class="il_bp_right">
												<?php the_post_thumbnail(); ?>
											</div>
										</div>

								<?php endwhile;

								// the_posts_navigation();

							endif;
							?>					
						</div>
						<div class="il_archive_more"></div>
							<?php if ($load_more_text): ?>
								<button style="<?php echo $load_more_color ? 'color:'.$load_more_color.';' : ''?> <?php echo $load_more_background ? 'background-color:'.$load_more_background.';' : ''?>" class="il_btn ilLoadMore"><?php echo $load_more_text; ?></button>
							<?php endif; ?>
					</div>
					<div class="il_blog_sidebar">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
