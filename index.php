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



get_header(); ?>



<div id="primary" class="serma-container">

    <div class="serma-container-md d-flex">

        <main id="main" class="site-main serma-main px-1">

            <?php if ( have_posts() ) : ?>

            <?php if ( is_home() && ! is_front_page() ) :

                echo '<h1 class="page-title screen-reader-text">' . single_post_title( '', false ) . '</h1>';

            endif; ?>

            <?php if ( 'top' == root_get_option( 'structure_home_position' ) ) get_template_part( 'template-parts/home', 'content' ); ?>

            <?php

            if ( apply_filters( THEME_SLUG . '_slider_output', is_front_page() || is_home() ) ) {

                if ( root_get_option( 'structure_slider_width' ) == 'content' ) {

                    if ( ! is_paged() || ( root_get_option( 'structure_slider_show_on_paged' ) && is_paged() ) ) {

                        get_template_part( 'template-parts/slider', 'posts' );

                    }

                }

            }

            ?>

            <?php get_template_part( 'template-parts/layout/archive', root_get_option( 'structure_home_posts' ) ); ?>



            <?php the_posts_pagination(); ?>



            <?php if ( 'bottom' == root_get_option( 'structure_home_position' ) ) get_template_part( 'template-parts/home', 'content' ); ?>





            <?php else : ?>



            <?php get_template_part( 'template-parts/content', 'none' ); ?>



            <?php endif; ?>


        </main><!-- #main -->

        <?php if ( root_get_option( 'structure_home_sidebar' ) != 'none' ) get_sidebar(); ?>

    </div>


</div><!-- #primary -->



<?php


get_footer();