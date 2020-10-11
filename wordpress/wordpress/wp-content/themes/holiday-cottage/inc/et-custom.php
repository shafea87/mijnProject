<?php
/**
 * Elementor customization
 *
 * @package Holiday_Cottage
 */

/**
 * Register widget categories.
 *
 * @since 1.0.0
 *
 * @param ElementorElements_Manager $elements_manager Instance of ElementorElements_Manager.
 */
function holiday_cottage_add_elementor_widget_categories( $elements_manager ) {
	$elements_manager->add_category(
		'theme-custom',
		[
			'title' => esc_html__( 'Theme Custom', 'holiday-cottage' ),
			'icon'  => 'fa fa-plug',
		]
	);
}

add_action( 'elementor/elements/categories_registered', 'holiday_cottage_add_elementor_widget_categories' );
