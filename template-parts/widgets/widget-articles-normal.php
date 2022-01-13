<?php
/**
 * ****************************************************************************
 *
 *   DON'T EDIT THIS FILE
 *   After update you will lose all changes. Use child theme
 *
 *   НЕ РЕДАКТИРУЙТЕ ЭТОТ ФАЙЛ
 *   После обновления Вы потереяете все изменения. Используйте дочернюю тему
 *
 *   https://support.wpshop.ru/docs/general/child-themes/
 *
 * *****************************************************************************
 *
 * @package root
 */

global $single_post;
global $hide_thumbnail;
global $hide_description;
global $hide_category;
global $hide_comments_count;
global $hide_views_count;
global $link_target;

?>

<div class="widget-article widget-article--normal">
    <?php $thumb = get_the_post_thumbnail( $single_post->ID, apply_filters( THEME_SLUG . '_widget_article_normal_thumbnail', 'thumb-wide' ) ); if ( ! $hide_thumbnail && ! empty( $thumb ) ) : ?>
    <div class="widget-article__image">
        <a href="<?php echo get_permalink( $single_post->ID ) ?>"<?php echo ( $link_target == true ) ? ' target="_blank"' : ''; ?>>
            <?php echo $thumb ?>
        </a>
    </div>
    <?php endif ?>

    <div class="widget-article__body">
        <div class="widget-article__title"><a href="<?php echo get_permalink( $single_post->ID ) ?>"<?php echo ( $link_target == true ) ? ' target="_blank"' : ''; ?>><?php echo get_the_title( $single_post->ID ) ?></a></div>

        <?php if ( ! $hide_description ) : ?>
            <div class="widget-article__description">
                <?php echo do_excerpt( get_the_excerpt( $single_post->ID ), apply_filters( THEME_SLUG . '_widget_article_normal_excerpt', 14 ) ) ?>
            </div>
        <?php endif ?>


        <?php if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta">
                <?php if ( ! $hide_category ) : ?>
                    <span class="entry-category">
                        <?php echo root_category( $single_post->ID, '', false ) ?>
                    </span>
                <?php endif ?>

                <?php if ( ! $hide_comments_count || ! $hide_views_count ) : ?>
                    <span class="entry-meta__info">
                        <?php if ( ! $hide_comments_count ) : ?>
                            <span class="entry-meta__comments" title="<?php _e( 'Comments', THEME_TEXTDOMAIN ) ?>"><span class="fa fa-comment-o"></span> <?php echo get_comments_number( $single_post->ID ) ?></span>
                        <?php endif ?>
                        <?php if ( ! $hide_views_count && function_exists( 'the_views' ) ) { ?>
                            <span class="entry-meta__views" title="<?php echo __( 'Views', THEME_TEXTDOMAIN ) ?>"><span class="fa fa-eye"></span>
                                <?php
                                    $post_views = get_post_meta( $single_post->ID, 'views', true );
                                    $post_views = ( ! empty( $post_views ) ) ? $post_views : '0';
                                    echo $post_views;
                                ?>
                            </span>
                        <?php } ?>
                    </span>
                <?php endif ?>
            </div>
        <?php endif ?>
    </div>
</div>