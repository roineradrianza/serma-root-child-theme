<?php

/**

 * ****************************************************************************

 *

 *   https://support.wpshop.ru/docs/general/child-themes/

 *

 * *****************************************************************************

 *

 * @package root

 */



$breadcrumbs_display = root_get_option( 'breadcrumbs_display' );



if ( 'yes' == $breadcrumbs_display ) :



    $breadcrumbs_service = 'self';



    if ( function_exists( 'yoast_breadcrumb' ) ) {

        $wpseo_titles = get_option( 'wpseo_titles' );

        if ( $wpseo_titles['breadcrumbs-enable'] ) $breadcrumbs_service = 'yoast';

    }



    if ( $breadcrumbs_service == 'yoast' ) {

        yoast_breadcrumb( '<div class="breadcrumb" id="breadcrumbs">','</div>' );

    } else {

        echo wpshop_breadcrumbs();

    }



endif;