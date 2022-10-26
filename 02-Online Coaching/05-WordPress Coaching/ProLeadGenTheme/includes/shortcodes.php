<?php

/** 2 Columns */
function col2_shortcode($atts, $content = null) {
    return '<div class="one_half">' . do_shortcode($content) . '</div>';
}

add_shortcode('col2', 'col2_shortcode');

/** 2 Columns Last */
function col2_last_shortcode($atts, $content = null) {
    return '<div class="one_half last">' . do_shortcode($content) . '</div>';
}

add_shortcode('col2_last', 'col2_last_shortcode');

/** 3 Columns */
function col3_shortcode($atts, $content = null) {
    return '<div class="one_third">' . do_shortcode($content) . '</div>';
}

add_shortcode('col3', 'col3_shortcode');

/** 3 Columns Last */
function col3_last_shortcode($atts, $content = null) {
    return '<div class="one_third last">' . do_shortcode($content) . '</div>';
}

add_shortcode('col3_last', 'col3_last_shortcode');

/** 4 Columns */
function col4_shortcode($atts, $content = null) {
    return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
}

add_shortcode('col4', 'col4_shortcode');

/** 4 Columns Last */
function col4_last_shortcode($atts, $content = null) {
    return '<div class="one_fourth last">' . do_shortcode($content) . '</div>';
}

add_shortcode('col4_last', 'col4_last_shortcode');

/** Two-Third Columns */
function col2_3_shortcode($atts, $content = null) {
    return '<div class="two_third">' . do_shortcode($content) . '</div>';
}

add_shortcode('col2_3', 'col2_3_shortcode');

/** Two-Third Columns Last */
function col2_3_last_shortcode($atts, $content = null) {
    return '<div class="two_third last">' . do_shortcode($content) . '</div>';
}

add_shortcode('col2_3_last', 'col2_3_last_shortcode');

/** Three-Fourth Columns */
function col3_4_shortcode($atts, $content = null) {
    return '<div class="three_fourth">' . do_shortcode($content) . '</div>';
}

add_shortcode('col3_4', 'col3_4_shortcode');

/** Three-Fourth Columns Last */
function col3_4_last_shortcode($atts, $content = null) {
    return '<div class="three_fourth last">' . do_shortcode($content) . '</div>';
}

add_shortcode('col3_4_last', 'col3_4_last_shortcode');

//Clear div
function clear($atts, $content = null) {
    return '<div class="clear"></div>';
}

add_shortcode('clear', 'clear');

//Buttons
function smallblue_shortcode($atts, $content = null) {
    extract(shortcode_atts(array("url" => ''), $atts));
    return '<a href="' . $url . '" class="button2 blue">' . do_shortcode($content) . '<span></span></a>';
}

add_shortcode('smallblue', 'smallblue_shortcode');

//Small Green Button
function smallgreen_shortcode($atts, $content = null) {
    extract(shortcode_atts(array("url" => ''), $atts));
    return '<a href="' . $url . '" class="button2 green">' . do_shortcode($content) . '<span></span></a>';
}

add_shortcode('smallgreen', 'smallgreen_shortcode');

//Small Pink Button
function smallpink_shortcode($atts, $content = null) {
    extract(shortcode_atts(array("url" => ''), $atts));
    return '<a href="' . $url . '" class="button2 pink">' . do_shortcode($content) . '<span></span></a>';
}

add_shortcode('smallpink', 'smallpink_shortcode');

//Small Brown Button
function smallbrown_shortcode($atts, $content = null) {
    extract(shortcode_atts(array("url" => ''), $atts));
    return '<a href="' . $url . '" class="button2 brown">' . do_shortcode($content) . '<span></span></a>';
}

add_shortcode('smallbrown', 'smallbrown_shortcode');

//Small Yellow Button
function smallyellow_shortcode($atts, $content = null) {
    extract(shortcode_atts(array("url" => ''), $atts));
    return '<a href="' . $url . '" class="button2 yellow">' . do_shortcode($content) . '<span></span></a>';
}

add_shortcode('smallyellow', 'smallyellow_shortcode');

//Button Blue
function btnblue_shortcode($atts, $content = null) {
    extract(shortcode_atts(array("url" => ''), $atts));
    return '<a href="' . $url . '" class="buttons blue">' . do_shortcode($content) . '</a>';
}

add_shortcode('btnblue', 'btnblue_shortcode');

//Button Green
function btngreen_shortcode($atts, $content = null) {
    extract(shortcode_atts(array("url" => ''), $atts));
    return '<a href="' . $url . '" class="buttons green">' . do_shortcode($content) . '</a>';
}

add_shortcode('btngreen', 'btngreen_shortcode');

//Button Pink
function btngray_shortcode($atts, $content = null) {
    extract(shortcode_atts(array("url" => ''), $atts));
    return '<a href="' . $url . '" class="buttons gray">' . do_shortcode($content) . '</a>';
}

add_shortcode('btngray', 'btngray_shortcode');

//Button Brown
function btnred_shortcode($atts, $content = null) {
    extract(shortcode_atts(array("url" => ''), $atts));
    return '<a href="' . $url . '" class="buttons red">' . do_shortcode($content) . '</a>';
}

add_shortcode('btnred', 'btnred_shortcode');

//Button Yellow
function btnyellow_shortcode($atts, $content = null) {
    extract(shortcode_atts(array("url" => ''), $atts));
    return '<a href="' . $url . '" class="buttons yellow">' . do_shortcode($content) . '</a>';
}

add_shortcode('btnyellow', 'btnyellow_shortcode');

/**
 * The Gallery shortcode.
 *
 * This implements the functionality of the Gallery Shortcode for displaying
 * WordPress images on a post.
 *
 * @since 2.5.0
 *
 * @param array $attr Attributes of the shortcode.
 * @return string HTML content to display gallery.
 */
remove_shortcode('gallery');
add_shortcode('gallery', 'blackrider_gallery_shortcode');

function blackrider_gallery_shortcode($attr) {
    $post = get_post();
    static $instance = 0;
    $instance++;
    if (!empty($attr['ids'])) {
        // 'ids' is explicitly ordered, unless you specify otherwise.
        if (empty($attr['orderby']))
            $attr['orderby'] = 'post__in';
        $attr['include'] = $attr['ids'];
    }
    // Allow plugins/themes to override the default gallery template.
    $output = apply_filters('post_gallery', '', $attr);
    if ($output != '')
        return $output;
    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }
    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 3,
        'size' => 'thumbnail',
        'include' => '',
        'exclude' => ''
                    ), $attr));
    $id = intval($id);
    if ('RAND' == $order)
        $orderby = 'none';
    if (!empty($include)) {
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif (!empty($exclude)) {
        $attachments = get_children(array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
    } else {
        $attachments = get_children(array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
    }
    if (empty($attachments))
        return '';
    if (is_feed()) {
        $output = "\n";
        foreach ($attachments as $att_id => $attachment)
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }
    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100 / $columns) : 100;
    $float = is_rtl() ? 'right' : 'left';
    $selector = "gallery-{$instance}";
    ?> 
    <script>
        //Gallery
        //Prety Photo	  
        jQuery.noConflict();
        jQuery(document).ready(function () {
            jQuery(".<?php echo $selector ?> a[rel^='prettyPhoto']").prettyPhoto({animation_speed: 'normal', theme: 'light_square', slideshow: 8000, autoplay_slideshow: true});
        });
    </script>
    <?php
    $gallery_style = $gallery_div = '';
    if (apply_filters('use_default_gallery_style', true))
        $gallery_style = "
		
		<!-- see gallery_shortcode() in wp-includes/media.php -->";
    $size_class = sanitize_html_class($size);
    $gallery_div = "<div id='$selector' class='$selector gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
    $gallery_ul = "<ul class='thumbnail col-{$columns}'>";
    $output = apply_filters('gallery_style', $gallery_style . "\n\t\t" . $gallery_div . $gallery_ul);
    $i = 0;
    foreach ($attachments as $gallery_image) {
        $attachment_img = wp_get_attachment_url($gallery_image->ID);
        $img_source = blackrider_image_resize($attachment_img, 350, 250);
        if (is_single()) {
            $img_source = blackrider_image_resize($attachment_img, 500, 300);
        }

        $class_name = '';
        $i++;
        switch ($columns) {
            case 1:
                $class_name = "col-md-12 col-sm-12 col-xs-12";
                break;
            case 2:
                $class_name = "col-md-6 col-sm-12 col-xs-12";
                break;
            case 3:
                $class_name = "col-md-4 col-sm-6 col-xs-12";
                break;
            case 4:
                $class_name = "col-md-3 col-sm-6 col-xs-12";
                break;
            case 5:
                if (($i % 5) == 1) {
                    $offset = "col-md-offset-1";
                } else {
                    $offset = "";
                }
                $class_name = "col-md-2 $offset col-sm-4 col-xs-12";
                break;
            case 6:
                $class_name = "col-md-2 col-sm-4 col-xs-12";
                break;
            default:
                $class_name = "col-md-2 col-sm-4 col-xs-12";
                break;
        }
        $output .= "<div class='$class_name animated displaywell'>";
        $output .= '<a rel="prettyPhoto[gallery2]" alt="' . $gallery_image->post_excerpt . '" href="' . $attachment_img . '">';
        $output .= '<span>';
        $output .= '</span>';
        $output .= '<img src="' . $img_source['url'] . '" alt=""/>';
        $output .= '</a>';
        $output .= '<a class="gall-content"  href="' . '?attachment_id=' . $gallery_image->ID . '">';
        $output .= $gallery_image->post_excerpt;
        $output .= '</a>';
        $output .= "</div>";
    }
    $output .= "
	<br style='clear: both;' />			
	</ul>\n
	</div>";
    return $output;
}
?>
