/**
 * Flexslider Setup
 *
 * Adds the Flexslider Plugin for the Featured Post Slideshow
 *
 * @package Wellington
 */

jQuery( document ).ready(function($) {

	/* Add flexslider to #post-slider div */
	$( "#post-slider" ).flexslider({
		animation: wellington_slider_params.animation,
		slideshowSpeed: wellington_slider_params.speed,
		namespace: "zeeflex-",
		selector: ".zeeslides > li",
		smoothHeight: false,
		pauseOnHover: true,
		controlNav: false,
		controlsContainer: ".post-slider-controls"
	});

});
