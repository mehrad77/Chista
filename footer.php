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
			<div class="social">
			    <ul>
				<li class="linkedin"><a class="transition2s"  onclick="ga('send', 'event', 'engagement', 'social_click', 'Linkedin')" target="_blank" href="https://www.linkedin.com/in/NimaShafiezadeh/"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
				<li class="twitter"><a class="transition2s"  onclick="ga('send', 'event', 'engagement', 'social_click', 'Twitter'" target="_blank" href="https://www.twitter.com/Retooeter/"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			      <li class="instagram"><a class="transition2s"  onclick="ga('send', 'event', 'engagement', 'social_click', 'Instagram')" target="_blank" href="https://www.instagram.com/NimaShafiezadeh/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			    </ul>
			</div>
              
            
            <span onclick="ga('send', 'event', 'engagement', 'footer_click', 'copyright')">از حقوق مادی و معنوی سایتم گذشتم :)</span>
			<div id="footer-text" class="site-info">
				<?php do_action( 'chista_footer_text' ); ?>
				<?php //chista_credit_link(); ?>
				<small class="credit-link" onclick="ga('send', 'event', 'engagement', 'footer_click', 'credit')" >
		قدرت گرفته از  <a href="https://mehrad.js.org/Chista" title="قالب وردپرس چیستا">چیستا</a> | طراحی با <i class="fa fa-heart" aria-hidden="true"></i> توسط <a href="https://mehrad.js.org" title="مهراد روستا">مهراد روستا</a>
				</span>
			</div><!-- .site-info -->

		</footer><!-- #colophon -->

	</div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
