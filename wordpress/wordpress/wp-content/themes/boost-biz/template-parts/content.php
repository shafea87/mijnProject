<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Boost Biz
 * @since Boost Biz 1.0.0
 */

$options = boost_biz_get_theme_options();
$class = has_post_thumbnail() ? '' : 'no-post-thumbnail';
$readmore = ! empty( $options['read_more_text'] ) ? $options['read_more_text'] : esc_html__( 'Read More', 'boost-biz' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>
    <div class="post-item-wrapper">
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'post-thumbnail' ); ?>');">
                <a href="<?php the_permalink(); ?>" class="post-thumbnail-link"></a>
            </div><!-- .featured-image -->
        <?php endif; ?>

        <div class="entry-container">
            <div class="entry-meta">
                <?php if ( ! $options['hide_category'] ) : ?>
                    <span class="cat-links">
                        <?php the_category(); ?>
                    </span><!-- .cat-links -->
                <?php endif;

                if ( ! $options['hide_date'] ) :
                    boost_biz_posted_on();
                endif; ?>
            </div><!-- .entry-meta -->

            <header class="entry-header">
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </header>

            <div class="entry-content">
                <?php the_excerpt(); ?>
            </div><!-- .entry-content -->

            <div class="read-more">
                <a href="<?php the_permalink(); ?>" class="btn">
                    <span class="screen-reader-text"><?php the_title(); ?></span>
                    <?php echo esc_html( $readmore ); ?>
                </a>
            </div><!-- .read-more -->
        </div><!-- .entry-container -->
    </div><!-- .post-item-wrapper -->
</article><!-- #post-## -->
