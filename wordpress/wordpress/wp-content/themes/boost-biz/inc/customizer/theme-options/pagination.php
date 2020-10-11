<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Boost Biz
 * @since Boost Biz 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'boost_biz_pagination', array(
	'title'               => esc_html__('Pagination','boost-biz'),
	'description'         => esc_html__( 'Pagination section options.', 'boost-biz' ),
	'panel'               => 'boost_biz_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'boost_biz_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'boost_biz_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( new Boost_Biz_Switch_Control( $wp_customize, 'boost_biz_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'boost-biz' ),
	'section'             => 'boost_biz_pagination',
	'on_off_label' 		=> boost_biz_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'boost_biz_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'boost_biz_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'boost_biz_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'boost-biz' ),
	'section'             => 'boost_biz_pagination',
	'type'                => 'select',
	'choices'			  => boost_biz_pagination_options(),
	'active_callback'	  => 'boost_biz_is_pagination_enable',
) );
