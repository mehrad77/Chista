<?php
/**
 * Custom Markup for Search form
 *
 * @package chista
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'chista' ); ?></span>
		<input type="search" class="search-field"
			placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'chista' ); ?>"
			value="<?php echo get_search_query(); ?>" name="s"
			title="<?php echo esc_attr_x( 'Search for:', 'label', 'chista' ); ?>" />
	</label>
	<button type="submit" class="search-submit">
		<?php echo chista_get_svg( 'search' ); ?>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'chista' ); ?></span>
	</button>
</form>
