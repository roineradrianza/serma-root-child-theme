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





$footer_class        = ( root_get_option( 'footer_widgets_equal_width' ) ) ? 'site-footer-container--equal-width' : '';

$is_show_arrow       = 'yes' == root_get_option( 'structure_arrow' );

$structure_arrow_mob = ( 'yes' == root_get_option( 'structure_arrow_mob' ) ) ? ' data-mob="on"' : '';

?>





<?php do_action( THEME_SLUG . '_before_footer' ); ?>



<footer id="site-footer" class="site-footer serma-container <?php root_site_footer_classes() ?> <?php echo $footer_class ?>" itemscope
    itemtype="http://schema.org/WPFooter">

    <div class="site-footer-inner footer-row serma-container-md <?php root_site_footer_inner_classes() ?>">
        <div class="footer-col-1">
            <?php the_custom_logo() ?>
            <p class="secondary-text pt-1">
                Somos el portal para madres líder en Latinoamérica. Te brindamos la mejor ayuda para tu bebé y para ti.
            </p>
        </div>
        <div class="footer-col-2">
            <h4 class="black-text">Descubre</h4>
            <ul class="list-style-none">
                <li class="pb-1"><a href="#">Comunidad</a></li>
                <li class="pb-1"><a href="#">Tarjeta de invitación</a></li>
                <li class="pb-1"><a href="#">Calculadoras</a></li>
                <li class="pb-1"><a href="#">Nombres para bebés</a></li>
                <li class="pb-1"><a href="#">Blog</a></li>
            </ul>
        </div>
        <div class="footer-col-3">
            <h4 class="black-text">Información</h4>
            <ul class="list-style-none">
                <li class="pb-1"><a href="#">Preguntas frecuentes</a></li>
                <li class="pb-1"><a href="#">Contacto</a></li>
                <li class="pb-1"><a href="#">Condiciones de uso</a></li>
                <li class="pb-1"><a href="#">Políticas de privacidad</a></li>
            </ul>
        </div>
        <div class="footer-col-4">
            <h4 class="black-text mb-2">Suscríbete</h4>
            <form class="form newsletter mb-2"
                action="<?= site_url() ?>/wp-admin/admin-ajax.php?action=serma_sendy_subscribe"
                id="newsletter_footer_form" method="POST">
                <div class="form_container sendy-fn-row">
                    <input type="hidden" name="url_referrer" title="<?= $referrer_url ?>">
                    <div class="sendy-fn-col-1">
                        <input class="input_field" type="email" name="email" title="Correo electrónico"
                            placeholder="Ingresa tu correo electrónico" style="width: 100%">
                    </div>
                    <div class="sendy-fn-col-2">
                        <button class="newsletter-form_submit bg-primary" type="submit" title="Subscribirme"
                            serma-sendy-subscribe-button>
                            <span aria-hidden="true" class="fas fa-paper-plane white-text">
                            </span>
                        </button>
                    </div>
                    <div class="serma-container mt-1">
                        <input type="checkbox" name="tos_accepted" required="required" aria-required="true">
                        <label for="tos_accepted">
                            <span class="secondary-text">
                                He leído y acepto los
                                <a href="https://sermadre.com/terminos-y-condiciones/" style="color: #5FC2EC">
                                    Términos y
                                    condiciones
                                </a>
                            </span>
                        </label>
                        <br>
                    </div>
                </div>
                <div class="mt-1">
                    <p serma-sendy-message></p>
                </div>
            </form>
            <h4>Síguenos</h4>
            <div class="d-flex mt-2 social-media-container">
                <a class="social-media-link mr-1" href="https://www.facebook.com/sermadrela/">
                    <span aria-hidden="true" class="fab fa-facebook fa-lg"></span>
                </a>

                <a class="social-media-link mr-1" href="#">
                    <span aria-hidden="true" class="fab fa-twitter fa-lg"></span>
                </a>

                <a class="social-media-link mr-1 google-plus" href="#">
                    <span aria-hidden="true" class="fab fa-google-plus-g fa-lg"></span>
                </a>

                <a class="social-media-link mr-1 instagram" href="https://www.instagram.com/sermadreoficial/?hl=es">
                    <span aria-hidden="true" class="fab fa-instagram fa-lg"></span>
                </a>
            </div>
        </div>
    </div>


    </div><!-- .site-footer-inner -->

    <div class="footer-bottom">

        <div class="footer-info d-flex justify-center font-weight-light">

            <?php

                $footer_copyright = root_get_option( 'footer_copyright' );

                $footer_copyright = str_replace( '%year%', date( 'Y' ), $footer_copyright );

                echo $footer_copyright;

                ?>



            <?php

                $footer_text = root_get_option( 'footer_text' );

                if ( ! empty( $footer_text ) ) echo '<div class="footer-text">' . $footer_text . '</div>';

                ?>



            <?php if ( 'yes' == root_get_option( 'wpshop_partner_enable' ) ) : ?>

            <!--noindex-->

            <div class="footer-partner">

                <?php

                        wpshop_partner_link( array(

                            'prefix' => root_get_option( 'wpshop_partner_prefix' ),

                            'postfix' => root_get_option( 'wpshop_partner_postfix' )

                        ) );

                        ?>

            </div>

            <!--/noindex-->

            <?php endif; ?>

        </div><!-- .site-info -->



        <?php if ( root_get_option(  'footer_social' ) == 'yes' ) {

                get_template_part( 'template-parts/social', 'links' );

            } ?>



        <?php

            $footer_counters = root_get_option( 'footer_counters' );

            if ( ! empty( $footer_counters ) ) echo '<div class="footer-counters">'. $footer_counters .'</div>';

            ?>

    </div>
</footer><!-- .site-footer -->





<?php if ( $is_show_arrow ) { ?>

<button type="button" class="scrolltop js-scrolltop" <?php echo $structure_arrow_mob ?>></button>

<?php } ?>



<?php do_action( THEME_SLUG . '_after_footer' ); ?>