<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage Boost Biz
 * @since Boost Biz 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function boost_biz_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'boost-biz' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of category for category choices.
 * @return Array Array of post ids and name.
 */
function boost_biz_category_choices() {
    $tax_args = array(
        'hierarchical' => 0,
        'taxonomy'     => 'category',
    );
    $taxonomies = get_categories( $tax_args );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'boost-biz' );
    foreach ( $taxonomies as $tax ) {
        $choices[ $tax->term_id ] = $tax->name;
    }
    return  $choices;
}

if ( ! function_exists( 'boost_biz_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function boost_biz_site_layout() {
        $boost_biz_site_layout = array(
            'wide'  => get_template_directory_uri() . '/assets/images/full.png',
            'boxed-layout' => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'boost_biz_site_layout', $boost_biz_site_layout );
        return $output;
    }
endif;

if ( ! function_exists( 'boost_biz_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function boost_biz_selected_sidebar() {
        $boost_biz_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'boost-biz' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar', 'boost-biz' ),
        );

        $output = apply_filters( 'boost_biz_selected_sidebar', $boost_biz_selected_sidebar );

        return $output;
    }
endif;


if ( ! function_exists( 'boost_biz_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function boost_biz_global_sidebar_position() {
        $boost_biz_global_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'boost_biz_global_sidebar_position', $boost_biz_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'boost_biz_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function boost_biz_sidebar_position() {
        $boost_biz_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'boost_biz_sidebar_position', $boost_biz_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'boost_biz_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function boost_biz_pagination_options() {
        $boost_biz_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'boost-biz' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'boost-biz' ),
        );

        $output = apply_filters( 'boost_biz_pagination_options', $boost_biz_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'boost_biz_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function boost_biz_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'boost-biz' ),
            'off'       => esc_html__( 'Disable', 'boost-biz' )
        );
        return apply_filters( 'boost_biz_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'boost_biz_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function boost_biz_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'boost-biz' ),
            'off'       => esc_html__( 'No', 'boost-biz' )
        );
        return apply_filters( 'boost_biz_hide_options', $arr );
    }
endif;
