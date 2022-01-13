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

$tag               = root_get_option( 'post_one_big_tag' );
$article_tag       = ( $tag == 'div' ) ? 'div' : 'article';
$is_show_thumbnail = 'yes' == root_get_option( 'post_one_big_show_thumbnail' );
$is_show_date      = 'yes' == root_get_option( 'post_one_big_show_date' );
$is_show_category  = 'yes' == root_get_option( 'post_one_big_show_category' );
$is_show_author    = 'yes' == root_get_option( 'post_one_big_show_author' );
$is_show_comments  = 'yes' == root_get_option( 'post_one_big_show_comments' );
$is_show_views     = 'yes' == root_get_option( 'post_one_big_show_views' );
$is_show_excerpt   = 'yes' == root_get_option( 'post_one_big_show_excerpt' );
$excerpt_length    = root_get_option( 'post_one_big_excerpt_length' );
$root_skin         = root_get_option( 'skin' );

?>

<<?php echo $article_tag ?> id="post-<?php the_ID() ?>" <?php post_class( 'post-box' ) ?> itemscope itemtype="http://schema.org/BlogPosting">
	<?php
	    echo '<header class="entry-header">';
            echo '<' . $tag . ' class="entry-title" itemprop="name">';
            echo '<span itemprop="headline">';
            echo '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
            echo '</span>';
            echo '</'.$tag.'>';

            echo '<div class="entry-meta">';
                if ( $is_show_date ) {
                    echo '<span class="entry-date"><time itemprop="datePublished" datetime="' . get_the_time( 'Y-m-d' ) . '">' . get_the_date() . '</time></span>';
                }
                if ( $is_show_category ) {
                    echo '<span class="entry-category"><span class="hidden-xs">'. __( 'Category', THEME_TEXTDOMAIN ) .':</span> ' . root_category() . '</span>';
                }
                if ( $is_show_author ) {
                    echo '<span class="entry-author"><span class="hidden-xs">' . __( 'Author', THEME_TEXTDOMAIN ) . ':</span> <span itemprop="author">' . get_the_author() . '</span></span>';
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
        echo '</header>';

        if ( $is_show_thumbnail ) {
            $thumb = get_the_post_thumbnail( $post->ID, 'thumb-big', array( 'itemprop'=>'image' ) ); if ( ! empty( $thumb ) ) :
            echo '<div class="entry-image">';
                echo '<a href="' . get_the_permalink() . '">';
                echo $thumb;
                echo '</a>';
            echo '</div>';
            endif;
        }

        if ( $is_show_excerpt ) {
            echo '<div class="post-box__content" itemprop="articleBody">';
                $excerpt = do_excerpt( get_the_excerpt(), $excerpt_length );
                $excerpt = apply_filters( THEME_SLUG . '_post_content_excerpt', $excerpt );
                echo $excerpt;
            echo '</div>';

            echo '<footer class="post-box__footer">';
                echo '<a href="' . get_the_permalink() . '" class="' . apply_filters( THEME_SLUG . '_post_content_excerpt_more_classes', 'entry-footer__more' ) . '">';
                echo apply_filters( THEME_SLUG . '_post_content_excerpt_more', __( 'Read more', THEME_TEXTDOMAIN ) );
                echo '</a>';
            echo '</footer>';
        }
    ?>

    <?php if ( ! $is_show_excerpt ) { ?>
        <meta itemprop="articleBody" content="<?php echo get_the_excerpt() ?>">
    <?php } ?>
    <?php if ( ! $is_show_author ) { ?>
        <meta itemprop="author" content="<?php the_author() ?>">
    <?php } ?>
    <?php if ( ! $is_show_date ) { ?>
        <meta itemprop="datePublished" content="<?php the_time( 'c' ) ?>">
    <?php } ?>
	<meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php the_permalink() ?>" content="<?php the_title(); ?>">
	<meta itemprop="dateModified" content="<?php the_modified_time( 'Y-m-d' )?>">
    <?php echo get_microdata_publisher() ?>

    <?php do_action( THEME_SLUG . '_content_card_meta' ); ?>

</<?php echo $article_tag ?>>