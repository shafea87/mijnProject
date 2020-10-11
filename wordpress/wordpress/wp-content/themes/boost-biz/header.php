<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage Boost Biz
	 * @since Boost Biz 1.0.0
	 */

	/**
	 * boost_biz_doctype hook
	 *
	 * @hooked boost_biz_doctype -  10
	 *
	 */
	do_action( 'boost_biz_doctype' );

?>
<head>
<?php
	/**
	 * boost_biz_before_wp_head hook
	 *
	 * @hooked boost_biz_head -  10
	 *
	 */
	do_action( 'boost_biz_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>

<?php
	/**
	 * boost_biz_page_start_action hook
	 *
	 * @hooked boost_biz_page_start -  10
	 *
	 */
	do_action( 'boost_biz_page_start_action' ); 

	/**
	 * boost_biz_loader_action hook
	 *
	 * @hooked boost_biz_loader -  10
	 *
	 */
	do_action( 'boost_biz_before_header' );

	/**
	 * boost_biz_header_action hook
	 *
	 * @hooked boost_biz_header_start -  10
	 * @hooked boost_biz_site_branding -  20
	 * @hooked boost_biz_site_navigation -  30
	 * @hooked boost_biz_header_end -  50
	 *
	 */
	do_action( 'boost_biz_header_action' );

	/**
	 * boost_biz_content_start_action hook
	 *
	 * @hooked boost_biz_content_start -  10
	 *
	 */
	do_action( 'boost_biz_content_start_action' );

	/**
	 * boost_biz_header_image_action hook
	 *
	 * @hooked boost_biz_header_image -  10
	 *
	 */
	do_action( 'boost_biz_header_image_action' );

    if ( boost_biz_is_frontpage() ) {
    	$options = boost_biz_get_theme_options();
    	$sorted = array();
    	if ( ! empty( $options['sortable'] ) ) {
			$sorted = explode( ',' , $options['sortable'] );
		}

		foreach ( $sorted as $section ) {
			add_action( 'boost_biz_primary_content', 'boost_biz_add_'. $section .'_section' );
		}
		do_action( 'boost_biz_primary_content' );
	}
	