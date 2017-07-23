/**
 * Customizer Controls JS
 *
 * Adds Javascript for Customizer Controls.
 *
 * @package Chronus
 */

( function( wp, $ ) {

	// Based on https://make.xwp.co/2016/07/24/dependently-contextual-customizer-controls/
	wp.customize( 'chronus_theme_options[blog_layout]', function( setting ) {
		var setupControl = function( control ) {
			var setActiveState, isDisplayed;
			isDisplayed = function() {
				return 'excerpt' === setting.get();
			};
			setActiveState = function() {
				control.active.set( isDisplayed() );
			};
			setActiveState();
			setting.bind( setActiveState );
			control.active.validate = isDisplayed;
		};
		wp.customize.control( 'chronus_theme_options[excerpt_length]', setupControl );
	} );

	wp.customize( 'chronus_theme_options[featured_posts]', function( setting ) {
		var setupControl = function( control ) {
			var setActiveState, isDisplayed;
			isDisplayed = function() {
				return true === setting.get();
			};
			setActiveState = function() {
				control.active.set( isDisplayed() );
			};
			setActiveState();
			setting.bind( setActiveState );
			control.active.validate = isDisplayed;
		};
		wp.customize.control( 'chronus_theme_options[featured_category]', setupControl );
	} );

})( this.wp, jQuery );
