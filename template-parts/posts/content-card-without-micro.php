<?php

/**

 * ****************************************************************************

 *

 *   https://support.wpshop.ru/docs/general/child-themes/

 *

 * *****************************************************************************

 *

 * @package root

 */

$tag               = root_get_option( 'posts_related_tag' );

$article_tag       = ( $tag == 'div' ) ? 'div' : 'article';

$is_show_thumbnail = 'yes' == root_get_option( 'posts_related_show_thumbnail' );

$is_show_date      = 'yes' == root_get_option( 'posts_related_show_date' );

$is_show_category  = 'yes' == root_get_option( 'posts_related_show_category' );

$is_show_comments  = 'yes' == root_get_option( 'posts_related_show_comments' );

$is_show_views     = 'yes' == root_get_option( 'posts_related_show_views' );

$is_show_excerpt   = 'yes' == root_get_option( 'posts_related_show_excerpt' );

$excerpt_length    = root_get_option( 'posts_related_excerpt_length' );

$excerpt_length    = root_get_option( 'posts_related_excerpt_length' );

?>

<<?php echo $article_tag ?> id="post-<?php the_ID(); ?>" <?php post_class( 'post-card post-card-related' ); ?>>
    <div class="post-container">
        <?php

        if ( $is_show_thumbnail ) {

            echo '<div class="post-card__image">';

                echo '<a href="' . get_the_permalink() . '">';

                    $thumb = get_the_post_thumbnail( $post->ID, 'large' ); if ( ! empty( $thumb ) ) :

                        echo $thumb;

                    endif;



                    if ( 'post' === get_post_type() && ( $is_show_date || $is_show_category || $is_show_comments || $is_show_views ) ) :

                        if ( empty( $thumb ) ) echo '<div class="thumb-wide"></div>';



                        echo '<div class="entry-meta px-2">';

                            if ( $is_show_category ) {

                                echo '<span class="entry-category">' . root_category( $post->ID, '', false, false ) . '</span>';

                            }

                            echo '<span class="entry-meta__info">';

                                if ( $is_show_comments ) {

                                    echo '<span class="entry-meta__comments" title="' . __( 'Comments', THEME_TEXTDOMAIN ) . '"><span class="fa fa-comment-o"></span> ' . get_comments_number() . '</span>';

                                }



                                if ( $is_show_views ) {

                                    if ( function_exists('the_views') ) {

                                        echo '<span class="entry-meta__views" title="' . __( 'Views', THEME_TEXTDOMAIN ) . '"><span class="fa fa-eye"></span> ';

                                        the_views();

                                        echo '</span>';

                                    }

                                }

                            echo '</span>';

                        echo '</div>';

                    endif;

                echo '</a>';

            echo '</div>';

        }

        echo '<header class="entry-header px-2 my-2">';

        echo '<' . $tag . ' class="entry-title">';

        echo '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';

        echo '</' . $tag . '>';

        echo '</header>';

        if ( $is_show_excerpt ) {

            echo '<div class="post-card__content px-2 mb-2">';

                add_filter( 'get_the_excerpt', 'remove_the_content_add_ad_filter', 9 );

                $excerpt = do_excerpt( get_the_excerpt(), $excerpt_length );

                $excerpt = apply_filters( THEME_SLUG . '_post_card_without_micro_excerpt', $excerpt );

                echo $excerpt;

                add_filter( 'get_the_excerpt', 'add_the_content_add_ad_filter', 11 );

            echo '</div>';

        }

        ?>

        <div class='entry-footer text-left px-2 pt-1'>
            Por <a class="primary-text" href="<?php echo esc_url( get_author_posts_url(get_the_author_meta('ID'))) ?>">
            <span class="primary-text"><?php the_author() ?></span></a> 
            • <?php echo $is_show_date ? '<span class="entry-date">' . get_the_date() . '</span>' : '' ?>
        </div>

    </div>

</<?php echo $article_tag ?>>