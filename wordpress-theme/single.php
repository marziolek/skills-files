<?php get_header(); ?>

    <section id="main" class="container">
        <div class="row">
            <div id="content" class="site-content col-md-9 clearfix" role="main">

                <?php if ( have_posts() ) : ?>

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'post-format/single', get_post_format() ); ?>

                        <div class="media post-author">
                            <div class="pull-left">
                            <?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
                            </div>
                            <div class="media-body">
                            <h3><?php echo get_the_author_link(); ?></h3>
                            <p><?php the_author_meta('description'); ?></p>
                            </div>
                        </div> <!-- .post-author -->

                        <div class="clearfix post-navigation">
                            <?php previous_post_link('<span class="previous-post pull-left">%link</span>','<i class="fa fa-angle-double-left"></i> previous article'); ?>
                             <?php next_post_link('<span class="next-post pull-right">%link</span>','next article <i class="fa fa-angle-double-right"></i>'); ?>
                        </div> <!-- .post-navigation -->

                        <?php
                            if ( comments_open() || get_comments_number() ) {
                                    comments_template();
                            }
                        ?>
                    <?php endwhile; ?>
                    
                <?php else: ?>
                    <?php get_template_part( 'post-format/single', 'none' ); ?>
                <?php endif; ?>

            </div> <!-- #content -->

            <div id="sidebar" class="col-md-3" role="complementary">
                <div class="sidebar-inner">
                    <aside class="widget-area">
                        <h3 class="widget_title">Ostatnio dodane</h3>
                        <ul>
                            <?php foreach ( (array) get_posts('numberposts=5') as $sidebarPost ) : ?>
                                <li>
                                     <p class="sidebar-title"><?php echo $sidebarPost->post_title; ?></p>
                                     <div class="thumbnail" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($sidebarPost->ID, 'medium')); ?>');"></div>
                                     <a href="<?php echo get_permalink($sidebarPost->ID); ?>" class="button">Dowiedz się więcej</a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </aside>
                </div>
            </div> <!-- #sidebar -->

        </div> <!-- .row -->
    </section> <!-- .container -->

<?php get_footer();