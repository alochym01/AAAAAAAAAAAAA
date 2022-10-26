<div class="footer_container">
    <div class="footer_container_wrapper">
        <div class="container">
            <div class="row">
                <div class="footer">
                    <?php
                    /* A sidebar in the footer? Yep. You can can customize
                     * your footer with four columns of widgets.
                     */
                    get_sidebar('footer');
                    ?>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div class="bottom_footer_container">
    <div class="container">
        <div class="row">
            <div class="bottom_footer_content">
                <div class="col-md-4 col-sm-4">         
                    <ul class="social_logos">
                        <?php if (blackrider_get_option('inkthemes_twitter') != '') { ?>
                            <li class="tw"><a href="<?php echo stripslashes(blackrider_get_option('inkthemes_twitter')); ?>" target="_blank" alt="Twitter icon" title="Twitter"></a></li>
                        <?php } ?>  
                        <?php if (blackrider_get_option('inkthemes_facebook') != '') { ?>
                            <li class="fb"><a href="<?php echo stripslashes(blackrider_get_option('inkthemes_facebook')); ?>" target="_blank" alt="Facebook icon" title="Facebook"></a></li>   
                            <?php
                        }
                        if (blackrider_get_option('inkthemes_google') != '') {
                            ?>
                            <li class="gp"><a href="<?php echo stripslashes(blackrider_get_option('inkthemes_google')); ?>" target="_blank" alt="Google Plus icon" title="Google Plus"></a></li>
                            <?php
                        }
                        if (blackrider_get_option('inkthemes_ln') != '') {
                            ?>
                            <li class="ln"><a href="<?php echo stripslashes(blackrider_get_option('inkthemes_ln')); ?>" target="_blank" alt="LinkedIn icon" title="LinkedIn"></a></li>
                            <?php
                        }
                        if (blackrider_get_option('inkthemes_youtube') != '') {
                            ?>
                            <li class="yt"><a href="<?php echo stripslashes(blackrider_get_option('inkthemes_youtube')); ?>" target="_blank" alt="YouTube icon" title="YouTube"></a></li> 
                            <?php
                        }
                        if (blackrider_get_option('inkthemes_pinterest') != '') {
                            ?>
                            <li class="pn"><a href="<?php echo stripslashes(blackrider_get_option('inkthemes_pinterest')); ?>" target="_blank" alt="Pinterest" title="Pinterest"></a></li>
                        <?php } ?> 
                    </ul>
                </div>
                <div class="col-md-8 col-sm-8">
                    <div class="copyrightinfo">
                        <div class="copyrightinfo">
                            <?php if (blackrider_get_option('inkthemes_footertext') != '') { ?>
                            <p class="copyright"><?php echo wp_kses_post(blackrider_get_option('inkthemes_footertext')); ?></p> 
                            <?php } else { ?>
                                <p class="copyright"><?php _e('BlackRiders Theme by', 'black-rider') ?><a href="<?php echo esc_url('http://www.inkthemes.com'); ?>"><?php _e('InkThemes.com','black-rider') ?></a></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>
