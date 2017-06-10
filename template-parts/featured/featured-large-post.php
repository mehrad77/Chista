<?php
/**
 * The template for displaying articles in the slideshow loop
 *
 * @package Chronus
 */

?>

<div class="featured-large-post featured-post-wrap clearfix">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php chronus_featured_post_image( 'post-thumbnail', array( 'class' => 'featured-image' ) ); ?>

		<header class="entry-header">

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php chronus_featured_entry_meta(); ?>

		</header><!-- .entry-header -->

		<div class="entry-content entry-excerpt clearfix">
			<?php the_excerpt(); ?>
			<?php chronus_more_link(); ?>
		</div><!-- .entry-content -->

	</article>

</div>
