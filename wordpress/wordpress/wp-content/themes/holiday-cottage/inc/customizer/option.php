<?php
/**
 * Theme Options
 *
 * @package Holiday_Cottage
 */

$default = holiday_cottage_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel(
	'theme_option_panel',
	array(
		'title'    => esc_html__( 'Theme Options', 'holiday-cottage' ),
		'priority' => 100,
	)
);

// Header Section.
$wp_customize->add_section(
	'section_header',
	array(
		'title' => esc_html__( 'Header Options', 'holiday-cottage' ),
		'panel' => 'theme_option_panel',
	)
);

// Setting show_site_title.
$wp_customize->add_setting(
	'theme_options[show_site_title]',
	array(
		'default'           => $default['show_site_title'],
		'sanitize_callback' => 'holiday_cottage_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	'theme_options[show_site_title]',
	array(
		'label'   => esc_html__( 'Show Site Title', 'holiday-cottage' ),
		'section' => 'section_header',
		'type'    => 'checkbox',
	)
);

// Setting show_site_tagline.
$wp_customize->add_setting(
	'theme_options[show_site_tagline]',
	array(
		'default'           => $default['show_site_tagline'],
		'sanitize_callback' => 'holiday_cottage_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	'theme_options[show_site_tagline]',
	array(
		'label'   => esc_html__( 'Show Site Tagline', 'holiday-cottage' ),
		'section' => 'section_header',
		'type'    => 'checkbox',
	)
);

// Setting book_button_text.
$wp_customize->add_setting(
	'theme_options[book_button_text]',
	array(
		'default'           => $default['book_button_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'theme_options[book_button_text]',
	array(
		'label'   => esc_html__( 'Book Button Text', 'holiday-cottage' ),
		'section' => 'section_header',
		'type'    => 'text',
	)
);

// Setting book_button_url.
$wp_customize->add_setting(
	'theme_options[book_button_url]',
	array(
		'default'           => $default['book_button_url'],
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	'theme_options[book_button_url]',
	array(
		'label'   => esc_html__( 'Book Button URL', 'holiday-cottage' ),
		'section' => 'section_header',
		'type'    => 'url',
	)
);

// Setting enable_top_bar.
$wp_customize->add_setting(
	'theme_options[enable_top_bar]',
	array(
		'default'           => $default['enable_top_bar'],
		'sanitize_callback' => 'holiday_cottage_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	'theme_options[enable_top_bar]',
	array(
		'label'   => esc_html__( 'Enable Top Bar', 'holiday-cottage' ),
		'section' => 'section_header',
		'type'    => 'checkbox',
	)
);

// Setting contact_phone.
$wp_customize->add_setting(
	'theme_options[contact_phone]',
	array(
		'default'           => $default['contact_phone'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'theme_options[contact_phone]',
	array(
		'label'   => esc_html__( 'Contact Phone', 'holiday-cottage' ),
		'section' => 'section_header',
		'type'    => 'text',
	)
);

// Setting contact_email.
$wp_customize->add_setting(
	'theme_options[contact_email]',
	array(
		'default'           => $default['contact_email'],
		'sanitize_callback' => 'sanitize_email',
	)
);
$wp_customize->add_control(
	'theme_options[contact_email]',
	array(
		'label'   => esc_html__( 'Contact Email', 'holiday-cottage' ),
		'section' => 'section_header',
		'type'    => 'email',
	)
);

// Blog Section.
$wp_customize->add_section(
	'section_blog',
	array(
		'title' => esc_html__( 'Blog Options', 'holiday-cottage' ),
		'panel' => 'theme_option_panel',
	)
);

// Setting blog_title.
$wp_customize->add_setting(
	'theme_options[blog_title]',
	array(
		'default'           => $default['blog_title'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'theme_options[blog_title]',
	array(
		'label'   => esc_html__( 'Blog Title', 'holiday-cottage' ),
		'section' => 'section_blog',
		'type'    => 'text',
	)
);

// Setting show_content.
$wp_customize->add_setting(
	'theme_options[show_content]',
	array(
		'default'           => $default['show_content'],
		'sanitize_callback' => 'holiday_cottage_sanitize_select',
	)
);
$wp_customize->add_control(
	'theme_options[show_content]',
	array(
		'label'   => esc_html__( 'Show Content', 'holiday-cottage' ),
		'section' => 'section_blog',
		'type'    => 'select',
		'choices' => array(
			'short' => esc_html__( 'Excerpt', 'holiday-cottage' ),
			'full'  => esc_html__( 'Full', 'holiday-cottage' ),
		),
	)
);

// Setting excerpt_length.
$wp_customize->add_setting(
	'theme_options[excerpt_length]',
	array(
		'default'           => $default['excerpt_length'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'theme_options[excerpt_length]',
	array(
		'label'   => esc_html__( 'Excerpt Length', 'holiday-cottage' ),
		'section' => 'section_blog',
		'type'    => 'number',
	)
);

// Setting read_more_text.
$wp_customize->add_setting(
	'theme_options[read_more_text]',
	array(
		'default'           => $default['read_more_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'theme_options[read_more_text]',
	array(
		'label'   => esc_html__( 'Read More Text', 'holiday-cottage' ),
		'section' => 'section_blog',
		'type'    => 'text',
	)
);

// Footer Section.
$wp_customize->add_section(
	'section_footer',
	array(
		'title' => esc_html__( 'Footer Options', 'holiday-cottage' ),
		'panel' => 'theme_option_panel',
	)
);

// Setting copyright_message.
$wp_customize->add_setting(
	'theme_options[copyright_message]',
	array(
		'default'           => $default['copyright_message'],
		'sanitize_callback' => 'holiday_cottage_sanitize_textarea_content',
	)
);
$wp_customize->add_control(
	'theme_options[copyright_message]',
	array(
		'label'   => esc_html__( 'Copyright Text', 'holiday-cottage' ),
		'section' => 'section_footer',
		'type'    => 'textarea',
	)
);

// Color Section.
$wp_customize->add_section(
	'section_color',
	array(
		'title' => esc_html__( 'Color Options', 'holiday-cottage' ),
		'panel' => 'theme_option_panel',
	)
);

$color_defaults = holiday_cottage_get_default_colors();
$color_options  = holiday_cottage_get_color_theme_settings_options();

if ( ! empty( $color_options ) ) {
	foreach ( $color_options as $key => $col ) {
		$wp_customize->add_setting(
			'theme_options[' . $key . ']',
			array(
				'default'           => $color_defaults[ $key ],
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			'theme_options[' . $key . ']',
			array(
				'label'    => $col['label'],
				'section'  => 'section_color',
				'type'     => 'color',
				'settings' => 'theme_options[' . $key . ']',
			)
		);
	}
}
