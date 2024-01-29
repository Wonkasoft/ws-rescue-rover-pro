<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="rescue-main" class="rescue-site-main">
        <?php if (have_posts()) : ?>
            <header class="page-header text-center">
                <h1 class="page-title">Available <?php echo esc_html( ucfirst( get_post_type() ) ); ?></h1>
            </header>
            <hr />
            <?php
            while (have_posts()) :
                the_post();
                ?>
                <div class="dog-container container">
                    <div class="row align-items-center">
                    <a class="dog-link" href="<?php echo esc_url( get_the_permalink( get_the_ID(), false ) ); ?>">
                        
                <?php
                // Your custom post type archive content goes here
                if ( has_post_thumbnail() ) :
                    ?>
                    <div class="post-thumbnail">
                        <img src="<?php echo get_the_post_thumbnail_url( null, 'medium', '' );; ?>" class="img-responsive rescue-thumbnail" />
                    </div>
                <?php else : ?>
                    <div class="post-thumbnail">
                        <img src="<?php echo plugin_dir_url( __DIR__ ) . 'img/CoastalGSR-Logo.jpg'; ?>" class="img-responsive rescue-thumbnail" />
                    </div>
                <?php endif; 
                    the_title( '<h1 class="entry-title text-center">', '</h1>' );
                ?>
                    </a>
                    </div>
                </div>
                <?php
            endwhile;

        else :
            echo '<p>No posts found</p>';

        endif;
        ?>
    </main>
</div>

<?php get_footer(); ?>
