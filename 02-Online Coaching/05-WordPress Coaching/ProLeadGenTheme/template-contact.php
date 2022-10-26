<?php
/*
  Template Name: Contact Page
 */
get_header();
if (isset($_POST['submitted'])) {
    $form_data = $_POST;
    $emailSent = blackrider_validate_form($form_data);
}

function blackrider_validate_form($form_data) {
    $nameError = '';
    $emailError = '';
    $commentError = '';
    $capfail = false;
    $emailSent = false;
    if ((isset($_POST['vercode'])) != isset($_POST['captcha'])) {
        $capfail = true;
    }
    if ($capfail == false) {

        if (trim($_POST['contactName']) === '') {
            $nameError = 'Please enter your name.';
            $hasError = true;
        } else {
            $name = trim($_POST['contactName']);
        }
        if (trim($_POST['email']) === '') {
            $emailError = __('Please enter your email address.', 'black-rider');
            $hasError = true;
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $emailError = __('You entered an invalid email address.', 'black-rider');
            $hasError = true;
        } else {
            $email = trim($_POST['email']);
        }
        if (trim($_POST['comments']) === '') {
            $commentError = 'Please enter a message.';
            $hasError = true;
        } else {
            if (function_exists('stripslashes')) {
                $comments = stripslashes(trim($_POST['comments']));
            } else {
                $comments = trim($_POST['comments']);
            }
        }
        if (!isset($hasError)) {
            $emailTo = get_option('tz_email');
            if (!isset($emailTo) || ($emailTo == '')) {
                $emailTo = get_option('admin_email');
            }
            $subject = '[PHP Snippets] From ' . $name;
            $body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
            $headers = 'From: ' . $name . ' <' . $emailTo . '>' . "\r\n" . 'Reply-To: ' . $email;
            wp_mail($emailTo, $subject, $body, $headers);
            return true;
        }
    }
}

$text = rand(0, 9);
$text1 = rand(0, 9);
?>
<div class="page_heading_container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page_heading_content">
                    <span class="bred-tip"></span>
                    <?php blackrider_breadcrumbs(); ?>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="page-content-container">
    <div class="container">
        <div class="row">
            <div class="page-content">
                <div class="col-md-8 col-sm-8">
                    <div class="content-bar">
                        <div class="contact-page"> 
                            <?php if ($emailSent) { ?>
                                <div class="thanks">
                                    <p><?php _e('Thanks, your email was sent successfully', 'black-rider'); ?></p>
                                </div>
                                <?php
                            } else {
                                if (isset($hasError) || isset($captchaError)) {
                                    ?>
                                    <p class="error"><?php _e('Sorry, an error occured.', 'black-rider'); ?> </p>
                                <?php } ?>
                                <form method="post" class="form-horizontal">
                                    <div class="form-group">   
                                        <label for="inputname" class="col-sm-2 control-label"> <?php _e('Name*', 'black-rider');
                                ?></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="contactName" 
                                                   id="inputname" required placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"><?php _e('Email*', 'black-rider');
                                ?></label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail3" name="email" 
                                                   placeholder="Email">
                                        </div>
                                    </div>                               
                                    <div class="form-group">
                                        <label for="inputtextarea" class="col-sm-2 control-label"><?php
                                            _e
                                                    ('Message*', 'black-rider');
                                            ?></label>
                                        <div class="col-sm-10">
                                            <textarea rows="5" class="form-control" id="inputtextarea" 
                                                      name="comments" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputtextarea" class="col-sm-2 control-label"><?php
                                            _e
                                                    ('Captcha*', 'black-rider');
                                            ?></label>
                                        <div class="col-md-1">
                                            <span class="btn btn-default captcha_img"><?php
                                                echo $text . '+' .
                                                $text1 . ' = ';
                                                ?></span>
                                            <input type="hidden" name="captcha" value="<?php
                                            echo absint($text +
                                                    $text1);
                                            ?>" />
                                        </div>
                                        <div class="col-md-4">
                                            <input class="form-control" type="text"  name="vercode" id="vercode" 
                                                   value="<?php if (isset($_POST['vercode'])) echo $_POST['vercode']; ?>" placeholder="<?php _e('Captcha Field', 'black-
rider'); ?>" required/>
                                                   <?php
                                                   if (isset($_POST['vercode']) != isset($_POST['captcha']))
                                                       echo "<div class='captcha_color'> <p> " . _e('Enter valid captcha!', 'black-rider') . "</p></div>";
                                                   $capfail = true;
                                                   ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" name="submitted" class="btn btn-danger"><?php
                                                _e
                                                        ('Submit Message', 'black-rider');
                                                ?></button>
                                        </div>
                                    </div>
                                </form>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <!--Start Sidebar-->
                    <?php get_sidebar(); ?>
                    <!--End Sidebar-->
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php
get_footer();
