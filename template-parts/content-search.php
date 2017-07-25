<?php
/**
 * The template for displaying articles in the search loop
 *
 * @package Chronus
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php chronus_post_image_archives(); ?>

	<header class="entry-header">

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content entry-excerpt clearfix">
		<?php the_excerpt(); ?>
		<?php chronus_more_link(); ?>
	</div><!-- .entry-content -->

</article>
