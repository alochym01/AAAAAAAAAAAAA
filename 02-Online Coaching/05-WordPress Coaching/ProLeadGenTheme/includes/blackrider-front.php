<?php
/**
  @ Black Rider front page function
  @ infoway_front()
 * */
ob_start();

function infoway_front() {
    ?>
    <script>
        function blackrider_validateForm() {
            var x = document.forms["signupform"]["Email"].value;
            var atpos = x.indexOf("@");
            var dotpos = x.lastIndexOf(".");
            if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
                jQuery(".bl_error").html("Not a valid e-mail address");
                return false;
            }
        }
    </script>
    <?php
    $capfail = false;
    $a = new LeadCapture();
    $captcha_option = blackrider_get_option('capt_en');
    $captcha_option_on = "on";
    if ($captcha_option === $captcha_option_on) {
        if (isset($_POST['vercode']) && $_POST['vercode'] != $_POST['captcha']) {
            $capfail = true;
        }
    }
    if (blackrider_get_option('inkthemes_email_sending') != '') {
        $multiemail = blackrider_get_option('inkthemes_email_sending');
    } else {
        $multiemail = get_option('admin_email');
    }
    if ((isset($_POST['submit'])) && $capfail == false) {
        global $custom_table, $wpdb;
        //label1
        if (isset($_POST['Name']) && is_array($_POST['Name'])) {
            $lab2 = $_POST['Name'];
            $chk1 = implode(",", $lab2);
            $lead_form5 = $a->set_lead_name($chk1);
        } elseif (isset($_POST['Name'])) {
            $name = $a->set_lead_name($_POST['Name']);
        } else {
            $name = $a->set_lead_name('');
        }
        //label2
        if (isset($_POST['Email']) && is_array($_POST['Email'])) {
            $lab2 = $_POST['Email'];
            $chk1 = implode(",", $lab2);
            $lead_form5 = $a->set_form1($chk1);
        } elseif (isset($_POST['Email'])) {
            $lead_form1 = $a->set_form1($_POST['Email']);
        } else {
            $lead_form1 = $a->set_form1('');
        }
        //label3 
        if (isset($_POST['Number']) && is_array($_POST['Number'])) {
            $lab2 = $_POST['Number'];
            $chk1 = implode(",", $lab2);
            $lead_form5 = $a->set_form2($chk1);
        } elseif (isset($_POST['Number'])) {
            $lead_form2 = $a->set_form2($_POST['Number']);
        } else {
            $lead_form2 = $a->set_form2('');
        }
        //label4
        if (isset($_POST['Message']) && is_array($_POST['Message'])) {
            $lab2 = $_POST['Message'];
            $chk1 = implode(",", $lab2);
            $lead_form5 = $a->set_form3($chk1);
        } elseif (isset($_POST['Message'])) {
            $lead_form3 = $a->set_form3($_POST['Message']);
        } else {
            $lead_form3 = $a->set_form3('');
        }
        //label5
        if (isset($_POST['label1']) && is_array($_POST['label1'])) {
            $lab2 = $_POST['label1'];
            $chk1 = implode(",", $lab2);
            $lead_form5 = $a->set_form4($chk1);
        } elseif (isset($_POST['label1'])) {
            $lead_form4 = $a->set_form4($_POST['label1']);
        } else {
            $lead_form4 = $a->set_form4('');
        }
        //label6
        if (isset($_POST['label2']) && is_array($_POST['label2'])) {
            $lab2 = $_POST['label2'];
            $chk1 = implode(",", $lab2);
            $lead_form5 = $a->set_form5($chk1);
        } elseif (isset($_POST['label2'])) {
            $lead_form5 = $a->set_form5($_POST['label2']);
        } else {
            $lead_form5 = $a->set_form5('');
        }
        //label7
        if (isset($_POST['label3']) && is_array($_POST['label3'])) {
            $lab2 = $_POST['label3'];
            $chk1 = implode(",", $lab2);
            $lead_form5 = $a->set_form6($chk1);
        } elseif (isset($_POST['label3'])) {
            $lead_form6 = $a->set_form6($_POST['label3']);
        } else {
            $lead_form6 = $a->set_form6('');
        }
        //label8
        if (isset($_POST['label4']) && is_array($_POST['label4'])) {
            $lab2 = $_POST['label4'];
            $chk1 = implode(",", $lab2);
            $lead_form5 = $a->set_form7($chk1);
        } elseif (isset($_POST['label4'])) {
            $lead_form7 = $a->set_form7($_POST['label4']);
        } else {
            $lead_form7 = $a->set_form7('');
        }
        //label9
        if (isset($_POST['label5']) && is_array($_POST['label5'])) {
            $lab2 = $_POST['label5'];
            $chk1 = implode(",", $lab2);
            $lead_form5 = $a->set_form8($chk1);
        } elseif (isset($_POST['label5'])) {
            $lead_form8 = $a->set_form8($_POST['label5']);
        } else {
            $lead_form8 = $a->set_form8('');
        }
        //label10
        if (isset($_POST['label6']) && is_array($_POST['label6'])) {
            $lab2 = $_POST['label6'];
            $chk1 = implode(",", $lab2);
            $lead_form5 = $a->set_form9($chk1);
        } elseif (isset($_POST['label6'])) {
            $lead_form9 = $a->set_form9($_POST['label6']);
        } else {
            $lead_form9 = $a->set_form9('');
        }
        //label11
        if (isset($_POST['label7']) && is_array($_POST['label7'])) {
            $lab2 = $_POST['label7'];
            $chk1 = implode(",", $lab2);
            $lead_form5 = $a->set_form10($chk1);
        } elseif (isset($_POST['label7'])) {
            $lead_form9 = $a->set_form10($_POST['label7']);
        } else {
            $lead_form9 = $a->set_form10('');
        }
        //randvalue
        $rand = $a->set_randvalue($_POST['randvalue']);
        $multiemail = $a->set_multiemail($multiemail);
        if (isset($_POST['submit'])) {
            global $wpdb;
            $a->email_send();
            $a->savetodb();
        }
    }
    ?> 
    <?php if ((!isset($_POST['submit'])) || (isset($_POST['vercode']) && $_POST['vercode'] != $_POST['captcha'])) { ?>
        <div class="signupform-header">

            <?php if (blackrider_get_option('inkthemes_leadhead') != '') { ?>
                <h4 class="heading"><?php echo stripslashes(blackrider_get_option('inkthemes_leadhead')); ?></h4>
            <?php } else { ?>
                <h4 class="heading"><?php _e('Colorway Lite is also available for Download at WordPress.org', 'black-rider'); ?></h4>
            <?php } ?> 
            <span class="form-tip"></span> 
        </div>
        <div id="content_1" class="signupform signinformbox_wrapper">
            <form name="signupform" onsubmit="return blackrider_validateForm();"  action="<?php get_template_directory(); ?>" id="signinForm" class="leads_form" method="post" autocomplete="on">
                <?php
                global $custom_table, $wpdb;
                $sqlfeatch = $wpdb->get_results("SELECT * FROM $custom_table ORDER BY ID ASC", ARRAY_A);
                foreach ($sqlfeatch as $row) {
                    $id = $row["ID"];
                    $texttype = $row["text_name"];
                    $textname = $row["text_value"];
                    $textid = $row["text_label"];
                    if ($texttype == 'text') {
                        if ($textname == 'Email') {
                            echo '<div class="bl_error"> </div>';
                            ?>

                            <input type="email" name="<?php echo $textid; ?>" id="uname" <?php
                            $br = new LeadCapture();
                            $browser = $br->user_browser();

                            if ($browser == "ie") {
                                ?> onfocus="if (this.value == '<?php echo $textname; ?>') {
                                                                    this.value = '';
                                                                }" onblur="if (this.value == '') {
                                                                            this.value = '<?php echo $textname; ?>';
                                                                        }" value="<?php echo $textname; ?>"  <?php } ?>  placeholder="<?php echo $textname; ?>" class="required requiredField email" required  />

                        <?php } else { ?>				
                            <input type="<?php echo $texttype; ?>" name="<?php echo $textid; ?>" id="uname" <?php
                            $br = new LeadCapture();
                            $browser = $br->user_browser();
                            if ($browser == "ie") {
                                ?> onfocus="if (this.value == '<?php echo $textname; ?>') {
                                                                    this.value = '';
                                                                }" onblur="if (this.value == '') {
                                                                            this.value = '<?php echo $textname; ?>';
                                                                        }" value="<?php echo $textname; ?>"  <?php } ?>  placeholder="<?php echo $textname; ?>" class="required requiredField" required  />
                                   <?php
                               }
                           }

                           if ($texttype == 'textarea') {
                               ?>
                        <textarea name="<?php echo $textid; ?>" id="comments" rows="5" cols="30" <?php
                        $br = new LeadCapture();
                        $browser = $br->user_browser();
                        if ($browser == "ie") {
                            ?> onfocus="if (this.value == '<?php echo $textname; ?>') {
                                                            this.value = '';
                                                        }" onblur="if (this.value == '') {
                                                                    this.value = '<?php echo $textname; ?>';
                                                                }" value="<?php echo $textname; ?>"  <?php } ?>  placeholder="<?php echo $textname; ?>" class="required requiredField" required ><?php
                                  if ($browser == "ie") {
                                      echo $textname;
                                  }
                                  ?></textarea>
                        <br/>
                        <?php
                    }
                    if ($texttype == 'checkbox') {
                        echo "<div class='checkpanel'>";
                        ?>
                        <label class="cname"><?php echo $textname . '</br>'; ?></label><?php
                        global $wpdb, $field_table, $radio_table;
                        $sqlfeatch2 = $wpdb->get_results("SELECT * FROM $field_table", ARRAY_A);
                        foreach ($sqlfeatch2 as $row2) {
                            $rtext = $row2["text_name"];
                            $fname = $row2["field_name"];
                            $fnid = $row2["field_id"];
                            $id2 = $row2["ID"];
                            if ($id == $id2) {
                                ?>
                                <div class="checkinput">	<input type="checkbox" id="chkbox" name="<?php echo $textid; ?>[]" value="<?php echo $rtext; ?>"><label class="checkname"><?php echo $rtext; ?></label> </div>
                                <?php
                            }
                        }
                        echo "</div>";
                    }
                    if ($texttype == 'radio') {
                        echo "<div class='radiopanel'>";
                        ?>
                        <label class="rname"> <?php echo $textname . '</br>'; ?> </label> <?php
                        global $wpdb, $field_table, $radio_table;
                        $sqlfeatch2 = $wpdb->get_results("SELECT * FROM $field_table", ARRAY_A);
                        foreach ($sqlfeatch2 as $row2) {
                            $rtext = $row2["text_name"];
                            $fname = $row2["field_name"];
                            $fnid = $row2["field_id"];
                            $id2 = $row2["ID"];
                            if ($id == $id2) {
                                ?>                
                                <input type="radio" required = "required" id="radiobox" name="<?php echo $textid; ?>" value="<?php echo $rtext; ?>"><label class="radioname"><span><span></span></span><?php echo $rtext; ?></label><br/>

                                <?php
                            }
                        }
                        echo "</div>";
                    }
                    if ($texttype == 'select') {
                        echo "<div class='radiopanel'>";
                        ?>
                        <label class="rname"> <?php echo $textname . '</br>'; ?> </label> <?php
                        global $wpdb, $field_table, $radio_table;
                        $sqlfeatch2 = $wpdb->get_results("SELECT * FROM $field_table", ARRAY_A);
                        echo "<select id='select_option' name='" . $textid . "'>";
                        foreach ($sqlfeatch2 as $row2) {
                            $rtext = $row2["text_name"];
                            $fname = $row2["field_name"];
                            $fnid = $row2["field_id"];
                            $id2 = $row2["ID"];
                            if ($id == $id2) {
                                ?>      
                                <option value="<?php echo $rtext; ?>"><?php echo $rtext; ?></option>

                                <?php
                            }
                        }
                        echo "</select></div>";
                    }
                }
                $captcha_option_on = "on";
                if ($captcha_option === $captcha_option_on) {
                    echo "<div class='catchapanel'>";
                    ?>
                    <input type="hidden"  name="captcha" id="captcha" value="<?php
                    $capt = $a->ink_capt1();
                    $capt1 = $a->ink_capt2();
                    echo $addcapt = $capt + $capt1;
                    ?>"/>
                    <span class="captcha_img"><?php echo $capt . '+' . $capt1 . '&nbsp;&nbsp;=&nbsp;&nbsp;'; ?></span><br/>	
                    <input type="text"  name="vercode" id="vercode" value="<?php if (isset($_POST['vercode'])) echo $_POST['vercode']; ?>" placeholder="Captcha Field" class="required requiredField"  required  />
                    <?php
                    if (isset($_POST['vercode']) && $_POST['vercode'] != $_POST['captcha']) {
                        echo "<div class='captcha_color'> <p>Enter valid captcha!</p></div>";
                        $capfail = true;
                    } echo "</div>";
                    ?>                
                <?php } //captcha on/off	  ?>	 
                <input  class="btnsubmit" type="submit" name="submit" value="<?php
                if (blackrider_get_option('inkthemes_leadsubmit_text') != '') {
                    echo stripslashes(blackrider_get_option('inkthemes_leadsubmit_text'));
                } else {
                    _e('Send Your Message', 'black-rider');
                }
                ?>"/>
                <input type="hidden" name="randvalue" id="randvalue" value="<?php echo rand(); ?>" />
            </form>
        </div>
    <?php } ?>
    <?php
}

class Lead_InfoWay_Widget extends WP_Widget {

    function __construct() {
        $params = array(
            'name' => 'LeadsCapture Black Rider Widget',
            'description' => 'Just drag and drop the widget to LeadsCapture Black Rider in the page'
        );
        parent::__construct('Lead_InfoWay_Widget', '', $params);
    }

    public function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', '');
        $number = strip_tags($instance['number']);
        echo $before_widget;
        if ($title)
            echo $before_title . $title . $after_title;
        infoway_front();
        //echo $after_widget;
    }

}

add_action('widgets_init', create_function('', 'return register_widget("Lead_InfoWay_Widget");'));
ob_clean();
?>