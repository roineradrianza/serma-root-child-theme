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



<header id="masthead" class="site-header <?php root_site_header_classes() ?>" itemscope
    itemtype="http://schema.org/WPHeader">

    <div class="site-header-inner serma-container-md pt-1 pb-1 <?php root_site_header_inner_classes() ?>">
        <div class="serma-container-md header-row">
        <div class="hr-col-1 hamburger-container">
            <div class="mob-hamburger">
                <i class="fas fa-bars fa-lg black-text closed-menu" onclick="document.querySelector('.mob-search').style.display = 'block'"></i>
                <i class="fas fa-times fa-lg black-text opened-menu" onclick="document.querySelector('.mob-search').style.display = 'none'"></i>
            </div>
        </div>
        <div class="site-branding">

            <?php

            $root_logotype = root_get_option( 'logotype_image' );



            if ( ! empty( $root_logotype ) ) {

                $root_logotype_attachment_id = attachment_url_to_postid( $root_logotype );

                if ( ! empty( $root_logotype_attachment_id ) ) {

                    $root_logotype_metadata = wp_get_attachment_metadata( $root_logotype_attachment_id );



                    if ( ! empty( $root_logotype_metadata['width'] ) ) {

                        $root_logotype_attributes[] = 'width="' . $root_logotype_metadata['width'] . '"';

                    }

                    if ( ! empty( $root_logotype_metadata['height'] ) ) {

                        $root_logotype_attributes[] = 'height="' . $root_logotype_metadata['height'] . '"';

                    }

                }

            }



            $root_logotype_attributes[] = 'alt="' . esc_attr( apply_filters( THEME_SLUG . '_logotype_alt', get_bloginfo( 'name' ) ) ) . '"';

            $root_logotype_html = '<img src="' . $root_logotype . '" ' . implode( ' ', $root_logotype_attributes ) . '>';



            if ( ! empty( $root_logotype ) ) {

                if ( is_front_page() ) {

                    if ( is_home() && is_paged()  ) {

                        echo '<div class="site-logotype hr-col-1"><a href="'. esc_url( home_url( '/' ) ) .'">' . $root_logotype_html . '</a></div>';

                    } else {

                        echo '<div class="site-logotype hr-col-1">' . $root_logotype_html . '</div>';

                    }

                } else {

                    echo '<div class="site-logotype hr-col-1"><a href="'. esc_url( home_url( '/' ) ) .'">' . $root_logotype_html . '</a></div>';

                }

            }

            ?>



            <?php if ( root_get_option( 'header_hide_title' ) == 'no' ) { ?>

            <div class="site-branding-container">



                <?php

                    $root_structure_home_h1 = root_get_option( 'structure_home_h1' );

                    if ( ! $root_structure_home_h1 ) $root_structure_home_h1 = '';



                    $site_title_text = get_bloginfo( 'name' );

                    $site_title_tag = 'div';



                    if ( is_front_page() && is_home() ) {



                        if ( empty( $root_structure_home_h1 ) ) {

                            $site_title_tag = 'h1';

                        }



                        if ( is_paged() ) {

                            $site_title_text = '<a href="' . esc_url( home_url( '/' ) ) . '">' . get_bloginfo( 'name' ) . '</a>';

                        }



                    } else {

                        if ( ! is_front_page() ) {

                            $site_title_text = '<a href="' . esc_url( home_url( '/' ) ) . '">' . get_bloginfo( 'name' ) . '</a>';

                        }

                    }



                    echo '<'. $site_title_tag .' class="site-title">' . $site_title_text . '</'. $site_title_tag .'>';

                    ?>



                <?php



                    $description = get_bloginfo( 'description', 'display' );

                    if ( $description || is_customize_preview() ) : ?>

                <p class="site-description"><?php echo $description; ?></p>

                <?php

                    endif; ?>



            </div>

            <?php } ?>

        </div><!-- .site-branding -->



        <?php $header_html_block_1 = root_get_option( 'header_html_block_1' );

        if ( ! empty( $header_html_block_1 ) ) { ?>

        <div class="header-html-1">

            <?php echo do_shortcode( $header_html_block_1 ) ?>

        </div>

        <?php } ?>


        <?php if ( has_nav_menu( 'top_menu' ) ) { ?>

        <div class="top-menu">

            <?php wp_nav_menu( array( 'theme_location' => 'top_menu', 'menu_id' => 'top_menu' ) ); ?>

        </div>

        <?php } ?>



        <?php $header_html_block_2 = root_get_option( 'header_html_block_2' );

        if ( ! empty( $header_html_block_2 ) ) { ?>

        <div class="header-html-2">

            <?php echo do_shortcode( $header_html_block_2 ) ?>

        </div>

        <?php } ?>

        <div class="d-md-inline hr-col-2">
            <div class="search-container">
                <form action="<?php echo get_home_url(); ?>" method="GET">
                    <input placeholder="Buscar" class="search-bar" type="search" name="s" title="Buscar" value="">
                    <button type="submit">
                        <span class="fas fa-search"></span>
                    </button>
                </form>
            </div>
        </div>

        <div class="hr-col-3 col-md-3">
            <div class="d-flex avatar-container">
                <div class="avatar d-flex align-center">
                    <span class="fas fa-user-circle secondary-text fa-2x mr-1"></span>
                    <span class="black-text login-text">Ingresa</span>
                </div>
                <div class="register-container ml-2">
                    <button class="register-button">
                        +Únete
                    </button>
                </div>
            </div>
        </div>

        </div>




        <?php $root_header_search_mob = root_get_option( 'header_search_mob' );

        if ( $root_header_search_mob == 'yes' ) { ?>

        <div class="mob-search mt-1" style="display: none !important;"><?php get_search_form(); ?></div>

        <?php } ?>

    </div>
    <!--.site-header-inner-->

</header><!-- #masthead -->