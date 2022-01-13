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

use Wpshop\Core\Fonts;

require get_template_directory() . '/inc/core/wpshop/Fonts.php';
$class_fonts = new Fonts();

/**
 * Fonts
 */
$class_fonts->preloading_fonts( get_template_directory_uri() . '/fonts/fontawesome-webfont.ttf' );