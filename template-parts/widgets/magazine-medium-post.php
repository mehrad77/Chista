<?php
/**
 * The template for displaying medium posts in Magazine Post widgets
 *
 * @package Chronus
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'medium-post' ); ?>>

	<?php chronus_post_image( 'chronus-thumbnail-medium' ); ?>

	<div class="post-content">

		<header class="entry-header">

			<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

			<?php chronus_magazine_entry_date(); ?>

		</header><!-- .entry-header -->

	</div>

</article>
