<?php
/**
 * Slider section
 *
 * This is the template for the content of slider section
 *
 * @package Theme Palace
 * @subpackage Boost Biz
 * @since Boost Biz 1.0.0
 */
if ( ! function_exists( 'boost_biz_add_slider_section' ) ) :
    /**
    * Add slider section
    *
    *@since Boost Biz 1.0.0
    */
    function boost_biz_add_slider_section() {
    	$options = boost_biz_get_theme_options();
        // Check if slider is enabled on frontpage
        $slider_enable = apply_filters( 'boost_biz_section_status', true, 'slider_section_enable' );

        if ( true !== $slider_enable ) {
            return false;
        }
        // Get slider section details
        $section_details = array();
        $section_details = apply_filters( 'boost_biz_filter_slider_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render slider section now.
        boost_biz_render_slider_section( $section_details );
    }
endif;

if ( ! function_exists( 'boost_biz_get_slider_section_details' ) ) :
    /**
    * slider section details.
    *
    * @since Boost Biz 1.0.0
    * @param array $input slider section details.
    */
    function boost_biz_get_slider_section_details( $input ) {
        $options = boost_biz_get_theme_options();
        
        $content = array();
        $page_ids = array();

        for ( $i = 1; $i <= 3; $i++ ) {
            if ( ! empty( $options['slider_content_page_' . $i] ) )
                $page_ids[] = $options['slider_content_page_' . $i];
        }
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 3,
            'orderby'           => 'post__in',
            );                    
           

            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['id']        = get_the_id();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['excerpt']   = boost_biz_trim_content( 15 );
                    $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

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
// slider section content details.
add_filter( 'boost_biz_filter_slider_section_details', 'boost_biz_get_slider_section_details' );


if ( ! function_exists( 'boost_biz_render_slider_section' ) ) :
  /**
   * Start slider section
   *
   * @return string slider content
   * @since Boost Biz 1.0.0
   *
   */
   function boost_biz_render_slider_section( $content_details = array() ) {
        $options = boost_biz_get_theme_options();
        $btn_label = ! empty( $options['slider_btn_label'] ) ? $options['slider_btn_label'] : esc_html__( 'Learn More', 'boost-biz' );

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="introduction-section" class="relative">
            <div class="wrapper">
                <div class="introduction-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": true, "arrows":false, "autoplay": <?php echo $options['slider_autoplay_enable'] ? 'true': 'false'; ?>, "draggable": true, "fade": true }'>
                    <?php foreach ( $content_details as $content ) : 
                    $class = has_post_thumbnail( $content['id'] ) ? 'has-post-thumbnail' : 'no-post-thumbnail';
                    ?>
                        <article class="<?php echo esc_attr( $class ); ?>">
                            <?php if ( ! empty( $content['image'] ) ) : ?>
                                <div class="featured-image" style="background-image:url(<?php echo esc_url( $content['image'] ); ?>)">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="post-thumbnail-link"></a>
                                </div><!-- .featured-image -->
                            <?php endif; ?>

                            <div class="entry-container">
                            <?php
                                $social_enable = apply_filters( 'boost_biz_section_status', true, 'slider_section_social_nav_enable' );

                                if ( true == $social_enable ) {  ?>
                                        
                                    <div class="social-icons">
                                        <?php  
                                        wp_nav_menu( 
                                            array(
                                                'theme_location' => 'social',
                                                'container' => false,
                                                'menu_class' => 'social-icons',
                                                'echo' => true,
                                                'fallback_cb' => 'boost_biz_menu_fallback_cb',
                                                'depth' => 1,
                                                'link_before' => '<span class="screen-reader-text">',
                                                'link_after' => '</span>',
                                                )
                                            );
                                
                                        ?>
                                    </div><!-- .social-icons -->
                                <?php } ?>

                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                </header>

                                <div class="entry-content">
                                    <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                </div><!-- .entry-content -->

                                <div class="buttons">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn">
                                        <span class="screen-reader-text"><?php echo esc_html( $content['title'] ); ?></span> 
                                        <?php echo esc_html( $btn_label ); ?>
                                    </a>
                                </div><!-- .buttons -->
                            </div><!-- .entry-container -->
                        </article>
                     <?php endforeach; ?>
                </div><!-- .introduction-slider -->
            </div><!-- .wrapper -->
        </div><!-- #introduction-section -->
    <?php }
endif;