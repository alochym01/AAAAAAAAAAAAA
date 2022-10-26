<form class="searchform" action="#" method="post">
    <div class="inner-addon right-addon">

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
<div class="clear"></div>
