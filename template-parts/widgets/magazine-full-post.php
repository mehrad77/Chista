<?php
/**
 * The template for displaying full image posts in Magazine Post widgets
 *
 * @package Chronus
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php chronus_post_image(); ?>

	<header class="entry-header">

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php chronus_entry_meta(); ?>

	</header><!-- .entry-header -->

	<div class="entry-content clearfix">

		<?php the_excerpt(); ?>
		<?php chronus_more_link(); ?>

	</div><!-- .entry-content -->

</article>
