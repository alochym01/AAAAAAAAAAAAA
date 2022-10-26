<?php
/*
  Template Name: Blog Page
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
                <div class="col-md-8 col-sm-8">
                    <div class="content-bar">
                        <?php
                        $args = array(
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'paged' => $paged
                        );

                        $wp_query = new WP_Query($args);
                        ?>
                        <!--Start Post-->
                        <?php
                        if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : the_post();
                                get_template_part('content');
                            endwhile;
                        else:
                            ?>
                            <div class="post">
                                <p>
                                    <?php _e('Sorry, no posts matched your criteria.', 'black-rider'); ?>
                                </p>
                            </div>
                        <?php endif; ?>
                        <!--End Post-->
                        <div class="clear"></div>
                        <nav id="nav-single"> <span class="nav-previous">
                                <?php previous_posts_link(__('&larr; Previous Post', 'black-rider')); ?>
                            </span> <span class="nav-next">
                                <?php next_posts_link(__('Next Post &rarr;', 'black-rider')); ?>
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
