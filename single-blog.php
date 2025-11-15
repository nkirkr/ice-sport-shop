<?php get_header(); ?>

<main class="main">

    <?php custom_breadcrumbs(); ?>

      <div class="article">

        <?php

        get_template_part( 'template-parts/article/article-intro' );
        get_template_part( 'template-parts/article/article-text' );
        get_template_part( 'template-parts/article/conversion' );
        get_template_part( 'template-parts/article/audio' );
        get_template_part( 'template-parts/article/article-gallery' );
        get_template_part( 'template-parts/article/video' );
        get_template_part( 'template-parts/article/other' );

        ?>

      </div>

    

    </main>

<?php get_footer(); ?>