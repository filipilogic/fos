<?php

get_header();
?>

<?php
	$title = get_field('inner_hero_title');
	$title_color = get_field('title_color');
?>
	<main id="primary" class="site-main block_space_1_2">
		<div class="il_blog_hero">
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
		<div class="container">
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
	</main><!-- #main -->

<?php
get_footer();
