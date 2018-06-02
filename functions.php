<?php
/**
 * chista functions and definitions
 *
 * @package chista
 */

/**
 * chista only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}


if ( ! function_exists( 'chista_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function chista_setup() {

		// Make theme available for translation. Translations can be filed at https://translate.wordpress.org/projects/wp-themes/chista
		load_theme_textdomain( 'chista', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Set detfault Post Thumbnail size.
		set_post_thumbnail_size( 840, 525, true );

		// Register Navigation Menus.
		register_nav_menus( array(
			'primary'   => esc_html__( 'Main Navigation', 'chista' ),
		) );

		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'chista_custom_background_args', array(
			'default-color' => 'ffffff',
		) ) );

		// Set up the WordPress core custom logo feature.
		add_theme_support( 'custom-logo', apply_filters( 'chista_custom_logo_args', array(
			'height' => 60,
			'width' => 300,
			'flex-height' => true,
			'flex-width' => true,
		) ) );

		// Set up the WordPress core custom header feature.
		add_theme_support( 'custom-header', apply_filters( 'chista_custom_header_args', array(
			'header-text' => false,
			'width'	      => 2560,
			'height'      => 500,
			'flex-width'  => true,
			'flex-height' => true,
		) ) );

		// Add extra theme styling to the visual editor.
		add_editor_style( array( 'css/editor-style.css', get_template_directory_uri() . '/assets/css/custom-fonts.css' ) );

		// Add Theme Support for Selective Refresh in Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'chista_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function chista_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'chista_content_width', 840 );
}
add_action( 'after_setup_theme', 'chista_content_width', 0 );


/**
 * Register widget areas and custom widgets.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function chista_widgets_init() {

	register_sidebar( array(
		'name' => esc_html__( 'Sidebar', 'chista' ),
		'id' => 'sidebar-1',
		'description' => esc_html__( 'Appears on posts and pages except the full width template.', 'chista' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="widget-header"><h3 class="widget-title">',
		'after_title' => '</h3></div>',
	));

	register_sidebar( array(
		'name' => esc_html__( 'Magazine Homepage', 'chista' ),
		'id' => 'magazine-homepage',
		'description' => esc_html__( 'Appears on blog index and Magazine Homepage template. You can use the Magazine widgets here.', 'chista' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-header"><h3 class="widget-title">',
		'after_title' => '</h3></div>',
	));

}
add_action( 'widgets_init', 'chista_widgets_init' );

// ========== load setting page files ========== //
get_template_part('setting-defination');
// ========== load setting page files ========== //

/**
 * Enqueue scripts and styles.
 */
function chista_scripts() {

	// Get Theme Version.
	$theme_version = wp_get_theme()->get( 'Version' );

	// Register and Enqueue Stylesheet.
	wp_enqueue_style( 'chista-stylesheet', get_stylesheet_uri(), array(), $theme_version );

	// Register and enqueue navigation.js.
	wp_enqueue_script( 'chista-jquery-navigation', get_template_directory_uri() . '/assets/js/navigation.min.js', array( 'jquery' ), '20170725' );

	// Passing Parameters to navigation.js.
	wp_localize_script( 'chista-jquery-navigation', 'chista_menu_title', chista_get_svg( 'menu' ) . esc_html__( 'Menu', 'chista' ) );

	// Enqueue svgxuse to support external SVG Sprites in Internet Explorer.
	wp_enqueue_script( 'svgxuse', get_theme_file_uri( '/assets/js/svgxuse.min.js' ), array(), '1.2.4' );

	// Register Comment Reply Script for Threaded Comments.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'chista_scripts' );


/**
 * Enqueue custom fonts.
 */
function chista_custom_fonts() {

	// Register and Enqueue Theme Fonts.
	wp_enqueue_style( 'chista-custom-fonts', get_template_directory_uri() . '/assets/css/custom-fonts.css', array(), '20180413' );

}
add_action( 'wp_enqueue_scripts', 'chista_custom_fonts', 1 );


/**
 * Add custom sizes for featured images
 */
function chista_add_image_sizes() {

	// Add different thumbnail sizes for Magazine Posts widgets.
	add_image_size( 'chista-thumbnail-small', 120, 80, true );
	add_image_size( 'chista-thumbnail-medium', 280, 175, true );
	add_image_size( 'chista-thumbnail-large', 600, 375, true );

}
add_action( 'after_setup_theme', 'chista_add_image_sizes' );


/**
 * Add pingback url on single posts
 */
function chista_pingback_url() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'chista_pingback_url' );

/* must remove this block /*/
// add badge class to catageroy widgets
function bs_categories_list_group_filter ($variable) {
   $variable = str_replace('<li class="cat-item cat-item-', '<li class="list-group-item cat-item cat-item-', $variable);
   $variable = str_replace('(', '<span class="badge"> ', $variable);
   $variable = str_replace(')', ' </span>', $variable);
   return $variable;
}
add_filter('wp_list_categories','bs_categories_list_group_filter');
/* end of must remove this block /*/

/**
 * Include Files
 */

// Include Theme Info page.
require get_template_directory() . '/inc/theme-info.php';

// Include Theme Customizer Options.
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/customizer/default-options.php';

// Include Extra Functions.
require get_template_directory() . '/inc/extras.php';

// Include SVG Icon Functions.
require get_template_directory() . '/inc/icons.php';

// Include Template Functions.
require get_template_directory() . '/inc/template-tags.php';

// Include support functions for Theme Addons.
require get_template_directory() . '/inc/addons.php';

// Include Featured Content Setup.
require get_template_directory() . '/inc/featured-content.php';

// Include Magazine Functions.
require get_template_directory() . '/inc/magazine.php';

// Include Widget Files.
require get_template_directory() . '/inc/widgets/widget-magazine-posts-columns.php';
require get_template_directory() . '/inc/widgets/widget-magazine-posts-grid.php';

// Add custom scripts here
function child_hook_for_wp_head() {?>
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script>
	// ShortLink styles
	<?php if (is_singular()) : ?>
    document.addEventListener("DOMContentLoaded", function(event) { 
        document.getElementById("shortlink").innerHTML = document.getElementById("shortlink").innerHTML + '/';
    });
	<?php endif; ?>

    function copyToClipboard(element) {
        jQuery(function ($) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");
            $temp.remove();
            $.notify.defaults({ className: "success" });
            $("#shortlink").notify("کپی شد",{ position:"left" });
        });
    }

	var toFaDigit = function(digit) {
	var ret = "";
	for (var i = 0, len = digit.length; i < len; i++) {
		if ("0123456789".indexOf(digit.charAt(i)) !== -1) {
		// Is a number
		ret += String.fromCharCode(digit.charCodeAt(i) + 1728);
		} else {
		ret += digit.charAt(i);
		}
	}

	return ret;
	};
	$(document).ready(function() {
	if ($(".page-numbers").length) {
		$(".page-numbers").each(function(index) {
		console.log(index + ": " + $(this).text());
		$(this).text(toFaDigit($(this).text()));
		});
	}

	if ($(".meta-reading-time").length) {
		$(".meta-reading-time").each(function(index) {
		console.log(index + ": " + $(this).text());
		$(this).text(toFaDigit($(this).text()));
		});
	}
	});
</script>
<?php
}

add_action('wp_head', 'child_hook_for_wp_head');

// Hide protected posts
function exclude_protected($where) {
    global $wpdb;
    return $where .= " AND {$wpdb->posts}.post_password = '' ";
}
 
// Where to display protected posts
function exclude_protected_action($query) {
    if( !is_single() && !is_page() && !is_admin() ) {
        add_filter( 'posts_where', 'exclude_protected' );
    }
}

// Action to queue the filter at the right time
add_action('pre_get_posts', 'exclude_protected_action');


function word_count() {
    $content = get_post_field( 'post_content', $post->ID );
    //$word_count = str_word_count( strip_tags( $content ) );
    $word_count = substr_count( $content, ' ' );
    return $word_count / 250.0;
}


// Login page css's
function my_login_logo() { ?>
    <style type="text/css">
    body {
        background-image: linear-gradient(to left bottom, #c50048, #bc368b, #9561bd, #5781d3, #0097d0);
    }
    .login #backtoblog, .login #nav {
      display: none;
    }
    .login form {
      margin-right: 0 !important;
      padding: 0px !important;
      background: #fff0 !important;
      box-shadow: inset -20px -19px 20px 0px rgba(0,0,0,.13) !important;
    }
    .login h1 a {
      background-image: none,url(https://www.nima.today/wp-content/uploads/2018/02/NimaShafiezadeh-300x300.jpg) !important;
      background-size: 90px !important;
      height: 100px !important;
      width: 100px !important;
    }
    .login label {
      color: #ffffff !important;
    }
    @media (min-width: 600px) {
      #login {
        display: inline-flex;
        width: 370px !important;
        padding: 2% 0 0 !important;
        margin: auto !important;
        margin-right: 110px !important;
      }
      .login h1{
        margin-top: 22px;
        margin-left: 10px;
      }
    }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

?>