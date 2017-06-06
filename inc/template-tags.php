<?php
/**
 * Template Tags
 *
 * This file contains several template functions which are used to print out specific HTML markup
 * in the theme. You can override these template functions within your child theme.
 *
 * @package Chronus
 */

if ( ! function_exists( 'chronus_site_logo' ) ) :
	/**
	 * Displays the site logo in the header area
	 */
	function chronus_site_logo() {

		if ( function_exists( 'the_custom_logo' ) ) {

			the_custom_logo();

		}
	}
endif;


if ( ! function_exists( 'chronus_site_title' ) ) :
	/**
	 * Displays the site title in the header area
	 */
	function chronus_site_title() {

		if ( is_home() or is_page_template( 'template-magazine.php' )  ) : ?>

			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

		<?php else : ?>

			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>

		<?php
		endif;
	}
endif;


if ( ! function_exists( 'chronus_site_description' ) ) :
	/**
	 * Displays the site description in the header area
	 */
	function chronus_site_description() {

		$description = get_bloginfo( 'description', 'display' ); /* WPCS: xss ok. */

		if ( $description || is_customize_preview() ) : ?>

			<p class="site-description"><?php echo $description; ?></p>

		<?php
		endif;
	}
endif;


if ( ! function_exists( 'chronus_header_image' ) ) :
	/**
	 * Displays the custom header image below the navigation menu
	 */
	function chronus_header_image() {

		// Get theme options from database.
		$theme_options = chronus_theme_options();

		// Display featured image as header image on static pages.
		if ( get_header_image() ) :

			// Hide header image on front page.
			if ( true === $theme_options['custom_header_hide'] and is_front_page() ) {
				return;
			}
			?>

			<div id="headimg" class="header-image">

			<?php // Check if custom header image is linked.
			if ( '' !== $theme_options['custom_header_link'] ) : ?>

				<a href="<?php echo esc_url( $theme_options['custom_header_link'] ); ?>">
					<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id, 'full' ) ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				</a>

			<?php else : ?>

				<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id, 'full' ) ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">

			<?php endif; ?>

			</div>

		<?php
		endif;
	}
endif;


if ( ! function_exists( 'chronus_blog_title' ) ) :
	/**
	 * Displays the archive title and archive description for the blog index
	 */
	function chronus_blog_title() {

		// Get theme options from database.
		$theme_options = chronus_theme_options();

		// Display Blog Title.
		if ( '' !== $theme_options['blog_title'] ) : ?>

			<header class="page-header clearfix">

				<h1 class="archive-title"><?php echo wp_kses_post( $theme_options['blog_title'] ); ?></h1>

				<?php // Display Blog Description
				if ( '' !== $theme_options['blog_description'] ) : ?>

					<p class="homepage-description"><?php echo wp_kses_post( $theme_options['blog_description'] ); ?></p>

				<?php endif; ?>

			</header>

		<?php endif;
	}
endif;


if ( ! function_exists( 'chronus_post_image' ) ) :
	/**
	 * Displays the featured image on archive posts.
	 *
	 * @param string $size Post thumbnail size.
	 * @param array  $attr Post thumbnail attributes.
	 */
	function chronus_post_image( $size = 'post-thumbnail', $attr = array() ) {

		// Display Post Thumbnail.
		if ( has_post_thumbnail() ) : ?>

			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php the_post_thumbnail( $size, $attr ); ?>
			</a>

		<?php
		endif;
	}
endif;


if ( ! function_exists( 'chronus_post_image_single' ) ) :
	/**
	 * Displays the featured image on single posts
	 */
	function chronus_post_image_single() {

		// Get theme options from database.
		$theme_options = chronus_theme_options();

		// Display Post Thumbnail if activated.
		if ( true === $theme_options['post_image_single'] ) :

			the_post_thumbnail();

		endif;
	}
endif;


if ( ! function_exists( 'chronus_entry_meta' ) ) :
	/**
	 * Displays the date, author and categories of a post
	 */
	function chronus_entry_meta() {

		$postmeta = chronus_meta_date();
		$postmeta .= chronus_meta_author();

		echo '<div class="entry-meta">' . $postmeta . '</div>';
	}
endif;


if ( ! function_exists( 'chronus_meta_date' ) ) :
	/**
	 * Displays the post date
	 */
	function chronus_meta_date() {

		$time_string = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date published updated" datetime="%3$s">%4$s</time></a>',
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		$posted_on = sprintf( esc_html_x( 'Posted on %s', 'post date', 'chronus' ), $time_string );

		return '<span class="meta-date">' . $posted_on . '</span>';
	}
endif;


if ( ! function_exists( 'chronus_meta_author' ) ) :
	/**
	 * Displays the post author
	 */
	function chronus_meta_author() {

		$author_string = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( esc_html__( 'View all posts by %s', 'chronus' ), get_the_author() ) ),
			esc_html( get_the_author() )
		);

		$posted_by = sprintf( esc_html_x( 'by %s', 'post author', 'chronus' ), $author_string );

		return '<span class="meta-author"> ' . $posted_by . '</span>';
	}
endif;


if ( ! function_exists( 'chronus_entry_categories' ) ) :
	/**
	 * Displays the category of posts
	 */
	function chronus_entry_categories() {
		?>

		<div class="entry-categories clearfix">
			<span class="meta-categories">
				<?php echo get_the_category_list( ' ' ); ?>
			</span>
		</div><!-- .entry-categories -->

		<?php
	}
endif;


if ( ! function_exists( 'chronus_entry_tags' ) ) :
	/**
	 * Displays the post tags on single post view
	 */
	function chronus_entry_tags() {

		// Get tags.
		$tag_list = get_the_tag_list( esc_html__( 'Tagged with ', 'chronus' ), ', ' );

		// Display tags.
		if ( $tag_list ) : ?>

			<div class="entry-tags clearfix">
				<span class="meta-tags">
					<?php echo $tag_list; ?>
				</span>
			</div><!-- .entry-tags -->

		<?php
		endif;
	}
endif;


if ( ! function_exists( 'chronus_entry_comments' ) ) :
	/**
	 * Displays the post comments
	 */
	function chronus_entry_comments() {

		// Start Output Buffering.
		ob_start();

		// Display Comments.
		comments_popup_link( esc_html__( 'Leave a comment', 'chronus' ), esc_html__( 'One comment', 'chronus' ), esc_html__( '% comments', 'chronus' ) );
		$comments = ob_get_contents();

		// End Output Buffering.
		ob_end_clean();

		echo '<span class="meta-comments"> ' . $comments . '</span>';
	}
endif;


if ( ! function_exists( 'chronus_more_link' ) ) :
	/**
	 * Displays the more link on posts
	 */
	function chronus_more_link() {
		?>

		<a href="<?php echo esc_url( get_permalink() ) ?>" class="more-link"><?php esc_html_e( 'Continue reading &raquo;', 'chronus' ); ?></a>

		<?php
	}
endif;


if ( ! function_exists( 'chronus_post_navigation' ) ) :
	/**
	 * Displays Single Post Navigation
	 */
	function chronus_post_navigation() {

		// Get theme options from database.
		$theme_options = chronus_theme_options();

		if ( true === $theme_options['post_navigation'] || is_customize_preview() ) {

			the_post_navigation( array(
				'prev_text' => '<span class="nav-link-text">' . esc_html_x( 'Previous Post', 'post navigation', 'chronus' ) . '</span><h3 class="entry-title">%title</h3>',
				'next_text' => '<span class="nav-link-text">' . esc_html_x( 'Next Post', 'post navigation', 'chronus' ) . '</span><h3 class="entry-title">%title</h3>',
			) );

		}
	}
endif;


if ( ! function_exists( 'chronus_breadcrumbs' ) ) :
	/**
	 * Displays ThemeZee Breadcrumbs plugin
	 */
	function chronus_breadcrumbs() {

		if ( function_exists( 'themezee_breadcrumbs' ) ) {

			themezee_breadcrumbs( array(
				'before' => '<div class="breadcrumbs-container container clearfix">',
				'after' => '</div>',
			) );

		}
	}
endif;


if ( ! function_exists( 'chronus_related_posts' ) ) :
	/**
	 * Displays ThemeZee Related Posts plugin
	 */
	function chronus_related_posts() {

		if ( function_exists( 'themezee_related_posts' ) ) {

			themezee_related_posts( array(
				'class' => 'related-posts type-page clearfix',
				'before_title' => '<h2 class="archive-title related-posts-title">',
				'after_title' => '</h2>',
			) );

		}
	}
endif;


if ( ! function_exists( 'chronus_pagination' ) ) :
	/**
	 * Displays pagination on archive pages
	 */
	function chronus_pagination() {

		the_posts_pagination( array(
			'mid_size'  => 2,
			'prev_text' => '&laquo<span class="screen-reader-text">' . esc_html_x( 'Previous Posts', 'pagination', 'chronus' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . esc_html_x( 'Next Posts', 'pagination', 'chronus' ) . '</span>&raquo;',
		) );

	}
endif;


/**
 * Displays credit link on footer line
 */
function chronus_footer_text() {
	?>

	<span class="credit-link">
		<?php printf( esc_html__( 'Powered by %1$s and %2$s.', 'chronus' ),
			'<a href="' . esc_url( __( 'http://wordpress.org', 'chronus' ) ) . '" title="WordPress">WordPress</a>',
			'<a href="https://themezee.com/themes/chronus/" title="Chronus WordPress Theme">Chronus</a>'
		); ?>
	</span>

	<?php
}
add_action( 'chronus_footer_text', 'chronus_footer_text' );
