<div class="serma-container newsletter mt-2">
    <div class="serma-container">
        <h3 class="newsletter-title heading-text">
            <?php echo is_single() ? '¿Te gustó lo que leíste?' : '¿Deseas leer más?' ?></h3>
        <p class="heading-text">
            Suscríbete para recibir información que te interesa.
        </p>
    </div>
    <form class="form" action="<?php echo site_url() ?>/wp-admin/admin-ajax.php?action=serma_sendy_subscribe"
        id="newsletter_form" method="POST">
        <div class="form_container">
            <input type="hidden" name="url_referrer" title="<?php echo get_permalink() ?>">
            <div class="serma-container">
                <input class="input_field" type="email" name="email" title="Correo electrónico"
                    placeholder="Ingresa tu correo electrónico" style="width: 100%">
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
                <small class="secondary-text">
                    Acepto recibir comunicaciones por correo electrónico de sermadre.com que incluyen noticias,
                    actualizaciones, alertas de acción y otros mensajes que envía sermadre.
                </small>
            </div>
            <div class="d-flex justify-center mt-2">
                <button class="newsletter-form_submit bg-primary" type="submit" title="Subscribirme"
                    serma-sendy-subscribe-button>
                    <span class="white-text" serma-sendy-subscribe-text>
                        Subscribirme
                    </span>
                </button>
            </div>

            <div class="d-flex justify-center mt-2">
                <p serma-sendy-message></p>
            </div>
        </div>
    </form>
</div>