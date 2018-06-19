<?php
/**
 * The template for displaying the footer.
 *
 * Contains all content after the main content area and sidebar
 *
 * @package chista
 */

?>

	</div><!-- #content -->

	<?php do_action( 'chista_before_footer' ); ?>

	<div id="footer" class="footer-wrap">

		<footer id="colophon" class="site-footer container clearfix" role="contentinfo">
			<?php chista_social_widgets() ?>
              
            
            <span onclick="ga('send', 'event', 'engagement', 'footer_click', 'copyright')"><?php echo get_option('copyright'); ?></span>
			<div id="footer-text" class="site-info">
				<?php do_action( 'chista_footer_text' ); ?>
				<?php //chista_credit_link(); ?>
				<small class="credit-link" onclick="ga('send', 'event', 'engagement', 'footer_click', 'credit')" >
				<?php esc_html_e('قدرت گرفته از','chista'); ?>  <a href="https://mehrad.js.org/Chista" title="قالب وردپرس چیستا"><?php esc_html_e('چیستا','chista'); ?></a> 
				<?php if(!get_option('copyright_theme')):  ?>
					| طراحی با <i class="fa fa-heart" aria-hidden="true"></i> توسط <a href="https://mehrad.js.org" title="مهراد روستا">مهراد روستا</a>
				<?php else:  
					echo get_option('copyright_theme'); ?>
				<?php endif; ?>

				</span>
			</div><!-- .site-info -->

		</footer><!-- #colophon -->

	</div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
