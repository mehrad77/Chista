<?php
/**
 * Featured Content Setup
 *
 * Includes features post excerpt length and template functions
 *
 * The template for displaying the featured posts can be found under /template-parts/featured/
 *
 * @package Chronus
 */


/**
* Display Featured Content Area
*/
function chronus_featured_content() {

	// Display post slider only if activated.
	if ( true === chronus_get_option( 'featured_posts' ) && is_front_page() ) :

		echo '<div id="featured-content" class="content">';
		get_template_part( 'template-parts/featured/featured-content' );
		echo '</div>';

	elseif ( is_customize_preview() ) :
		echo '<div id="featured-content" class="content"></div>';
	endif;
}

/**
 * Function to change excerpt length for featured posts
 *
 * @param int $length Length of excerpt in number of words.
 * @return int
 */
function chronus_featured_excerpt_length( $length ) {
	return 15;
}


if ( ! function_exists( 'chronus_featured_post_image' ) ) :
	/**
	 * Displays the featured image of the post as slider image
	 *
	 * @param string $size Post thumbnail size.
	 * @param array  $attr Post thumbnail attributes.
	 */
	function chronus_featured_post_image( $size = 'post-thumbnail', $attr = array() ) {

		// Display Post Thumbnail.
		if ( has_post_thumbnail() ) : ?>

			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php the_post_thumbnail( $size, $attr ); ?>
			</a>

		<?php else : ?>

			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-featured-image.png" class="featured-image default-featured-image wp-post-image" />
			</a>

		<?php endif;
	}
endif;


if ( ! function_exists( 'chronus_featured_entry_meta' ) ) :
	/**
	 * Displays the date and author on featured posts
	 */
	function chronus_featured_entry_meta() {

		$postmeta = chronus_meta_date();
		$postmeta .= chronus_meta_author();

		echo '<div class="entry-meta">' . $postmeta . '</div>';

	}
endif;
