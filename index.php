<?php

get_header();
?>

	<main id="primary" class="site-main block_space_1_2">
		<div class="container">
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

					the_posts_navigation();

				endif;
				?>
			</div>
			<div class="il_blog_sidebar">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
