<div class="serma-author-container serma-container-md">
    <div class="d-flex serma-author-extra-info">
        <div class="serma-avatar-container flex-none">
            <?php echo get_avatar(get_the_author_ID(), 120) ?>
        </div>
        <div class="ml-2 serma-info-container">
            <div class="serma-author-info">
                <h2><?php do_shortcode( 'serma_author_job_title_and_name') ?></h2>
            </div>
            <div class="serma-author-info">
                <p class="black-text">
                    <?php echo get_the_author_meta('description') ?>
                </p>
            </div>

            <div class="serma-author-info">
                <p class="black-text">
                    <?php do_shortcode( 'serma_author_social_networks' ) ?>
                </p>
            </div>
        </div>
    </div>
</div>