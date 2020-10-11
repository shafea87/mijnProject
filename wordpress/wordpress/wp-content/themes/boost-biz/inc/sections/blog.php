<?php
/**
 * Blog section
 *
 * This is the template for the content of blog section
 *
 * @package Theme Palace
 * @subpackage Boost Biz
 * @since Boost Biz 1.0.0
 */
if ( ! function_exists( 'boost_biz_add_blog_section' ) ) :
    /**
    * Add blog section
    *
    *@since Boost Biz 1.0.0
    */
    function boost_biz_add_blog_section() {
    	$options = boost_biz_get_theme_options();
        // Check if blog is enabled on frontpage
        $blog_enable = apply_filters( 'boost_biz_section_status', true, 'blog_section_enable' );

        if ( true !== $blog_enable ) {
            return false;
        }
        // Get blog section details
        $section_details = array();
        $section_details = apply_filters( 'boost_biz_filter_blog_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render blog section now.
        boost_biz_render_blog_section( $section_details );
    }
endif;

if ( ! function_exists( 'boost_biz_get_blog_section_details' ) ) :
    /**
    * blog section details.
    *
    * @since Boost Biz 1.0.0
    * @param array $input blog section details.
    */
    function boost_biz_get_blog_section_details( $input ) {
        $options = boost_biz_get_theme_options();

        // Content type.
        $blog_content_type  = $options['blog_content_type'];
        $blog_count = ! empty( $options['blog_count'] ) ? $options['blog_count'] : 3;
        
        $content = array();
        switch ( $blog_content_type ) {
        	
            case 'category':
                $cat_id = ! empty( $options['blog_content_category'] ) ? $options['blog_content_category'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => absint( $blog_count ),
                    'cat'               => absint( $cat_id ),
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'recent':
                $cat_ids = ! empty( $options['blog_category_exclude'] ) ? $options['blog_category_exclude'] : array();
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => absint( $blog_count ),
                    'category__not_in'  => ( array ) $cat_ids,
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            default:
            break;
        }


        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = boost_biz_trim_content( 20 );
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : '';

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
// blog section content details.
add_filter( 'boost_biz_filter_blog_section_details', 'boost_biz_get_blog_section_details' );


if ( ! function_exists( 'boost_biz_render_blog_section' ) ) :
  /**
   * Start blog section
   *
   * @return string blog content
   * @since Boost Biz 1.0.0
   *
   */
   function boost_biz_render_blog_section( $content_details = array() ) {
        $options = boost_biz_get_theme_options();
        $blog_content_type  = $options['blog_content_type'];
        $readmore = ! empty( $options['blog_readmore_title'] ) ? $options['blog_readmore_title'] : esc_html__( 'Learn More', 'boost-biz' );

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="latest-posts" class="relative page-section">
            <div class="box"></div>
            <div class="wrapper">
                <?php if ( ! empty( $options['blog_title'] ) ) : ?>
                    <div class="section-header-wrapper clear">
                        <div class="section-header">
                            <h2 class="section-title"><?php echo esc_html( $options['blog_title'] ); ?></h2>
                        </div><!-- .section-header -->
                    </div><!-- section header -->
                <?php endif; ?>

                <div class="archive-blog-wrapper clear col-3">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article class="<?php echo ! empty( $content['image'] ) ? 'has' : 'no'; ?>-post-thumbnail">
                            <div class="post-item-wrapper">
                                <?php if ( ! empty( $content['image'] ) ) : ?>
                                    <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>" class="post-thumbnail-link"></a>
                                    </div><!-- .featured-image -->
                                <?php endif; ?>

                                <div class="entry-container">
                                    <div class="entry-meta">
                                        <span class="cat-links">
                                            <?php the_category( ' ', '', $content['id'] ); ?>
                                        </span><!-- .cat-links -->

                                        <?php boost_biz_posted_on( $content['id'] ); ?>

                                    </div><!-- .entry-meta -->

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
                            </div><!-- .post-item-wrapper -->
                        </article>
                    <?php endforeach ?>

                </div><!-- .archive-blog-wrapper --> 
            </div><!-- .wrapper -->
        </div><!-- #latest-posts -->

    <?php }
endif;