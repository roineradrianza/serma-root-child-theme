<?php
/**
 * Child theme of Root
 * https://docs.wpshop.ru/root-child/
 *
 * @package Root
 */

/**
 * Enqueue child styles
 *
 * НЕ УДАЛЯЙТЕ ДАННЫЙ КОД
 */

add_action('wp_enqueue_scripts', 'enqueue_child_theme_styles', 100);

function enqueue_child_theme_styles()
{
    wp_enqueue_style('root-style-child', get_stylesheet_uri(), array('root-style'), '1.0.1.0');
}

/**
 * НИЖЕ ВЫ МОЖЕТЕ ДОБАВИТЬ ЛЮБОЙ СВОЙ КОД
 */

/**
 * This function modifies the main WordPress query to remove
 * pages from search results.
 *
 * @param object $query The main WordPress query.
 */

function tg_exclude_pages_from_search_results($query)
{
    if ($query->is_main_query() && $query->is_search() && !is_admin()) {
        $query->set('post_type', array('post'));
    }
}

add_action('pre_get_posts', 'tg_exclude_pages_from_search_results');

/**
 * Add new fields above 'Update' button.
 *
 * @param WP_User $user User object.
 */

function serma_root_theme_wp_head()
{
    ?>
<script type="text/javascript">
var serma_root_ajaxurl = '<?php echo esc_url(admin_url('admin-ajax.php')); ?>?action=';
</script>
<?php
}

function sendy_form()
{
    add_action('wp_footer', 'serma_root_theme_wp_head');
    wp_enqueue_script('serma-newsletter-form', get_stylesheet_directory_uri() . '/assets/js/sendy-newsletter.js', [], '1.0.0');
    get_template_part('template-parts/sendy', 'newsletter');
}

function serma_additional_profile_fields($user)
{

    $job_title = get_the_author_meta('serma_job_title', $user->ID);
    $serma_facebook = get_the_author_meta('serma_facebook', $user->ID);
    $serma_instagram = get_the_author_meta('serma_instagram', $user->ID);
    $serma_telephone = get_the_author_meta('serma_telephone', $user->ID);

    ?>
    <h3>Información pública</h3>

    <table class="form-table">
        <tr>
            <th><label for="serma_job_title">Profesión</label></th>
            <td>
                <input type="text" id="serma_job_title" name="serma_job_title" placeholder="Dra, Dr, etc.." value="<?php echo $job_title ?>">
            </td>
        </tr>

        <tr>
            <th><label for="serma_telephone">Número de teléfono</label></th>
            <td>
                <input type="text" id="serma_telephone" name="serma_telephone" placeholder="" value="<?php echo $serma_telephone ?>">
            </td>
        </tr>

        <tr>
            <th><label for="serma_facebook">Facebook</label></th>
            <td>
                <input type="text" id="serma_facebook" name="serma_facebook" placeholder="https://facebook.com/usuario" value="<?php echo $serma_facebook ?>">
            </td>
        </tr>

        <tr>
            <th><label for="serma_instagram">Instagram</label></th>
            <td>
                <input type="text" id="serma_instagram" name="serma_instagram" placeholder="https://www.instagram.com/usuario" value="<?php echo $serma_instagram ?>">
            </td>
        </tr>
    </table>
<?php
}

add_action('show_user_profile', 'serma_additional_profile_fields');
add_action('edit_user_profile', 'serma_additional_profile_fields');

/**
 * Save additional profile fields.
 *
 * @param  int $user_id Current user ID.
 */
function serma_save_profile_fields($user_id)
{

    if (!current_user_can('edit_user', $user_id)) {
        return false;
    }

    update_usermeta($user_id, 'serma_job_title', $_POST['serma_job_title']);
    update_usermeta($user_id, 'serma_telephone', $_POST['serma_telephone']);
    update_usermeta($user_id, 'serma_facebook', $_POST['serma_facebook']);
    update_usermeta($user_id, 'serma_instagram', $_POST['serma_instagram']);
}

function theme_prefix_register_elementor_locations($elementor_theme_manager)
{

    $elementor_theme_manager->register_location('header');
    $elementor_theme_manager->register_location('footer');
    // $elementor_theme_manager->register_location( 'single' );
    // $elementor_theme_manager->register_location( 'archive' );

}

function serma_post_ajax_loader()
{

    global $wp_query;

    wp_enqueue_script('jquery');

    // register our main script but do not enqueue it yet
    wp_register_script('serma-post-ajax', get_stylesheet_directory_uri() . '/assets/js/post-ajax.js', array('jquery'), '1.0.0');

    wp_localize_script('serma-post-ajax', 'serma_post_ajax', array(
        'posts' => json_encode($wp_query->query_vars), // everything about your loop is here
        'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
        'max_page' => $wp_query->max_num_pages,
    ));

    wp_enqueue_script('serma-post-ajax');
}

function serma_post_ajax_handler()
{

    $args = json_decode(stripslashes($_POST['query']), true);
    $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
    $args['post_status'] = 'publish';

    query_posts($args);

    if (have_posts()):
        
        while (have_posts()): the_post();

            get_template_part('template-parts/posts/content-card-without-micro', get_post_format());

        endwhile;

    endif;
    die;
}

add_shortcode( 'serma_author_job_title_and_name', function () {
    $html = "
        <h2 style='color: black; font-size: 24px'>". get_the_author_meta('serma_job_title') . ' ' . get_the_author() ."</h2>
    ";
    return $html;
} );

add_shortcode( 'serma_author_social_networks', function () {
    $social_networks = [
        [
            'social' => 'facebook', 
            'link' => get_the_author_meta( 'serma_facebook' ), 
            'icon' => 'fa-facebook-f'
        ],
        [
            'social' => 'instagram', 
            'link' => get_the_author_meta( 'serma_instagram' ), 
            'icon' => 'fa-instagram'
        ],
        [
            'social' => 'whatsapp', 
            'link' => !empty(get_the_author_meta( 'serma_telephone' )) 
            ? 'https://wa.me/' . get_the_author_meta( 'serma_telephone' ) : '', 
            'icon' => 'fa-whatsapp'
        ],
    ];
    $html = "<div style='display: flex;'>";
    foreach($social_networks as $social_network) {
        if (!empty($social_network['link'])) {
           $padding = $social_network['social'] == 'facebook' ? '15px' : '13px' ;
           $html .= "
                <a href='". $social_network['link'] ."'>
                    <div style='background-color: #585CE5; border-radius: 80px; padding: 10px $padding; margin-right: 10px;'>
                        <span class='fab ". $social_network['icon'] ."' style='font-size: 24px; color:white'></span>
                    </div>
                </a>
           ";
        }
    };
    $html .= "</div>";
    return $html;
} );

add_action('root_single_after_the_content', 'serma_insert_end_content_names_cta');

function serma_insert_end_content_names_cta($content) {
    $ad_code = get_template_part( 'template-parts/boxes/cta-baby-names' );
    return $ad_code;
}

add_Action('wp_head', 'serma_post_headings_style');

function serma_post_headings_style () {
    if (is_single()) {
        wp_enqueue_style('serma-post-headings', get_stylesheet_directory_uri() . '/assets/css/post-headings.css', '', '1.0.0');
    }
}

add_action('wp_ajax_serma_post_ajax', 'serma_post_ajax_handler');
add_action('wp_ajax_nopriv_serma_post_ajax', 'serma_post_ajax_handler');

add_action('elementor/theme/register_locations', 'theme_prefix_register_elementor_locations');

add_action('personal_options_update', 'serma_save_profile_fields');
add_action('edit_user_profile_update', 'serma_save_profile_fields');

add_shortcode('sendy_newsletter', 'sendy_form');
