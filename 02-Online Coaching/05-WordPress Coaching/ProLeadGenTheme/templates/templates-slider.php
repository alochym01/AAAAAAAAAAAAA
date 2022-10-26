<div class="slider-wrapper">
    <input type="hidden" id="txt_slidespeed" value="<?php echo blackrider_get_option('inkthemes_slide_speed') != '' ? stripslashes(blackrider_get_option('inkthemes_slide_speed')) : 3000; ?>"/>
    <span class="top-shadow"></span>
    <div class="flexslider">
        <ul class="slides">
            <li><?php if (blackrider_get_option('inkthemes_slideimage1') != '') { ?>
                <a href="<?php
                    if (blackrider_get_option('inkthemes_Sliderlink1') != '') {
                        echo esc_url(blackrider_get_option('inkthemes_Sliderlink1'));
                    }
                    ?>" >
                        <img  src="<?php echo esc_url(blackrider_get_option('inkthemes_slideimage1')); ?>" alt="Slide Image 1"/></a>
                <?php } else { ?>
                    <img  src="<?php echo BLACKRIDER_DIR_URI . '/assets/images/slider-1.jpg' ?>" alt="Slide Image 1"/>
                <?php } ?>
            </li>
            <?php if (blackrider_get_option('inkthemes_slideimage2') != '') { ?>
                <li><?php if (blackrider_get_option('inkthemes_slideimage2') != '') { ?>
                        <a href="<?php
                        if (blackrider_get_option('inkthemes_Sliderlink2') != '') {
                            esc_url(blackrider_get_option('inkthemes_Sliderlink2'));
                        }
                        ?>" >
                            <img  src="<?php echo blackrider_get_option('inkthemes_slideimage2'); ?>" alt="Slide Image 2"/></a>
                    <?php } ?>			   
                </li> 
            <?php } if (blackrider_get_option('inkthemes_slideimage3') != '') { ?>
                <li><?php if (blackrider_get_option('inkthemes_slideimage3') != '') { ?>
                        <a href="<?php
                        if (blackrider_get_option('inkthemes_Sliderlink3') != '') {
                            echo esc_url(blackrider_get_option('inkthemes_Sliderlink3'));
                        }
                        ?>" >
                            <img  src="<?php echo esc_url(blackrider_get_option('inkthemes_slideimage3')); ?>" alt="Slide Image 3"/></a>
                    <?php } ?>	
                </li> 
            <?php } if (blackrider_get_option('inkthemes_slideimage4') != '') { ?>
                <li><?php if (blackrider_get_option('inkthemes_slideimage4') != '') { ?>
                        <a href="<?php
                        if (blackrider_get_option('inkthemes_Sliderlink4') != '') {
                            echo esc_url(blackrider_get_option('inkthemes_Sliderlink4'));
                        }
                        ?>" >
                            <img  src="<?php echo esc_url(blackrider_get_option('inkthemes_slideimage4')); ?>" alt="Slide Image 3"/></a>
                    <?php } ?>	
                </li> 
            <?php } if (blackrider_get_option('inkthemes_slideimage5') != '') { ?>
                <li><?php if (blackrider_get_option('inkthemes_slideimage5') != '') { ?>
                        <a href="<?php
                        if (blackrider_get_option('inkthemes_Sliderlink5') != '') {
                            echo esc_url(blackrider_get_option('inkthemes_Sliderlink5'));
                        }
                        ?>" >
                            <img  src="<?php echo esc_url(blackrider_get_option('inkthemes_slideimage5')); ?>" alt="Slide Image 3"/></a>
                    <?php } ?>	
                </li> 
            <?php } if (blackrider_get_option('inkthemes_slideimage6') != '') { ?>
                <li><?php if (blackrider_get_option('inkthemes_slideimage6') != '') { ?>
                        <a href="<?php
                        if (blackrider_get_option('inkthemes_Sliderlink6') != '') {
                            echo esc_url(blackrider_get_option('inkthemes_Sliderlink6'));
                        }
                        ?>" >
                            <img  src="<?php echo esc_url(blackrider_get_option('inkthemes_slideimage6')); ?>" alt="Slide Image 3"/></a>
                    <?php } ?>	
                </li> 
            <?php } if (blackrider_get_option('inkthemes_slideimage7') != '') { ?>
                <li><?php if (blackrider_get_option('inkthemes_slideimage7') != '') { ?>
                        <a href="<?php
                        if (blackrider_get_option('inkthemes_Sliderlink7') != '') {
                            echo esc_url(blackrider_get_option('inkthemes_Sliderlink7'));
                        }
                        ?>" >
                            <img  src="<?php echo esc_url(blackrider_get_option('inkthemes_slideimage7')); ?>" alt="Slide Image 3"/></a>
                    <?php } ?>	
                </li> 
            <?php } if (blackrider_get_option('inkthemes_slideimage8') != '') { ?>
                <li><?php if (blackrider_get_option('inkthemes_slideimage8') != '') { ?>
                        <a href="<?php
                        if (blackrider_get_option('inkthemes_Sliderlink8') != '') {
                            echo esc_url(blackrider_get_option('inkthemes_Sliderlink8'));
                        }
                        ?>" >
                            <img  src="<?php echo esc_url(blackrider_get_option('inkthemes_slideimage8')); ?>" alt="Slide Image 3"/></a>
                    <?php } ?>	
                </li> 
            <?php } ?>
        </ul>			

        <div class="caption-wrapper">
            <div class="caption">
                <?php infoway_front(); ?>
            </div>     
        </div>

    </div>
</div>    
