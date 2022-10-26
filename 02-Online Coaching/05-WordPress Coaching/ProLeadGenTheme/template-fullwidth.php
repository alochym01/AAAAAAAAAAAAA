<?php
/*
  Template Name: Fullwidth Page
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
            <div class="col-md-12">
                <div class="page-content">
                    <div class="fullwidth">
                        <h1 class="page-title-gall"><?php the_title(); ?></h1>
                        <?php
                        if (have_posts()) : the_post();
                            the_content();
                        endif;
                        comments_template();
                        ?>	  
                    </div> 
                </div> 
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php
get_footer();
