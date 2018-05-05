<?php
/**
 * The template for displaying large posts in the Magazine Horizontal Box widget.
 *
 * @package chista
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'large-post clearfix' ); ?>>

	<?php chista_post_image( 'chista-thumbnail-large' ); ?>

	<div class="post-content">

		<header class="entry-header">

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php chista_magazine_entry_meta(); ?>

		</header><!-- .entry-header -->

		<div class="entry-content">

			<?php the_excerpt(); ?>
			<?php chista_more_link(); ?>

		</div><!-- .entry-content -->

	</div>

</article>
