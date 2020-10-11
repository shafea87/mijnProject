<?php
/**
 * Call to Action Section options
 *
 * @package Theme Palace
 * @subpackage Boost Biz
 * @since Boost Biz 1.0.0
 */

// Add Call to Action section
$wp_customize->add_section( 'boost_biz_cta_section', array(
	'title'             => esc_html__( 'Call to Action','boost-biz' ),
	'description'       => esc_html__( 'Call to Action Section options.', 'boost-biz' ),
	'panel'             => 'boost_biz_front_page_panel',
) );

// Call to Action content enable control and setting
$wp_customize->add_setting( 'boost_biz_theme_options[cta_section_enable]', array(
	'default'			=> 	$options['cta_section_enable'],
	'sanitize_callback' => 'boost_biz_sanitize_switch_control',
) );

$wp_customize->add_control( new Boost_Biz_Switch_Control( $wp_customize, 'boost_biz_theme_options[cta_section_enable]', array(
	'label'             => esc_html__( 'Call to Action Section Enable', 'boost-biz' ),
	'section'           => 'boost_biz_cta_section',
	'on_off_label' 		=> boost_biz_switch_options(),
) ) );

// cta pages drop down chooser control and setting
$wp_customize->add_setting( 'boost_biz_theme_options[cta_content_page]', array(
	'sanitize_callback' => 'boost_biz_sanitize_page',
) );

$wp_customize->add_control( new Boost_Biz_Dropdown_Chooser( $wp_customize, 'boost_biz_theme_options[cta_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'boost-biz' ),
	'section'           => 'boost_biz_cta_section',
	'choices'			=> boost_biz_page_choices(),
	'active_callback'	=> 'boost_biz_is_cta_section_enable',
) ) );

// cta btn title setting and control
$wp_customize->add_setting( 'boost_biz_theme_options[cta_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['cta_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'boost_biz_theme_options[cta_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'boost-biz' ),
	'section'        	=> 'boost_biz_cta_section',
	'active_callback' 	=> 'boost_biz_is_cta_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'boost_biz_theme_options[cta_btn_title]', array(
		'selector'            => '#call-to-action .wrapper a.btn',
		'settings'            => 'boost_biz_theme_options[cta_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'boost_biz_cta_btn_title_partial',
    ) );
}
