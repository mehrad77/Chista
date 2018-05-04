<?php
/**
 * The template for displaying the footer.
 *
 * Contains all content after the main content area and sidebar
 *
 * @package Chronus
 */

?>

	</div><!-- #content -->

	<?php do_action( 'chronus_before_footer' ); ?>

	<div id="footer" class="footer-wrap">

		<footer id="colophon" class="site-footer container clearfix" role="contentinfo">
			<div class="social">
			    <ul>
				<li class="linkedin"><a class="transition2s" target="_blank" href="https://www.linkedin.com/in/NimaShafiezadeh/"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
				<li class="twitter"><a class="transition2s" target="_blank" href="https://www.twitter.com/Retooeter/"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			      <li class="instagram"><a class="transition2s" target="_blank" href="https://www.instagram.com/NimaShafiezadeh/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			    </ul>
			</div>
              
            
             
			<div id="footer-text" class="site-info">
				<?php do_action( 'chronus_footer_text' ); ?>
				<?php chronus_credit_link(); ?>
			</div><!-- .site-info -->

		</footer><!-- #colophon -->

	</div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
