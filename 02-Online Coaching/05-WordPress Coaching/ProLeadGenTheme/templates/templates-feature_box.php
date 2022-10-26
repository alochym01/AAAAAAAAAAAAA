<div class="feature_box">
    <div class="row">                       
        <div class="col-md-3 col-sm-6 feature_box_container">
            <div class="feature_inner_box first">
                <?php if (blackrider_get_option('inkthemes_fimg1') != '') { ?>
                    <div class="circle"><a href="<?php echo esc_url(blackrider_get_option('inkthemes_feature_link1')); ?>"><img src="<?php echo esc_url(blackrider_get_option('inkthemes_fimg1')); ?>" alt="Feature image" /></a></div>
                <?php } else { ?>
                    <div class="circle">
                        <a href="<?php echo esc_url(blackrider_get_option('inkthemes_feature_link1')); ?>"><img src="<?php echo BLACKRIDER_DIR_URI . '/assets/images/img.jpg'; ?>" alt="Feature image" /></a></div>
                    <?php
                }
                if (blackrider_get_option('inkthemes_firsthead') != '') {
                    ?>
                    <h6 class="feature_title"><a href="<?php
                        if (blackrider_get_option('inkthemes_feature_link1') != '') {
                            echo esc_url(blackrider_get_option('inkthemes_feature_link1'));
                        }
                        ?>"><?php echo wp_kses_post(stripslashes(blackrider_get_option('inkthemes_firsthead'))); ?></a></h6>
                    <?php } else { ?>
                    <h6><a href="#"><?php _e('Premium WordPress Themes with Single Click', 'black-rider'); ?></a></h6>
                    <?php
                }
                if (blackrider_get_option('inkthemes_firstdesc') != '') {
                    ?>
                    <p><?php echo stripslashes(blackrider_get_option('inkthemes_firstdesc')); ?></p>
                <?php } else { ?>
                    <p><?php _e('The Theme had a simple layout which attracts the Client to the 
                        Website. Also, the professional and Clean design. ', 'black-rider'); ?></p>
                <?php } ?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="col-md-3 col-sm-6 feature_box_container">
            <div class="feature_inner_box second">
                <?php if (blackrider_get_option('inkthemes_fimg2') != '') { ?>
                    <div class="circle"><a href="<?php echo esc_url(blackrider_get_option('inkthemes_feature_link2')); ?>"><img src="<?php echo esc_url(blackrider_get_option('inkthemes_fimg2')); ?>" alt="Feature image" /></a></div>
                <?php } else { ?>
                    <div class="circle">
                        <a href="<?php echo esc_url(blackrider_get_option('inkthemes_feature_link2')); ?>"><img src="<?php echo BLACKRIDER_DIR_URI . '/assets/images/img.jpg'; ?>" alt="Feature image" /></a></div>
                    <?php
                }
                if (blackrider_get_option('inkthemes_headline2') != '') {
                    ?>
                    <h6 class="feature_title"><a href="<?php
                        if (blackrider_get_option('inkthemes_feature_link2') != '') {
                            echo esc_url(blackrider_get_option('inkthemes_feature_link2'));
                        }
                        ?>"><?php echo wp_kses_post(stripslashes(blackrider_get_option('inkthemes_headline2'))); ?></a></h6>
                    <?php } else { ?>
                    <h6><a href="#"><?php _e('Premium WordPress Themes with Single Click', 'black-rider'); ?></a></h6>
                    <?php
                }

                if (blackrider_get_option('inkthemes_seconddesc') != '') {
                    ?>
                    <p><?php echo wp_kses_post(stripslashes(blackrider_get_option('inkthemes_seconddesc'))); ?></p>
                <?php } else { ?>
                    <p><?php _e('The Theme had a simple layout which attracts the Client to the 
                        Website. Also, the professional and Clean design .', 'black-rider'); ?></p>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 feature_box_container">
            <div class="feature_inner_box third">
                <?php if (blackrider_get_option('inkthemes_fimg3') != '') { ?>
                    <div class="circle"><a href="<?php echo esc_url(blackrider_get_option('inkthemes_feature_link3')); ?>"><img src="<?php echo esc_url(blackrider_get_option('inkthemes_fimg3')); ?>" alt="Feature image" /></a></div>
                <?php } else { ?>
                    <div class="circle">
                        <a href="<?php echo esc_url(blackrider_get_option('inkthemes_feature_link3')); ?>"><img src="<?php echo BLACKRIDER_DIR_URI . '/assets/images/img.jpg'; ?>" alt="Feature image" /></a></div>
                    <?php
                }
                if (blackrider_get_option('inkthemes_headline3') != '') {
                    ?>
                    <h6 class="feature_title"><a href="<?php
                        if (blackrider_get_option('inkthemes_feature_link3') != '') {
                            echo esc_url(blackrider_get_option('inkthemes_feature_link3'));
                        }
                        ?>"><?php echo wp_kses_post(stripslashes(blackrider_get_option('inkthemes_headline3'))); ?></a></h6>
                    <?php } else {
                        ?>
                    <h6><a href="#"><?php _e('Premium WordPress Themes with Single Click', 'black-rider'); ?></a></h6>
                    <?php
                }
                if (blackrider_get_option('inkthemes_thirddesc') != '') {
                    ?>
                    <p><?php echo wp_kses_post(blackrider_get_option('inkthemes_thirddesc')); ?></p>
                <?php } else { ?>
                    <p><?php _e('The Theme had a simple layout which attracts the Client to the 
                        Website. Also, the professional and Clean design .', 'black-rider'); ?></p>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 feature_box_container">
            <div class="feature_inner_box fourth">
                <?php if (blackrider_get_option('inkthemes_fimg4') != '') { ?>
                    <div class="circle"><a href="<?php echo blackrider_get_option('inkthemes_feature_link4'); ?>"><img src="<?php echo blackrider_get_option('inkthemes_fimg4'); ?>" alt="Feature image" /></a></div>
                <?php } else { ?>
                    <div class="circle">
                        <a href="<?php echo blackrider_get_option('inkthemes_feature_link4'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/img.jpg" alt="Feature image" /></a></div>
                    <?php
                }
                if (blackrider_get_option('inkthemes_headline4') != '') {
                    ?>
                    <h6 class="feature_title"><a href="<?php
                                                 if (blackrider_get_option('inkthemes_feature_link4') != '') {
                                                     echo blackrider_get_option('inkthemes_feature_link4');
                                                 }
                                                 ?>"><?php echo wp_kses_post(blackrider_get_option('inkthemes_headline4')); ?></a></h6>
                    <?php } else { ?>
                    <h6><a href="#"><?php _e('Premium WordPress Themes with Single Click', 'black-rider'); ?></a></h6>
                    <?php
                }
                if (blackrider_get_option('inkthemes_fourthdesc') != '') {
                    ?>
                    <p><?php echo stripslashes(blackrider_get_option('inkthemes_fourthdesc')); ?></p>
                <?php } else { ?>
                    <p><?php _e('The Theme had a simple layout which attracts the Client to the 
                        Website. Also, the professional and Clean design .', 'black-rider'); ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
