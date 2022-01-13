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
?>

<div class="posts-container">

    <?php
    $n = 0;
    while ( have_posts() ) : the_post();
        $n++;
        get_template_part( 'template-parts/posts/content', 'card-one' );
        do_action( THEME_SLUG . '_after_post_card', $n, 'post-card-one' );
    endwhile;
    ?>

</div>