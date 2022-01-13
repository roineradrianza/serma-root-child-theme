<article class="d-flex serma-cta-baby-names">
    <div class="serma-cta-image-container">
        <img class="serma-cta-image"
            src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/cta/1/desarrollo-de-tu-bebe.png"
            alt="desarrollo de tu bebe">
    </div>
    <div class="serma-cta-container">
        <div style="padding: 0px 20px">
            <h3 style="font-size: 30px; color: #A28EEC; margin: 0px">¡Sigue el desarrollo de tu bebé!</h3>
            <p class="black-text mt-2">
                Recibe emails semanales sobre el desarrollo de tu bebé y de tu embarazo.
            </p>
            <form id="cta_baby_names_form"
                action="<?php echo site_url() ?>/wp-admin/admin-ajax.php?action=serma_sendy_subscribe_baby_growing"
                method="POST">
                <input type="hidden" name="url_referrer" title="<?php echo get_permalink() ?>">
                <div class="d-flex serma-form-container mb-2 basic-info">
                    <input class="mr-2 serma-field-input" name="name" type="text" placeholder="Nombre">
                    <input class="serma-field-input" name="email" type="email" placeholder="Email" required>
                </div>
                <div class="d-block mt-2">
                    <select class="serma-field-input serma-container" name="pregnancy_week"
                        placeholder="Semana de embarazo" required>
                        <?php for ($i=1; $i <= 40; $i++) : ?>
                        <option value="<?echo " Semana $i" ?>">Semana <?php echo $i?></option>
                        <?php endfor?>
                    </select>
                </div>
                <button type="submit" class="white-text mt-3 serma-submit-btn"
                    serma-sendy-subscribe-button><span serma-sendy-subscribe-text>Enviar</span></button>
                <div class="mt-2">
                    <p serma-sendy-message></p>
                </div>
            </form>
        </div>
    </div>
</article>