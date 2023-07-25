<?php
/**
 * ilogic functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ilogic
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.6' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ilogic_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'ilogic' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);


	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 150,
			'width'       => 300,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'ilogic_setup' );

/**
 * Enqueue scripts and styles.
 */
function ilogic_scripts() {
	wp_enqueue_style( 'ilogic-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_style( 'frontend-style', get_template_directory_uri() . '/assets/public/css/frontend.css', array(), _S_VERSION );
	wp_enqueue_script( 'ilogic-script', get_template_directory_uri() . '/assets/public/js/frontend.js', array('jquery'), _S_VERSION );

	wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/assets/public/js/vendor/fancybox.js',array('jquery'),_S_VERSION,true);
	wp_enqueue_script( 'flickity', get_template_directory_uri() . '/assets/public/js/vendor/flickity.js',array('jquery'),_S_VERSION,true);
}
add_action( 'wp_enqueue_scripts', 'ilogic_scripts' );

function ilogic_admin_styles() {
	wp_enqueue_style( 'backend-styles', get_template_directory_uri() . '/assets/public/css/backend.css' );
}
add_action( 'admin_enqueue_scripts', 'ilogic_admin_styles' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/theme-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/includes/theme-functions.php';

// Theme options

require get_template_directory() . '/includes/theme-options.php';

// Fun Facts

require get_template_directory() . '/includes/theme-facts.php';


// Load scripts for block


 require get_template_directory() . '/includes/blocks-js.php';


// Register Blocks

add_action( 'init', 'register_acf_blocks' );
function register_acf_blocks() {
	register_block_type( __DIR__ . '/blocks/hero' );
	register_block_type( __DIR__ . '/blocks/hero-si' );
    register_block_type( __DIR__ . '/blocks/section' );
	register_block_type( __DIR__ . '/blocks/accordion' );
	register_block_type( __DIR__ . '/blocks/gallery' );
	register_block_type( __DIR__ . '/blocks/team' );
	register_block_type( __DIR__ . '/blocks/columns' );
	register_block_type( __DIR__ . '/blocks/tabs' );
	register_block_type( __DIR__ . '/blocks/lb-carousel' );
	register_block_type( __DIR__ . '/blocks/timeline' );
	register_block_type( __DIR__ . '/blocks/inner-hero-1' );
	register_block_type( __DIR__ . '/blocks/inner-hero-2' );
	register_block_type( __DIR__ . '/blocks/fp-section' );
	register_block_type( __DIR__ . '/blocks/mini-gallery' );
	register_block_type( __DIR__ . '/blocks/video-popup-section' );
	register_block_type( __DIR__ . '/blocks/contact-us' );
	register_block_type( __DIR__ . '/blocks/exec-director-section' );
	register_block_type( __DIR__ . '/blocks/countdown' );
	register_block_type( __DIR__ . '/blocks/agenda' );
	register_block_type( __DIR__ . '/blocks/blog-block' );
}


function filter_block_categories_when_post_provided( $block_categories, $editor_context ) {
    if ( ! empty( $editor_context->post ) ) {
        array_push(
            $block_categories,
            array(
                'slug'  => 'ilogic-category',
                'title' => __( 'iLogic Blocks', 'ilogic' ),
                'icon'  => null,
            )
        );
    }
    return $block_categories;
}

add_filter( 'block_categories_all', 'filter_block_categories_when_post_provided', 10, 2 );

function custom_dynamic_category_choices($field) {
	// Check if the field is the one you want to modify (using the field's name)
	if ($field['name'] === 'pick_a_category_blog_block') {
	  // Get the categories from WordPress
	  $categories = get_categories();
  
	  // Prepare choices array based on the retrieved categories
	  $choices = array();
	  foreach ($categories as $category) {
		$choices[$category->term_id] = $category->name;
	  }
  
	  // Update the field choices with the dynamic values
	  $field['choices'] = $choices;
	}
  
	return $field;
  }
  add_filter('acf/load_field', 'custom_dynamic_category_choices');


  /*
  * Action for load more posts
  */

  function blog_load_more() {

	$postCategory = (isset($_GET['postCategory'])) ? $_GET['postCategory'] : 'all';

	if($postCategory === 'all'){

		$countPosts = (isset($_GET['countPosts'])) ? $_GET['countPosts'] : 3;

		$the_query = new WP_Query(array(
			'orderby' => 'date',
			'order'   => 'DESC',
			'posts_per_page' =>$countPosts ,
			'post_status'      => 'publish',
			'offset'          => 3
		));

		// $count_posts = wp_count_posts();
		$count_posts =  $the_query->found_posts;
		$postLimit = intval($countPosts) + 3;

	}else{
		$countPosts = (isset($_GET['countPosts'])) ? $_GET['countPosts'] : 6;
		
		$the_query = new WP_Query(array(
			'orderby' => 'date',
			'category_name' => $postCategory,
			'order'   => 'DESC',
			'posts_per_page' =>$countPosts ,
			'post_status'      => 'publish',
			'offset'          => 6
		  ));

		// $count_posts = wp_count_posts();
		$count_posts =  $the_query->found_posts;
		$postLimit = intval($countPosts) + 6;
	}
		
	



	if($postLimit >= intval($count_posts)){
	  echo '<style>.ilLoadMore{display:none !important;}</style>';
	}
  
	if ($the_query->have_posts()) {
		while ($the_query->have_posts()){
			$the_query->the_post();
		  $post_categories = get_the_category();
		  ?>
		  	<div class="il_blog_post">
				<div class="il_bp_left">
				<div class="il_bp_post_date_category_wrapper">
					<span class="date"><?php echo get_the_date('d M Y'); ?></span>
					<?php
					if(count($post_categories)){ ?>
						
						<?php
							foreach($post_categories as $post_category){
						?>
							<span class="il_bp_post_category"><?php echo $post_category->name; ?></span>
					<?php } ?>

					<?php
					}
					?>
				</div>
				<a class="il_bp_title" href="<?php echo get_permalink(get_the_ID()) ?>"><h2 class="tg_title_1 tg_dark"><?php the_title(); ?><?php ?></h2></a>
					<div class="il_bp_text">
					<?php if (get_the_excerpt()) {
						echo get_the_excerpt();
					} else {
						echo wp_trim_words(get_the_content(), 25);
					} ?>
				</div>
				<a class="il_bp_link" href="<?php echo get_permalink(get_the_ID()) ?>"><span class="il_bp_link_text">Learn More</span></a>
				</div>
				<div class="il_bp_right">
					<?php the_post_thumbnail(); ?>
				</div>
			</div>
		  <?php
		}
	}
  
	  wp_die();
  }
  
  add_action('wp_ajax_blog_load_more', 'blog_load_more');
  add_action('wp_ajax_nopriv_blog_load_more', 'blog_load_more');

  add_filter('pre_get_posts', 'posts_in_category');

function posts_in_category($query){
    if ($query->is_category) {
		$query->set('posts_per_archive_page', 6);
    }

}