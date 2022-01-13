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



$tag               = root_get_option( 'posts_small_tag' );

$article_tag       = ( $tag == 'div' ) ? 'div' : 'article';

$is_show_thumbnail = 'yes' == root_get_option( 'posts_small_show_thumbnail' );

$is_show_date      = 'yes' == root_get_option( 'posts_small_show_date' );

$is_show_category  = 'yes' == root_get_option( 'posts_small_show_category' );

$is_show_comments  = 'yes' == root_get_option( 'posts_small_show_comments' );

$is_show_views     = 'yes' == root_get_option( 'posts_small_show_views' );

$is_show_excerpt   = 'yes' == root_get_option( 'posts_small_show_excerpt' );

$excerpt_length    = root_get_option( 'posts_small_excerpt_length' );



?>



<<?php echo $article_tag ?> id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?> itemscope itemtype="http://schema.org/BlogPosting">

    <?php

        if ( $is_show_thumbnail ) {

            echo '<div class="post-card__image">';

                echo '<a href="' . get_the_permalink() . '">';

                    $thumb = get_the_post_thumbnail( $post->ID, 'thumb-wide', array( 'itemprop'=>'image' ) ); if ( ! empty( $thumb ) ) :

                        echo $thumb;

                    endif;



                    if ( 'post' === get_post_type() && ( $is_show_date || $is_show_category || $is_show_comments || $is_show_views ) ) :

                        if ( empty( $thumb ) ) echo '<div class="thumb-wide"></div>';



                        echo '<div class="entry-meta">';

                            if ( $is_show_date ) {

                                echo '<span class="entry-date"><time itemprop="datePublished" datetime="' . get_the_time( 'Y-m-d' ) . '">' . get_the_date() . '</time></span>';

                            }



                            if ( $is_show_category ) {

                                echo '<span class="entry-category">' . root_category( $post->ID, '', true, false ) . '</span>';

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



        echo '<header class="entry-header">';

            echo '<' . $tag . ' class="entry-title" itemprop="name">';

            echo '<span itemprop="headline">';

            echo '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';

            echo '</span>';

            echo '</'.$tag.'>';

        echo '</header>';



        if ( $is_show_excerpt ) {

            echo '<div class="post-card__content" itemprop="articleBody">';

                add_filter( 'get_the_excerpt', 'remove_the_content_add_ad_filter', 9 );

                $excerpt = do_excerpt( get_the_excerpt(), $excerpt_length );

                $excerpt = apply_filters( THEME_SLUG . '_post_card_excerpt', $excerpt );

                echo $excerpt;

                add_filter( 'get_the_excerpt', 'add_the_content_add_ad_filter', 11 );

            echo '</div>';

        }

    ?>



    <?php if ( ! $is_show_excerpt ) { ?>

        <meta itemprop="articleBody" content="<?php echo get_the_excerpt() ?>">

    <?php } ?>

	<meta itemprop="author" content="<?php the_author() ?>"/>

	<meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php the_permalink() ?>" content="<?php the_title(); ?>">

	<meta itemprop="dateModified" content="<?php the_modified_time( 'Y-m-d' )?>">

	<meta itemprop="datePublished" content="<?php the_time( 'c' ) ?>">

    <?php echo get_microdata_publisher() ?>

    <?php do_action( THEME_SLUG . '_content_card_meta' ); ?>



</<?php echo $article_tag ?>>