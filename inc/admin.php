<?php
/**
 * ****************************************************************************
 *
 *   НЕ РЕДАКТИРУЙТЕ ЭТОТ ФАЙЛ
 *   DON'T EDIT THIS FILE
 *
 * *****************************************************************************
 *
 * @package root
 */

$theme_name       = 'root';
$api_url          = 'https://wpshop.ru/api.php';
$ver              = $theme_version;

// fix old version with check_license() in header.php
$root_check_license_function = apply_filters( THEME_SLUG . '_check_license_function', true );
if ( ! function_exists( 'check_license' ) && $root_check_license_function ) :
    function check_license() {
        root_check_license();
    }
endif;

function root_check_license() {

    $license_verify = get_option( 'license_root_verify' );
    $license_error  = get_option( 'license_root_error' );

    if ( ! empty( $license_verify ) && empty( $license_error ) ) {
        //TODO: проверка на истечение лицензии
    } else {
        exit( '<p style="text-align: center;font-size:20px;">Необходимо активировать лицензию в разделе Настройки - Root</p>' );
    }
}


/**
 * Создаем страницу настроек темы
 */
add_action( 'admin_menu', 'revelation_admin_menu' );
function revelation_admin_menu() {
    add_options_page( 'Root', 'Root', 'manage_options', 'revelation', 'revelation_settings_display' );
}

function revelation_settings_display() {
    echo '<div class="wrap">';
        echo '<h1>' . get_admin_page_title() . '</h1>';

        echo '<div style="background: #fff;padding: 10px 20px;border: 2px solid #4057a3;margin: 10px 0;">';
        echo '  <h2>' . __( 'You can familiarize yourself with the documentation on the topic', THEME_TEXTDOMAIN ) . ' <a href="https://support.wpshop.ru/docs/themes/root/" target="_blank">' . __( 'by this link', THEME_TEXTDOMAIN ) . '</a>.</h2>';
        echo '  <p>' . __( 'Appearance and color settings are in the customizer', THEME_TEXTDOMAIN ) . ' <strong>' . __( 'Appearance> Settings', THEME_TEXTDOMAIN ) . '</strong>.</p>';
        echo '</div>';

        echo '<form action="options.php" method="POST">';
            settings_fields( 'option_group' );     // скрытые защитные поля
            do_settings_sections( 'revelation_page' ); // секции с настройками (опциями). У нас она всего одна 'section_id'
            submit_button();
        echo '</form>';
    echo '</div>';
}



/**
 * Регистрируем настройки.
 * Настройки будут храниться в массиве, а не одна настройка = одна опция.
 */
add_action( 'admin_init', 'plugin_settings' );
function plugin_settings() {
    // параметры: $option_group, $option_name, $sanitize_callback
    register_setting( 'option_group', 'revelation_options', 'sanitize_callback' );

    // параметры: $id, $title, $callback, $page
    add_settings_section( 'section_id', __( 'Basic settings', THEME_TEXTDOMAIN ), '', 'revelation_page' );

    // параметры: $id, $title, $callback, $page, $section, $args
    add_settings_field('field_license', __( 'License key', THEME_TEXTDOMAIN ), 'field_license_display', 'revelation_page', 'section_id' );

    add_settings_field(
        'field_settings',
        __( 'Settings', THEME_TEXTDOMAIN ),
        'field_settings_display',
        'revelation_page',
        'section_id'
    );
}


function field_settings_display() {

//    $nonce = wp_create_nonce( 'wpshop_reset_settings' );

    $export = get_option( 'root_options' );
    if ( ! empty( $export ) ) {
        $export = base64_encode( json_encode( $export ) );
    }

    echo '<div class="wpshop-export-settings">';
    echo '<label>' . __( 'Export settings', THEME_TEXTDOMAIN ) . ':</label>';
    echo '<textarea class="large-text code" onmouseover="this.select()">' . $export . '</textarea>';
    echo '<p class="description">' . __( 'Copy this code to any text file to save all settings of this site', THEME_TEXTDOMAIN ) . '</p>';
    echo '</div>';

    echo '<div class="wpshop-import-settings">';
    echo '<label>' . __( 'Import settings', THEME_TEXTDOMAIN ) . ':</label>';
    echo '<textarea name="import_settings" class="large-text code"></textarea>';
    echo '<p class="description">' . __( 'Danger! Old settings will be removed before import! Paste code to this field and press Save', THEME_TEXTDOMAIN ) . '</p>';
    echo '</div>';

//    echo '<div class="wpshop-reset-settings">';
//    echo '<button class="button button-danger js-wpshop-reset-settings" data-nonce="'. $nonce .'">' . __( 'Reset all settings', $this->options->text_domain ) . '</button>';
//    echo '<p class="description">' . __( 'Danger! Reset all customizer settings. Reset counters, styles, sidebar settings etc.', $this->options->text_domain ) . '</p>';
//    echo '</div>';

}


function field_license_display() {
    $val = get_option( 'revelation_options' );
    if ( isset( $val['license'] ) ) {
        $val = $val['license'];
    } else {
        $val = '';
    }

    $license_hide = get_option( 'revelation_options' );
    if ( isset( $license_hide['license_hide'] ) ) {
        $license_hide = $license_hide['license_hide'];
    } else {
        $license_hide = '';
    }

    $license_root_error = get_option( 'license_root_error' );
	if ( ! empty( $license_root_error ) ) echo '<p style="color: #f00; margin-bottom: 10px;"><strong>' . $license_root_error . '</strong></p>';

	?>

    <?php
    if ( $license_hide != 'yes' ) :
        echo '<input type="text" name="revelation_options[license]" class="regular-text" value="' . esc_attr( $val ) . '">';
        echo '<p class="description">' . sprintf( __( 'Enter your License key that was sent to the e-mail after the purchase.', THEME_TEXTDOMAIN ) ) . '</p><br>';

        if ( empty( $license_root_error ) && ! empty( $val ) ) :
            echo '<label><input type="checkbox" name="revelation_options[license_hide]" value="yes"' . checked( 'yes', $license_hide, false ) . '> ' . __( 'Hide license key after activation', THEME_TEXTDOMAIN ) . '</label>';
        endif;
    else :
        echo '<p class="description">' . __( 'You have hidden the license key.', THEME_TEXTDOMAIN ) . '</p>';
    endif;
}


## Очистка данных
function sanitize_callback( $options ) {

    if ( ! empty( $_POST['import_settings'] ) ) {
        $import       = $_POST['import_settings'];
        $base64decode = base64_decode( $import );
        if ( $base64decode ) {
            $import_settings = json_decode( $base64decode, true );

            if ( $import_settings && ! empty( $import_settings ) ) {
                update_option( 'root_options', $import_settings );
            }

        } else {
            //echo 'false';
        }
    }



    global $api_url;
    global $ver;

    if ( empty( $options['license'] ) ) {

        $revelation_options = get_option( 'revelation_options' );
        if ( ! empty( $revelation_options['license'] ) && $revelation_options['license_hide'] == 'yes' ) {
            $options['license']      = $revelation_options['license'];
            $options['license_hide'] = $revelation_options['license_hide'];
        }

    }

    $options['license'] = trim( $options['license'] );

    foreach ( $options as $name => & $val ) {

        if ( $name == 'license' ) {
            $license = $val;

            // Call the custom API.
            $response = root_get_success_response( $license );

            // make sure the response came back okay
            if ( ! $response || is_wp_error( $response ) ) {
                if ( is_wp_error( $response ) ) {

                    $error_text = $response->get_error_message();
                    if ( preg_match( '/(cURL error 35|gnutls_handshake|sslv3 alert handshake)/ui', $error_text ) ) {
                        $error_text = 'cURL error 35: <a href="https://support.wpshop.ru/faq/curl-error-35-handshake-failed/" target="_blank" rel="noopener">' . __( 'How to fix it', THEME_TEXTDOMAIN ) . '</a>.';
                    }

	                update_option( 'license_root_error', __( 'Activation error', THEME_TEXTDOMAIN ) . ': ' . $error_text );
                } else {
	                update_option( 'license_root_error', __( 'Can\'t get response from license server', THEME_TEXTDOMAIN ) );
                }
                continue;
            }

            // decode the license data
            $license_data = wp_remote_retrieve_body( $response );

            if ( mb_substr( $license_data, 0, 2 ) == 'ok' ) {
                update_option( 'license_root_verify', time() + ( WEEK_IN_SECONDS * 4 ) );
                delete_option( 'license_root_error' );
            } else {
                update_option( 'license_root_error', $license_data );
            }

            // $license_data->license will be either "active" or "inactive"
            //update_option( 'license_verify', $license_data->license );
        }
    }


    return $options;
}

/**
 * @param string $license
 *
 * @return array|WP_Error|null
 */
function root_get_success_response( $license ) {
    if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    $api_urls = [
        'https://wpshop.ru/api.php',
        'https://wpshop.biz/api.php',
    ];
    foreach ( $api_urls as $api_url ) {
        $api_params = [
            'action'    => 'activate_license',
            'license'   => $license,
            'item_name' => urlencode( THEME_NAME ),
            'version'   => THEME_VERSION,
            'type'      => 'theme',
            'url'       => home_url(),
            'ip'        => $ip,
        ];

        /**
         * Send to api
         */
        $response = wp_remote_post( $api_url, [
            'timeout'   => 15,
            'sslverify' => false,
            'body'      => $api_params,
        ] );

        /**
         * If error - try to change https on http
         */
        if ( is_wp_error( $response ) ) {
            $api_url = str_replace( "https", "http", $api_url );

            $response = wp_remote_post( $api_url, [
                'timeout'   => 15,
                'sslverify' => false,
                'body'      => $api_params,
            ] );
        }

        if ( is_wp_error( $response ) ||
             200 == wp_remote_retrieve_response_code( $response )
        ) {
            return $response;
        }
    }

    return null;
}
