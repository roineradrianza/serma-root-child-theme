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


?>
<?php

get_header();



$big_thumbnail_image   = ( 'checked' == get_post_meta( $post->ID, 'big_thumbnail_image', true ) ) ? true : false ;



$is_show_thumb         = 'yes' == root_get_option( 'structure_page_thumb' ) && 'checked' != get_post_meta( $post->ID, 'thumb_hide', true );

$is_show_breadcrumbs   = 'checked' != get_post_meta( $post->ID, 'breadcrumbs_hide', true );

$is_show_title         = 'checked' != get_post_meta( $post->ID, 'h1_hide', true );

$is_shop_social_top    = 'yes' == root_get_option( 'structure_page_social' ) && 'checked' != get_post_meta( $post->ID, 'share_top_hide', true );

$is_show_social_bottom = 'yes' == root_get_option( 'structure_page_social' );

$is_show_comments      = 'yes' == root_get_option( 'structure_page_comments' ) && 'checked' != get_post_meta( $post->ID, 'comments_hide', true );

$is_show_sidebar       = root_get_option( 'structure_page_sidebar' ) != 'none' && 'checked' != get_post_meta( $post->ID, 'sidebar_hide', true );

$is_show_sidebar       = apply_filters( 'root_page_sidebar_show', $is_show_sidebar );





?>



<?php while ( have_posts() ) : the_post(); ?>



<div class="serma-container" itemscope itemtype="http://schema.org/Article">



	<div id="primary serma-container-md" class="">

		<main id="main" class="site-main">

            <?php



            get_template_part( 'template-parts/content', 'page' );



            // If comments are open or we have at least one comment, load up the comment template.

            if ( $is_show_comments ) {

                if ( comments_open() || get_comments_number() ) :

                    comments_template();

                endif;

            }



            ?>



		</main><!-- #main -->

        <?php if ( $is_show_sidebar ) get_sidebar(); ?>

	</div><!-- #primary -->



<?php endwhile; ?>


</div><!-- micro -->


<?php

get_footer();

