<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="rescue-main" class="rescue-site-main">
        <div class="single-post">
            
        <?php
        while (have_posts()) :
            the_post();
            $post_id = get_the_ID();
            $metadata = get_post_meta( $post_id, '', false );

            if ( is_singular() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif;

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

            if ( ! empty( $metadata['_dogs_other_names'] ) ) : ?>
                <hr />
                <div class="other-names">
                    <h6>Here are some of <?php echo esc_html( get_the_title() ) ?>'s other names:</h6>
                    <p><?php _e( $metadata['_dogs_other_names'][0], 'default' ); ?></p>
                </div>
            <?php endif;

            echo "<pre>\n";
            print_r( $metadata );
            echo "</pre>\n";
            

        endwhile;
        ?>
        </div>
    </main>
</div>

<?php get_footer(); ?>
