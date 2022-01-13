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

if ( ! function_exists( 'root_setup' ) ) :
    function root_setup() {

        // Add default posts and comments RSS feed links to head.
        if ( apply_filters( THEME_SLUG . '_allow_rss_links', false ) ) {
            add_theme_support( 'automatic-feed-links' );
        }


        // Let WordPress manage the document title.
        add_theme_support( 'title-tag' );


        // Switch default core markup to output valid HTML5.
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );


        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails' );
        $thumb_big_sizes  = apply_filters( 'root_thumb_big_sizes', array( 770, 330, true ) );
        $thumb_wide_sizes = apply_filters( 'root_thumb_wide_sizes', array( 330, 140, true ) );
        $thumb_square_sizes = apply_filters( 'root_thumb_square_sizes', array( 80, 80, true ) );
        if ( function_exists( 'add_image_size' ) ) {
            add_image_size( 'thumb-big', $thumb_big_sizes[0], $thumb_big_sizes[1], $thumb_big_sizes[2]);
            add_image_size( 'thumb-wide', $thumb_wide_sizes[0], $thumb_wide_sizes[1], $thumb_wide_sizes[2] );
            add_image_size( 'thumb-square', $thumb_square_sizes[0], $thumb_square_sizes[1], $thumb_square_sizes[2] );
        }


        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'revelation_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );


        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'top_menu'    => esc_html__( 'Top menu', THEME_TEXTDOMAIN ),
            'header_menu' => esc_html__( 'Header menu', THEME_TEXTDOMAIN ),
            'footer_menu' => esc_html__( 'Footer menu', THEME_TEXTDOMAIN ),
        ) );

    }
endif;
add_action( 'after_setup_theme', 'root_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function root_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'root_content_width', 700 );
}
add_action( 'after_setup_theme', 'root_content_width', 0 );



/**
 * Register widget area.
 */
function root_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', THEME_TEXTDOMAIN ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', THEME_TEXTDOMAIN ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widget-header">',
        'after_title'   => '</div>',
    ) );

    $footer_widgets = root_get_option( 'footer_widgets' );
    if ( $footer_widgets > 5 ) $footer_widgets = 5;
    if ( $footer_widgets > 0 ) {
        for ( $n = 1; $n <= $footer_widgets; $n++ ) {

            register_sidebar( array(
                'name'          => esc_html__( 'Footer', THEME_TEXTDOMAIN ) . ' ' . $n,
                'id'            => 'footer-widget-'. $n,
                'description'   => esc_html__( 'Add widgets here.', THEME_TEXTDOMAIN ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<div class="widget-header">',
                'after_title'   => '</div>',
            ) );

        }
    }
}
add_action( 'widgets_init', 'root_widgets_init' );



/**
 * Site header classes
 */
function root_site_header_classes() {
    $option = root_get_option( 'header_width' );
    $out_class = ( $option == 'fixed' ) ? 'container' : '';

    $classes = apply_filters( 'root_site_header_classes', $out_class );
    echo $classes;
}



/**
 * Site header inner classes
 */
function root_site_header_inner_classes() {
    $option = root_get_option( 'header_inner_width' );
    $out_class = ( $option == 'fixed' ) ? 'container' : '';

    $classes = apply_filters( 'root_site_header_inner_classes', $out_class );
    echo $classes;
}



/**
 * Main navigation classes
 */
function root_navigation_main_classes() {
    $option = root_get_option( 'navigation_main_width' );
    $out_class = ( $option == 'fixed' ) ? 'container' : '';

    $classes = apply_filters( 'root_navigation_main_classes', $out_class );
    echo $classes;
}



/**
 * Main navigation inner classes
 */
function root_navigation_main_inner_classes() {
    $option = root_get_option( 'navigation_main_inner_width' );
    $out_class = ( $option == 'fixed' ) ? 'container' : '';

    $classes = apply_filters( 'root_navigation_main_inner_classes', $out_class );
    echo $classes;
}



/**
 * Fixed main navigation
 */
$root_navigation_main_fixed = root_get_option( 'navigation_main_fixed' );
if ( $root_navigation_main_fixed == 'yes' ) {
    add_action( 'wp_head', function() {
        echo "<script>var fixed_main_menu = 'yes';</script>";
    } );
}

function root_site_content_classes() {
    global $post;
    if ( ( is_single() || is_page() ) && 'checked' == get_post_meta( $post->ID, 'site_full_width', true ) ) {
        $classes = apply_filters( 'root_site_content_classes', '' );
        echo $classes;
    }
    else {
        $classes = apply_filters( 'root_site_content_classes', 'container' );
        echo $classes;
    }
}

function root_site_footer_classes() {
    $option = root_get_option( 'footer_width' );
    $out_class = ( $option == 'fixed' ) ? 'container' : '';

    $classes = apply_filters( 'root_site_footer_classes', $out_class );
    echo $classes;
}

function root_site_footer_inner_classes() {
    $option = root_get_option( 'footer_inner_width' );
    $out_class = ( $option == 'fixed' ) ? 'container' : '';

    $classes = apply_filters( 'root_site_footer_inner_classes', $out_class );
    echo $classes;
}

function root_navigation_footer_classes() {
    $option = root_get_option( 'navigation_footer_width' );
    $out_class = ( $option == 'fixed' ) ? 'container' : '';

    $classes = apply_filters( 'root_navigation_footer_classes', $out_class );
    echo $classes;
}

function root_navigation_footer_inner_classes() {
    $option = root_get_option( 'navigation_footer_inner_width' );
    $out_class = ( $option == 'fixed' ) ? 'container' : '';

    $classes = apply_filters( 'root_navigation_footer_inner_classes', $out_class );
    echo $classes;
}



/**
 * Content full width
 */
function root_styles_content_full_width() {
    if ( is_single() || is_page() ) {
        global $post;

        if ( 'checked' == get_post_meta( $post->ID, 'content_full_width', true ) ) {
            echo '<style>body.sidebar-none .breadcrumb, body.sidebar-none .entry-title, body.sidebar-none .entry-meta, body.sidebar-none .entry-content, body.sidebar-none .b-subscribe {max-width: 1090px;}body.sidebar-none .comments-area {max-width: 1090px; margin-left: auto; margin-right: auto;}</style>';
        }
    }
}
add_action( 'wp_head', 'root_styles_content_full_width' );



/**
 * Site full width
 */
function root_styles_site_full_width() {
    if ( is_single() || is_page() ) {
        global $post;

        if ( 'checked' == get_post_meta( $post->ID, 'site_full_width', true ) ) {
            echo '<style>@media (min-width: 992px) {.content-area { width: calc(100% - 360px); max-width: 820px;}body.sidebar-none .content-area {width: auto; max-width: 100%;}.b-related {margin-bottom: 30px; max-width: 700px; margin-left: auto; margin-right: auto;}body.sidebar-none .b-related {max-width: 940px; margin-right: auto; margin-left: auto;}}@media (min-width: 1200px) {.content-area {width: calc(100% - 430px); max-width: 1400px;}body.sidebar-none .b-related {max-width: 1090px; margin-right: auto; margin-left: auto;}}</style>';
        }
    }
}
add_action( 'wp_head', 'root_styles_site_full_width' );



/**
 * Body background link
 */
$wpshop_body_bg_link    = root_get_option( 'body_bg_link' );
$wpshop_body_bg_link_js = root_get_option( 'body_bg_link_js' );

if ( ! empty( $wpshop_body_bg_link ) ) {
    add_action( 'root_after_body', function() {
        global $wpshop_body_bg_link;
        global $wpshop_body_bg_link_js;

        echo '<div style="position:fixed; overflow:hidden; top:0px; left:0px; width:100%; height:100%;">';

        if ( $wpshop_body_bg_link_js ) {
            echo '<span class="js-link" data-href="' . base64_encode( $wpshop_body_bg_link ) . '" data-target="_blank" style="display:block; height:100%; width:100%;"></span>';
        } else {
            echo '<a href="' . $wpshop_body_bg_link . '" target="_blank" style="display:block; height:100%; width:100%;"></a>';
        }

        echo '</div>';
    } );
}



/**
 * Show comment time
 */
$comments_time = root_get_option( 'comments_time' );
if ( $comments_time != 'yes' ) {
    add_filter( 'root_comments_show_time', '__return_false' );
}



/**
 * TOC
 */
function root_toc_enabled() {
    $show = true;

    if ( is_single() || is_page() ) {
        global $post;

        if ( 'checked' == get_post_meta( $post->ID, 'toc_hide', true ) ) {
            $show = false;
        }
    }

    if ( 'no' != root_get_option( 'toc_enabled' ) && $show ) {
        $wpshop_toc = new Wpshop_Table_Of_Contents;
        $wpshop_toc->init();
    }


    $toc_open = root_get_option( 'toc_open' );
    if ( ! $toc_open ) {
        add_filter( 'wpshop_toc_open', '__return_false' );
    }


    $toc_noindex = root_get_option( 'toc_noindex' );
    if ( $toc_noindex ) {
        add_filter( 'wpshop_toc_noindex', '__return_true' );
    }


    $toc_place = root_get_option( 'toc_place' );
    if ( $toc_place ) {
        add_filter( 'wpshop_toc_place', '__return_false' );
    }


    $toc_title = root_get_option( 'toc_title' );
    if ( ! empty( $toc_title ) && $toc_title != 'Contents' ) {
        add_filter( 'wpshop_toc_header', 'wpshop_wpshop_toc_header_change' );
    }
    function wpshop_wpshop_toc_header_change() {
        global $wpshop_core;
        $toc_title = root_get_option( 'toc_title' );
        return $toc_title;
    }
}
add_action( 'wp', 'root_toc_enabled' );



/**
 * Breadcrumbs home text
 */
$breadcrumbs_home_text = root_get_option( 'breadcrumbs_home_text' );
if ( ! empty( $breadcrumbs_home_text ) ) {
    add_filter( 'wpshop_breadcrumbs_home_text', function() {
        $breadcrumbs_home_text = root_get_option( 'breadcrumbs_home_text' );
        return $breadcrumbs_home_text;
    } );
}



/**
 * Breadcrumbs separator
 */
$breadcrumbs_separator = root_get_option( 'breadcrumbs_separator' );
if ( ! empty( $breadcrumbs_separator ) ) {
    add_filter( 'wpshop_breadcrumbs_separator', function() {
        $wpshop_breadcrumbs_separator = root_get_option( 'breadcrumbs_separator' );
        return $wpshop_breadcrumbs_separator;
    } );
}



/**
 * Breadcrumbs single link
 */
$breadcrumbs_single_link = root_get_option( 'breadcrumbs_single_link' );
if ( $breadcrumbs_single_link ) {
    add_filter( 'wpshop_breadcrumb_single_link', '__return_true' );
}



/**
 * Author social title
 */
$author_social_title = root_get_option( 'author_social_title' );
if ( ! empty( $author_social_title ) && $author_social_title != 'Author profiles' ) {
    add_filter( 'root_author_social_title', 'author_social_title_change' );
}
function author_social_title_change() {
    $author_social_title = root_get_option( 'author_social_title' );
    return $author_social_title;
}



/**
 * Show title author social
 */
$author_social_title_show = root_get_option( 'author_social_title_show' );
if ( ! $author_social_title_show ) {
    add_filter( 'root_author_social_title_show', '__return_false' );
}



/**
 * Contact Form
 */
add_action( 'root_contact_form_before_button', function() {
    $contact_form_text_before_submit = root_get_option( 'contact_form_text_before_submit' );

    if ( ! empty( $contact_form_text_before_submit ) ) {
        echo '<div class="contact-form-notes-after">'. $contact_form_text_before_submit .'</div>';
    }
} );



/**
 * Exclude category in sitemap
 */
add_filter( 'wpshop_sitemap_category_exclude', function() {
    $sitemap_category_exclude = root_get_option( 'sitemap_category_exclude' );

    if ( ! empty( $sitemap_category_exclude ) ) {
        $sitemap_category_exclude_id = explode( ',', $sitemap_category_exclude );

        if ( is_array( $sitemap_category_exclude_id ) ) {
            $sitemap_category_exclude = array_map( 'trim', $sitemap_category_exclude_id );
        } else {
            $sitemap_category_exclude = array( $sitemap_category_exclude );
        }
    }

    return $sitemap_category_exclude;
} );



/**
 * Exclude posts in sitemap
 */
add_filter( 'wpshop_sitemap_posts_exclude', function() {
    $sitemap_posts_exclude = root_get_option( 'sitemap_posts_exclude' );

    if ( ! empty( $sitemap_posts_exclude ) ) {
        $sitemap_posts_exclude_id = explode( ',', $sitemap_posts_exclude );

        if ( is_array( $sitemap_posts_exclude_id ) ) {
            $sitemap_posts_exclude = array_map( 'trim', $sitemap_posts_exclude_id );
        } else {
            $sitemap_posts_exclude = array( $sitemap_posts_exclude );
        }
    }

    return $sitemap_posts_exclude;
} );



/**
 * Show pages in sitemap
 */
$sitemap_pages_show = root_get_option( 'sitemap_pages_show' );
if ( ! $sitemap_pages_show ) {
    add_filter( 'wpshop_sitemap_show_pages', '__return_false' );
}



/**
 * Exclude pages in sitemap
 */
add_filter( 'wpshop_sitemap_pages_exclude', function() {
    $sitemap_pages_exclude = root_get_option( 'sitemap_pages_exclude' );

    if ( ! empty( $sitemap_pages_exclude ) ) {
        $sitemap_pages_exclude_id = explode( ',', $sitemap_pages_exclude );

        if ( is_array( $sitemap_pages_exclude_id ) ) {
            $sitemap_pages_exclude = array_map( 'trim', $sitemap_pages_exclude_id );
        } else {
            $sitemap_pages_exclude = array( $sitemap_pages_exclude );
        }
    }

    return $sitemap_pages_exclude;
} );



/**
 * Content on full width
 */
$content_full_width = root_get_option( 'content_full_width' );
if ( $content_full_width ) {
    add_filter( 'root_site_content_classes', '__return_false' );
}



/**
 * Social buttons title
 */
$social_share_title = root_get_option( 'social_share_title' );
if ( ! empty( $social_share_title ) && $social_share_title != 'Like this post? Please share to your friends:' ) {
    add_filter( 'root_social_share_title', function() {
        $social_share_title = root_get_option( 'social_share_title' );
        return $social_share_title;
    } );
}



/**
 * Show title social buttons
 */
$social_share_title_show = root_get_option( 'social_share_title_show' );
if ( ! $social_share_title_show ) {
    add_filter( 'root_social_share_title_show', '__return_false' );
}



/**
 * Rating title
 */
$rating_title = root_get_option( 'rating_title' );
if ( ! empty( $rating_title ) && $rating_title != 'Rating' ) {
    add_filter( 'root_rating_title', function() {
        $rating_title = root_get_option( 'rating_title' );
        return $rating_title;
    } );
}



/**
 * Rating text
 */
$rating_text_show = root_get_option( 'rating_text_show' );
if ( ! $rating_text_show ) {
    add_filter( 'root_rating_text_show', '__return_false' );
}



/**
 * Related posts title
 */
$related_posts_title = root_get_option( 'related_posts_title' );
if ( ! empty( $related_posts_title ) && $related_posts_title != 'Related articles' ) {
    add_filter( 'root_related_title', function() {
        $related_posts_title = root_get_option( 'related_posts_title' );
        return $related_posts_title;
    } );
}



/**
 * Enable advertising on pages
 */
$advertising_page_display = root_get_option( 'advertising_page_display' );
if ( $advertising_page_display ) {
    add_filter( 'root_ad_single', '__return_false' );
}



/**
 * Microdata publisher telephone
 */
$microdata_publisher_telephone = root_get_option( 'microdata_publisher_telephone' );
if ( ! empty( $microdata_publisher_telephone ) ) {
    add_filter( 'wpshop_microdata_publisher_telephone', function() {
        $microdata_publisher_telephone = root_get_option( 'microdata_publisher_telephone' );
        return $microdata_publisher_telephone;
    } );
}



/**
 * Microdata publisher address
 */
$microdata_publisher_address = root_get_option( 'microdata_publisher_address' );
if ( ! empty( $microdata_publisher_address ) ) {
    add_filter( 'wpshop_microdata_publisher_address', function() {
        $microdata_publisher_address = root_get_option( 'microdata_publisher_address' );
        return $microdata_publisher_address;
    } );
}