<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
get_header();
?>
<!--Home Slider-->
<?php
get_template_part('templates/templates', 'slider');
?>
<!--/Home Slider-->
<div class="clear"></div>
<div class="home_container">
    <div class="container">
        <div class="row">
            <!--Home Content-->
            <div class="home-content">
                <div class="col-md-12">
                    <div class="page_info_wrapper">

                        <div class="page_info">
                            <div class="blur_line_container" style="">
                                <span class="blur_line"></span>
                                <span class="blur_line"></span>
                            </div>
                            <?php if (blackrider_get_option('inkthemes_page_main_heading') != '') { ?>
                                <p class="page-info-heading"><?php echo wp_kses_post(blackrider_get_option('inkthemes_page_main_heading')); ?></p>
                            <?php } else { ?>
                                <div class="line_space"><span class="glyphicon glyphicon-chevron-right" style="font-size:0.05em;"></span><p  class="page-info-heading"><?php _e('Premium WordPress Themes with Single.', 'black-rider'); ?> </p></div>
                            <?php } ?>
                            <div class="blur_line_container">
                                <span class="blur_line"></span>
                                <span class="blur_line"></span>
                            </div>
                        </div>

                        <?php if (blackrider_get_option('inkthemes_page_sub_heading') != '') { ?>
                            <p><?php echo wp_kses_post(blackrider_get_option('inkthemes_page_sub_heading')); ?></p>
                        <?php } else { ?>
                            <p> <?php _e('The best thing about blackrider Theme is the ease with the help of which you can convert your Website in various different Niches. Your Clients Would Love Their Site & You Would smile in the back thinking about the Time That You Spend Building their Sites.', 'black-rider'); ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <!--Feature Box-->
                    <?php
                    get_template_part('templates/templates', 'feature_box');
                    ?>
                    <!--/Feature Box-->
                </div>
                <div class="clear"></div>
            </div>
            <!--/Home Content-->
            <div class="bottom_feature">
                <div class="col-md-12">
                    <?php if (blackrider_get_option('inkthemes_blog_heading') != '') { ?>
                        <p class="blog-heading"><?php echo wp_kses_post(blackrider_get_option('inkthemes_blog_heading')); ?></p>
                    <?php } else { ?>
                        <p class="blog-heading"><?php _e('Our Latest Blogs', 'black-rider'); ?> </p>
                    <?php } ?>
                </div>
                <div class="col-md-8 col-sm-8">
                    <div class="blog_feature">
                        <?php
                        if (blackrider_get_option('inkthemes_blog_post') != '') {
                            $post_limit = wp_kses_post(blackrider_get_option('inkthemes_blog_post'));
                        } else {
                            $post_limit = 2;
                        }
                        $arg = array();

                        // WP_Query arguments
                        $args = array(
                            'post_type' => array('post'),
                            'post_status' => array('publish'),
                            'posts_per_page' => $post_limit,
                        );

// The Query
                        $query = new WP_Query($args);

// The Loop
                        $count = 0;
                        $i = 0;
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                $count++;
                                ?>
                                <!--Start post-->
                                <div class="post <?php
                                if ($count == $i) {
                                    echo 'last-post';
                                }
                                ?>">
                                         <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                                             <?php blackrider_get_thumbnail(265, 201); ?>
                                         <?php } else { ?>
                                             <?php blackrider_get_image(265, 201); ?> 
                                             <?php
                                         }
                                         ?>
                                    <h1 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
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
                                        <?php echo blackrider_custom_trim_excerpt(40); ?>
                                        <a class="read-more" href="<?php the_permalink() ?>"><?php _e('Read More', 'black-rider'); ?></a>
                                        <!--                                    -->
                                    </div>              
                                </div>
                                <?php
                            }
                        } else {
                            // no posts found
                        }

// Restore original Post Data
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="sidebar home">
                        <?php
                        if (is_active_sidebar('home-page-widget-area')) :
                            dynamic_sidebar('home-page-widget-area');
                        else :
                            '<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Finkthemes&width=290&height=430&colorscheme=light&show_faces=true&border_color&stream=false&header=true" scrolling="yes" frameborder="0" style="border:none; width:290px; height:450px;" allowTransparency="true"></iframe>';
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<?php
get_footer();
