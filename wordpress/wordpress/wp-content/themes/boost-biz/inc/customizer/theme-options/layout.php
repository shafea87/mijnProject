<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage Boost Biz
 * @since Boost Biz 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'boost_biz_layout', array(
	'title'               => esc_html__('Layout','boost-biz'),
	'description'         => esc_html__( 'Layout section options.', 'boost-biz' ),
	'panel'               => 'boost_biz_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'boost_biz_theme_options[site_layout]', array(
	'sanitize_callback'   => 'boost_biz_sanitize_select',
	'default'             => $options['site_layout'],
) );

$wp_customize->add_control(  new Boost_Biz_Custom_Radio_Image_Control ( $wp_customize, 'boost_biz_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'boost-biz' ),
	'section'             => 'boost_biz_layout',
	'choices'			  => boost_biz_site_layout(),
) ) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'boost_biz_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'boost_biz_sanitize_select',
	'default'             => $options['sidebar_position'],
) );

$wp_customize->add_control(  new Boost_Biz_Custom_Radio_Image_Control ( $wp_customize, 'boost_biz_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Global Sidebar Position', 'boost-biz' ),
	'section'             => 'boost_biz_layout',
	'choices'			  => boost_biz_global_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'boost_biz_theme_options[post_sidebar_position]', array(
	'sanitize_callback'   => 'boost_biz_sanitize_select',
	'default'             => $options['post_sidebar_position'],
) );

$wp_customize->add_control(  new Boost_Biz_Custom_Radio_Image_Control ( $wp_customize, 'boost_biz_theme_options[post_sidebar_position]', array(
	'label'               => esc_html__( 'Posts Sidebar Position', 'boost-biz' ),
	'section'             => 'boost_biz_layout',
	'choices'			  => boost_biz_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'boost_biz_theme_options[page_sidebar_position]', array(
	'sanitize_callback'   => 'boost_biz_sanitize_select',
	'default'             => $options['page_sidebar_position'],
) );

$wp_customize->add_control( new Boost_Biz_Custom_Radio_Image_Control( $wp_customize, 'boost_biz_theme_options[page_sidebar_position]', array(
	'label'               => esc_html__( 'Pages Sidebar Position', 'boost-biz' ),
	'section'             => 'boost_biz_layout',
	'choices'			  => boost_biz_sidebar_position(),
) ) );