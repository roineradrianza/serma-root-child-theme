<?php
/**
 * ****************************************************************************
 *
 *   DON'T EDIT THIS FILE
 *   After update you will lose all changes. Use child theme
 *
 *   НЕ РЕДАКТИРУЙТЕ ЭТОТ ФАЙЛ
 *   После обновления Вы потереяете все изменения. Используйте дочернюю тему
 *
 *   https://support.wpshop.ru/docs/general/child-themes/
 *
 * *****************************************************************************
 *
 * @package root
 */

if ( has_nav_menu( 'footer_menu' ) ) {  ?>
    <div class="footer-navigation <?php root_navigation_footer_classes() ?>" itemscope itemtype="http://schema.org/SiteNavigationElement">
        <div class="main-navigation-inner <?php root_navigation_footer_inner_classes() ?>">
            <?php wp_nav_menu( array( 'theme_location' => 'footer_menu', 'menu_id' => 'footer_menu' ) ); ?>
        </div>
    </div>
<?php } ?>