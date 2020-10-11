<?php
/**
 * Customizer partials
 *
 * @package Holiday_Cottage
 */

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function holiday_cottage_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function holiday_cottage_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
