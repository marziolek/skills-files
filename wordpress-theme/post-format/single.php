<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!--    <header class="entry-header">
        <div class="entry-meta">
            <ul>
                <li class="date"><i class="fa fa-clock-o"></i> <time class="entry-date" datetime="<?php the_time( 'c' ); ?>"><?php the_time('j M Y'); ?></time></li>
                <li class="author"><i class="fa fa-pencil"></i> <?php the_author_posts_link() ?></li>
                <li class="category"><i class="fa fa-paperclip"></i> <?php echo get_the_category_list(', '); ?></li> 
                <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
                <li class="comments-link">
                    <i class="fa fa-comments-o"></i> <?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'themeum' ) . '</span>', __( 'One comment', 'themeum' ), __( '% comments', 'themeum' ) ); ?>
                </li>
                <?php endif; ?>
            </ul>
        </div>

    </header> --><!--/.entry-header -->

    <div class="entry-content">
        <?php if ( has_post_thumbnail() && ! post_password_required() ) { ?>
        <div class="entry-thumbnail">
            <?php the_post_thumbnail('blog-thumb', array('class' => 'img-responsive')); ?>
        </div>
        <?php } //.entry-thumbnail ?>
        
        <h2 class="entry-title">
            <?php the_title(); ?>
        </h2>
        
        <?php the_content(); ?>
        
        <?php wp_link_pages(); ?>
    </div> <!-- //.entry-content -->

    <?php the_tags( '<footer class="entry-meta"><span class="tag-links"><i class="fa fa-tags"></i>', ', ', '</span></footer>' ); ?>
</article> <!--/#post-->

<button class="button show-all-comments">Wszystkie komentarze</button>
<button class="button add-comment">Dodaj komentarz</button>