<?php

/**
 * PHP file call
 */
define('LEADS_PATH', BLACKRIDER_DIR . 'includes/leads_form/');
define('CSS_PATH', BLACKRIDER_DIR . 'includes/css/');
$file_name = array('database_lead_table', 'custom_lead_form', 'leads_class', 'themes-page');
foreach ($file_name as $files) {
    if (file_exists(LEADS_PATH . $files . '.php')) {
        require_once(LEADS_PATH . $files . '.php');
    }
}
if (file_exists(BLACKRIDER_DIR . 'includes/blackrider-front.php')) {
    require_once(BLACKRIDER_DIR . 'includes/blackrider-front.php');
}

