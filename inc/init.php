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


/**
 * Theme config
 */
require get_template_directory() . '/inc/config.php';


/**
 * Enqueue styles and scripts
 */
require get_template_directory() . '/inc/enqueue.php';


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';


/**
 * New Core WPShop
 */
require get_template_directory() . '/inc/core/core.php';


/**
 * Partner
 */
require get_template_directory() . '/inc/partner.php';


/**
 * Default options
 */
require get_template_directory() . '/inc/default-options.php';


/**
 * after_setup_theme hooks: widgets, menus, theme_support
 */
require get_template_directory() . '/inc/setup.php';


/**
 * WPShop.biz functions
 */
require get_template_directory() . '/inc/template-functions.php';


/**
 * Clear WP
 */
require get_template_directory() . '/inc/clear-wp.php';


/**
 * Pseudo links
 */
require get_template_directory() . '/inc/pseudo-links.php';


/**
 * Sitemap
 */
require get_template_directory() . '/inc/core/sitemap.php';


/**
 * Contact Form
 */
require get_template_directory() . '/inc/contact-form.php';


/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets/widgets.php';


/**
 * Shortcodes
 */
require get_template_directory() . '/inc/shortcodes.php';


/**
 * TinyMCE
 */
if ( is_admin() ) {
    require get_template_directory() . '/inc/tinymce.php';
}


/**
 * Comments
 */
require get_template_directory() . '/inc/comments.php';


/**
 * Smiles
 */
require get_template_directory() . '/inc/smiles.php';


/**
 * Taxonomy header h1
 */
require get_template_directory() . '/inc/taxonomy-header.php';


/**
 * Metaboxes
 */
require get_template_directory() . '/inc/core/metaboxes.php';
require get_template_directory() . '/inc/metaboxes.php';


/**
 * Thumbnails
 */
require get_template_directory() . '/inc/thumbnails.php';


/**
 * Breadcrumbs
 */
require get_template_directory() . '/inc/core/breadcrumbs.php';


/**
 * Transliteration
 */
require get_template_directory() . '/inc/core/transliteration.php';


/**
 * TOC
 */
require get_template_directory() . '/inc/core/toc.php';


/**
 * Star rating
 */
require get_template_directory() . '/inc/core/star-rating.php';


/**
 * Admin
 */
require get_template_directory() . '/inc/admin.php';


/**
 * Admin Ad
 */
require get_template_directory() . '/inc/admin-ad.php';


/**
 * Theme updater
 */
require get_template_directory() . '/inc/theme-update-checker.php';

$theme_name 		= 'root';

$revelation_options = get_option( 'revelation_options' );
if ( isset( $revelation_options['license'] ) && ! empty( $revelation_options['license'] ) ) {

    $update_checker = new ThemeUpdateChecker(
        'root',
        'https://api.wpgenerator.ru/wp-update-server/?action=get_metadata&slug='. $theme_name . '&license_key=' . $revelation_options['license']
    );

}