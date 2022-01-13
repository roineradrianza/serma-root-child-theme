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

?>



<?php

$social_buttons = apply_filters( THEME_SLUG . '_social_share_buttons', array(

    'vk', 'fb', 'twitter', 'ok', 'whatsapp', 'viber', 'telegram', //'mail', 'linkedin', 'reddit', 'pinterest',

) );

?>

<div class="social-buttons-container">

    <?php foreach ( $social_buttons as $social_button ) : ?>

        
    <?php if ( $social_button == 'fb' ) : ?>

    <span class="b-share__ico b-share__fb js-share-link" data-uri="https://www.facebook.com/sharer.php?u=<?php echo urlencode( get_the_permalink() ) ?>"></span>

    <?php elseif ( $social_button == 'whatsapp' ) : ?>

    <span class="b-share__ico b-share__whatsapp js-share-link js-share-link-no-window" data-uri="whatsapp://send?text=<?php echo urlencode( get_the_title() ) ?>%20<?php echo urlencode( get_the_permalink() ) ?>"></span>

    <?php endif; ?>


    <?php endforeach; ?>

</div>