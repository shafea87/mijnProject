<?php 
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage Boost Biz
 * @since Boost Biz 1.0.0
 * @return array An array of default values
 */

function boost_biz_get_default_theme_options() {
	$boost_biz_default_options = array(
		// Color Options
		'header_title_color'			=> '#5031a9',
		'header_tagline_color'			=> '#5a677a',
		'header_txt_logo_extra'			=> 'show-all',
		
		// breadcrumb
		'breadcrumb_enable'				=> true,
		'breadcrumb_separator'			=> '/',
		
		// layout 
		'site_layout'         			=> 'wide',
		'sidebar_position'         		=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'right-sidebar',

		// excerpt options
		'long_excerpt_length'           => 25,
		'read_more_text'           		=> esc_html__( 'Read More', 'boost-biz' ),
		
		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'copyright_text'           		=> sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'boost-biz' ), '[the-year]', '[site-link]' ),
		'scroll_top_visible'        	=> true,		

		// reset options
		'reset_options'      			=> false,
		
		// homepage options
		'enable_frontpage_content' 		=> false,

		// homepage sections sortable
		'sortable' 						=> 'slider,about,service,blog,cta',

		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'boost-biz' ),
		'hide_date' 					=> false,
		'hide_category'					=> false,

		// single post theme options
		'single_post_hide_date' 		=> false,
		'single_post_hide_author'		=> false,
		'single_post_hide_category'		=> false,
		'single_post_hide_tags'			=> false,

		/* Front Page */

		// topbar
		'topbar_login_register_enable'	=> false,
		'topbar_login_label'			=> esc_html__( 'Contact Us', 'boost-biz' ),

		// Slider
		'slider_section_enable'			=> true,
		'slider_autoplay_enable'		=> false,
		'slider_section_social_nav_enable'	=> true,
		'slider_btn_label'				=> esc_html__( 'Get Started', 'boost-biz' ),

		// About
		'about_section_enable'			=> true,
		'about_btn_title'				=> esc_html__( 'Know More About Me', 'boost-biz' ),

		// service
		'service_section_enable'		=> true,
		'service_title'					=> esc_html__( 'Amazing landing page for your startup', 'boost-biz' ),

		// blog
		'blog_section_enable'			=> true,
		'blog_content_type'				=> 'recent',
		'blog_title'					=> esc_html__( 'My latest articles & resources', 'boost-biz' ),
		'blog_readmore_title'			=> esc_html__( 'Learn More', 'boost-biz' ),

		// call to action
		'cta_section_enable'			=> true,
		'cta_btn_title'					=> esc_html__( 'Get Started', 'boost-biz' ),
	);

	$output = apply_filters( 'boost_biz_default_theme_options', $boost_biz_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}