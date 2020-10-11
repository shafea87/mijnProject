<?php
/**
 * About section
 *
 * This is the template for the content of about section
 *
 * @package Theme Palace
 * @subpackage Boost Biz
 * @since Boost Biz 1.0.0
 */
if ( ! function_exists( 'boost_biz_add_about_section' ) ) :
    /**
    * Add about section
    *
    *@since Boost Biz 1.0.0
    */
    function boost_biz_add_about_section() {
    	$options = boost_biz_get_theme_options();
        // Check if about is enabled on frontpage
        $about_enable = apply_filters( 'boost_biz_section_status', true, 'about_section_enable' );

        if ( true !== $about_enable ) {
            return false;
        }
        // Get about section details
        $section_details = array();
        $section_details = apply_filters( 'boost_biz_filter_about_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render about section now.
        boost_biz_render_about_section( $section_details );
    }
endif;

if ( ! function_exists( 'boost_biz_get_about_section_details' ) ) :
    /**
    * about section details.
    *
    * @since Boost Biz 1.0.0
    * @param array $input about section details.
    */
    function boost_biz_get_about_section_details( $input ) {
        $options = boost_biz_get_theme_options();
        
        $content = array();

        $page_id = ! empty( $options['about_content_page'] ) ? $options['about_content_page'] : '';
        $subtitle = array();
        
        $args = array(
            'post_type'         => 'page',
            'page_id'           => $page_id,
            'posts_per_page'    => 1,
            );   

            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                $i = 0;
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['excerpt']   = boost_biz_trim_content( 25 );
                    $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : '';

                    // Push to the main array.
                    array_push( $content, $page_post );
                    $i++;
                endwhile;
            endif;
            wp_reset_postdata();
            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// about section content details.
add_filter( 'boost_biz_filter_about_section_details', 'boost_biz_get_about_section_details' );


if ( ! function_exists( 'boost_biz_render_about_section' ) ) :
  /**
   * Start about section
   *
   * @return string about content
   * @since Boost Biz 1.0.0
   *
   */
   function boost_biz_render_about_section( $content_details = array() ) {
        $options = boost_biz_get_theme_options();
        $readmore = ! empty( $options['about_btn_title'] ) ? $options['about_btn_title'] : esc_html__( 'Learn More', 'boost-biz' );

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="about-us" class="relative page-section">
            <div class="wrapper">
                <?php foreach ( $content_details as $content ) : ?>
                    <article class="<?php echo ! empty( $content['image'] ) ? 'has' : 'no'; ?>-post-thumbnail">
                        <?php if ( ! empty( $content['image'] ) ) : ?>
                            <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                <a href="<?php echo esc_url( $content['url'] ); ?>" class="post-thumbnail-link"></a>
                            </div><!-- .featured-image -->
                        <?php endif; ?>

                        <div class="entry-container">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                            </header>

                            <div class="entry-content">
                                 <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                            </div><!-- .entry-content -->

                            <div class="read-more">
                                <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn">
                                    <span class="screen-reader-text"><?php echo esc_html( $content['title'] ); ?></span>
                                    <?php echo esc_html( $readmore ); ?>
                                </a>
                            </div><!-- .read-more -->
                        </div><!-- .entry-container -->
                    </article>
                <?php endforeach; ?>
            </div><!-- .wrapper -->
        </div><!-- #about-us -->
    <?php }
endif;
