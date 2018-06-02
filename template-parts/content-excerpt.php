<?php
/**
 * The template for displaying articles in the loop with post excerpts
 *
 * @package chista
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<div class="txt-over">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			<?php chista_entry_meta(); ?>
		</div>
		<div class="img-behin">
				<?php chista_post_image_archives(); ?>
		</div>

	</header><!-- .entry-header -->

	<div class="entry-content entry-excerpt clearfix">
<!-- 		<?php the_excerpt(); ?>
		<?php chista_more_link(); ?> -->
		<?php 
		echo wp_trim_words(get_the_content(''),75);
		chista_more_link()
		?>
	</div><!-- .entry-content -->

</article>
