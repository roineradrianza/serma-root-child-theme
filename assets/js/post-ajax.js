window.addEventListener('load', function () {
    (function($)

    {
    
        $('.serma-loader-button').click(function(){
     
            let button = $(this)
    
            let posts_container = $('.posts-container')
    
            let data = {
                'query': serma_post_ajax.posts,
                'page' : serma_post_ajax.current_page
            };
    
            $.ajax({
                url : serma_root_ajaxurl + 'serma_post_ajax',
                data : data,
                type : 'POST',
                beforeSend : function ( xhr ) {
                    button.text('Cargando...')
                },
                success : function( data ){
                    if( data ) { 
                        button.html( 'Cargar más <span class="fas fa-circle-notch"></span>' )
                        posts_container.append(data)
                        serma_post_ajax.current_page++
     
                        if ( serma_post_ajax.current_page == serma_post_ajax.max_page ) 
                            button.remove()

                    } else {
                        button.remove()
                    }
                }
            });
        });
    
    })( jQuery );
})