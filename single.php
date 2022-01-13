<?php

/**

 * @package root

 */



get_header();



$big_thumbnail_image = ( 'checked' == get_post_meta( $post->ID, 'big_thumbnail_image', true ) ) ? true : false ;



$is_show_thumb       = 'yes' == root_get_option( 'structure_single_thumb' ) && 'checked' != get_post_meta( $post->ID, 'thumb_hide', true );

$is_show_breadcrumbs = 'checked' != get_post_meta( $post->ID, 'breadcrumbs_hide', true );

$is_show_title       = 'checked' != get_post_meta( $post->ID, 'h1_hide', true );

$is_show_comments    = 'yes' == root_get_option( 'structure_single_comments' ) && 'checked' != get_post_meta( $post->ID, 'comments_hide', true );

$is_show_sidebar     = root_get_option( 'structure_single_sidebar' ) != 'none' && 'checked' != get_post_meta( $post->ID, 'sidebar_hide', true );



?>

<div class="serma-container-md d-flex justify-space-between pt-2">

    <div class="d-flex serma-social-desktop-btns">
        <div class="d-flex flex-direction-column p-sticky">
            <a class="serma-social-btn text-center serma-facebook mb-2"
                onclick="window.open('https://www.facebook.com/sharer.php?u=<?php echo get_permalink() ?>','popup','width=600,height=600'); return false;"
                href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink() ?>" target="popup">
                <span class="fab fa-facebook-f fa-lg">
                </span>
            </a>
            <a class="serma-social-btn text-center serma-whatsapp mb-2"
                onclick="window.open('https://api.whatsapp.com/send?text=*<?php echo get_the_title() ?>* <?php echo get_permalink() ?>','popup','width=600,height=600'); return false;"
                href="https://api.whatsapp.com/send?text=*<?php echo get_the_title() ?>* <?php echo get_permalink() ?>"
                target="popup">
                <span class="fab fa-whatsapp fa-lg">
                </span>
            </a>
            <a class="serma-social-btn text-center serma-twitter mb-2"
                onclick="window.open('https://twitter.com/intent/tweet?text=<?php echo get_the_title() ?>-<?php echo get_permalink() ?>','popup','width=600,height=600'); return false;"
                href="https://twitter.com/intent/tweet?text=<?php echo get_the_title() ?>-%<?php echo get_permalink() ?>"
                target="popup">
                <span class="fab fa-twitter fa-lg">
                </span>
            </a>
            <a class="serma-social-btn text-center serma-pinterest mb-2"
                onclick="window.open('https://pinterest.com/pin/create/button/?url=<?php echo get_permalink() ?>&media=&description=<?php echo get_the_title() ?>','popup','width=600,height=600'); return false;"
                href="https://pinterest.com/pin/create/button/?url=<?php echo get_permalink() ?>&media=&description=<?php echo get_the_title() ?>"
                target="popup">
                <span class="fab fa-pinterest fa-lg">
                </span>
            </a>
        </div>
    </div>
    <?php while ( have_posts() ) : the_post(); ?>



    <div itemscope itemtype="http://schema.org/Article">



        <?php if ( $big_thumbnail_image ) : ?>



        <?php $thumb = get_the_post_thumbnail( $post->ID, 'full', array( 'itemprop'=>'image' ) ); if ( ! empty( $thumb ) && $is_show_thumb ) : ?>

        <div class="entry-image entry-image--big">

            <?php echo $thumb ?>

            <?php else : ?>

            <div class="entry-image entry-image--big entry-image--no-thumb">

                <?php endif; ?>



                <div class="entry-image__title">

                    <?php if ( $is_show_breadcrumbs ) get_template_part( 'template-parts/boxes/breadcrumbs' ); ?>



                    <?php if ( $is_show_title ) { ?>

                    <?php do_action( THEME_SLUG . '_single_before_title' ); ?>

                    <h1 itemprop="headline"><?php the_title() ?></h1>

                    <?php do_action( THEME_SLUG . '_single_after_title' ); ?>

                    <?php } ?>



                    <?php if ( 'post' === get_post_type() ) : ?>

                    <div class="entry-meta">

                        <?php get_template_part( 'template-parts/post', 'meta' ) ?>

                    </div><!-- .entry-meta -->

                    <?php endif; ?>

                </div>



            </div>



            <?php endif;?>



            <div id="primary" class="content-area">

                <main id="main" class="site-main">



                    <?php if ( ! $big_thumbnail_image && $is_show_breadcrumbs ) get_template_part( 'template-parts/boxes/breadcrumbs' ); ?>



                    <?php



            get_template_part( 'template-parts/content', 'single' );



            // If comments are open or we have at least one comment, load up the comment template.

            if ( $is_show_comments ) {

                if ( comments_open() || get_comments_number() ) :

                   if (shortcode_exists('serma_post_comments_form')) {
                        do_shortcode( '[serma_post_comments_form]' );
                   }

                   else {
                        comments_template();
                   }


                endif;

            }



			?>



                </main><!-- #main -->

            </div><!-- #primary -->



        </div><!-- micro -->



        <?php endwhile; ?>


        <?php if ( $is_show_sidebar ) get_sidebar(); ?>

    </div>

    <?php

get_footer();