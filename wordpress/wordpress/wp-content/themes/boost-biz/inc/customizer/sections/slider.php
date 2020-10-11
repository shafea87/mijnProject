<?php
/**
 * Slider Section options
 *
 * @package Theme Palace
 * @subpackage Boost Biz
 * @since Boost Biz 1.0.0
 */

// Add Slider section
$wp_customize->add_section( 'boost_biz_slider_section', array(
	'title'             => esc_html__( 'Main Slider','boost-biz' ),
	'description'       => esc_html__( 'Slider Section options.', 'boost-biz' ),
	'panel'             => 'boost_biz_front_page_panel',
) );

// Slider content enable control and setting
$wp_customize->add_setting( 'boost_biz_theme_options[slider_section_enable]', array(
	'default'			=> 	$options['slider_section_enable'],
	'sanitize_callback' => 'boost_biz_sanitize_switch_control',
) );

$wp_customize->add_control( new Boost_Biz_Switch_Control( $wp_customize, 'boost_biz_theme_options[slider_section_enable]', array(
	'label'             => esc_html__( 'Slider Section Enable', 'boost-biz' ),
	'section'           => 'boost_biz_slider_section',
	'on_off_label' 		=> boost_biz_switch_options(),
) ) );

// Slider btn label setting and control
$wp_customize->add_setting( 'boost_biz_theme_options[slider_btn_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['slider_btn_label'],
) );

$wp_customize->add_control( 'boost_biz_theme_options[slider_btn_label]', array(
	'label'           	=> esc_html__( 'Slider Button Label', 'boost-biz' ),
	'section'        	=> 'boost_biz_slider_section',
	'active_callback' 	=> 'boost_biz_is_slider_section_enable',
	'type'				=> 'text',
) );

// Slider content enable control and setting
$wp_customize->add_setting( 'boost_biz_theme_options[slider_section_social_nav_enable]', array(
	'default'			=> 	$options['slider_section_social_nav_enable'],
	'sanitize_callback' => 'boost_biz_sanitize_switch_control',
) );

$wp_customize->add_control( new Boost_Biz_Switch_Control( $wp_customize, 'boost_biz_theme_options[slider_section_social_nav_enable]', array(
	'label'             => esc_html__( 'Slider Section Social Nav Enable', 'boost-biz' ),
	'description'       => sprintf( '%1$s <a class="topbar-menu-trigger" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show social menu.', 'boost-biz' ), esc_html__( 'Click Here', 'boost-biz' ), esc_html__( 'to create menu', 'boost-biz' ) ),
	'section'           => 'boost_biz_slider_section',
	'active_callback'   => 'boost_biz_is_slider_section_enable',
	'on_off_label' 		=> boost_biz_switch_options(),
) ) );

// Slider content enable control and setting
$wp_customize->add_setting( 'boost_biz_theme_options[slider_autoplay_enable]', array(
	'default'			=> 	$options['slider_autoplay_enable'],
	'sanitize_callback' => 'boost_biz_sanitize_switch_control',
) );

$wp_customize->add_control( new Boost_Biz_Switch_Control( $wp_customize, 'boost_biz_theme_options[slider_autoplay_enable]', array(
	'label'             => esc_html__( 'Slider Autoplay Enable', 'boost-biz' ),
	'section'           => 'boost_biz_slider_section',
	'active_callback'   => 'boost_biz_is_slider_section_enable',
	'on_off_label' 		=> boost_biz_switch_options(),
) ) );

for ( $i = 1; $i <= 3; $i++ ) :
	// slider pages drop down chooser control and setting
	$wp_customize->add_setting( 'boost_biz_theme_options[slider_content_page_' . $i . ']', array(
		'sanitize_callback' => 'boost_biz_sanitize_page',
	) );

	$wp_customize->add_control( new Boost_Biz_Dropdown_Chooser( $wp_customize, 'boost_biz_theme_options[slider_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'boost-biz' ), $i ),
		'section'           => 'boost_biz_slider_section',
		'choices'			=> boost_biz_page_choices(),
		'active_callback'	=> 'boost_biz_is_slider_section_enable',
	) ) );

endfor;
