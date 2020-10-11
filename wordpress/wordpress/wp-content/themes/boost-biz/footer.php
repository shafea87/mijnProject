<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage Boost Biz
 * @since Boost Biz 1.0.0
 */

/**
 * boost_biz_footer_primary_content hook
 *
 * @hooked boost_biz_add_contact_section -  10
 *
 */
do_action( 'boost_biz_footer_primary_content' );

/**
 * boost_biz_content_end_action hook
 *
 * @hooked boost_biz_content_end -  10
 *
 */
do_action( 'boost_biz_content_end_action' );

/**
 * boost_biz_content_end_action hook
 *
 * @hooked boost_biz_footer_start -  10
 * @hooked Boost_Biz_Footer_Widgets->add_footer_widgets -  20
 * @hooked boost_biz_footer_site_menu -  40
 * @hooked boost_biz_footer_site_info -  50
 * @hooked boost_biz_footer_end -  100
 *
 */
do_action( 'boost_biz_footer' );

/**
 * boost_biz_page_end_action hook
 *
 * @hooked boost_biz_page_end -  10
 *
 */
do_action( 'boost_biz_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
