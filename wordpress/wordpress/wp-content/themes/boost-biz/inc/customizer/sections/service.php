<?php
/**
 * Service Section options
 *
 * @package Theme Palace
 * @subpackage Boost Biz
 * @since Boost Biz 1.0.0
 */

// Add Service section
$wp_customize->add_section( 'boost_biz_service_section', array(
	'title'             => esc_html__( 'Services','boost-biz' ),
	'description'       => esc_html__( 'Services Section options.', 'boost-biz' ),
	'panel'             => 'boost_biz_front_page_panel',
) );

// Service content enable control and setting
$wp_customize->add_setting( 'boost_biz_theme_options[service_section_enable]', array(
	'default'			=> 	$options['service_section_enable'],
	'sanitize_callback' => 'boost_biz_sanitize_switch_control',
) );

$wp_customize->add_control( new Boost_Biz_Switch_Control( $wp_customize, 'boost_biz_theme_options[service_section_enable]', array(
	'label'             => esc_html__( 'Service Section Enable', 'boost-biz' ),
	'section'           => 'boost_biz_service_section',
	'on_off_label' 		=> boost_biz_switch_options(),
) ) );

// Service title setting and control
$wp_customize->add_setting( 'boost_biz_theme_options[service_title]', array(
	'default'			=> 	$options['service_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'boost_biz_theme_options[service_title]', array(
	'label'           	=> sprintf( esc_html__( 'Section Title', 'boost-biz' ) ),
	'section'        	=> 'boost_biz_service_section',
	'active_callback' 	=> 'boost_biz_is_service_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'boost_biz_theme_options[service_title]', array(
		'selector'            => '#our-services .section-header h2',
		'settings'            => 'boost_biz_theme_options[service_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'boost_biz_service_title_partial',
    ) );
}

for ( $i = 1; $i <= 3; $i++ ) :

	// service note control and setting
	$wp_customize->add_setting( 'boost_biz_theme_options[service_content_icon_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new Boost_Biz_Icon_Picker( $wp_customize, 'boost_biz_theme_options[service_content_icon_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Icon %d', 'boost-biz' ), $i ),
		'section'           => 'boost_biz_service_section',
		'active_callback'	=> 'boost_biz_is_service_section_enable',
	) ) );

	// service pages drop down chooser control and setting
	$wp_customize->add_setting( 'boost_biz_theme_options[service_content_page_' . $i . ']', array(
		'sanitize_callback' => 'boost_biz_sanitize_page',
	) );

	$wp_customize->add_control( new Boost_Biz_Dropdown_Chooser( $wp_customize, 'boost_biz_theme_options[service_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'boost-biz' ), $i ),
		'section'           => 'boost_biz_service_section',
		'choices'			=> boost_biz_page_choices(),
		'active_callback'	=> 'boost_biz_is_service_section_enable',
	) ) );

	// service hr setting and control
	$wp_customize->add_setting( 'boost_biz_theme_options[service_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Boost_Biz_Customize_Horizontal_Line( $wp_customize, 'boost_biz_theme_options[service_hr_'. $i .']',
		array(
			'section'         => 'boost_biz_service_section',
			'active_callback' => 'boost_biz_is_service_section_enable',
			'type'			  => 'hr'
	) ) );
endfor;
