<?php
/**
 * Contact Button Section options
 *
 * @package Theme Palace
 * @subpackage Boost Biz
 * @since Boost Biz 1.0.0
 */

// Add Contact Button section
$wp_customize->add_section( 'boost_biz_topbar_section', array(
	'title'             => esc_html__( 'Contact Button','boost-biz' ),
	'description'       => esc_html__( 'Contact Button options.', 'boost-biz' ),
	'panel'             => 'boost_biz_front_page_panel',
) );

// top bar menu visible
$wp_customize->add_setting( 'boost_biz_theme_options[topbar_login_register_enable]',
	array(
		'default'       	=> $options['topbar_login_register_enable'],
		'sanitize_callback' => 'boost_biz_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Boost_Biz_Switch_Control( $wp_customize, 'boost_biz_theme_options[topbar_login_register_enable]',
    array(
		'label'      		=> esc_html__( 'Display Login / Register', 'boost-biz' ),
		'section'    		=> 'boost_biz_topbar_section',
		'on_off_label' 		=> boost_biz_switch_options(),
    )
) );

// topbar login setting and control
$wp_customize->add_setting( 'boost_biz_theme_options[topbar_login_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['topbar_login_label'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'boost_biz_theme_options[topbar_login_label]', array(
	'label'           	=> esc_html__( 'Login Label', 'boost-biz' ),
	'section'        	=> 'boost_biz_topbar_section',
	'type'				=> 'text',
	'active_callback'	=> 'boost_biz_is_login_register_meta_section_enable',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'boost_biz_theme_options[topbar_login_label]', array(
		'selector'            => '#primary-menu .login-register-item',
		'settings'            => 'boost_biz_theme_options[topbar_login_label]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'boost_biz_topbar_login_label_partial',
    ) );
}
// topbar login url setting and control
$wp_customize->add_setting( 'boost_biz_theme_options[topbar_login_url]', array(
	'sanitize_callback' => 'esc_url_raw',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'boost_biz_theme_options[topbar_login_url]', array(
	'label'           	=> esc_html__( 'Login Url', 'boost-biz' ),
	'section'        	=> 'boost_biz_topbar_section',
	'type'				=> 'url',
	'active_callback'	=> 'boost_biz_is_login_register_meta_section_enable',
) );
