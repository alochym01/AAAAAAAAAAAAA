<?php
//
//if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
//if (post_password_required()) {
//    return;
//}
?>
<!-- You can start editing here. -->
<div id="commentsbox">
    <?php if (have_comments()) : ?>
        <h3 id="comments">
            <?php comments_number('No Responses', 'One Response', '% Responses'); ?>
            so far.</h3>
        <ol class="commentlist">
            <?php wp_list_comments(array('avatar_size' => 63)); ?>
        </ol>
        <div class="comment-nav">
            <div class="alignleft">
                <?php previous_comments_link() ?>
            </div>
            <div class="alignright">
                <?php next_comments_link() ?>
            </div>
        </div>
        <?php
    endif;
    if (comments_open()) :
        ?>       
        <div id="comment-form">
            <div id="respond" class="rounded">
                <div class="cancel-comment-reply"> <small>
                        <?php cancel_comment_reply_link(); ?>
                    </small> </div>
                <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
                    <p>You must be <a href="<?php echo wp_login_url(get_permalink()); ?>">logged in</a> to post a comment.</p>
                <?php else : ?>
                    <div id="comment-form">
                        <?php comment_form(array('title_reply' => __('Leave a Comment', 'black-rider'))); ?>
                    </div>
                <?php endif; // If registration required and not logged in    ?>
            </div>
        </div>
    <?php endif; // if you delete this the sky will fall on your head    ?>
</div>
