<?php
/**
 * ****************************************************************************
 *
 *   НЕ РЕДАКТИРУЙТЕ ЭТОТ ФАЙЛ
 *   DON'T EDIT THIS FILE
 *
 *   Используйте хук {THEME_SLUG}_options_defaults
 *   Use hook {THEME_SLUG}_options_defaults
 *
 * *****************************************************************************
 *
 * @package root
 */

function root_options_defaults() {
    $defaults = apply_filters( 'root_options_defaults', array(

        // layout  >  header
        'header_width'                       => 'fixed',
        'header_inner_width'                 => 'full',
        'header_padding_top'                 => 0,
        'header_padding_bottom'              => 0,

        // layout  >  header menu
        'navigation_main_width'              => 'fixed',
        'navigation_main_inner_width'        => 'full',
        'navigation_main_fixed'              => 'no',

        // layout  >  footer menu
        'navigation_footer_width'            => 'fixed',
        'navigation_footer_inner_width'      => 'full',
        'navigation_footer_mob'              => 'no',

        // layout  >  footer
        'footer_width'                       => 'fixed',
        'footer_inner_width'                 => 'full',


        // blocks  >  header
        'logotype_image'                     => '',
        'logotype_max_width'                 => 1000,
        'logotype_max_height'                => 100,
        'header_hide_title'                  => 'no',
        'header_social'                      => 'yes',
        'header_html_block_1'                => '',
        'header_html_block_2'                => '',
        'header_search_mob'                  => 'yes',

        // blocks  >  footer
        'footer_widgets'                     => 0,
        'footer_widgets_equal_width'         => false,
        'footer_copyright'                   => '© %year% ' . get_bloginfo( 'name' ),
        'footer_text'                        => '',
        'footer_counters'                    => '',
        'footer_social'                      => 'yes',

        // blocks  >  home
        'structure_home_posts'               => 'post-box',
        'structure_home_sidebar'             => 'right',
        'structure_home_h1'                  => '',
        'structure_home_text'                => '',
        'structure_home_position'            => 'bottom',

        // block  >  single
        'structure_single_sidebar'           => 'right',
        'structure_single_thumb'             => 'yes',
        'structure_single_reading_time'      => 'no',
        'structure_single_date'              => 'yes',
        'structure_single_date_modified'     => 'no',
        'structure_single_category'          => 'yes',
        'structure_single_author'            => 'yes',
        'structure_single_social'            => 'yes',
        'structure_single_excerpt'           => 'yes',
        'structure_single_comments_count'    => 'yes',
        'structure_single_views'             => 'yes',
        'structure_single_tags'              => 'yes',
        'structure_single_rating'            => 'no',
        'structure_single_author_box'        => 'no',
        'structure_single_social_bottom'     => 'yes',
        'structure_single_related'           => '6',
        'structure_single_comments'          => 'yes',

        // blocks  >  page
        'structure_page_sidebar'             => 'right',
        'structure_page_thumb'               => 'no',
        'structure_page_social'              => 'no',
        'structure_page_rating'              => 'no',
        'structure_page_social_bottom'       => 'no',
        'structure_page_related'             => '6',
        'structure_page_comments'            => 'no',

        // blocks  >  archive
        'structure_archive_posts'            => 'post-box',
        'structure_archive_sidebar'          => 'right',
        'structure_archive_description_show' => 'yes',
        'structure_child_categories'         => 'yes',
        'structure_archive_description'      => 'top',

        // blocks  >  comments
        'comments_form_title'                => __( 'Add a comment', THEME_TEXTDOMAIN ),
        'comments_text_before_submit'        => '',
        'comments_date'                      => 'yes',
        'comments_time'                      => 'yes',
        'comments_smiles'                    => 'yes',

        // blocks  >  sidebar
        'structure_sidebar_mob'              => 'no',


        // modules  >  slider
        'structure_slider_width'             => 'content',
        'structure_slider_autoplay'          => 2500,
        'structure_slider_type'              => 'one',
        'structure_slider_count'             => 0,
        'structure_slider_order_post'        => 'new',
        'structure_slider_post_in'           => '',
        'structure_slider_category_in'       => '',
        'structure_slider_show_on_paged'     => false,
        'structure_slider_show_category'     => true,
        'structure_slider_show_title'        => true,
        'structure_slider_show_excerpt'      => true,
        'structure_slider_mob_disable'       => false,

        // modules  >  toc
        'toc_enabled'                        => 'no',
        'toc_open'                           => true,
        'toc_noindex'                        => false,
        'toc_place'                          => false,
        'toc_title'                          => __( 'Contents', THEME_TEXTDOMAIN ),

        // modules  >  lightbox
        'lightbox_enabled'                   => false,

        // modules  >  breadcrumbs
        'breadcrumbs_display'                => 'yes',
        'breadcrumbs_home_text'              => __( 'Home', THEME_TEXTDOMAIN ),
        'structure_archive_breadcrumbs'      => 'yes',
        'breadcrumbs_separator'              => '»',
        'breadcrumbs_single_link'            => false,

        // modules  >  author block
        'author_link'                        => false,
        'author_link_target'                 => false,
        'author_social_enable'               => false,
        'author_social_title'                => __( 'Author profiles', THEME_TEXTDOMAIN ),
        'author_social_title_show'           => true,
        'author_social_js'                   => true,

        // modules  >  contact form
        'contact_form_text_before_submit'    => '',

        // modules  >  social profiles
        'social_facebook'                    => '',
        'social_vk'                          => '',
        'social_twitter'                     => '',
        'social_ok'                          => '',
        'social_telegram'                    => '',
        'social_youtube'                     => '',
        'social_instagram'                   => '',
        'social_tiktok'                      => '',
        'social_linkedin'                    => '',
        'social_whatsapp'                    => '',
        'social_viber'                       => '',
        'social_pinterest'                   => '',
        'social_yandexzen'                   => '',
        'social_github'                      => '',
        'social_discord'                     => '',
        'structure_social_js'                => 'yes',

        // modules  >  sitemap
        'sitemap_category_exclude'           => '',
        'sitemap_posts_exclude'              => '',
        'sitemap_pages_show'                 => true,
        'sitemap_pages_exclude'              => '',

        // modules  >  related posts
        'related_posts_title'                => __( 'You may also like', THEME_TEXTDOMAIN ),
        'related_post_taxonomy_order'        => 'categories',
        'related_posts_exclude'              => '',
        'related_posts_category_exclude'     => '',

        // modules  >  scroll to top
        'structure_arrow'                    => 'yes',
        'structure_arrow_bg'                 => '#cccccc',
        'structure_arrow_color'              => '#ffffff',
        'structure_arrow_width'              => '50',
        'structure_arrow_height'             => '50',
        'structure_arrow_icon'               => '\f102',
        'structure_arrow_mob'                => 'no',


        // post cards  >  one post big
        'post_one_big_tag'                   => 'div',
        'post_one_big_show_thumbnail'        => 'yes',
        'post_one_big_show_date'             => 'yes',
        'post_one_big_show_category'         => 'yes',
        'post_one_big_show_author'           => 'yes',
        'post_one_big_show_comments'         => 'yes',
        'post_one_big_show_views'            => 'yes',
        'post_one_big_show_excerpt'          => 'yes',
        'post_one_big_thumbnail_left'        => true,
        'post_one_big_round_thumbnail'       => false,
        'post_one_big_excerpt_length'        => 28,

        // post cards  >  one post small
        'post_one_small_tag'                 => 'div',
        'post_one_small_show_thumbnail'      => 'yes',
        'post_one_small_show_date'           => 'no',
        'post_one_small_show_category'       => 'yes',
        'post_one_small_show_comments'       => 'yes',
        'post_one_small_show_views'          => 'yes',
        'post_one_small_show_excerpt'        => 'yes',
        'post_one_small_round_thumbnail'     => false,
        'post_one_small_excerpt_length'      => 14,

        // post cards  >  posts small
        'posts_small_tag'                    => 'div',
        'posts_small_show_thumbnail'         => 'yes',
        'posts_small_show_date'              => 'no',
        'posts_small_show_category'          => 'yes',
        'posts_small_show_comments'          => 'yes',
        'posts_small_show_views'             => 'yes',
        'posts_small_show_excerpt'           => 'yes',
        'posts_small_round_thumbnail'        => false,
        'posts_small_excerpt_length'         => 14,

        // post cards  >  posts square
        'posts_square_tag'                   => 'div',
        'posts_square_show_thumbnail'        => 'yes',
        'posts_square_show_date'             => 'no',
        'posts_square_show_category'         => 'yes',
        'posts_square_show_comments'         => 'yes',
        'posts_square_show_views'            => 'yes',
        'posts_square_show_excerpt'          => 'yes',
        'posts_square_round_thumbnail'       => false,
        'posts_square_excerpt_length'        => 4,

        // post cards  >  posts related
        'posts_related_tag'                  => 'div',
        'posts_related_show_thumbnail'       => 'yes',
        'posts_related_show_date'            => 'no',
        'posts_related_show_category'        => 'yes',
        'posts_related_show_comments'        => 'yes',
        'posts_related_show_views'           => 'yes',
        'posts_related_show_excerpt'         => 'yes',
        'posts_related_round_thumbnail'      => false,
        'posts_related_excerpt_length'       => 14,


        // codes
        'code_head'                          => '',
        'code_body'                          => '',
        'code_after_content'                 => '',


        // typography  >  general
        'typography_family'                       => 'roboto',
        'typography_font_size'                    => '16',
        'typography_line_height'                  => '1.5',
        'typography_bold'                         => false,
        'typography_italic'                       => false,
        'typography_underline'                    => false,
        'typography_uppercase'                    => false,

        // typography  >  header
        'typography_site_title_family'            => 'roboto',
        'typography_site_title_size'              => '28',
        'typography_site_title_line_height'       => '1.1',
        'typography_site_title_bold'              => false,
        'typography_site_title_italic'            => false,
        'typography_site_title_underline'         => false,
        'typography_site_title_uppercase'         => false,
        'typography_site_description_family'      => 'roboto',
        'typography_site_description_size'        => '16',
        'typography_site_description_line_height' => '1.5',
        'typography_site_description_bold'        => false,
        'typography_site_description_italic'      => false,
        'typography_site_description_underline'   => false,
        'typography_site_description_uppercase'   => false,

        // typography  >  menu
        'typography_menu_links_family'            => 'roboto',
        'typography_menu_links_size'              => '16',
        'typography_menu_links_line_height'       => '1.5',
        'typography_menu_links_bold'              => false,
        'typography_menu_links_italic'            => false,
        'typography_menu_links_underline'         => false,
        'typography_menu_links_uppercase'         => false,

        // typography  >  headers
        'typography_header_h1_family'             => 'roboto',
        'typography_header_h1_size'               => '2.5',
        'typography_header_h1_line_height'        => '1.1',
        'typography_header_h1_bold'               => true,
        'typography_header_h1_italic'             => false,
        'typography_header_h1_underline'          => false,
        'typography_header_h1_uppercase'          => false,
        'typography_header_h2_family'             => 'roboto',
        'typography_header_h2_size'               => '1.5',
        'typography_header_h2_line_height'        => '1.1',
        'typography_header_h2_bold'               => true,
        'typography_header_h2_italic'             => false,
        'typography_header_h2_underline'          => false,
        'typography_header_h2_uppercase'          => false,
        'typography_header_h3_family'             => 'roboto',
        'typography_header_h3_size'               => '1.3',
        'typography_header_h3_line_height'        => '1.1',
        'typography_header_h3_bold'               => true,
        'typography_header_h3_italic'             => false,
        'typography_header_h3_underline'          => false,
        'typography_header_h3_uppercase'          => false,
        'typography_header_h4_family'             => 'roboto',
        'typography_header_h4_size'               => '1.2',
        'typography_header_h4_line_height'        => '1.1',
        'typography_header_h4_bold'               => true,
        'typography_header_h4_italic'             => false,
        'typography_header_h4_underline'          => false,
        'typography_header_h4_uppercase'          => false,
        'typography_header_h5_family'             => 'roboto',
        'typography_header_h5_size'               => '1.1',
        'typography_header_h5_line_height'        => '1.1',
        'typography_header_h5_bold'               => true,
        'typography_header_h5_italic'             => false,
        'typography_header_h5_underline'          => false,
        'typography_header_h5_uppercase'          => false,
        'typography_header_h6_family'             => 'roboto',
        'typography_header_h6_size'               => '0.67',
        'typography_header_h6_line_height'        => '1.1',
        'typography_header_h6_bold'               => true,
        'typography_header_h6_italic'             => false,
        'typography_header_h6_underline'          => false,
        'typography_header_h6_uppercase'          => false,


        // colors
        'color_main'                         => '#5a80b1',
        'color_text'                         => '#333333',
        'color_link'                         => '#428bca',
        'color_link_hover'                   => '#e66212',
        'color_header_bg'                    => '#ffffff',
        'color_header_text'                  => '#333333',
        'color_logo'                         => '#5a80b1',
        'color_description'                  => '#666666',
        'color_menu_bg'                      => '#5a80b1',
        'color_menu'                         => '#ffffff',
        'color_content_bg'                   => '#ffffff',
        'color_footer_bg'                    => '#ffffff',
        'color_footer_text'                  => '#333333',


        // background
        'body_bg_link'                       => '',
        'body_bg_link_js'                    => false,
        'header_bg'                          => '',
        'header_bg_repeat'                   => 'no-repeat',
        'header_bg_position'                 => 'center center',
        'header_bg_mob'                      => false,


        // tweak
        'content_full_width'                 => false,
        'social_share_title'                 => __( 'Like this post? Please share to your friends:', THEME_TEXTDOMAIN ),
        'social_share_title_show'            => true,
        'rating_title'                       => __( 'Rating', THEME_TEXTDOMAIN ),
        'rating_text_show'                   => true,
        'advertising_page_display'           => false,
        'microdata_publisher_telephone'      => '',
        'microdata_publisher_address'        => '',


        // partner program
        'wpshop_partner_enable'              => 'no',
        'wpshop_partner_id'                  => get_wpshop_partner_id(),
        'wpshop_partner_prefix'              => __( 'Powered by theme', THEME_TEXTDOMAIN ),
        'wpshop_partner_postfix'             => '',


        'skin'                               => 'no',
        'bg_pattern'                         => 'no',
    ) );

    return $defaults;
}

function root_options() {
    $root_options = wp_parse_args(
        get_option( 'root_options', array() ),
        root_options_defaults()
    );

    return $root_options;
}

function root_get_option( $option ) {
    $root_options = root_options();

    return ( isset( $root_options[$option] ) ) ? $root_options[$option] : '' ;
}
