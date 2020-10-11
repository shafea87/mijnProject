<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Boost Biz
 * @since Boost Biz 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'boost_biz_single_post_section', array(
	'title'             => esc_html__( 'Single Post','boost-biz' ),
	'description'       => esc_html__( 'Options to change the single posts globally.', 'boost-biz' ),
	'panel'             => 'boost_biz_theme_options_panel',
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'boost_biz_theme_options[single_post_hide_date]', array(
	'default'           => $options['single_post_hide_date'],
	'sanitize_callback' => 'boost_biz_sanitize_switch_control',
) );

$wp_customize->add_control( new Boost_Biz_Switch_Control( $wp_customize, 'boost_biz_theme_options[single_post_hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'boost-biz' ),
	'section'           => 'boost_biz_single_post_section',
	'on_off_label' 		=> boost_biz_hide_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'boost_biz_theme_options[single_post_hide_author]', array(
	'default'           => $options['single_post_hide_author'],
	'sanitize_callback' => 'boost_biz_sanitize_switch_control',
) );

$wp_customize->add_control( new Boost_Biz_Switch_Control( $wp_customize, 'boost_biz_theme_options[single_post_hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'boost-biz' ),
	'section'           => 'boost_biz_single_post_section',
	'on_off_label' 		=> boost_biz_hide_options(),
) ) );

// Archive author category setting and control.
$wp_customize->add_setting( 'boost_biz_theme_options[single_post_hide_category]', array(
	'default'           => $options['single_post_hide_category'],
	'sanitize_callback' => 'boost_biz_sanitize_switch_control',
) );

$wp_customize->add_control( new Boost_Biz_Switch_Control( $wp_customize, 'boost_biz_theme_options[single_post_hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'boost-biz' ),
	'section'           => 'boost_biz_single_post_section',
	'on_off_label' 		=> boost_biz_hide_options(),
) ) );

// Archive tag category setting and control.
$wp_customize->add_setting( 'boost_biz_theme_options[single_post_hide_tags]', array(
	'default'           => $options['single_post_hide_tags'],
	'sanitize_callback' => 'boost_biz_sanitize_switch_control',
) );

$wp_customize->add_control( new Boost_Biz_Switch_Control( $wp_customize, 'boost_biz_theme_options[single_post_hide_tags]', array(
	'label'             => esc_html__( 'Hide Tag', 'boost-biz' ),
	'section'           => 'boost_biz_single_post_section',
	'on_off_label' 		=> boost_biz_hide_options(),
) ) );
