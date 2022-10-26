<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * 
 * 
 */
?>
<?php get_header(); ?>
<div class="page_heading_container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page_heading_content">
                    <span class="bred-tip"></span>
                    <?php blackrider_breadcrumbs(); ?>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="page-content-container">
    <div class="container">
        <div class="row">
            <div class="page-content">
                <div class="col-md-8  col-sm-8">
                    <div class="content-bar">
                        <!-- Start the Loop. -->
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <!--Start post-->
                                <div class="post">
                                    <h1 class="post_title"><?php the_title(); ?></h1>
                                    <div class="post_content">                
                                        <ul class="post_meta">
                                            <li class="posted_by"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php the_author_posts_link(); ?></li>
                                            <li class="post_date"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span><?php echo get_the_time('M-d-Y') ?></a></li>
                                            <li class="post_category"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span><?php the_category(', '); ?></li>
                                            <?php if (get_comments_number($post->ID) > 0) {
                                                ?>
                                                <li class="postc_comment"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span><?php comments_popup_link('0 Comments.', '1 Comments.', '% Comments.'); ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>  
                                    <?php the_content();
                                    if (has_tag()) { ?>
                                        <div class="tag">
                                            <?php the_tags(__('Post Tagged with','black-rider'), ','); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <?php
                            endwhile;
                        else:
                            ?>
                            <div class="post">
                                <p>
                                    <?php echo _e('Sorry, no posts matched your criteria.', 'black-rider'); ?>
                                </p>
                            </div>
                        <?php endif; ?>
                        <!--End post-->
                        <?php
                        wp_link_pages(array(
                            'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'black-rider') . '</span>',
                            'after' => '</div>',
                            'link_before' => '<span>',
                            'link_after' => '</span>',
                        ));
                        ?>
                        <div class="clear"></div>
                        <nav id="nav-single"> <span class="nav-previous">
                                <?php previous_post_link('%link', '<span class="meta-nav">' . __('&larr; Previous Post', 'black-rider') . '</span>'); ?>
                            </span> <span class="nav-next">
                                <?php next_post_link('%link', '<span class="meta-nav">' . __('Next Post &rarr;', 'black-rider') . '</span>'); ?>
                            </span> </nav>
                        <!--Start Comment box-->
                        <?php comments_template(); ?>
                        <!--End Comment box-->
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <!--Start Sidebar-->
                    <?php get_sidebar(); ?>
                    <!--End Sidebar-->
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer();