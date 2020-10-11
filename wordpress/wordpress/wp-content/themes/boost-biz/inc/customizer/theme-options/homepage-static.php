<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Boost Biz
* @since Boost Biz 1.0.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'boost_biz_theme_options[enable_frontpage_content]', array(
	'sanitize_callback'   => 'boost_biz_sanitize_checkbox',
	'default'             => $options['enable_frontpage_content'],
) );

$wp_customize->add_control( 'boost_biz_theme_options[enable_frontpage_content]', array(
	'label'       	=> esc_html__( 'Enable Content', 'boost-biz' ),
	'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'boost-biz' ),
	'section'     	=> 'static_front_page',
	'type'        	=> 'checkbox',
) );