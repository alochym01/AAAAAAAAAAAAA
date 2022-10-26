<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */
?>
<!--<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">-->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <?php
        if (is_front_page()) {
            if (blackrider_get_option('inkthemes_keyword') != '') {
                ?>
                <meta name="keywords" content="<?php echo wp_kses_post(blackrider_get_option('inkthemes_keyword')); ?>" />
                <?php
            }
            if (blackrider_get_option('inkthemes_description') != '') {
                ?>
                <meta name="description" content="<?php echo wp_kses_post(blackrider_get_option('inkthemes_description')); ?>" />
                <?php
            }
            if (blackrider_get_option('inkthemes_author') != '') {
                ?>
                <meta name="author" content="<?php echo wp_kses_post(blackrider_get_option('inkthemes_author')); ?>" />
                <?php
            }
        }
        ?>		
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div class="clear"></div>
        <div class="header_container">
            <!--Header Container-->
            <div class="container">
                <div class="row">
                    <div class="header">
                        <div class="col-md-8 col-sm-7">
                            <div class="logo">
                                <a href="<?php echo esc_url(home_url()); ?>"><img src="<?php if (blackrider_get_option('inkthemes_logo') != '') { ?><?php echo wp_kses_post(blackrider_get_option('inkthemes_logo')); ?><?php } else { ?><?php echo get_template_directory_uri(); ?>/assets/images/logo.png<?php } ?>" alt="<?php bloginfo('name'); ?>" /></a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-5">
                            <div class="call-us">
                                <?php if (blackrider_get_option('inkthemes_topright') != '') { ?>
                                    <p> <?php echo stripslashes(blackrider_get_option('inkthemes_topright')); ?></p>
                                    <a class="btn" href="tel:<?php echo stripslashes(blackrider_get_option('inkthemes_contact_number')); ?>">
                                        <?php
                                        if (blackrider_get_option('inkthemes_callbutton_text') != '') {
                                            echo stripslashes(blackrider_get_option('inkthemes_callbutton_text'));
                                        } else {
                                            ?>
                                            <?php _e('Tap To Call', 'black-rider'); ?>
                                        <?php } ?>
                                        <div class="verticleline"></div>
                                        <div class="phoneicon"></div>
                                    </a>
                                <?php } else {
                                    ?>
                                    <p><?php _e('Call US ', 'black-rider'); ?>- 214 - 2547 - 142  </p>
                                    <a class="btn" href="tel:<?php echo stripslashes(blackrider_get_option('inkthemes_contact_number')); ?>">
                                        <?php
                                        if (blackrider_get_option('inkthemes_callbutton_text') != '') {
                                            echo stripslashes(blackrider_get_option('inkthemes_callbutton_text'));
                                        } else {
                                            ?>
                                            <?php _e('Tap To Call', 'black-rider'); ?>
                                        <?php } ?>
                                        <div class="verticleline"></div>
                                        <div class="phoneicon"></div>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>        
                    </div>
                </div>
            </div>
            <!--/Header Container-->
            <div class="clear"></div>
        </div>
        <!--Menu Container-->
        <div class="menu-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="menu-wrapper">
                            <div id="MainNav">
                                <?php blackrider_nav(); ?>                       
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <!--/Menu Container-->