<?php
/**
 * The template for displaying posts in the Magazine Sidebar widget
 *
 * @package Chronus
 */

// Get widget settings.
$post_excerpt = get_query_var( 'chronus_post_excerpt', false );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php chronus_post_image(); ?>

	<header class="entry-header">

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php chronus_magazine_entry_meta(); ?>

	</header><!-- .entry-header -->

	<?php // Display post excerpt if enabled.
	if ( $post_excerpt ) : ?>

		<div class="entry-content clearfix">

			<?php the_excerpt(); ?>
			<?php chronus_more_link(); ?>

		</div><!-- .entry-content -->

	<?php endif; ?>

</article>
