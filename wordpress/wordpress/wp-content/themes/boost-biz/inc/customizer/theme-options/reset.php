<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage Boost Biz
 * @since Boost Biz 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'boost_biz_reset_section', array(
	'title'             => esc_html__('Reset all settings','boost-biz'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'boost-biz' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'boost_biz_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'boost_biz_sanitize_checkbox',
	'transport'			  => 'postMessage',
) );

$wp_customize->add_control( 'boost_biz_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'boost-biz' ),
	'section'           => 'boost_biz_reset_section',
	'type'              => 'checkbox',
) );
