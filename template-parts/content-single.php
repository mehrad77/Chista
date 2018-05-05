<?php
/**
 * The template for displaying single posts
 *
 * @package chista
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	

	<header class="entry-header">
		<div class="txt-over">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php chista_entry_meta(); ?>
		</div>
		<div class="img-behin">
			<?php chista_post_image_single(); ?>
		</div>

	</header><!-- .entry-header -->

	<div class="entry-content clearfix">

		<?php the_content(); ?>

		<?php wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'chista' ),
			'after'  => '</div>',
		) ); ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

	<?php the_tags( 'برچسب‎ها: ','، ' ); ?>
	<hr>
	<div class="social-share-single social">
     <span style="display:block;">به اشتراک بگذارید!</span>

                                 <ul>
<li class="linkedin"><a data-toggle="tooltip" data-placement="right" title="<?php _e('اشتراک گذاشتن در لینکدین','chista') ?>" href="http://www.linkedin.com/shareArticle?title=<?php the_title(); ?>&url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
<li class="twitter"><a data-toggle="tooltip" data-placement="right" href="https://twitter.com/home?status=<?php the_title(); ?>&nbsp;&nbsp;&nbsp;<?php echo wp_get_shortlink(); ?>" title="<?php _e('اشتراک گذاشتن در توییتر','chista') ?>" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
<li class="google"><a data-toggle="tooltip" data-placement="right" title="<?php _e('اشتراک گذاشتن در تلگرام','chista') ?>" href="tg://msg_url?url=<?php echo urlencode(esc_url(wp_get_shortlink() )) ?>&text=<?php the_title(); ?>"><i class="fa fa-send"></i></a></li>
             
                       </ul>

                   </div>

		<?php chista_post_navigation(); ?>

	</footer><!-- .entry-footer -->

</article>
