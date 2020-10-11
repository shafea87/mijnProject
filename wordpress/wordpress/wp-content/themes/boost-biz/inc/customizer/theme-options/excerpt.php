<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Boost Biz
 * @since Boost Biz 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'boost_biz_excerpt_section', array(
	'title'             => esc_html__( 'Excerpt','boost-biz' ),
	'description'       => esc_html__( 'Excerpt section options.', 'boost-biz' ),
	'panel'             => 'boost_biz_theme_options_panel',
) );


// long Excerpt length setting and control.
$wp_customize->add_setting( 'boost_biz_theme_options[long_excerpt_length]', array(
	'sanitize_callback' => 'boost_biz_sanitize_number_range',
	'validate_callback' => 'boost_biz_validate_long_excerpt',
	'default'			=> $options['long_excerpt_length'],
) );

$wp_customize->add_control( 'boost_biz_theme_options[long_excerpt_length]', array(
	'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'boost-biz' ),
	'description' 		=> esc_html__( 'Total words to be displayed in archive page/search page.', 'boost-biz' ),
	'section'     		=> 'boost_biz_excerpt_section',
	'type'        		=> 'number',
	'input_attrs' 		=> array(
		'style'       => 'width: 80px;',
		'max'         => 100,
		'min'         => 5,
	),
) );

// read more text setting and control
$wp_customize->add_setting( 'boost_biz_theme_options[read_more_text]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['read_more_text'],
) );

$wp_customize->add_control( 'boost_biz_theme_options[read_more_text]', array(
	'label'           	=> esc_html__( 'Read More Text Label', 'boost-biz' ),
	'section'        	=> 'boost_biz_excerpt_section',
	'type'				=> 'text',
) );
