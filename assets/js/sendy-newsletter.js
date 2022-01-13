(function($)

{

    $('#newsletter_form').on('submit', (e) => {
        e.preventDefault()
        serma_sendy_subscribe({
            form_id: 'newsletter_form'
        })
    })

    $('#newsletter_footer_form').on('submit', (e) => {
        e.preventDefault()
        serma_sendy_subscribe({
            form_id: 'newsletter_footer_form',
            subscribe_text: false,
        })
    })

    if ($('#cta_baby_names_form').length > 0) {
        $('#cta_baby_names_form').on('submit', (e) => {
            e.preventDefault()
            serma_sendy_subscribe({
                form_id: 'cta_baby_names_form',
                action: 'serma_sendy_subscribe_baby_growing'
            })
        })   
    }


    function serma_sendy_subscribe({form_id = '', subscribe_text = true, action = 'serma_sendy_subscribe'}) {
        let data = new FormData(document.getElementById(form_id))

        let button = $(`#${form_id} [serma-sendy-subscribe-button]`)
        let subscribe_text_input = $(`#${form_id} [serma-sendy-subscribe-text]`)
        let message = $(`#${form_id} [serma-sendy-message]`)

        message.text('')
        subscribe_text ? subscribe_text_input.text('Enviando...') : ''
        button.prop('disabled', 'true')

        fetch(serma_root_ajaxurl + action, {
            method: 'POST',
            body: data
         }).then(response => response.json())
         .then(data => {
            button.removeAttr('disabled')
            subscribe_text ? subscribe_text_input.text('Subscribirme') : ''
            switch (data.message) {
                case 'Subscribed!':
                    message.text('¡Gracias por subscribirte!')
                    break;
            
                case 'Already subscribed!':
                    message.text('¡Ya te encuentras suscrito!')
                    break;
                
                default:
                    message.text('¡Ocurrió un error inesperado, intente de nuevo!')
                    break;
            }
         });
    }

})( jQuery );