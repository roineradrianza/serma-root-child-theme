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


global $wp_query;

$is_show_description = root_get_option( 'structure_archive_description_show' );

add_action('wp_enqueue_scripts', 'serma_post_ajax_loader');



get_header(); ?>

    <div class="serma-container-md d-flex justify-space-between pt-2">
        

        <div id="primary" class="content-area">
            
            <main id="main" class="site-main serma-archive-container">

                <?php if(is_author()) get_template_part('template-parts/layout/author-profile') ?>


                <?php if ( root_get_option( 'structure_archive_breadcrumbs' ) == 'yes' ) {

                    get_template_part( 'template-parts/boxes/breadcrumbs' );

                } ?>



                <?php if ( have_posts() ) : ?>



                <header class="page-header">

                    <div class="d-flex align-center recent-title">
                        <h2 class="flex-none heading-text">
                            <span>
                                Publicaciones recientes
                            </span>
                            
                            <span>
                                Encuentra lo que necesitas
                            </span>
                        </h2>
                            <hr class="mt-2 ml-2 serma-h-divider">
                    </div>

                    <?php wp_nav_menu([
                        'menu' => 'Categorías',
                        'menu_class' => 'menu serma-menu-categories'
                    ]) ?>


                    <?php if ( root_get_option( 'structure_child_categories' ) == 'yes' && is_category() ) {



                    $cat = get_query_var('cat');



                    $categories = get_categories( array(

                        'parent' => $cat

                    ) );



                    if ( ! empty( $categories ) ) {


                            echo '<div class="child-categories"><ul>';

                            foreach ( $categories as $category ) {

                                echo '<li>';

                                echo '<a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a>';

                                echo '</li>';

                            }

                            echo '</ul></div>';

                        }

                    } ?>



                    <?php // if ( $is_show_description == 'yes' && 'top' == root_get_option( 'structure_archive_description' ) && ! is_paged() ) the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>

                </header><!-- .page-header -->



                <?php do_action( THEME_SLUG . '_archive_before_posts' ); ?>

                <?php get_template_part( 'template-parts/layout/archive', root_get_option( 'structure_archive_posts' ) ); ?>

                <?php do_action( THEME_SLUG . '_archive_after_posts' ); ?>


                <?php if ( $wp_query->max_num_pages > 1 ) get_template_part( 'template-parts/post-ajax-loader' ) ?>


                <?php if ( $is_show_description == 'yes' && 'bottom' == root_get_option( 'structure_archive_description' ) && ! is_paged() ) the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>

                <?php else : ?>

                <?php get_template_part( 'template-parts/content', 'none' ); ?>

                <?php endif; ?>

            </main><!-- #main -->

        </div><!-- #primary -->

        <?php if ( root_get_option( 'structure_archive_sidebar' ) != 'none' ) get_sidebar(); ?>

    </div>

<?php


get_footer();