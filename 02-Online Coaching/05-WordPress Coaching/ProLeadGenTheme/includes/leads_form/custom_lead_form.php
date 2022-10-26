<?php

// Add scripts and stylesheet
function custom_styles() {
    global $themename, $themeslug, $options;
    wp_register_style($themeslug . 'storecss', get_template_directory_uri() . '/includes/css/lead-page-style.css');
    wp_enqueue_style($themeslug . 'storecss');
}

// Add page to the menu
function custom_add_menu() {
    $page = add_theme_page('InkThemes Themes Page', 'Custom Leads Form', 'administrator', 'leads', 'custom_page_init');
    add_action('admin_print_styles-' . $page, 'custom_styles');
}

add_action('admin_menu', 'custom_add_menu');

// Create the page
function custom_page_init() {
    $root = get_template_directory_uri();
    $adurl = admin_url('themes.php?page=leads', 'http');
    global $custom_table, $wpdb, $table_info;
    // $inkfeatch = mysql_query("SELECT * FROM inkthemes_info");
    // $sqlform = mysql_query("SELECT * FROM $custom_table");
//delete column
    $countdelete = 1;
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $wpdb->query($wpdb->prepare("DELETE FROM $custom_table WHERE ID = %d", $id));
    }
    if (isset($_GET['add-lead'])) {
        global $wpdb, $custom_table, $field_table;
        $addlead = $_GET['add-lead'];
        $spid = $wpdb->get_row("SELECT * FROM $field_table WHERE PID=$addlead", ARRAY_N);
        $field_id = $spid[2] . '_' . $spid[1];
        $query = $wpdb->insert($field_table, array(
            'ID' => $spid[1],
            'field_name' => $spid[2],
            'text_name' => 'new Field',
            'field_id' => $field_id,
        ));
    }
    if (isset($_GET['delete-lead'])) {
        $pid = $_GET['delete-lead'];
        global $wpdb, $custom_table, $field_table;
        $spid = $wpdb->get_row("SELECT * FROM $field_table WHERE PID=$pid", ARRAY_N);
        $dpid = $wpdb->get_row("SELECT * FROM $field_table WHERE ID=$spid[1]", ARRAY_N);
        $id_count = $wpdb->get_var("SELECT COUNT(*) FROM $field_table WHERE ID=$spid[1]");
        $wpdb->query($wpdb->prepare("DELETE FROM $field_table WHERE PID = %d", $pid));
        if ($id_count == 1) {
            $wpdb->query($wpdb->prepare("DELETE FROM $custom_table WHERE ID = %d", $spid[1]));
        }
    }
// insert data in databse
    if (isset($_POST['add'])) {
//$user_count = $wpdb->get_var( "SELECT MAX(ID) FROM $custom_table");
//$label='text_'.$user_count;
        $myselect = $_POST['myselect'];
        $label = $_POST['textlabel'];
        $cname = $_POST['cname'];
        $customrand = $_POST['randvalue'];
        global $wpdb, $table_prefix;
        $radiochk = $wpdb->get_row("SELECT * FROM $custom_table WHERE text_name='$myselect'");
        if (($myselect == 'Choose Fields') || empty($cname)) {
//featch randam value
            echo "<div style='color:red; margin-top:10px; margin-left:150px;'>Enter Field Name / Select Field Type </div>";
        } else {
            $ld_radio = $table_prefix . "radio_table";
            $field_radio = $table_prefix . "field_table";
            $sql = "SELECT * FROM $custom_table WHERE  randvalue =$customrand";
            $sql2 = "SELECT * FROM $ld_radio WHERE  randvalue =$customrand";
            $value = $wpdb->get_row($sql);
            $value2 = $wpdb->get_row($sql2);
            if (!$value) {
                $query = $wpdb->insert($custom_table, array(
                    'text_name' => $myselect,
                    'text_value' => $cname,
                    'text_label' => $label,
                    'randvalue' => $customrand
                ));
                if (($myselect == 'radio') || ($myselect == 'checkbox') || ($myselect == 'select')) {
                    $last_id1 = $wpdb->get_var("SELECT MAX(ID) FROM $custom_table");
                    $query = $wpdb->insert($ld_radio, array(
                        'ID' => $last_id1,
                        'text_value' => $cname,
                        'randvalue' => $customrand
                    ));
                    $last_id = $wpdb->get_var("SELECT MAX(ID) FROM $ld_radio");
                    $field_id = $myselect . '_' . $last_id;
                    $query = $wpdb->insert($field_radio, array(
                        'ID' => $last_id,
                        'field_name' => $myselect,
                        'text_name' => 'First Name',
                        'field_id' => $field_id,
                        'randvalue' => $customrand
                    ));
                    $query = $wpdb->insert($field_radio, array(
                        'ID' => $last_id,
                        'field_name' => $myselect,
                        'text_name' => 'second Name',
                        'field_id' => $field_id,
                        'randvalue' => $customrand
                    ));
                } //end radio and checkbox if
            } //end randm value if
        } // end select else
        $newclass = new LeadCapture;
        $newclass->table_update($label, $cname);
    } // end add if
    $count = $wpdb->get_var("SELECT COUNT(*) FROM $custom_table");
    ?>
    <div class="custom-header">
        <h1>Custom Lead Capture Form</h1>
        <?php if ($count <= 9) { ?>
            <form action="<?php echo $adurl; ?>" method="post" >
                <table class="wp-list-table widefat fixed pages" style=" width:900px; ">
                    <thead>
                        <tr>
                            <th  scope="col"> <label>Enter Field Name:</label> </th>
                            <th  scope="col"> <input type="text" name="cname" id="cname" /></th>
                            <th  scope="col"><label>Select Field Type:</label></th>
                            <th  scope="col"><select id="myselect" name="myselect">
                                    <option value="Choose Fields">Choose Fields</option>
                                    <option value="text">text</option>
                                    <option value="textarea">textarea</option>
                                    <option value="checkbox">checkbox</option>
                                    <option value="radio">radio</option>
                                    <option value="select">dropdown</option>
                                </select></th>
                            <th  scope="col">
                                <select style="display:none;" id="textlabel" name="textlabel" >
                                    <?php
                                    $a = new LeadCapture();
                                    if (!$a->check('Name')) {
                                        ?> <option value="Name">Name</option> <?php
                                    }
                                    if (!$a->check('Email')) {
                                        ?> <option value="Email">Email</option> <?php
                                    }
                                    if (!$a->check('Number')) {
                                        ?> <option value="Number">Number</option> <?php
                                    }
                                    if (!$a->check('Message')) {
                                        ?> <option value="Message">Message</option> <?php
                                    }
                                    if (!$a->check('label1')) {
                                        ?> <option value="label1">Label1</option> <?php
                                    }
                                    if (!$a->check('label2')) {
                                        ?> <option value="label2">Label2</option> <?php
                                    }
                                    if (!$a->check('label3')) {
                                        ?> <option value="label3">Label3</option> <?php
                                    }
                                    if (!$a->check('label4')) {
                                        ?> <option value="label4">Label4</option> <?php
                                    }
                                    if (!$a->check('label5')) {
                                        ?> <option value="label5">Label5</option> <?php
                                    }
                                    if (!$a->check('label6')) {
                                        ?> <option value="label6">Label6</option> <?php } ?>
                                </select></th>
                            <th  scope="col"><input type="submit" name="add" id="add" value="Add Field" /></th>
                    <input type="hidden" name="randvalue" id="randvalue" value="<?php echo rand(); ?>" />
                    <thead>
                        <tr>
                </table>
            </form>
        </div>
    <?php } global $custom_table, $wpdb; ?>
    <div style=" width:920px; height:630px;
         overflow:auto;" >
        <table class="wp-list-table widefat fixed pages" style="width:900px;">
            <?php
            $query = "SELECT * FROM $custom_table ";
            $results = $wpdb->get_results($query);
            if ($results) {
                ?>
                <thead>
                    <tr>
                        <th class="field" scope="col">Field</th>
                        <th  class="rckbox" scope="col">Checkbox/Radio Description</th>
                        <th  class="fieldname" scope="col">Field Name</th>
                        <th  class="field_type" scope="col">Field Type</th>
                        <th  class="field_edit" scope="col">Field Edit</th>
                        <th  class="action" scope="col">Action</th>
                    </tr>
                </thead>
                <?php
// text/text area update
                if (isset($_POST['update'])) {
                    global $wpdb, $custom_table;
                    $rname = $_POST['rname'];
                    $tname = $_POST['tname'];
                    $uname = $_POST['uname'];
                    $ulabel = $_POST['ulabel'];
                    $wpdb->update($custom_table, array('text_name' => $tname, 'text_value' => $rname), array('ID' => $uname), array('%s', '%s'), array('%d'));
                    $newclass = new LeadCapture;
                    $newclass->table_update($ulabel, $rname);
                }
// checkbox/radio update
                if (isset($_POST['update-lead'])) {
                    global $wpdb, $custom_table, $field_table;
                    $cbname = $_POST['cbname'];
                    $crname = $_POST['crname'];
                    $pidname = $_POST['pidname'];
                    $idname = $_POST['idname'];
                    $ulabel = $_POST['ulabel'];
                    $wpdb->update($field_table, array('text_name' => $crname), array('PID' => $pidname), array('%s'), array('%d'));
                    $wpdb->update($custom_table, array('text_value' => $cbname), array('ID' => $idname), array('%s'), array('%d'));
                    $newclass = new LeadCapture;
                    $newclass->table_update($ulabel, $cbname);
                }
                global $table_prefix;
                $field_radio = $table_prefix . "field_table";
                $sqlfeatch = $wpdb->get_results("SELECT * FROM $custom_table ORDER BY ID ASC", ARRAY_A);
                //$nr = mysql_num_rows($sqlfeatch);
                $count = 1;
                foreach ($sqlfeatch as $row) {
                    $number = 1;
                    $number1 = 1;
                    $id = $row["ID"];
                    $inputname = $row["text_name"];
                    $textname = $row["text_value"];
                    if (($inputname == 'radio') || ($inputname == 'checkbox') || ($inputname == 'select')) { //Only radio and checkbox allow
                        $sqlfeatch2 = $wpdb->get_results("SELECT * FROM $field_radio", ARRAY_A);
                        foreach ($sqlfeatch2 as $row2) {
                            $rtext = $row2["text_name"];
                            $fname = $row2["field_name"];
                            $id2 = $row2["ID"];
                            if ($id == $id2) { //Compare to custom_table ID and field_radio ID
                                $PID = $row2["PID"];
                                ?>
                                <tbody id="trans_list">
                                    <tr class="<?php echo $fname; ?>">
                                        <?php
                                        if ($number1 == 1) {
                                            $number1++;
                                            ?>
                                            <th  class="field" scope="col"><?php echo $count++; ?></th> <?php } else {
                                            ?> <th  class="field" scope="col"></th>
                                        <?php } ?>
                                        <?php
                                        $update = isset($_GET['edit2']) ? $_GET['edit2'] : '';
                                        if (($update == $PID)) {
                                            $number2 = 1;
                                            $pidedit = $_GET['edit2'];
                                            global $wpdb, $custom_table;
                                            $rcid = $wpdb->get_row("SELECT * FROM $field_radio WHERE PID = $pidedit", ARRAY_N);
                                            $rid = $wpdb->get_row("SELECT * FROM $custom_table WHERE ID = $rcid[1]", ARRAY_N);
                                            ?>
                                    <form action="<?php echo get_permalink() . "?page=leads&update-lead=" . $PID; ?>" method="post">
                                        <th  scope="col"> <input type="text" name="cbname" id="cbname" value="<?php echo $rid[2]; ?>" /></th> 
                                        <th  scope="col"> <input type="text" name="crname" id="crname" value="<?php echo $rcid[3]; ?>" />
                                        <th  scope="col" style="display:none;"> <input type="hidden" name="pidname" id="pidname" value="<?php echo $pidedit; ?>" /></th>
                                        <th  scope="col" style="display:none;"> <input type="hidden" name="idname" id="idname" value="<?php echo $rcid[1]; ?>" />
                                        <th  scope="col" style="display:none;"> <input type="text" name="uname" id="uname" value="<?php echo $rid[0]; ?>" />
                                        <th  scope="col" style="display:none;"> <input type="text" name="ulabel" id="ulabel" value="<?php echo $rid[3]; ?>" />
                                        </th>
                                        <th  scope="col"></th> 
                                        <th  scope="col"><input type="submit" name="update-lead" id="update-lead" value="" />
                                        <th  scope="col"><a href="<?php echo get_permalink() . "?page=leads&delete-lead=" . $PID; ?>"><img src="<?php echo $root; ?>/includes/images/ico-close.png" alt="Delete" height="16" width="16" /></a></th>
                                    </form>
                                    <?php
                                } else {
                                    if (($inputname == 'radio') || ($inputname == 'checkbox') || ($inputname == 'select')) {
                                        if ($number == 1) {
                                            $number++;
                                            ?>
                                            <th  scope="col"><?php echo $textname; ?></th> 
                                        <?php } else { ?>
                                            <th  scope="col"></th> 
                                        <?php } ?>
                                        <th  scope="col"><?php echo $rtext; ?></th> 
                                        <th  scope="col"><?php echo $fname; ?></th>
                                        <th  scope="col"><a id="edit" href="<?php echo get_permalink() . "?page=leads&edit2=" . $PID; ?>"><img src="<?php echo $root; ?>/includes/images/icon-edit.png" alt="edit" height="16" width="16" /></a>
                                            <a href="<?php echo get_permalink() . "?page=leads&add-lead=" . $PID; ?>"><img src="<?php echo $root; ?>/includes/images/icon-add.png" alt="Delete" height="16" width="16" /></a>
                                        </th>
                                        <th  scope="col"><a href="<?php echo get_permalink() . "?page=leads&delete-lead=" . $PID; ?>"><img src="<?php echo $root; ?>/includes/images/ico-close.png" alt="Delete" height="16" width="16" /></a></th>
                                    <?php } ?>
                                <?php } ?>
                                </tr>
                                <?php
                            } // end id if loop
                        } //end radio while loop
                    } //end radio if loop 
                    if (($inputname != 'radio') && ($inputname != 'checkbox') && ($inputname != 'select')) {
                        ?>
                        <tbody id="trans_list">
                            <tr  class="<?php echo $inputname; ?>">
                                <th  class="field" scope="col"><?php echo $count++; ?></th>
                                <?php
                                $update = isset($_GET['edit']) ? $_GET['edit'] : '';
                                if (($update == $id)) {
                                    $editid = $_GET['edit'];
                                    global $wpdb, $custom_table;
                                    $rid = $wpdb->get_row("SELECT * FROM $custom_table WHERE ID = $editid", ARRAY_N);
                                    ?>
                            <form action="<?php echo get_permalink() . "?page=leads&update=" . $id; ?>" method="post">
                                <th  scope="col"></th> 
                                <th  scope="col"> <input type="text" name="rname" id="rname" value="<?php echo $rid[2]; ?>" /></th>
                                <th  scope="col"> <input type="text" name="tname" id="tname" value="<?php echo $rid[1]; ?>" />
                                <th  scope="col" style="display:none;"> <input type="text" name="uname" id="uname" value="<?php echo $rid[0]; ?>" />
                                <th  scope="col" style="display:none;"> <input type="text" name="ulabel" id="ulabel" value="<?php echo $rid[3]; ?>" />
                                </th>
                                <th  scope="col"><input type="submit" name="update" id="update" value="" />
                                <th  scope="col"><a href="<?php echo get_permalink() . "?page=leads&delete=" . $id; ?>"><img src="<?php echo $root; ?>/includes/images/ico-close.png" alt="Delete" height="16" width="16" /></a></th>
                            </form>
                            <?php
                        } else {
                            if (($inputname != 'radio') && ($inputname != 'checkbox') && ($inputname != 'select')) {
                                ?>
                                <th  scope="col"></th> 
                                <th  scope="col"><?php echo $textname; ?></th> 
                                <th  scope="col"><?php echo $inputname; ?></th>
                                <th  scope="col"><a id="edit" href="<?php echo get_permalink() . "?page=leads&edit=" . $id; ?>"><img src="<?php echo $root; ?>/includes/images/icon-edit.png" alt="edit" height="16" width="16" /></a></th>
                                <th  scope="col"><a href="<?php echo get_permalink() . "?page=leads&delete=" . $id; ?>"><img src="<?php echo $root; ?>/includes/images/ico-close.png" alt="Delete" height="16" width="16" /></a></th>
                                <?php
                            }
                        }
                        ?>
                        </tr>
                        <?php
                    }
                } // end Main while loop
            } // end if code
            else {
                ?>
                <tbody id="trans_list">	
                    <tr>
                        <th colspan="7"><?php echo "No fields"; ?></th>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php } ?>
