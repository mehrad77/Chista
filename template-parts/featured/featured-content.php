<?php
/**
 * Featured Content Template
 *
 * Queries posts by selected featured category and displays featured posts
 *
 * @package Chronus
 */

// Get Featured Posts category from Database.
$featured_category = chronus_get_option( 'featured_category' );

// Get cached post ids.
$post_ids = chronus_get_magazine_post_ids( 'featured-content', $featured_category, 5 );

// Fetch posts from database.
$query_arguments = array(
	'post__in'            => $post_ids,
	'posts_per_page'      => 5,
	'ignore_sticky_posts' => true,
	'no_found_rows'       => true,
);
$featured_query = new WP_Query( $query_arguments );

// Check if there are posts.
if ( $featured_query->have_posts() ) :

	// Limit the number of words in slideshow post excerpts.
	add_filter( 'excerpt_length', 'chronus_featured_excerpt_length' );
	?>

	<div id="featured-posts-wrap" class="featured-posts-wrap">

		<div id="featured-posts" class="featured-posts clearfix">

			<?php
			// Display Posts.
			while ( $featured_query->have_posts() ) :

				$featured_query->the_post();

				// Display first post differently.
				if ( 0 === $featured_query->current_post ) :

					get_template_part( 'template-parts/featured/featured', 'large-post' );

					echo '<div class="featured-grid-posts clearfix">';

				else :

					get_template_part( 'template-parts/featured/featured', 'small-post' );

				endif;

			endwhile;

			echo '</div><!-- end .featured-grid-posts -->';
			?>

		</div>

	</div>

	<?php
	// Remove excerpt filter.
	remove_filter( 'excerpt_length', 'chronus_featured_excerpt_length' );

endif;

// Reset Postdata.
wp_reset_postdata();
