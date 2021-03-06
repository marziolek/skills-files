<?php
/*
 * Template Name: Full-Width Template
 */

get_header(); ?>

    <section id="main" class="clearfix">
        <div id="page" class="container">
            <div class="row">
                <div id="content" class="site-content col-md-12 clearfix" role="main">

                    <?php while ( have_posts() ): the_post(); ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <h1 class="entry-title"><?php the_title(); ?></h1>

                            <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
                            <div class="entry-thumbnail">
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <?php endif; ?>

                            <div class="entry-content">
                                <?php the_content(); ?>
                                <?php wp_link_pages(); ?>
                            </div>

                        </article>

                    <?php endwhile; ?>
                </div>
            </div> <!--/#content-->
        </div>
    </section> <!--/#page-->

<?php get_footer();