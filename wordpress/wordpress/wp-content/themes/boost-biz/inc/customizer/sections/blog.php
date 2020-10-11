<?php
/**
 * Blog Section options
 *
 * @package Theme Palace
 * @subpackage Boost Biz
 * @since Boost Biz 1.0.0
 */

// Add Blog section
$wp_customize->add_section( 'boost_biz_blog_section', array(
	'title'             => esc_html__( 'Blog','boost-biz' ),
	'description'       => esc_html__( 'Blog Section options.', 'boost-biz' ),
	'panel'             => 'boost_biz_front_page_panel',
) );

// Blog content enable control and setting
$wp_customize->add_setting( 'boost_biz_theme_options[blog_section_enable]', array(
	'default'			=> 	$options['blog_section_enable'],
	'sanitize_callback' => 'boost_biz_sanitize_switch_control',
) );

$wp_customize->add_control( new Boost_Biz_Switch_Control( $wp_customize, 'boost_biz_theme_options[blog_section_enable]', array(
	'label'             => esc_html__( 'Blog Section Enable', 'boost-biz' ),
	'section'           => 'boost_biz_blog_section',
	'on_off_label' 		=> boost_biz_switch_options(),
) ) );

// blog title setting and control
$wp_customize->add_setting( 'boost_biz_theme_options[blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'boost_biz_theme_options[blog_title]', array(
	'label'           	=> esc_html__( 'Title', 'boost-biz' ),
	'section'        	=> 'boost_biz_blog_section',
	'active_callback' 	=> 'boost_biz_is_blog_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'boost_biz_theme_options[blog_title]', array(
		'selector'            => '#latest-posts .section-header h2.section-title',
		'settings'            => 'boost_biz_theme_options[blog_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'boost_biz_blog_title_partial',
    ) );
}

// Blog content type control and setting
$wp_customize->add_setting( 'boost_biz_theme_options[blog_content_type]', array(
	'default'          	=> $options['blog_content_type'],
	'sanitize_callback' => 'boost_biz_sanitize_select',
) );

$wp_customize->add_control( 'boost_biz_theme_options[blog_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'boost-biz' ),
	'section'           => 'boost_biz_blog_section',
	'type'				=> 'select',
	'active_callback' 	=> 'boost_biz_is_blog_section_enable',
	'choices'			=> array( 
		'category' 	=> esc_html__( 'Category', 'boost-biz' ),
		'recent' 	=> esc_html__( 'Recent', 'boost-biz' ),
	),
) );

// Add dropdown category setting and control.
$wp_customize->add_setting(  'boost_biz_theme_options[blog_content_category]', array(
	'sanitize_callback' => 'boost_biz_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Boost_Biz_Dropdown_Taxonomies_Control( $wp_customize,'boost_biz_theme_options[blog_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'boost-biz' ),
	'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'boost-biz' ),
	'section'           => 'boost_biz_blog_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'boost_biz_is_blog_section_content_category_enable'
) ) );

// Add dropdown categories setting and control.
$wp_customize->add_setting( 'boost_biz_theme_options[blog_category_exclude]', array(
	'sanitize_callback' => 'boost_biz_sanitize_category_list',
) ) ;

$wp_customize->add_control( new Boost_Biz_Dropdown_Category_Control( $wp_customize,'boost_biz_theme_options[blog_category_exclude]', array(
	'label'             => esc_html__( 'Select Excluding Categories', 'boost-biz' ),
	'description'      	=> esc_html__( 'Note: Select categories to exclude. Press Shift key select multilple categories.', 'boost-biz' ),
	'section'           => 'boost_biz_blog_section',
	'type'              => 'dropdown-categories',
	'active_callback'	=> 'boost_biz_is_blog_section_content_recent_enable'
) ) );

// blog btn title setting and control
$wp_customize->add_setting( 'boost_biz_theme_options[blog_readmore_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_readmore_title'],
) );

$wp_customize->add_control( 'boost_biz_theme_options[blog_readmore_title]', array(
	'label'           	=> esc_html__( 'Read More Label', 'boost-biz' ),
	'section'        	=> 'boost_biz_blog_section',
	'active_callback' 	=> 'boost_biz_is_blog_section_enable',
	'type'				=> 'text',
) );
