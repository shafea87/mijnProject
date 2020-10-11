<?php
/**
 * Theme functions
 *
 * @package Holiday_Cottage
 */

if ( ! function_exists( 'holiday_cottage_customize_banner_title' ) ) :

	/**
	 * Customize banner title.
	 *
	 * @since 1.0.0
	 *
	 * @param string $title Title.
	 * @return string Modified title.
	 */
	function holiday_cottage_customize_banner_title( $title ) {
		if ( is_home() ) {
			$title = holiday_cottage_get_option( 'blog_title' );
		} elseif ( is_singular() ) {
			$title = single_post_title( '', false );
		} elseif ( is_category() || is_tag() ) {
			$title = single_term_title( '', false );
		} elseif ( is_archive() ) {
			$title = wp_strip_all_tags( get_the_archive_title() );
		} elseif ( is_search() ) {
			$title = sprintf( esc_html__( 'Search Results for: %s', 'holiday-cottage' ), get_search_query() );
		} elseif ( is_404() ) {
			$title = esc_html__( '404!', 'holiday-cottage' );
		}

		return $title;
	}

endif;

add_filter( 'holiday_cottage_filter_banner_title', 'holiday_cottage_customize_banner_title' );

if ( ! function_exists( 'holiday_cottage_add_top_bar' ) ) :

	/**
	 * Add top bar.
	 *
	 * @since 1.0.0
	 */
	function holiday_cottage_add_top_bar() {
		$top_bar_status = apply_filters( 'holiday_cottage_top_bar_status', false );

		if ( true !== $top_bar_status ) {
			return;
		}

		get_template_part( 'template-parts/top-bar' );
	}

endif;

add_action( 'holiday_cottage_top_bar', 'holiday_cottage_add_top_bar' );

if ( ! function_exists( 'holiday_cottage_custom_top_bar_status' ) ) :

	/**
	 * Custom top bar status.
	 *
	 * @since 1.0.0
	 */
	function holiday_cottage_custom_top_bar_status( $status ) {
		$enable_top_bar = holiday_cottage_get_option( 'enable_top_bar' );

		if ( true === $enable_top_bar ) {
			$status = true;
		} else {
			$status = false;
		}

		return $status;
	}

endif;

add_filter( 'holiday_cottage_top_bar_status', 'holiday_cottage_custom_top_bar_status' );

if ( ! function_exists( 'holiday_cottage_add_breadcrumb' ) ) :

	/**
	 * Add breadcrumb.
	 *
	 * @since 1.0.0
	 */
	function holiday_cottage_add_breadcrumb() {
		holiday_cottage_simple_breadcrumb();
	}

endif;

add_action( 'holiday_cottage_breadcrumb', 'holiday_cottage_add_breadcrumb' );
