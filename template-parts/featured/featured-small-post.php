<?php
/**
 * The template for displaying articles in the slideshow loop
 *
 * @package chista
 */

?>

<div class="featured-small-post featured-post-wrap clearfix">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php chista_featured_post_image( 'post-thumbnail', array( 'class' => 'featured-image' ) ); ?>

		<header class="entry-header">

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php chista_featured_entry_meta(); ?>

		</header><!-- .entry-header -->

	</article>

</div>
