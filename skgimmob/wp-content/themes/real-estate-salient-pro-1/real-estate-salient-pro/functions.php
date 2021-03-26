<?php
/**
 * Functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package real-estate-salient-pro
 */


/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 *
 */
function real_estate_salient_pro_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'real_estate_salient_pro_content_width', 850 );
}
add_action( 'after_setup_theme', 'real_estate_salient_pro_content_width', 0 );


if ( ! function_exists( 'real_estate_salient_pro_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function real_estate_salient_pro_setup() {
	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	*/
	add_theme_support( 'title-tag' );

	/**
	* Add default support for add feed on head
	*/
	add_theme_support( 'automatic-feed-links' );

	/**
	* Add default support for thumbnails 
	*/
	add_theme_support('post-thumbnails');

	/**
	* Add image size
	*/
	add_image_size('real-estate-salient-pro-index', 850, 600, true);
	add_image_size('real-estate-salient-pro-featured', 660, 360, true);
	add_image_size('real-estate-salient-pro-slider', 1350, 550, true);

	/**
	* Enable navigational menu 
	* real_estate_salient_pro theme use one navigation menu
	* @link https://codex.wordpress.org/Function_Reference/register_nav_menus
	*/
	register_nav_menus(array('catnav' => __('Category menu', 'real-estate-salient-pro')));

	/*
	 * Enable support for custom logo.
	 */
	add_theme_support( 'custom-logo', array('height'=> 60,'width'=> 220,'flex-height' => true,'header-text' => array( 'site-title', 'site-description' ),));



}
endif;
add_action( 'after_setup_theme', 'real_estate_salient_pro_setup' );



/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists ( 'real_estate_salient_pro_enqueues' ) ) {
	function real_estate_salient_pro_enqueues() {			
		// styles
		wp_enqueue_style( 'bootstrap-css', get_template_directory_uri(). '/css/bootstrap.min.css', array());				
		wp_enqueue_style( 'font-awesome-css', get_template_directory_uri(). '/css/fontawesomeall.min.css', array());
		wp_enqueue_style( 'flexslider', get_template_directory_uri(). '/css/flexslider.css', array());
		wp_enqueue_style( 'animate-css', get_template_directory_uri(). '/css/animate.min.css', array());
		wp_enqueue_style( 'two-css', get_template_directory_uri(). '/css/hometwo.css', array());
		wp_enqueue_style( 'real-estate-salient-pro-barlow', '//fonts.googleapis.com/css?family=Barlow:400,600,700,700i,800,800i,900,900i&display=swap', array());
		wp_enqueue_style( 'real-estate-salient-pro-aos', '//unpkg.com/aos@next/dist/aos.css', array());
		wp_enqueue_style( 'custom-two-css', get_template_directory_uri(). '/css/customproperty.css', array());
		wp_enqueue_style( 'custom-agent-css', get_template_directory_uri(). '/css/agent.css', array());
		wp_enqueue_style( 'real-estate-salient-pro-style', get_stylesheet_uri());
		
		//scripts
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery') );
		wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery'));
		wp_enqueue_script( 'carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'));
		wp_enqueue_script( 'animate', get_template_directory_uri() . '/js/owl.animate.js', array('jquery'));
		wp_enqueue_script( 'cycle-two', get_template_directory_uri() . '/js/jquery.cycle2.min.js', array('jquery'));
		wp_enqueue_script( 'cycle-carousel', get_template_directory_uri() . '/js/jquery.cycle2.carousel.min.js', array('jquery'));
		wp_enqueue_script( 'real-estate-salient-pro-aos', '//unpkg.com/aos@next/dist/aos.js', array('jquery'));
		wp_enqueue_script( 'real-estate-salient-pro-counter', get_template_directory_uri() . '/js/jquery.rcounterup.js', array('jquery'));
		wp_enqueue_script( 'real-estate-salient-pro-waypoints', get_template_directory_uri() . '/js/jquery.waypoints.js', array('jquery'));
		wp_enqueue_script( 'real-estate-salient-pro-menu', get_template_directory_uri() . '/js/jquery.menu.js', array('jquery'));
		wp_enqueue_script( 'cycle-two-tile', get_template_directory_uri() . '/js/jquery.cycle2.tile.min.js', array('jquery'));
		wp_enqueue_script( 'cycle-two-flip', get_template_directory_uri() . '/js/jquery.cycle2.flip.min.js', array('jquery'));
		
		wp_enqueue_script( 'real-estate-salient-pro-custom', get_template_directory_uri() . '/js/custom.js', array('jquery') );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	}
}
add_action( 'wp_enqueue_scripts', 'real_estate_salient_pro_enqueues' );


/**
* Adjust excerpt length
* Default WordPress excerpt length doesn't look good with theme
* Hense adjusting upon our need
*/
function real_estate_salient_pro_excerpt_length( $length ) {
	if ( is_admin() ) {
		return $length;
	}
	return 40;
}
add_filter( 'excerpt_length', 'real_estate_salient_pro_excerpt_length', 999 );



/**
* Adjust excerpt 
* Remove read more link
*/
function real_estate_salient_pro_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	}
	return '';														
}
add_filter('excerpt_more', 'real_estate_salient_pro_excerpt_more');

/**
 * Register sidebar
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function real_estate_salient_pro_sidebar() {
register_sidebar (array (
	'name' => __( 'Sidebar widgets', 'real-estate-salient-pro' ),
	'id' => 'general-sidebar',
	'description' => __( 'Place your sidebar widgets here.', 'real-estate-salient-pro' ),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<div class="wi-title clearfix"><h3 class="w-title">',
	'after_title' => '</h3></div>',
));
register_sidebar (array (
	'name' => __( 'Footer Widget Left', 'real-estate-salient-pro' ),
	'id' => 'footleft-sidebar',
	'description' => __( 'Place your first footer widgets here.', 'real-estate-salient-pro' ),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<div class="wi-title clearfix"><h3 class="w-title">',
	'after_title' => '</h3></div>',
));
register_sidebar (array (
	'name' => __( 'Footer Widget Middle', 'real-estate-salient-pro' ),
	'id' => 'footmiddle-sidebar',
	'description' => __( 'Place your second footer widgets here.', 'real-estate-salient-pro' ),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<div class="wi-title clearfix"><h3 class="w-title">',
	'after_title' => '</h3></div>',
));
register_sidebar (array (
	'name' => __( 'Footer Widget Right', 'real-estate-salient-pro' ),
	'id' => 'footright-sidebar',
	'description' => __( 'Place your third footer widgets here.', 'real-estate-salient-pro' ),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<div class="wi-title clearfix"><h3 class="w-title">',
	'after_title' => '</h3></div>',
));
}
add_action( 'widgets_init', 'real_estate_salient_pro_sidebar' );


/**
 * Comment settings
 */
function real_estate_salient_pro_comment($comment, $args, $depth) {	
	
	if (get_comment_type() == 'pingback' || get_comment_type() == 'trackback') : ?>
	
	<?php elseif (get_comment_type() == 'comment') :?>
		<li id="comment-<?php comment_ID();?>">
			<div <?php comment_class('comment-post'); ?>>
				<div class="comment-author">
					<?php echo get_avatar($comment, 70);?>
				</div>
				<div class="comment-content">
					<div class="comment-meta">
						<?php echo get_comment_author_link();?>						
						<p><?php comment_date();?></p>
					</div>
					<div class="comment-text">
						<?php comment_text(); ?>
					</div>
					<span class="bg-color" >
					<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
					</span>
					<hr/>
				</div>				
			</div>				
		</li>
	<?php endif;
}


/**
* Customizer additions.
*/
require_once( get_template_directory() . '/inc/template-tags.php' );
require_once( get_template_directory() . '/inc/loader.php' );
require( get_template_directory() . '/inc/customizer/customizer.php' );
require( get_template_directory() . '/inc/tgmpa-function.php' );


function real_estate_salient_pro_theme_demo() {
	return array(
		array(
			'import_file_name'           => 'Demo Import 1',
			'local_import_file'          => trailingslashit( get_template_directory() ) . 'demo/demo11.xml',
			'local_import_widget_file'   => trailingslashit( get_template_directory() ) . 'demo/demo11.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo/demo11.dat',
			'import_preview_image_url'   => get_template_directory_uri(). '/demo/demo1.png',
			'import_notice'              => __( 'After you import this demo, you will have to setup google map. Appearance -> Real Estate Options -> Google map and put a API key', 'your-textdomain' ),
		),
		array(
			'import_file_name'           => 'Demo Import 2',
			'local_import_file'          => trailingslashit( get_template_directory() ) . 'demo/demo11.xml',
			'local_import_widget_file'   => trailingslashit( get_template_directory() ) . 'demo/demo11.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo/demo22.dat',
			'import_preview_image_url'   => get_template_directory_uri(). '/demo/demo2.png',
			'import_notice'              => __( 'After you import this demo, you will have to setup google map. Appearance -> Real Estate Options -> Google map and put a API key', 'your-textdomain' ),
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'real_estate_salient_pro_theme_demo' );

function real_estate_salient_pro_theme_demo_after_import_setup() {
	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'catnav' => $main_menu->term_id, // replace 'main-menu' here with the menu location identifier from register_nav_menu() function
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'home' );
	$blog_page_id  = get_page_by_title( 'blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'real_estate_salient_pro_theme_demo_after_import_setup' );