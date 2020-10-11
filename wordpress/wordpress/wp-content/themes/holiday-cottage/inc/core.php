<?php
/**
 * Core functions
 *
 * @package Holiday_Cottage
 */

if ( ! function_exists( 'holiday_cottage_get_option' ) ) :

	/**
	 * Get theme option.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function holiday_cottage_get_option( $key ) {
		$default_options = holiday_cottage_get_default_theme_options();

		if ( empty( $key ) ) {
			return;
		}

		$default = ( isset( $default_options[ $key ] ) ) ? $default_options[ $key ] : '';

		$theme_options = get_theme_mod( 'theme_options', $default_options );
		$theme_options = array_merge( $default_options, $theme_options );

		$value = '';

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;
	}

endif;

if ( ! function_exists( 'holiday_cottage_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function holiday_cottage_get_default_theme_options() {
		$defaults_options = array();

		// Header.
		$defaults_options['show_site_title']   = true;
		$defaults_options['show_site_tagline'] = true;
		$defaults_options['book_button_text']  = esc_html__( 'Book Now', 'holiday-cottage' );
		$defaults_options['book_button_url']   = '';
		$defaults_options['enable_top_bar']    = true;
		$defaults_options['contact_phone']     = '';
		$defaults_options['contact_email']     = '';

		// Blog.
		$defaults_options['blog_title']     = esc_html__( 'Blog', 'holiday-cottage' );
		$defaults_options['show_content']   = 'short';
		$defaults_options['excerpt_length'] = 40;
		$defaults_options['read_more_text'] = esc_html__( 'Read More', 'holiday-cottage' );

		// Footer.
		$defaults_options['copyright_message'] = esc_html__( 'Copyright &copy; All rights reserved.', 'holiday-cottage' );

		return apply_filters( 'holiday_cottage_default_theme_options', $defaults_options );
	}

endif;
