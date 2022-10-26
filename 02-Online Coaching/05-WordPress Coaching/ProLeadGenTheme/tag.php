<?php
/**
 * The template used to display Tag Archive pages
 *
 * @package WordPress
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
                    <p>
                        <?php printf(__('Tag Archives: %s', 'black-rider'), '' . single_cat_title('', false) . ''); ?></p>
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
                <div class="col-md-8 col-sm-8">
                    <div class="content-bar">   
                        <!--Start Post-->
                        <?php
                        if (have_posts()) : while (have_posts()) : the_post();
                                get_template_part('content', 'index');
                            endwhile;
                        else:
                            ?>
                            <div class="post">
                                <p>
                                    <?php _e('Sorry, no posts matched your criteria.', 'black-rider'); ?>
                                </p>
                            </div>
                        <?php endif; ?>
                        <div class="clear"></div>
                        <nav id="nav-single"> <span class="nav-previous">
                                <?php next_posts_link(__('Newer posts &rarr;', 'black-rider')); ?>
                            </span> <span class="nav-next">
                                <?php previous_posts_link(__('&larr; Older posts', 'black-rider')); ?>
                            </span> </nav>	
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
<?php
get_footer();
