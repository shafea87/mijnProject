<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Boost Biz
 * @since Boost Biz 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'boost_biz_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'boost-biz' ),
		'priority'   			=> 900,
		'panel'      			=> 'boost_biz_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'boost_biz_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'boost_biz_santize_allow_tag',
	)
);

$wp_customize->add_control( 'boost_biz_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'boost-biz' ),
		'section'    			=> 'boost_biz_section_footer',
		'type'		 			=> 'textarea',
    )
);

// scroll top visible
$wp_customize->add_setting( 'boost_biz_theme_options[scroll_top_visible]',
	array(
		'default'       	=> $options['scroll_top_visible'],
		'sanitize_callback' => 'boost_biz_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Boost_Biz_Switch_Control( $wp_customize, 'boost_biz_theme_options[scroll_top_visible]',
    array(
		'label'      		=> esc_html__( 'Display Scroll Top Button', 'boost-biz' ),
		'section'    		=> 'boost_biz_section_footer',
		'on_off_label' 		=> boost_biz_switch_options(),
    )
) );