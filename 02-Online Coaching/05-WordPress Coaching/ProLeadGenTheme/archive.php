<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 */
get_header();
?> 
<div class="page_heading_container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="anujarchive">
                    <div class="page_heading_content">
                        <span class="brad-tip"></span>
                        <h1 class="page_title single-heading">
                            <?php
                            if (is_day()) :
                                printf(__('Daily Archives: %s', 'black-rider'), get_the_date());
                            elseif (is_month()) :
                                printf(__('Monthly Archives: %s', 'black-rider'), get_the_date('F Y'));
                            elseif (is_year()) :
                                printf(__('Yearly Archives: %s', 'black-rider'), get_the_date('Y'));
                            else :
                                _e('Blog Archives', 'black-rider');
                            endif;
                            ?>
                        </h1> 
                    </div>
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
                        <?php if (have_posts()): ?>

                            <?php
                            /* Since we called the_post() above, we need to
                             * rewind the loop back to the beginning that way
                             * we can run the loop properly, in full.
                             */
                            rewind_posts();
                            /* Run the loop for the archives page to output the posts.
                             * If you want to overload this in a child theme then include a file
                             * called loop-archives.php and that will be used instead.
                             */
                            if (have_posts()) : while (have_posts()) : the_post();
                                    get_template_part('content', 'archive');
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
                        <?php endif; ?>
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
