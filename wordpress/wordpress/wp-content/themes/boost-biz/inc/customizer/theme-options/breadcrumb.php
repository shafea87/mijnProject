<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage Boost Biz
 * @since Boost Biz 1.0.0
 */

$wp_customize->add_section( 'boost_biz_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','boost-biz' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'boost-biz' ),
	'panel'             => 'boost_biz_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'boost_biz_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'boost_biz_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new Boost_Biz_Switch_Control( $wp_customize, 'boost_biz_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'boost-biz' ),
	'section'          	=> 'boost_biz_breadcrumb',
	'on_off_label' 		=> boost_biz_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'boost_biz_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'boost_biz_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'boost-biz' ),
	'active_callback' 	=> 'boost_biz_is_breadcrumb_enable',
	'section'          	=> 'boost_biz_breadcrumb',
) );
