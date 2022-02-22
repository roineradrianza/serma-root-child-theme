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



global $authordata;



$author_link          = root_get_option( 'author_link' );

$author_link_target   = root_get_option( 'author_link_target' );

$author_social_enable = root_get_option( 'author_social_enable' );

$is_show_social_js    = root_get_option( 'author_social_js' );



?>



<!--noindex-->

<div class="author-box">

    <div class="author-box_header d-flex primary-text">
        <span class="author-header_icon">
            <?php echo file_get_contents(get_stylesheet_directory_uri() . '/assets/icons/author-box/avatar.svg'); ?>
        </span>
        Sobre el autor de este artículo
    </div>

    <hr class="mb-2">

    <div class="author-box__ava">

        <?php echo get_avatar( get_the_author_meta( 'user_email' ), 100 ); ?>

    </div>



    <div class="author-box__body">

        <div class="author-box__author">

            <?php

            if ( $author_link ) {

                $author_link_target = $author_link_target ? '_blank' : '_self';

                echo '<a href ="' . get_author_posts_url( $authordata->ID ) . '" target="' . $author_link_target . '">
                <h2 class="black-text">' . get_the_author_meta( 'serma_job_title' ) . ' ' . get_the_author() . '</h2></a>';
            } else {

                echo '<h2 class="black-text">' . get_the_author() . '</h2>';
                echo '<p class="font-weight-normal black-text">'. get_the_author_meta( 'serma_job_title' ) .'</p>';

            } ?>

        </div>

        <div class="author-box__description">

            <!--noindex--><?php echo wpautop( get_the_author_meta( 'description' ) ) ?><!--/noindex-->

        </div>

        <?php

        if ( $author_social_enable ) {



            $author_social_profiles = array(

                'facebook', 'vk', 'twitter', 'ok', 'telegram', 'youtube',

                'instagram', 'linkedin', 'whatsapp', 'viber', 'pinterest',

                'yandexzen', 'github', 'discord',

            );



            foreach ( $author_social_profiles as $author_social_profile ) {

                $user_meta_social = get_user_meta( $authordata->ID, $author_social_profile, true );



                if ( $user_meta_social ) {

                    $author_social_profile_links[$author_social_profile] = $user_meta_social;

                }

            }



            if ( ! empty( $author_social_profile_links ) ) { ?>

                <div class="author-box__social">

                    <?php if ( apply_filters( THEME_SLUG . '_author_social_title_show', true ) ) { ?>

                        <div class="author-box__social-title"><?php echo apply_filters( THEME_SLUG . '_author_social_title', __( 'Author profiles', THEME_TEXTDOMAIN ) ) ?></div>

                    <?php } ?>



                    <div class="social-links">

                        <div class="social-buttons social-buttons--square social-buttons--circle social-buttons--small">

                            <?php

                            foreach ( $author_social_profiles as $author_social_profile ) {

                                $author_social_profile_link = get_user_meta( $authordata->ID, $author_social_profile, true );

                                if ( ! empty( $author_social_profile_link ) ) {

                                    if ( $author_social_profile == 'whatsapp' ) $author_social_profile_link = 'https://api.whatsapp.com/send?phone=' . $author_social_profile_link;

                                    if ( $author_social_profile == 'viber' ) $author_social_profile_link = 'viber://chat?number=' . $author_social_profile_link;



                                    if ( $is_show_social_js ) {

                                        echo '<span class="social-button social-button__'. $author_social_profile .' js-link" data-href="' . base64_encode( $author_social_profile_link ) . '" data-target="_blank"></span>';

                                    } else {

                                        echo '<a class="social-button social-button__'. $author_social_profile .'" href="' . esc_attr( $author_social_profile_link ) . '" target="_blank"></a>';

                                    }

                                }

                            }

                            ?>

                        </div>

                    </div>

                </div>

            <?php }



        } ?>



    </div>

</div>

<!--/noindex-->