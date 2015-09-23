<?php
/*
 * Template Name: Frontpage
 */
get_header(); 

?>
<?php
$current_page_id = get_option('page_on_front'); // get front page id

$args = array( 'post_type' => 'page', 'post__in' => $post_ids, 'posts_per_page' => -1, 'meta_key' => 'page_order' , 'orderby' => 'meta_value_num', 'order' => 'asc' );

$allPosts = new WP_Query( $args ); // get pages on menu

$parallaxId = array();
$order = array();

//true because of polylang lol
if (true) {
    
    // Start the Loop.
    while ( $allPosts->have_posts() ) { 
        $allPosts->the_post();
        $postId = get_the_ID();

        if(( $postId != $current_page_id ))
        {
?>
<section id="<?php if ($post->post_name != 'portfolio-2') { echo $post->post_name; } else { echo 'portfolio'; } ?>" class="page-wrapper">
    <div class="container">
        <div class="page-content">
            <?php 
                $thumbnailHome = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                if ($thumbnailHome) {
                    ?>
                    <img src="<?php echo $thumbnailHome[0]; ?>" class="home-image img-responsive" alt="home image" />
                    <?php
                }
         
                $children = array();
                $my_wp_query = new WP_Query();
                $all_child_pages = $my_wp_query->query(array('post_type' => 'page', 'posts_per_page' => -1, 'meta_key' => 'child_page_order' , 'orderby' => 'meta_value_num', 'order' => 'asc'));
                $children = get_page_children( $postId, $all_child_pages );

                $childrenChildArray = array();
         
             if (trim($post->post_name) != 'portfolio' && trim($post->post_name) != 'portfolio-2') {
                ?> 
                    <article class="section-content">
                        <?php 
                            $extraTitle = get_post_meta( $post->ID, 'extra_title', true );
                            if ($extraTitle) {
                                ?>
                                <div class="headings-wrapper">
                                    <div>
                                        <div class="line-decorator"></div>
                                        <h1><?php echo $extraTitle; ?></h1>
                                    </div>
                                </div>
                                <?php
                            }
                        ?>
                        <div class="main-content">
                            <?php
                                if ($post->post_title != 'Realizacje') {
                                    echo do_shortcode(get_the_content()); 
                                }
                            ?>
                        </div>
                    </article>
                <?php
                foreach($children as $child) {
                    $postName = $child->post_name;
                    $postTitle = $child->post_title;
                    $content = $child->post_content;
                    ?>
                        <article class="child-page child-page-<?php echo $postName; ?> clearfix" data-id="<?php echo $child->ID; ?>">
                            <?php echo get_the_post_thumbnail($child->ID, 'full', array('class'=>'page-image')) ?>
                            <div>
                                <div class="child-page-heading circle"><div class="opacity-box"></div><span><?php echo $postTitle; ?></span></div>
                                <div class="child-content circle">
                                    <div>
                                        <?php echo $content; ?>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php
                    array_push($childrenChildArray, $child->ID);
                    };
                    /*if ( count($childrenChildArray) > 0 ) {
                        ?>
                        <div class="child-circles">
                        <?php
                        $queryChildChild = new WP_Query();
                        $pagesChildChild = $queryChildChild->query(array('post_type' => 'page'));

                        foreach($childrenChildArray as $childId) {
                            $childrenChild = get_page_children( $childId, $pagesChildChild );
                            echo( '<div class="circle child-circle" id="child-circle-'. $childId .'">' . $childrenChild[0]->post_content .'</div>' );  
                        };
                        ?>
                        </div>
                        <?php
                    };*/
                } else {
                 ?>
            <article class="section-content">
                <?php 
                    $extraTitle = get_post_meta( $post->ID, 'extra_title', true );
                    if ($extraTitle) {
                        ?>
                        <div class="headings-wrapper">
                            <div>
                                <div class="line-decorator"></div>
                                <h1><?php echo $extraTitle; ?></h1>
                            </div>
                        </div>
                        <?php
                    }
                ?>
                <?php echo $post->post_content; ?>
                <div class="main-content-wrapper" id="iscroll">
                    <div class="main-content" data-children="<?php echo (count($children)); ?>">
                        <?php
                            foreach($children as $child) {
                            $postTitle = $child->post_title;
                            $content = $child->post_content;
                            ?>
                                <article class="child-page">
                                    <div>
                                        <div class="portfolio-image">
                                            <div class="circle" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($child->ID) ); ?>')"></div>
                                        </div>
                                        <div class="child-content">
                                            <p class="portfolio-title"><?php echo $postTitle; ?></p>
                                            <?php echo $content; ?>
                                            <?php if (get_post_meta( $child->ID, 'technologies', true )) { ?>
                                                <p class="technologies-heading">Wykorzystane technologie i narzędzia:</p>
                                                <p><?php echo get_post_meta( $child->ID, 'technologies', true ); ?></p>
                                            <?php }; ?>
                                        </div>
                                    </div>
                                </article>
                            <?php
                            };
                        ?>
                    </div>
                </div>
            </article>
            <?php
            };
            ?>
        </div> <!-- .page-content -->
    </div> <!-- .container -->
</section>
<?php
        }
        wp_reset_query();
    }
}
?>

<?php 
get_footer(); 
?>