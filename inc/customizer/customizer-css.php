<?php

function root_customizer_css() {
    $root_skin  = root_get_option( 'skin' );
    $bg_pattern = root_get_option( 'bg_pattern' );

    echo '<style>';

    // layout  >  header
    $header_padding_top = root_get_option( 'header_padding_top' );
    if ( ! empty( $header_padding_top ) && $header_padding_top > 0 ) {
        echo '@media (min-width: 768px) {.site-header {padding-top:' . $header_padding_top .'px} }';
    }

    $header_padding_bottom = root_get_option( 'header_padding_bottom' );
    if ( ! empty( $header_padding_bottom ) && $header_padding_bottom > 0 ) {
        echo '@media (min-width: 768px) {.site-header {padding-bottom:' . $header_padding_bottom .'px} }';
    }

    // layout  >  header menu
    $navigation_main_fixed = root_get_option( 'navigation_main_fixed' );
    if ( $navigation_main_fixed == 'yes' ) echo '.site-navigation-fixed {position:fixed;display:none;top:0;z-index:9999} .admin-bar .site-navigation-fixed {top:32px}';

    // layout  >  footer menu
    $navigation_footer_mob = root_get_option( 'navigation_footer_mob' );
    if ( $navigation_footer_mob == 'yes' ) echo '@media (max-width: 991px) {.footer-navigation {display:block} }';


    // blocks  >  header
    $logotype_max_width = root_get_option( 'logotype_max_width' );
    if ( ! empty( $logotype_max_width ) ) echo '.site-logotype {max-width:' . $logotype_max_width . 'px}';

    $logotype_max_height = root_get_option( 'logotype_max_height' );
    if ( ! empty( $logotype_max_height ) ) echo '.site-logotype img {max-height:' . $logotype_max_height . 'px}';

    $header_search_mob = root_get_option( 'header_search_mob' );
    if ( $header_search_mob == 'yes' ) echo '@media (max-width: 991px) {.mob-search{display:block;margin-bottom:25px} }';

    // blocks  >  sidebar
    $structure_sidebar_mob = root_get_option( 'structure_sidebar_mob' );
    if ( $structure_sidebar_mob == 'yes' ) echo '@media (max-width: 991px) {.widget-area {display:block;float:none!important;padding:15px 20px} }';


    // modules  >  scroll to top
    $arrow_bg_color = root_get_option( 'structure_arrow_bg' );
    if ( ! empty( $arrow_bg_color ) ) echo '.scrolltop {background-color:' . $arrow_bg_color . '}';

    $arrow_color = root_get_option( 'structure_arrow_color' );
    if ( ! empty( $arrow_color ) ) echo '.scrolltop:after {color:' . $arrow_color . '}';

    $arrow_width = root_get_option( 'structure_arrow_width' );
    if ( ! empty( $arrow_width ) ) echo '.scrolltop {width:' . $arrow_width . 'px}';

    $arrow_height = root_get_option( 'structure_arrow_height' );
    if ( ! empty( $arrow_height ) ) echo '.scrolltop {height:' . $arrow_height . 'px}';

    $arrow_icon = root_get_option( 'structure_arrow_icon' );
    if ( ! empty( $arrow_icon ) ) echo '.scrolltop:after {content:"'. $arrow_icon .'"}';


    // post cards  >  post one big
    if ( root_get_option( 'post_one_big_thumbnail_left' ) ) echo '.entry-image:not(.entry-image--big) {margin-left:-20px}@media (min-width: 1200px) {.entry-image:not(.entry-image--big) {margin-left:-40px} }';

    if ( root_get_option( 'post_one_big_round_thumbnail' ) ) {
        if ( ! root_get_option( 'post_one_big_thumbnail_left' ) ) echo '.post-box .entry-image img {border-radius:6px}';
        else echo '.post-box .entry-image img {border-radius:0 6px 6px 0}';
    }

    // post cards  >  one post small
    if ( root_get_option( 'post_one_small_round_thumbnail' ) ) echo '.post-card-one__image img {border-radius:6px}';

    // post cards  >  posts small
    if ( root_get_option( 'posts_small_round_thumbnail' ) ) echo '.post-card:not(.post-card-related) .post-card__image, .post-card:not(.post-card-related) .post-card__image img, .post-card:not(.post-card-related) .post-card__image .entry-meta, .post-card:not(.post-card-related) .thumb-wide {border-radius:6px}';

    // post cards  >  posts square
    if ( root_get_option( 'posts_square_round_thumbnail' ) ) echo '.post-card-square__image img {border-radius:6px}';

    // post cards  >  posts related
    if ( root_get_option( 'posts_related_round_thumbnail' ) ) echo '.b-related .post-card__image, .b-related .post-card__image img, .b-related .post-card__image .entry-meta, .b-related .thumb-wide {border-radius:6px}';


    // typography  >  general
    global $class_fonts;

    $typography_family = root_get_option( 'typography_family' );
    echo 'body {font-family:'. $class_fonts->get_font_family( $typography_family ) .'}';

    $typography_font_size = root_get_option( 'typography_font_size' );
    if ( ! empty( $typography_font_size ) ) echo '@media (min-width: 576px) {body {font-size:' . $typography_font_size . 'px} }';

    $typography_line_height = root_get_option( 'typography_line_height' );
    if ( ! empty( $typography_line_height ) ) echo '@media (min-width: 576px) {body {line-height:' . $typography_line_height . '} }';

    $typography_bold      = root_get_option( 'typography_bold' );
    $typography_italic    = root_get_option( 'typography_italic' );
    $typography_underline = root_get_option( 'typography_underline' );
    $typography_uppercase = root_get_option( 'typography_uppercase' );
    if ( $typography_bold || $typography_italic || $typography_underline || $typography_uppercase ) {
        echo 'body {';
        if ( $typography_bold ) echo 'font-weight:bold;';
        if ( $typography_italic ) echo 'font-style:italic;';
        if ( $typography_underline ) echo 'text-decoration:underline;';
        if ( $typography_uppercase ) echo 'text-transform:uppercase;';
        echo '}';
    }


    // typography  >  header
    $typography_site_title_family = root_get_option( 'typography_site_title_family' );
    echo '.site-title, .site-title a {font-family:'. $class_fonts->get_font_family( $typography_site_title_family ) .'}';

    $typography_site_title_size = root_get_option( 'typography_site_title_size' );
    if ( ! empty( $typography_site_title_size ) ) echo '@media (min-width: 576px) {.site-title, .site-title a {font-size:' . $typography_site_title_size . 'px} }';

    $typography_site_title_line_height = root_get_option( 'typography_site_title_line_height' );
    if ( ! empty( $typography_site_title_line_height ) ) echo '@media (min-width: 576px) {.site-title, .site-title a {line-height:' . $typography_site_title_line_height . '} }';

    $typography_site_title_bold      = root_get_option( 'typography_site_title_bold' );
    $typography_site_title_italic    = root_get_option( 'typography_site_title_italic' );
    $typography_site_title_underline = root_get_option( 'typography_site_title_underline' );
    $typography_site_title_uppercase = root_get_option( 'typography_site_title_uppercase' );
    if ( $typography_site_title_bold || $typography_site_title_italic || $typography_site_title_underline || $typography_site_title_uppercase ) {
        echo '.site-title, .site-title a {';
        if ( $typography_site_title_bold ) echo 'font-weight:bold;';
        if ( $typography_site_title_italic ) echo 'font-style:italic;';
        if ( $typography_site_title_underline ) echo 'text-decoration:underline;';
        if ( $typography_site_title_uppercase ) echo 'text-transform:uppercase;';
        echo '}';
    }

    $typography_site_description_family = root_get_option( 'typography_site_description_family' );
    echo '.site-description {font-family:'. $class_fonts->get_font_family( $typography_site_description_family ) .'}';

    $typography_site_description_size = root_get_option( 'typography_site_description_size' );
    if ( ! empty( $typography_site_description_size ) ) echo '@media (min-width: 576px) {.site-description {font-size:' . $typography_site_description_size . 'px} }';

    $typography_site_description_line_height = root_get_option( 'typography_site_description_line_height' );
    if ( ! empty( $typography_site_description_line_height ) ) echo '@media (min-width: 576px) {.site-description {line-height:' . $typography_site_description_line_height . '} }';

    $typography_site_description_bold      = root_get_option( 'typography_site_description_bold' );
    $typography_site_description_italic    = root_get_option( 'typography_site_description_italic' );
    $typography_site_description_underline = root_get_option( 'typography_site_description_underline' );
    $typography_site_description_uppercase = root_get_option( 'typography_site_description_uppercase' );
    if ( $typography_site_description_bold || $typography_site_description_italic || $typography_site_description_underline || $typography_site_description_uppercase ) {
        echo '.site-description {';
        if ( $typography_site_description_bold ) echo 'font-weight:bold;';
        if ( $typography_site_description_italic ) echo 'font-style:italic;';
        if ( $typography_site_description_underline ) echo 'text-decoration:underline;';
        if ( $typography_site_description_uppercase ) echo 'text-transform:uppercase;';
        echo '}';
    }

    // typography  >  menu
    $typography_menu_links_family = root_get_option( 'typography_menu_links_family' );
    echo '.main-navigation ul li a, .main-navigation ul li .removed-link, .footer-navigation ul li a, .footer-navigation ul li .removed-link';
    echo '{font-family:'. $class_fonts->get_font_family( $typography_menu_links_family ) .'}';

    $typography_menu_links_size = root_get_option( 'typography_menu_links_size' );
    if ( ! empty( $typography_menu_links_size ) ) echo '@media (min-width: 576px) {.main-navigation ul li a, .main-navigation ul li .removed-link, .footer-navigation ul li a, .footer-navigation ul li .removed-link {font-size: ' . $typography_menu_links_size . 'px} }';

    $typography_menu_links_line_height = root_get_option( 'typography_menu_links_line_height' );
    if ( ! empty( $typography_menu_links_line_height ) ) echo '@media (min-width: 576px) {.main-navigation ul li a, .main-navigation ul li .removed-link, .footer-navigation ul li a, .footer-navigation ul li .removed-link {line-height:' . $typography_menu_links_line_height . '} }';

    $typography_menu_links_bold      = root_get_option( 'typography_menu_links_bold' );
    $typography_menu_links_italic    = root_get_option( 'typography_menu_links_italic' );
    $typography_menu_links_underline = root_get_option( 'typography_menu_links_underline' );
    $typography_menu_links_uppercase = root_get_option( 'typography_menu_links_uppercase' );
    if ( $typography_menu_links_bold || $typography_menu_links_italic || $typography_menu_links_underline || $typography_menu_links_uppercase ) {
        echo '.main-navigation ul li a, .main-navigation ul li .removed-link, .footer-navigation ul li a, .footer-navigation ul li .removed-link {';
        if ( $typography_menu_links_bold ) echo 'font-weight:bold;';
        if ( $typography_menu_links_italic ) echo 'font-style:italic;';
        if ( $typography_menu_links_underline ) echo 'text-decoration:underline;';
        if ( $typography_menu_links_uppercase ) echo 'text-transform:uppercase;';
        echo '}';
    }

    // typography  >  headers
    $typography_header_h1_family = root_get_option( 'typography_header_h1_family' );
    if ( ! empty( $typography_header_h1_family ) && $typography_header_h1_family != 'roboto' ) echo '.h1, h1:not(.site-title) {font-family:' . $class_fonts->get_font_family( $typography_header_h1_family ) . '}';

    $typography_header_h1_size = root_get_option( 'typography_header_h1_size' );
    if ( ! empty( $typography_header_h1_size ) && $typography_header_h1_size != '2.5' ) echo '@media (min-width: 768px) {.h1, h1:not(.site-title) {font-size:' . $typography_header_h1_size . 'em!important} }';

    $typography_header_h1_line_height = root_get_option( 'typography_header_h1_line_height' );
    if ( ! empty( $typography_header_h1_line_height ) && $typography_header_h1_line_height != '1.1' ) echo '.h1, h1:not(.site-title) {line-height:' . $typography_header_h1_line_height . '}';

    $typography_header_h1_bold      = root_get_option( 'typography_header_h1_bold' );
    $typography_header_h1_italic    = root_get_option( 'typography_header_h1_italic' );
    $typography_header_h1_underline = root_get_option( 'typography_header_h1_underline' );
    $typography_header_h1_uppercase = root_get_option( 'typography_header_h1_uppercase' );
    if ( $typography_header_h1_bold || $typography_header_h1_italic || $typography_header_h1_underline || $typography_header_h1_uppercase ) {
        echo '.h1, h1:not(.site-title) {';
        if ( $typography_header_h1_bold ) echo 'font-weight:bold;';
        if ( $typography_header_h1_italic ) echo 'font-style:italic;';
        if ( $typography_header_h1_underline ) echo 'text-decoration:underline;';
        if ( $typography_header_h1_uppercase ) echo 'text-transform:uppercase;';
        echo '}';
    }

    $typography_header_h2_family = root_get_option( 'typography_header_h2_family' );
    if ( ! empty( $typography_header_h2_family ) && $typography_header_h2_family != 'roboto' ) echo '.h2, h2 {font-family:' . $class_fonts->get_font_family( $typography_header_h2_family ) . '}';

    $typography_header_h2_size = root_get_option( 'typography_header_h2_size' );
    if ( ! empty( $typography_header_h2_size ) && $typography_header_h2_size != '1.5' ) echo '@media (min-width: 768px) {.h2, h2 {font-size:' . $typography_header_h2_size . 'em} }';

    $typography_header_h2_line_height = root_get_option( 'typography_header_h2_line_height' );
    if ( ! empty( $typography_header_h2_line_height ) && $typography_header_h2_line_height != '1.1' ) echo '.h2, h2 {line-height:' . $typography_header_h2_line_height . '}';

    $typography_header_h2_bold      = root_get_option( 'typography_header_h2_bold' );
    $typography_header_h2_italic    = root_get_option( 'typography_header_h2_italic' );
    $typography_header_h2_underline = root_get_option( 'typography_header_h2_underline' );
    $typography_header_h2_uppercase = root_get_option( 'typography_header_h2_uppercase' );
    if ( $typography_header_h2_bold || $typography_header_h2_italic || $typography_header_h2_underline || $typography_header_h2_uppercase ) {
        echo '.h2, h2 {';
        if ( $typography_header_h2_bold ) echo 'font-weight:bold;';
        if ( $typography_header_h2_italic ) echo 'font-style:italic;';
        if ( $typography_header_h2_underline ) echo 'text-decoration:underline;';
        if ( $typography_header_h2_uppercase ) echo 'text-transform:uppercase;';
        echo '}';
    }

    $typography_header_h3_family = root_get_option( 'typography_header_h3_family' );
    if ( ! empty( $typography_header_h3_family ) && $typography_header_h3_family != 'roboto' ) echo '.h3, h3 {font-family:' . $class_fonts->get_font_family( $typography_header_h3_family ) . '}';

    $typography_header_h3_size = root_get_option( 'typography_header_h3_size' );
    if ( ! empty( $typography_header_h3_size ) && $typography_header_h3_size != '1.3' ) echo '@media (min-width: 768px) {.h3, h3 {font-size:' . $typography_header_h3_size . 'em} }';

    $typography_header_h3_line_height = root_get_option( 'typography_header_h3_line_height' );
    if ( ! empty( $typography_header_h3_line_height ) && $typography_header_h3_line_height != '1.1' ) echo '.h3, h3 {line-height:' . $typography_header_h3_line_height . '}';

    $typography_header_h3_bold      = root_get_option( 'typography_header_h3_bold' );
    $typography_header_h3_italic    = root_get_option( 'typography_header_h3_italic' );
    $typography_header_h3_underline = root_get_option( 'typography_header_h3_underline' );
    $typography_header_h3_uppercase = root_get_option( 'typography_header_h3_uppercase' );
    if ( $typography_header_h3_bold || $typography_header_h3_italic || $typography_header_h3_underline || $typography_header_h3_uppercase ) {
        echo '.h3, h3 {';
        if ( $typography_header_h3_bold ) echo 'font-weight:bold;';
        if ( $typography_header_h3_italic ) echo 'font-style:italic;';
        if ( $typography_header_h3_underline ) echo 'text-decoration:underline;';
        if ( $typography_header_h3_uppercase ) echo 'text-transform:uppercase;';
        echo '}';
    }

    $typography_header_h4_family = root_get_option( 'typography_header_h4_family' );
    if ( ! empty( $typography_header_h4_family ) && $typography_header_h4_family != 'roboto' ) echo '.h4, h4 {font-family:' . $class_fonts->get_font_family( $typography_header_h4_family ) . '}';

    $typography_header_h4_size = root_get_option( 'typography_header_h4_size' );
    if ( ! empty( $typography_header_h4_size ) && $typography_header_h4_size != '1.2' ) echo '@media (min-width: 768px) {.h4, h4 {font-size:' . $typography_header_h4_size . 'em} }';

    $typography_header_h4_line_height = root_get_option( 'typography_header_h4_line_height' );
    if ( ! empty( $typography_header_h4_line_height ) && $typography_header_h4_line_height != '1.1' ) echo '.h1, h1 {line-height:' . $typography_header_h4_line_height . '}';

    $typography_header_h4_bold      = root_get_option( 'typography_header_h4_bold' );
    $typography_header_h4_italic    = root_get_option( 'typography_header_h4_italic' );
    $typography_header_h4_underline = root_get_option( 'typography_header_h4_underline' );
    $typography_header_h4_uppercase = root_get_option( 'typography_header_h4_uppercase' );
    if ( $typography_header_h4_bold || $typography_header_h4_italic || $typography_header_h4_underline || $typography_header_h4_uppercase ) {
        echo '.h4, h4 {';
        if ( $typography_header_h4_bold ) echo 'font-weight:bold;';
        if ( $typography_header_h4_italic ) echo 'font-style:italic;';
        if ( $typography_header_h4_underline ) echo 'text-decoration:underline;';
        if ( $typography_header_h4_uppercase ) echo 'text-transform:uppercase;';
        echo '}';
    }

    $typography_header_h5_family = root_get_option( 'typography_header_h5_family' );
    if ( ! empty( $typography_header_h5_family ) && $typography_header_h5_family != 'roboto' ) echo '.h5, h5 {font-family:' . $class_fonts->get_font_family( $typography_header_h5_family ) . '}';

    $typography_header_h5_size = root_get_option( 'typography_header_h5_size' );
    if ( ! empty( $typography_header_h5_size ) && $typography_header_h5_size != '1.1' ) echo '@media (min-width: 768px) {.h5, h5 {font-size:' . $typography_header_h5_size . 'em} }';

    $typography_header_h5_line_height = root_get_option( 'typography_header_h5_line_height' );
    if ( ! empty( $typography_header_h5_line_height ) && $typography_header_h5_line_height != '1.1' ) echo '.h5, h5 {line-height:' . $typography_header_h5_line_height . '}';

    $typography_header_h5_bold      = root_get_option( 'typography_header_h5_bold' );
    $typography_header_h5_italic    = root_get_option( 'typography_header_h5_italic' );
    $typography_header_h5_underline = root_get_option( 'typography_header_h5_underline' );
    $typography_header_h5_uppercase = root_get_option( 'typography_header_h5_uppercase' );
    if ( $typography_header_h5_bold || $typography_header_h5_italic || $typography_header_h5_underline || $typography_header_h5_uppercase ) {
        echo '.h5, h5 {';
        if ( $typography_header_h5_bold ) echo 'font-weight:bold;';
        if ( $typography_header_h5_italic ) echo 'font-style:italic;';
        if ( $typography_header_h5_underline ) echo 'text-decoration:underline;';
        if ( $typography_header_h5_uppercase ) echo 'text-transform:uppercase;';
        echo '}';
    }

    $typography_header_h6_family = root_get_option( 'typography_header_h6_family' );
    if ( ! empty( $typography_header_h6_family ) && $typography_header_h6_family != 'roboto' ) echo '.h6, h6 {font-family:' . $class_fonts->get_font_family( $typography_header_h6_family ) . '}';

    $typography_header_h6_size = root_get_option( 'typography_header_h6_size' );
    if ( ! empty( $typography_header_h6_size ) && $typography_header_h6_size != '0.67' ) echo '@media (min-width: 768px) {.h6, h6 {font-size:' . $typography_header_h6_size . 'em} }';

    $typography_header_h6_line_height = root_get_option( 'typography_header_h6_line_height' );
    if ( ! empty( $typography_header_h6_line_height ) && $typography_header_h6_line_height != '1.1' ) echo '.h6, h6 {line-height:' . $typography_header_h6_line_height . '}';

    $typography_header_h6_bold      = root_get_option( 'typography_header_h6_bold' );
    $typography_header_h6_italic    = root_get_option( 'typography_header_h6_italic' );
    $typography_header_h6_underline = root_get_option( 'typography_header_h6_underline' );
    $typography_header_h6_uppercase = root_get_option( 'typography_header_h6_uppercase' );
    if ( $typography_header_h6_bold || $typography_header_h6_italic || $typography_header_h6_underline || $typography_header_h6_uppercase ) {
        echo '.h6, h6 {';
        if ( $typography_header_h6_bold ) echo 'font-weight:bold;';
        if ( $typography_header_h6_italic ) echo 'font-style:italic;';
        if ( $typography_header_h6_underline ) echo 'text-decoration:underline;';
        if ( $typography_header_h6_uppercase ) echo 'text-transform:uppercase;';
        echo '}';
    }


    // colors
    $color_main = root_get_option( 'color_main' );
    if ( ! empty( $color_main ) ) {
        echo '.mob-hamburger span, .card-slider__category, .card-slider-container .swiper-pagination-bullet-active, .page-separator, .pagination .current, .pagination a.page-numbers:hover, .entry-content ul > li:before, .entry-content ul:not([class])>li:before, .taxonomy-description ul:not([class])>li:before, .btn, .comment-respond .form-submit input, .contact-form .contact_submit, .page-links__item';
        echo ' {background-color:' . $color_main . '}';
        echo '.spoiler-box, .entry-content ol li:before, .entry-content ol:not([class]) li:before, .taxonomy-description ol:not([class]) li:before, .mob-hamburger, .inp:focus, .search-form__text:focus, .entry-content blockquote,
         .comment-respond .comment-form-author input:focus, .comment-respond .comment-form-author textarea:focus, .comment-respond .comment-form-comment input:focus, .comment-respond .comment-form-comment textarea:focus, .comment-respond .comment-form-email input:focus, .comment-respond .comment-form-email textarea:focus, .comment-respond .comment-form-url input:focus, .comment-respond .comment-form-url textarea:focus {border-color:' . $color_main . '}';
        echo '.entry-content blockquote:before, .spoiler-box__title:after, .sidebar-navigation .menu-item-has-children:after,
        .star-rating--score-1:not(.hover) .star-rating-item:nth-child(1),
        .star-rating--score-2:not(.hover) .star-rating-item:nth-child(1), .star-rating--score-2:not(.hover) .star-rating-item:nth-child(2),
        .star-rating--score-3:not(.hover) .star-rating-item:nth-child(1), .star-rating--score-3:not(.hover) .star-rating-item:nth-child(2), .star-rating--score-3:not(.hover) .star-rating-item:nth-child(3),
        .star-rating--score-4:not(.hover) .star-rating-item:nth-child(1), .star-rating--score-4:not(.hover) .star-rating-item:nth-child(2), .star-rating--score-4:not(.hover) .star-rating-item:nth-child(3), .star-rating--score-4:not(.hover) .star-rating-item:nth-child(4),
        .star-rating--score-5:not(.hover) .star-rating-item:nth-child(1), .star-rating--score-5:not(.hover) .star-rating-item:nth-child(2), .star-rating--score-5:not(.hover) .star-rating-item:nth-child(3), .star-rating--score-5:not(.hover) .star-rating-item:nth-child(4), .star-rating--score-5:not(.hover) .star-rating-item:nth-child(5), .star-rating-item.hover {color:' . $color_main . '}';

        if ( $root_skin == 'skin-1' ) echo '.widget-header, .entry-footer__more {background-color:' . $color_main . '}';
    }

    $color_text = root_get_option( 'color_text' );
    if ( ! empty( $color_text ) ) echo 'body {color:' . $color_text . '}';

    $color_link = root_get_option( 'color_link' );
    if ( ! empty( $color_link ) ) echo 'a, .spanlink, .comment-reply-link, .pseudo-link, .root-pseudo-link {color:' . $color_link . '}';

    $color_link_hover = root_get_option( 'color_link_hover' );
    if ( ! empty( $color_link_hover ) ) echo 'a:hover, a:focus, a:active, .spanlink:hover, .comment-reply-link:hover, .pseudo-link:hover {color:' . $color_link_hover . '}';

    $color_header_bg = root_get_option( 'color_header_bg' );
    if ( ! empty( $color_header_bg ) ) echo '.site-header {background-color:' . $color_header_bg . '}';

    $color_header_text = root_get_option( 'color_header_text' );
    if ( ! empty( $color_header_text ) ) echo '.site-header {color:' . $color_header_text . '}';

    $color_logo = root_get_option( 'color_logo' );
    if ( ! empty( $color_logo ) ) echo '.site-title, .site-title a {color:' . $color_logo . '}';

    $color_description = root_get_option( 'color_description' );
    if ( ! empty( $color_description ) ) echo '.site-description, .site-description a {color:' . $color_description . '}';

    $color_menu_bg = root_get_option( 'color_menu_bg' );
    if ( ! empty( $color_menu_bg ) ) echo '.main-navigation, .footer-navigation, .main-navigation ul li .sub-menu, .footer-navigation ul li .sub-menu {background-color:' . $color_menu_bg . '}';

    $color_menu = root_get_option( 'color_menu' );
    if ( ! empty( $color_menu ) ) echo '.main-navigation ul li a, .main-navigation ul li .removed-link, .footer-navigation ul li a, .footer-navigation ul li .removed-link {color:' . $color_menu . '}';

    $color_content_bg = root_get_option( 'color_content_bg' );
    if ( ! empty( $color_content_bg ) ) echo '.site-content {background-color:' . $color_content_bg . '}';

    $color_footer_bg = root_get_option( 'color_footer_bg' );
    if ( ! empty( $color_footer_bg ) ) echo '.site-footer {background-color:' . $color_footer_bg . '}';

    $color_footer_text = root_get_option( 'color_footer_text' );
    if ( ! empty( $color_footer_text ) ) echo '.site-footer {color:' . $color_footer_text . '}';


    // background
    $background_color = get_theme_mod( 'background_color', '' );
    if ( ! empty( $background_color ) && ( $background_color == 'fff' || $background_color == 'ffffff' ) ) echo 'body {background-color:#fff}';

    if ( ! empty( $bg_pattern ) && $bg_pattern != 'no' ) {
        $pattern_url = root_get_pattern_url( $bg_pattern );
        if ( ! empty( $pattern_url ) ) echo 'body {background-image:url(' . get_bloginfo( 'template_url' ) . '/images/backgrounds/' . $pattern_url . ') }';
    }

    $header_bg = root_get_option( 'header_bg' );
    if ( ! empty( $header_bg ) ) {
        $header_bg_repeat   = root_get_option( 'header_bg_repeat' );
        $header_bg_position = root_get_option( 'header_bg_position' );

        if ( root_get_option( 'header_bg_mob' ) ) {
            echo '.site-header {background-image:url("'. $header_bg .'")}';
            echo '.site-header-inner {background: none}';

            if ( ! empty( $header_bg_repeat ) ) echo '.site-header {background-repeat:'. $header_bg_repeat .'}';
            if ( ! empty( $header_bg_position ) ) echo '.site-header {background-position:'. $header_bg_position .'}';
        } else {
            echo '@media (min-width: 768px) {';
            echo '.site-header {background-image:url("'. $header_bg .'")}';
            echo '.site-header-inner {background:none}';
            echo '}';

            if ( ! empty( $header_bg_repeat ) ) {
                echo '@media (min-width: 768px) {';
                echo '.site-header {background-repeat:'. $header_bg_repeat .'}';
                echo '}';
            }

            if ( ! empty( $header_bg_position ) ) {
                echo '@media (min-width: 768px) {';
                echo '.site-header {background-position:'. $header_bg_position .'}';
                echo '}';
            }
        }
    }

    echo '</style>';
}
$customizer_styles_position = apply_filters( THEME_SLUG . '_customizer_styles_position', 'wp_head' );
$customizer_styles_priority = apply_filters( THEME_SLUG . '_customizer_styles_priority', 10 );
add_action( $customizer_styles_position, 'root_customizer_css', $customizer_styles_priority );