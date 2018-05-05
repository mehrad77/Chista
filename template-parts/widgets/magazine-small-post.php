<?php
/**
 * The template for displaying small posts in Magazine Post widgets
 *
 * @package chista
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'small-post' ); ?>>

	<?php chista_post_image( 'chista-thumbnail-small' ); ?>

	<div class="post-content">

		<header class="entry-header">

			<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

			<?php chista_magazine_entry_date(); ?>

		</header><!-- .entry-header -->

	</div>

</article>
