<?php
/**
 * The template for displaying small posts in Magazine Post widgets
 *
 * @package Wellington
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'small-post clearfix' ); ?>>

	<?php wellington_post_image( 'wellington-thumbnail-small' ); ?>

	<div class="post-content clearfix">

		<header class="entry-header">

			<?php wellington_magazine_entry_date(); ?>

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		</header><!-- .entry-header -->

	</div>

</article>
