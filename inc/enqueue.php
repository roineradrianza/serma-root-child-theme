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


$theme_version = THEME_VERSION;


load_theme_textdomain( THEME_TEXTDOMAIN, get_template_directory() . '/languages' );


/**
 * Enqueue scripts and styles.
 */
function root_scripts() {
    global $theme_version;

    // get list of font families options
    $fonts_options = array(
        'typography_family',
        'typography_headers_family',
        'typography_site_title_family',
        'typography_site_description_family',
        'typography_menu_links_family',
    );

    // get list of font families
    $fonts_list = array();
    foreach ( $fonts_options as $fonts_option ) {
        $fonts_list[] = root_get_option( $fonts_option );
    }

    // get enqueue link
    //$class_fonts = new \Wpshop\Core\Fonts();
    global $class_fonts;
    $google_fonts = $class_fonts->get_enqueue_link( $fonts_list );

    // enqueue link
    if ( ! empty( $google_fonts ) ) {
        wp_enqueue_style( 'google-fonts', $google_fonts, false );
    }

    $style_version = apply_filters( 'root_style_version', $theme_version );

    wp_enqueue_style(  THEME_NAME . '-style',   get_template_directory_uri() . '/assets/css/style.min.css', array(), $style_version );

    // swiper
    /*
    if ( apply_filters( THEME_SLUG . '_slider_output', is_front_page() || is_home() ) && root_get_option( 'structure_slider_count' ) ) {
        if ( ! wp_is_mobile() || ( wp_is_mobile() && ! root_get_option( 'structure_slider_mob_disable' ) ) ) {
            wp_enqueue_script( THEME_NAME . '-swiper', get_template_directory_uri() . '/assets/js/plugins/swiper.min.js', array(), $style_version, true );
        }
    }
	*/
    if ( root_get_option( 'lightbox_enabled' ) ) {
        wp_enqueue_script( THEME_NAME . '-lightbox', get_template_directory_uri() . '/assets/js/plugins/lightbox.min.js', array(), $style_version, true );
    }

    wp_enqueue_script( THEME_NAME . '-scripts', get_template_directory_uri() . '/assets/js/scripts.min.js', array('jquery'), $style_version, true );

    wp_localize_script( THEME_NAME . '-scripts', 'settings_array', array(
            'rating_text_average' => __( 'average', THEME_TEXTDOMAIN ),
            'rating_text_from'    => __( 'from', THEME_TEXTDOMAIN ),
            'lightbox_enabled'    => root_get_option( 'lightbox_enabled' )
        )
    );

    // ajax
    wp_localize_script( THEME_NAME . '-scripts' , 'wps_ajax', array(
        'url'   => admin_url( 'admin-ajax.php' ),
        'nonce' => wp_create_nonce( 'wpshop-nonce' )
    ) );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
function root_admin_scripts() {
    wp_enqueue_style( THEME_NAME . '-admin-style', get_template_directory_uri() . '/assets/css/admin.min.css', array(), null );
    wp_enqueue_script( THEME_NAME . '-admin-scripts', get_template_directory_uri() . '/assets/js/admin.min.js', array('jquery'), null, true );
}
add_action( 'wp_enqueue_scripts', 'root_scripts' );
add_action( 'admin_enqueue_scripts', 'root_admin_scripts' );



/**
 * Editor styles
 */
function wpshop_add_editor_style() {
    add_editor_style( '/assets/css/editor-styles.min.css' );
}
add_action( 'current_screen', 'wpshop_add_editor_style' );



/**
 * Gutenberg scripts and styles
 */
function wpshop_enqueue_gutenberg() {
    wp_enqueue_script(
        THEME_SLUG . '-gutenberg',
        get_template_directory_uri() . '/assets/js/gutenberg.js',
        array( 'wp-blocks', 'wp-dom' ),
        THEME_VERSION,
        true
    );

    wp_enqueue_style(
        THEME_SLUG . '-gutenberg',
        get_template_directory_uri() . '/assets/css/gutenberg.min.css',
        array(),
        THEME_VERSION
    );
}
add_action( 'enqueue_block_editor_assets', 'wpshop_enqueue_gutenberg' );