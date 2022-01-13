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

<div class="serma-container-md d-flex justify-space-between pt-2">

    <section id="primary" class="content-area">

        <main id="main" class="site-main serma-archive-container" role="main">



            <?php

        if ( have_posts() ) : ?>

            <header class="page-header">

                <div class="d-flex align-center recent-title">
                    <h2 class="flex-none heading-text">
                        Coincidencias de búsqueda
                    </h2>
                    <hr class="mt-2 ml-2 serma-h-divider">
                </div>
            </header><!-- .page-header -->

            <?php

            do_action( THEME_SLUG . '_archive_before_posts' );

            get_template_part( 'template-parts/layout/archive', root_get_option( 'structure_archive_posts' ) );

            do_action( THEME_SLUG . '_archive_after_posts' );

            $wp_query->max_num_pages > 1 ? get_template_part( 'template-parts/post-ajax-loader' ) : '';
    
        else:

            get_template_part( 'template-parts/content', 'none' );

        endif; ?>

        </main><!-- #main -->

        
    </section><!-- #primary -->
    
    <?php if ( root_get_option( 'structure_archive_sidebar' ) != 'none' ) get_sidebar(); ?>

</div>

<?php




get_footer();