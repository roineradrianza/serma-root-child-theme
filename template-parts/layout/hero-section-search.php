<div class="d-flex align-center hero-section search-section"
    style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/assets/images/consejos-tips-para-la-nueva-etapa-de-ser-padres.webp)">
    <div class="serma-container-md">
        <h1 class="mb-1 heading-text">
            Resultados de: <?php echo get_search_query(); ?>
        </h1>
        <hr class="pink-divider">
        <div class="search-container mt-4 mb-3">
            <form action="<?php echo get_home_url(); ?>" method="GET">
                <input placeholder="Buscar" class="search-bar" type="search" name="s" title="Buscar"
                    value="<?php echo get_search_query(); ?>">
                <button type="submit">
                    <span class="fas fa-search"></span>
                </button>
            </form>
        </div>
    </div>
</div>