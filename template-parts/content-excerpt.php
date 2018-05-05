<?php
/**
 * The template for displaying articles in the loop with post excerpts
 *
 * @package chista
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php chista_post_image_archives(); ?>

	<header class="entry-header">

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php chista_entry_meta(); ?>

	</header><!-- .entry-header -->

	<div class="entry-content entry-excerpt clearfix">
		<?php the_excerpt(); ?>
		<?php chista_more_link(); ?>
	</div><!-- .entry-content -->

</article>
