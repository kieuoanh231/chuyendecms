<?php
get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-7 col-lg-8 col-xs-12">
                    <div class="blog-post">
                        <?php
                        if (have_posts()) :
                            while (have_posts()) : the_post();
                        ?>
                                <div class="thumbnail">
                                    <div class="caption">
                                        <p class="author-text"><span><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a> /</span> <?php echo get_the_date(); ?> </p>

                                        <a href="<?php the_permalink(); ?>">
                                            <h3><?php the_title(); ?></h3>
                                        </a>

                                    </div><!-- /.end of caption-->
                                </div><!-- /.end of thumbnail -->
                        <?php
                            endwhile;
                        endif; ?>
                    </div>
                </div><!-- .col-md-8 -->
                <?php get_sidebar();
                ?>
            </div><!-- .row -->
        </div><!-- .comtainer -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>