<?php
/**
 * Plugin recommendations
 *
 * @package Holiday_Cottage
 */

if ( ! function_exists( 'holiday_cottage_register_recommended_plugins' ) ) :

	/**
	 * Register recommended plugins.
	 *
	 * @since 1.0.0
	 */
	function holiday_cottage_register_recommended_plugins() {
		$plugins = array(
			array(
				'name' => esc_html__( 'Advanced Booking Calendar', 'holiday-cottage' ),
				'slug' => 'advanced-booking-calendar',
			),
			array(
				'name' => esc_html__( 'Elementor', 'holiday-cottage' ),
				'slug' => 'elementor',
			),
			array(
				'name' => esc_html__( 'One Click Demo Import', 'holiday-cottage' ),
				'slug' => 'one-click-demo-import',
			),
		);

		$config = array();

		tgmpa( $plugins, $config );
	}

endif;

add_action( 'tgmpa_register', 'holiday_cottage_register_recommended_plugins' );
