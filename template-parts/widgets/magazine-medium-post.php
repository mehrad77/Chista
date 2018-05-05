<?php
/**
 * The template for displaying medium posts in Magazine Post widgets
 *
 * @package chista
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'medium-post' ); ?>>

	<?php chista_post_image( 'chista-thumbnail-medium' ); ?>

	<div class="post-content">

		<header class="entry-header">

			<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

			<?php chista_magazine_entry_date(); ?>

		</header><!-- .entry-header -->

	</div>

</article>
