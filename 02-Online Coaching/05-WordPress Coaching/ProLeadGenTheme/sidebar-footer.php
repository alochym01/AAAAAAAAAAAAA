<div class="col-md-3 col-sm-6">
    <div class="footer_widget first">
        <?php
        if (is_active_sidebar('first-footer-widget-area')) :
            dynamic_sidebar('first-footer-widget-area');
        else :
            ?>
            <h3> <?php _e('Inkthemes Theme', 'black-rider'); ?></h3>
            <div class="setposition">
                <div class="linetop"></div>
                <div class="linebottom"></div>
            </div>
            <p><?php _e('Premium WordPress Themes with Single Click Installation, Just a Click and your website is ready for use. Your Site is faster to built, easy to use & Search Engine Optimized.', 'black-rider'); ?></p>
        <?php endif; ?>
    </div>
</div>
<div class="col-md-3 col-sm-6">
    <div class="footer_widget">
        <?php
        if (is_active_sidebar('second-footer-widget-area')) :
            dynamic_sidebar('second-footer-widget-area');
        else :
            ?> 
            <h3><?php _e('Latest Posts', 'black-rider'); ?></h3>
            <div class="setposition">
                <div class="linetop"></div>
                <div class="linebottom"></div>
            </div>
            <ul>
                <li><?php _e('Entertainment', 'black-rider'); ?></li>
                <li><?php _e('Following problems', 'black-rider'); ?></li>
                <li><?php _e('FAQ', 'black-rider'); ?></li>
                <li><?php _e('Music And Sports', 'black-rider'); ?></li>
            </ul>
        <?php endif; ?> 
    </div>
</div>
<div class="col-md-3 col-sm-6">
    <div class="footer_widget">
        <?php
        if (is_active_sidebar('third-footer-widget-area')) :
            dynamic_sidebar('third-footer-widget-area');
        else :
            ?>
            <h3>Search Anything</h3>
            <div class="setposition">
                <div class="linetop"></div>
                <div class="linebottom"></div>
            </div>
            <p><?php _e('Qarius dui, quis posuere nibh ollis quis. Mauris omma rhoncus rttitor.', 'black-rider'); ?>  <a href="<?php echo esc_url('http://www.inkthemes.com'); ?>">http://inkthemes.com</a> </p>
            <form class="searchform" action="#" method="post">
                <div class="inner-addon right-addon">
                    <!--<i class="glyphicon glyphicon-search searchico"></i>-->
                    <input onfocus="if (this.value == '<?php _e('Search', 'black-rider'); ?>') {
                                    this.value = '';
                                }" onblur="if (this.value == '') {
                                            this.value = '<?php _e('Search', 'black-rider'); ?>';
                                        }"  value='<?php _e('Search', 'black-rider'); ?>' type="text" name="s" id="s" />
                </div>
                <div class="arrow-container">
                    <span class="arrow_box">
                        <i class="glyphicon glyphicon-search searchico"></i>
                        <input type="submit" value="" name="submit"/>
                    </span>
                </div>
            </form>
        <?php endif; ?>
    </div>
</div>
<div class="col-md-3 col-sm-6">
    <div class="footer_widget last">
        <?php
        if (is_active_sidebar('fourth-footer-widget-area')) :
            dynamic_sidebar('fourth-footer-widget-area');
        else :
            ?>
            <h3>Footer Widgets</h3>
            <div class="setposition">
                <div class="linetop"></div>
                <div class="linebottom"></div>
            </div>
            <p><?php _e('Footer is widgetized. To setup the footer, drag the required Widgets in Appearance -> Widgets Tab in the First, Second, Third and Fourth Footer Widget Areas.', 'black-rider'); ?></p>
        <?php endif; ?>
    </div>
</div>