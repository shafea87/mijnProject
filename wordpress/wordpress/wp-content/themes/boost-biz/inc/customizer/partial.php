<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage Boost Biz
* @since Boost Biz 1.0.0
*/

if ( ! function_exists( 'boost_biz_topbar_login_label_partial' ) ) :
    // contact button Title
    function boost_biz_topbar_login_label_partial() {
        $options = boost_biz_get_theme_options();
        return esc_html( $options['topbar_login_label'] );
    }
endif;

if ( ! function_exists( 'boost_biz_about_btn_title_partial' ) ) :
    // about button Title
    function boost_biz_about_btn_title_partial() {
        $options = boost_biz_get_theme_options();
        return esc_html( $options['about_btn_title'] );
    }
endif;

if ( ! function_exists( 'boost_biz_service_title_partial' ) ) :
    // service title
    function boost_biz_service_title_partial() {
        $options = boost_biz_get_theme_options();
        return esc_html( $options['service_title'] );
    }
endif;

if ( ! function_exists( 'boost_biz_blog_title_partial' ) ) :
    // blog title
    function boost_biz_blog_title_partial() {
        $options = boost_biz_get_theme_options();
        return esc_html( $options['blog_title'] );
    }
endif;

if ( ! function_exists( 'boost_biz_cta_btn_title_partial' ) ) :
    // cta btn title
    function boost_biz_cta_btn_title_partial() {
        $options = boost_biz_get_theme_options();
        return esc_html( $options['cta_btn_title'] );
    }
endif;

