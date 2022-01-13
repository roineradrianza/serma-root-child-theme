<div class="serma-author-container serma-container-md">
    <div class="serma-author-basic-info">
        <h2><?php echo get_the_author() ?></h2>
        <p class="font-weight-semi-bold black-text"><?php echo get_the_author_meta('serma_job_title') ?> </p>
    </div>
    <div class="d-flex serma-author-extra-info">
        <div class="serma-avatar-container flex-none">
            <?php echo get_avatar(get_the_author_ID(), 142) ?>
        </div>
        <div class="ml-2 serma-info-container">
            <div class="serma-author-info">
                <p class="font-weight-semi-bold black-text">
                    <span class="fas fa-circle primary-text fa-xs"></span>
                    Educación:
                </p>
                <p class="black-text">
                    <?php echo get_the_author_meta('serma_education') ?>
                </p>
            </div>

            <div class="serma-author-info">
                <p class="font-weight-semi-bold black-text">
                    <span class="fas fa-circle primary-text fa-xs"></span>
                    Especialidad:
                </p>
                <p class="black-text">
                    <?php echo get_the_author_meta('serma_speciality') ?>
                </p>
            </div>

            <div class="serma-author-info">
                <p class="font-weight-semi-bold black-text">
                    <span class="fas fa-circle primary-text fa-xs"></span>
                    Sobre mí:
                </p>
                <p class="black-text">
                    <?php echo get_the_author_meta('description') ?>
                </p>
            </div>
        </div>
    </div>
</div>