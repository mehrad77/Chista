<?php
/**
 * The template for displaying all single posts.
 *
 * @package chista
 */

get_header(); ?>

	<section id="primary" class="content-single content-area">
		<main id="main" class="site-main" role="main">
				
		<?php while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

			chista_related_posts();

			comments_template();

		endwhile; ?>
		
		</main><!-- #main -->
	</section><!-- #primary -->
	
	<?php get_sidebar(); ?> 
	<script>
"use strict";var Sharect=function(){function t(){function t(){return new e(f.icon,function(){FB.ui({method:"share",display:"popup",quote:w,href:"<?php echo wp_get_shortlink(); ?>"})})}function n(){var t=h.username?" "+h.username+" "+"<?php echo wp_get_shortlink(); ?>":" "+"<?php echo wp_get_shortlink(); ?>";return new e(h.icon,function(){return window.open(h.url+encodeURIComponent(w)+t,"Share","width=550, height=280"),!1})}function o(){var t=document.createElement("style");t.innerHTML=".sharect__icon{fill:"+g+";}",document.body.appendChild(t)}function i(){var e=document.createElement("div"),o=0;return d.twitter&&(e.appendChild(n()),o++),d.facebook&&(e.appendChild(t()),o++),{icons:e,length:o}}function r(){var t=p.getRangeAt(0).getBoundingClientRect(),e=window.pageXOffset||document.documentElement.scrollTop||document.body.scrollTop;y=t.top+e-x-b,C=t.left+(t.width-x*v.length)/2}function c(){r();var t=document.querySelector(".sharect");t.style.top=y+"px",t.style.left=C+"px"}function a(){v=i(),r();var t=document.createElement("div");t.className="sharect",t.style="line-height:0;position:absolute;background-color:"+m+";border-radius:3px;top:"+y+"px;left:"+C+"px;transition:all .2s ease-in-out;",t.appendChild(v.icons);var e=document.createElement("div");e.style="position:absolute;border-left:"+b+"px solid transparent;border-right:"+b+"px solid transparent;border-top:"+b+"px solid "+m+";bottom:-"+(b-1)+"px;left:"+(x*v.length/2-b)+"px;width:0;height:0;",t.appendChild(e),document.body.appendChild(t)}function s(){function t(){return!!window.getSelection().toString()}function e(){return!!document.querySelector(".sharect")}window.addEventListener("mouseup",function(){setTimeout(function(){if(e()){if(t())return p=window.getSelection(),w=p.toString(),void c();document.querySelector(".sharect").remove()}t()&&(p=window.getSelection(),w=p.toString(),a())},10)},!1)}function u(t){return d.twitter=void 0===t.twitter?d.twitter:t.twitter,d.facebook=void 0===t.facebook?d.facebook:t.facebook,h.username=void 0===t.twitterUsername?h.username:t.twitterUsername,m=t.backgroundColor||"#333",g=t.iconColor||"#fff",this}function l(){return o(),s(),this}var d={twitter:!0,facebook:!1},h={username:!1,url:"https://twitter.com/intent/tweet?text=",icon:'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="sharect__icon"><path d="M8.2,20.2c6.5,0,11.7-5.2,11.8-11.6c0-0.1,0-0.1,0-0.2c0-0.2,0-0.4,0-0.5c0.8-0.6,1.5-1.3,2.1-2.2c-0.8,0.3-1.6,0.6-2.4,0.7c0.9-0.5,1.5-1.3,1.8-2.3c-0.8,0.5-1.7,0.8-2.6,1c-1.6-1.7-4.2-1.7-5.9-0.1c-1.1,1-1.5,2.5-1.2,3.9C8.5,8.7,5.4,7.1,3.3,4.6c-1.1,1.9-0.6,4.3,1.3,5.5c-0.7,0-1.3-0.2-1.9-0.5l0,0c0,2,1.4,3.7,3.3,4.1c-0.6,0.2-1.2,0.2-1.9,0.1c0.5,1.7,2.1,2.8,3.9,2.9c-1.7,1.4-3.9,2-6.1,1.7C3.8,19.5,6,20.2,8.2,20.2"/></svg>'},f={icon:'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" enable-background="new 0 0 24 24" width="24" height="24" class="sharect__icon"><path d="M20,2H4C2.9,2,2,2.9,2,4v16c0,1.1,0.9,2,2,2h16c1.1,0,2-0.9,2-2V4C22,2.9,21.1,2,20,2z M18.4,7.4H17c-0.9,0-1,0.3-1,1l0,1.3 h2.1L18,12h-1.9v7h-3.2v-7h-1.2V9.6h1.2V8.1c0-2,0.8-3.1,3.1-3.1h2.4V7.4z"/></svg>'},p="",w="",m="#333",g="#fff",v={},b=5,x=38,y=0,C=0;return{config:u,init:l}}function e(t,e){var n=document.createElement("div");return n.style="display:inline-block;margin:7px;cursor:pointer;transition:all .2s ease-in-out;",n.innerHTML=t,n.onclick=e,n.onmouseover=function(){this.style.transform="scale(1.2)"},n.onmouseout=function(){this.style.transform="scale(1)"},n}return t}();
</script>
<script>
  var sharect = new Sharect();
  sharect.config({
    twitter: true,
    twitterUsername: '<?php echo get_option('twitter_url') ?>',
    backgroundColor: '#1DA1F2',
    iconColor: '#fff'
  }).init();
</script>
<?php get_footer(); ?>
