<!--Start post-->
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
        blackrider_get_thumbnail(265, 201);
    } else {
        blackrider_get_image(265, 201);
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
    </div>              
</div>



