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



$is_show_meta           = 'checked' != get_post_meta( $post->ID, 'meta_hide', true );

$is_show_reading_time   = 'yes' == root_get_option( 'structure_single_reading_time' );

$is_show_date           = 'yes' == root_get_option( 'structure_single_date' );

$is_show_date_modified  = 'yes' == root_get_option( 'structure_single_date_modified' );

$is_show_category       = 'yes' == root_get_option( 'structure_single_category' );

$is_show_author         = 'yes' == root_get_option( 'structure_single_author' );

$is_shop_social_top     = 'yes' == root_get_option( 'structure_single_social' ) && 'checked' != get_post_meta( $post->ID, 'share_top_hide', true );



if ( $is_show_meta && ( $is_show_reading_time || $is_show_date || $is_show_date_modified || $is_show_category || $is_show_author || $is_shop_social_top ) ) :

    echo '<div class="entry-meta">';

        if ( $is_show_reading_time ) echo '<span class="entry-time mr-1"><span class="entry-label">' . __( 'Reading', THEME_TEXTDOMAIN ) . ':</span> ' . wpshop_read_time() . ' ' . __( 'min', THEME_TEXTDOMAIN ) . '</span>';

        if ( $is_show_category ) echo '<span class="entry-category mr-1"><span class="hidden-xs">'. __( 'Category', THEME_TEXTDOMAIN ) .':</span> ' . root_category() . '</span>';

        if ( $is_show_author ) echo '<span class="mr-1 secondary-text"><span aria-hidden="true" class="far fa-user-circle primary-text"></span> <span class="hidden-xs">'. __( 'Por', THEME_TEXTDOMAIN ) .'</span> <span itemprop="author primary-text">' . get_the_author() . '</span></span>';
        
        if ( $is_show_date ) echo '<span class="mr-1"><span class="entry-label secondary-text"><span aria-hidden="true" class="fas fa-calendar primary-text"></span> ' . '</span> <time class="secondary-text" itemprop="datePublished" datetime="' . get_the_time( 'Y-m-d' ) . '">' . get_the_date() . '</time></span>';
        
        if ( $is_show_date_modified ) echo '<span class="entry-date mr-1"><span class="entry-label">' . __( 'Modified by', THEME_TEXTDOMAIN ) . ':</span> <time itemprop="dateModified" datetime="' . get_the_modified_time( 'Y-m-d' ) . '">' . get_the_modified_date() . '</time></span>';



        if ( $is_shop_social_top ) {

            echo '<span class="b-share b-share--small">';

            get_template_part( 'template-parts/social', 'buttons' );

            echo '</span>';

        }

    echo '</div><!-- .entry-meta -->';

endif;