<?php
/**
 * The template for displaying articles in the loop with full content
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
	

		<?php //chista_entry_meta(); ?>

	</header><!-- .entry-header -->

	<div class="entry-content clearfix">
		<?php //the_content( esc_html__( 'Continue reading &raquo;', 'chista' ) ); ?>
		<p>
		<?php echo wp_trim_words(get_the_content(''),70,'... ') ?>
		<a href="<?php the_permalink(); ?>" target="_blank" class="more-link">ادامه مطلب »</a>
		</p>
		
	</div><!-- .entry-content -->

</article>
