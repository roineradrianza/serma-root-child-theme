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

$original_theme = $theme = wp_get_theme();
if ( $theme->parent() ) {
    $theme = $theme->parent();
}
define( 'THEME_VERSION', $theme->get( 'Version' ) );
define( 'THEME_ORIGINAL_VERSION', $original_theme->get( 'Version' ) );
define( 'THEME_TEXTDOMAIN', $theme->get( 'TextDomain' ) );
define( 'THEME_NAME', 'root' );
define( 'THEME_TITLE', 'Root' );
define( 'THEME_SLUG', 'root' );