<?php
/**
 * The template for displaying Author pages.
 *
 */
get_header();
?> 
<div class="page_heading_container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page_heading_content">
                    <span class="bred-tip"></span>
                    <?php if (have_posts()) : the_post(); ?>
                        <p><?php printf(__('Author Archives: %s', 'black-rider'), "<span class='vcard'><a class='url fn n' href='" . get_author_posts_url(get_the_author_meta('ID')) . "' title='" . esc_attr(get_the_author()) . "' rel='me'>" . esc_attr(get_the_author()) . "</a></span>"); ?></p>
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
                            /* Queue the first post, that way we know who
                             * the author is when we try to get their name,
                             * URL, description, avatar, etc.
                             *
                             * We reset this later so we can run the loop
                             * properly with a call to rewind_posts().
                             */
                            if (have_posts())
                                the_post();

                            /*  If a user has filled out their description, show a bio on their entries. */
                            if (get_the_author_meta('description')) :
                                ?>
                                <div id="entry-author-info">
                                    <div id="author-avatar"> <?php echo get_avatar(get_the_author_meta('user_email'), apply_filters('blackrider_author_bio_avatar_size', 60)); ?> </div>
                                    <!-- #author-avatar -->
                                    <div id="author-description">
                                        <h2><?php printf(__('About: %s', 'black-rider'), get_the_author()); ?></h2>
                                        <?php the_author_meta('description'); ?>
                                    </div>
                                    <!-- #author-description	-->
                                </div>
                                <!-- #entry-author-info -->
                                <?php
                            endif;
                            /* Since we called the_post() above, we need to
                             * rewind the loop back to the beginning that way
                             * we can run the loop properly, in full.
                             */
                            rewind_posts();
                            /* Run the loop for the author archive page to output the authors posts
                             * If you want to overload this in a child theme then include a file
                             * called loop-author.php and that will be used instead.
                             */
                            if (have_posts()) : while (have_posts()) : the_post();
                                    get_template_part('content', 'author');
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
                            ?>
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
