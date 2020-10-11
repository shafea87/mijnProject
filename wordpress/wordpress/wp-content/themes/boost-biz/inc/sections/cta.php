<?php
/**
 * Call to action section
 *
 * This is the template for the content of cta section
 *
 * @package Theme Palace
 * @subpackage Boost Biz
 * @since Boost Biz 1.0.0
 */
if ( ! function_exists( 'boost_biz_add_cta_section' ) ) :
    /**
    * Add cta section
    *
    *@since Boost Biz 1.0.0
    */
    function boost_biz_add_cta_section() {
    	$options = boost_biz_get_theme_options();
        // Check if cta is enabled on frontpage
        $cta_enable = apply_filters( 'boost_biz_section_status', true, 'cta_section_enable' );

        if ( true !== $cta_enable ) {
            return false;
        }
        // Get cta section details
        $section_details = array();
        $section_details = apply_filters( 'boost_biz_filter_cta_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render cta section now.
        boost_biz_render_cta_section( $section_details );
    }
endif;

if ( ! function_exists( 'boost_biz_get_cta_section_details' ) ) :
    /**
    * cta section details.
    *
    * @since Boost Biz 1.0.0
    * @param array $input cta section details.
    */
    function boost_biz_get_cta_section_details( $input ) {
        $options = boost_biz_get_theme_options();

        $content = array();

        $page_id = ! empty( $options['cta_content_page'] ) ? $options['cta_content_page'] : '';
        $args = array(
            'post_type'         => 'page',
            'page_id'           => $page_id,
            'posts_per_page'    => 1,
            );                    

            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['excerpt']   = boost_biz_trim_content( 25 );

                    // Push to the main array.
                    array_push( $content, $page_post );
                endwhile;
            endif;
            wp_reset_postdata();
            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// cta section content details.
add_filter( 'boost_biz_filter_cta_section_details', 'boost_biz_get_cta_section_details' );


if ( ! function_exists( 'boost_biz_render_cta_section' ) ) :
  /**
   * Start cta section
   *
   * @return string cta content
   * @since Boost Biz 1.0.0
   *
   */
   function boost_biz_render_cta_section( $content_details = array() ) {
        $options = boost_biz_get_theme_options();
        $readmore = ! empty( $options['cta_btn_title'] ) ? $options['cta_btn_title'] : esc_html__( 'Contact Us', 'boost-biz' );

        if ( empty( $content_details ) ) {
            return;
        } 

        foreach ( $content_details as $content ) : ?>
            <div id="call-to-action" class="relative page-section">
                <div class="wrapper">
                    <div class="call-to-action-content">
                        <div class="section-header">
                            <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
                        </div><!-- .section-header -->

                        <div class="section-content">
                            <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                        </div><!-- .section-content -->

                    </div><!-- .call-to-action-content -->
                        <div class="read-more">
                            <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn">
                                <span class="screen-reader-text"><?php echo esc_html( $content['title'] ); ?></span>
                                <?php echo esc_html( $readmore ); ?>
                            </a>
                        </div><!-- .buttons -->

                </div><!-- .wrapper -->
            </div><!-- #call-to-action -->
        <?php endforeach;
    }
endif;