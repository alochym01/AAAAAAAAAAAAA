<?php

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function inkoption_framework_option_name() {
    // Change this to use your theme slug
    return 'inkthemes_options';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'theme-textdomain'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */
function inkoption_framework_options() {

    $onoff_switch = array("on" => "On", "off" => "Off");

    //Stylesheet Reader
    $alt_stylesheets = array("orange" => "orange", "green" => "green", "teal-green" => "teal-green", "yellow" => "yellow", "red" => "red", "black" => "black", "pink" => "pink", "blue" => "blue");
    $lan_stylesheets = array("Default" => "Default", "rtl" => "rtl");
    // Pull all the categories into an array
    $options_categories = array();
    $options_categories_obj = get_categories();
    foreach ($options_categories_obj as $category) {
        $options_categories[$category->cat_ID] = $category->cat_name;
    }
    // Pull all the pages into an array
    $options_pages = array();
    $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
    $options_pages[''] = 'Select a page:';
    foreach ($options_pages_obj as $page) {
        $options_pages[$page->ID] = $page->post_title;
    }
    // If using image radio buttons, define a directory path
    $imagepath = get_template_directory_uri() . '/images/';

    $options = array();
    $options[] = array("name" => "General Settings",
        "type" => "heading");

    $options[] = array("name" => "Custom Logo",
        "desc" => "Upload a logo for your Website. The recommended size for the logo is 200px width x 50px height.",
        "id" => "inkthemes_logo",
        "type" => "upload");

    $options[] = array("name" => "Custom Favicon",
        "desc" => "Here you can upload a Favicon for your Website. Specified size is 16px x 16px.",
        "id" => "inkthemes_favicon",
        "type" => "upload");

    //Background Image
    $options[] = array("name" => "Background Image",
        "desc" => "Choose a suitable background image that will complement your website.",
        "id" => "inkthemes_bodybg",
        "type" => "upload");


    $options[] = array("name" => "Mobile Navigation Menu",
        "desc" => "Enter your mobile navigation menu text",
        "id" => "inkthemes_nav",
        "std" => "",
        "type" => "textarea");

    $options[] = array("name" => "Top Right Contact Details",
        "desc" => "Mention the contact details here which will be displayed on the top right corner of Website.",
        "id" => "inkthemes_topright",
        "std" => "",
        "type" => "textarea");

    $options[] = array("name" => "Contact Number For Tap To Call Feature",
        "desc" => "Mention your contact number here through which users can interact to you directly. This feature is called tap to call and this will work when the user will access your website through mobile phones or iPhone.",
        "id" => "inkthemes_contact_number",
        "std" => "",
        "type" => "text");
    
       $options[] = array("name" => "Text Written Over The Calling Button",
        "desc" => "This is the text written over the button by which user can call anyone this button will disply while user accessing your website through mobile phones",
        "id" => "inkthemes_callbutton_text",
        "std" => "",
        "type" => "text");

    $options[] = array("name" => "Tracking Code",
        "desc" => "Paste your Google Analytics (or other) tracking code here.",
        "id" => "inkthemes_analytics",
        "std" => "",
        "type" => "textarea");

    $options[] = array("name" => "Leads Capture Settings",
        "type" => "heading");

    $options[] = array("name" => __("Lead Capture Form Heading", 'black-rider'),
        "desc" => "Mention the heading for the lead capture form that will display on the sidebar.",
        "id" => "inkthemes_leadhead",
        "std" => "",
        "type" => "textarea");

    $options[] = array("name" => "E-mail Address",
        "desc" => "E-mail Address- Mention multiple e-mail ids here to receive mails from lead capture form. Add comma and space to 		separate two email ids. For eg:- example@gmail.com, example1@gmail.com ",
        "id" => "inkthemes_email_sending",
        "std" => "",
        "type" => "textarea");

    $options[] = array("name" => "Lead Capture Form Sumbit Button Text",
        "desc" => "Mention the text for the lead capture form submit button.",
        "id" => "inkthemes_leadsubmit_text",
        "std" => "",
        "type" => "text");

    $options[] = array("name" => "Captcha On/Off",
        "desc" => "By default captcha is activated. Turn it off to deactivate this.",
        "id" => "capt_en",
        "std" => "on",
        "type" => "radio",
        "options" => $onoff_switch);

    //Home Page Slider Setting
    $options[] = array("name" => "Slider Settings",
        "type" => "heading");

    //Slider Speed Setting	
    $options[] = array("name" => "Slider Speed",
        "desc" => "Set the speed of the slider in milliseconds. For e.g. if you want to set the speed of the slider for 8 seconds then enter 8000 in the field or if you want to set the slider speed for 2.5 seconds then enter 2500 in the field.",
        "id" => "inkthemes_slide_speed",
        "std" => "8000",
        "type" => "text");

    //First Slider
    $options[] = array("name" => "First Slider Image",
        "desc" => "The optimal size of the image is 1920 px wide x 654 px height, but it can be varied as per your requirement.",
        "id" => "inkthemes_slideimage1",
        "std" => "",
        "type" => "upload");
    $options[] = array("name" => "Link for First slider",
        "desc" => "Mention the URL for first image.",
        "id" => "inkthemes_Sliderlink1",
        "std" => "",
        "type" => "text");
    //Second Slider
    $options[] = array("name" => "Second Slider Image",
        "desc" => "The optimal size of the image is 1920 px wide x 654 px height, but it can be varied as per your requirement.",
        "id" => "inkthemes_slideimage2",
        "std" => "",
        "type" => "upload");
    $options[] = array("name" => "Link for Second slider",
        "desc" => "Mention the URL for Second image.",
        "id" => "inkthemes_Sliderlink2",
        "std" => "",
        "type" => "text");
    //Third Slider
    $options[] = array("name" => "Third Slider Image",
        "desc" => "The optimal size of the image is 1920 px wide x 654 px height, but it can be varied as per your requirement.",
        "id" => "inkthemes_slideimage3",
        "std" => "",
        "type" => "upload");
    $options[] = array("name" => "Link for Third slider",
        "desc" => "Mention the URL for Third image.",
        "id" => "inkthemes_Sliderlink3",
        "std" => "",
        "type" => "text");

    //Fourth Slider
    $options[] = array("name" => "Fourth Slider Image",
        "desc" => "The optimal size of the image is 1920 px wide x 654 px height, but it can be varied as per your requirement.",
        "id" => "inkthemes_slideimage4",
        "std" => "",
        "type" => "upload");
    $options[] = array("name" => "Link for Fourth slider",
        "desc" => "Mention the URL for Fourth image.",
        "id" => "inkthemes_Sliderlink4",
        "std" => "",
        "type" => "text");

    //Fifth Slider
    $options[] = array("name" => "Fifth Slider Image",
        "desc" => "The optimal size of the image is 1920 px wide x 654 px height, but it can be varied as per your requirement.",
        "id" => "inkthemes_slideimage5",
        "std" => "",
        "type" => "upload");
    $options[] = array("name" => "Link for Fifth slider",
        "desc" => "Mention the URL for Fifth image.",
        "id" => "inkthemes_Sliderlink5",
        "std" => "",
        "type" => "text");

    //Sixth Slider
    $options[] = array("name" => "Sixth Slider Image",
        "desc" => "The optimal size of the image is 1920 px wide x 654 px height, but it can be varied as per your requirement.",
        "id" => "inkthemes_slideimage6",
        "std" => "",
        "type" => "upload");

    $options[] = array("name" => "Link for Sixth slider",
        "desc" => "Mention the URL for Sixth image.",
        "id" => "inkthemes_Sliderlink6",
        "std" => "",
        "type" => "text");

    //Seventh Slider
    $options[] = array("name" => "Seventh Slider Image",
        "desc" => "The optimal size of the image is 1920 px wide x 654 px height, but it can be varied as per your requirement.",
        "id" => "inkthemes_slideimage7",
        "std" => "",
        "type" => "upload");

    $options[] = array("name" => "Link for Seventh slider",
        "desc" => "Mention the URL for Seventh image.",
        "id" => "inkthemes_Sliderlink7",
        "std" => "",
        "type" => "text");

    //Eighth Slider
    $options[] = array("name" => "Eighth Slider Image",
        "desc" => "The optimal size of the image is 1920 px wide x 654 px height, but it can be varied as per your requirement.",
        "id" => "inkthemes_slideimage8",
        "std" => "",
        "type" => "upload");

    $options[] = array("name" => "Link for Eighth slider",
        "desc" => "Mention the URL for Eighth image.",
        "id" => "inkthemes_Sliderlink8",
        "std" => "",
        "type" => "text");



    //Homepage Feature Area
    $options[] = array("name" => "Homepage Feature Area",
        "type" => "heading");

    $options[] = array("name" => "Home Page Main Heading",
        "desc" => "Mention the punch line for your business here.",
        "id" => "inkthemes_page_main_heading",
        "std" => "",
        "type" => "textarea");


    $options[] = array("name" => "Home Page Sub Heading",
        "desc" => "Mention the tagline for your business here that will complement the punch line.",
        "id" => "inkthemes_page_sub_heading",
        "std" => "",
        "type" => "textarea");

    $options[] = array("name" => "Home Page Feature Section Starts From Here.",
        "type" => "saperate",
        "class" => "saperator");

    $options[] = array("name" => "First Feature Image",
        "desc" => "Choose image for your first Feature area. Optimal size 170px x 170px",
        "id" => "inkthemes_fimg1",
        "std" => "",
        "type" => "upload");
    $options[] = array("name" => "First Feature Heading",
        "desc" => "Enter your text for first col heading.",
        "id" => "inkthemes_firsthead",
        "std" => "",
        "type" => "textarea");
    $options[] = array("name" => "First Feature Description",
        "desc" => "Enter your text for first col description.",
        "id" => "inkthemes_firstdesc",
        "std" => "",
        "type" => "textarea");
    $options[] = array("name" => "First feature Link",
        "desc" => "Enter your text for First feature Link.",
        "id" => "inkthemes_feature_link1",
        "std" => "",
        "type" => "text");

    $options[] = array("name" => "Second Feature Starts From Here.",
        "type" => "saperate",
        "class" => "saperator");

    //Second Feature Separetor
    $options[] = array("name" => "Second Feature Image",
        "desc" => "Choose image for your second Feature area. Optimal size 170px x 170px",
        "id" => "inkthemes_fimg2",
        "std" => "",
        "type" => "upload");

    $options[] = array("name" => "Second Feature Heading",
        "desc" => "Enter your heading for second Feature area",
        "id" => "inkthemes_headline2",
        "std" => "",
        "type" => "textarea");

    $options[] = array("name" => "Second Col Description",
        "desc" => "Enter your text for second col description.",
        "id" => "inkthemes_seconddesc",
        "std" => "",
        "type" => "textarea");
    $options[] = array("name" => "Second feature Link",
        "desc" => "Enter your text for Second feature Link.",
        "id" => "inkthemes_feature_link2",
        "std" => "",
        "type" => "text");

    $options[] = array("name" => "Third Feature Starts From Here.",
        "type" => "saperate",
        "class" => "saperator");

    //Third Feature Separetor

    $options[] = array("name" => "Third Feature Image",
        "desc" => "Choose image for your thrid Feature. Optimal size 170px x 170px",
        "id" => "inkthemes_fimg3",
        "std" => "",
        "type" => "upload");

    $options[] = array("name" => "Third Feature Heading",
        "desc" => "Enter your heading for third Feature area",
        "id" => "inkthemes_headline3",
        "std" => "",
        "type" => "textarea");

    $options[] = array("name" => "Third Feature Description",
        "desc" => "Enter your text for Third Feature description.",
        "id" => "inkthemes_thirddesc",
        "std" => "",
        "type" => "textarea");
    $options[] = array("name" => "Third feature Link",
        "desc" => "Enter your text for Second feature Link.",
        "id" => "inkthemes_feature_link3",
        "std" => "",
        "type" => "text");

    $options[] = array("name" => "Fourth Feature Starts From Here.",
        "type" => "saperate",
        "class" => "saperator");

    //Fourth Feature Separetor

    $options[] = array("name" => "Fourth Feature Image",
        "desc" => "Choose image for your Fourth Feature. Optimal size 170px x 170px",
        "id" => "inkthemes_fimg4",
        "std" => "",
        "type" => "upload");

    $options[] = array("name" => "Fourth Feature Heading",
        "desc" => "Enter your heading for Fourth Feature area",
        "id" => "inkthemes_headline4",
        "std" => "",
        "type" => "textarea");

    $options[] = array("name" => "Fourth Feature Description",
        "desc" => "Enter your text for Fourth Feature description.",
        "id" => "inkthemes_fourthdesc",
        "std" => "",
        "type" => "textarea");

    $options[] = array("name" => "Fourth feature Link",
        "desc" => "Enter your text for Fourth feature Link.",
        "id" => "inkthemes_feature_link4",
        "std" => "",
        "type" => "text");

    $options[] = array("name" => "Home Page Blog Section Starts From Here",
        "type" => "saperate",
        "class" => "saperator");

    $options[] = array("name" => "Home Page Blog Heading",
        "desc" => "Enter your text for home Page blog heading section",
        "id" => "inkthemes_blog_heading",
        "std" => "",
        "type" => "text");

    $options[] = array("name" => "Number Of Post",
        "desc" => "Here you can mention the number of blog post that will display on home page.",
        "id" => "inkthemes_blog_post",
        "std" => "2",
        "type" => "text");

//****=============================================================================****//
//****-----------This code is used for creating color styleshteet options----------****//							
//****=============================================================================****//				
    $options[] = array("name" => "Styling Options",
        "type" => "heading");

    $options[] = array("name" => "Theme Stylesheet",
        "desc" => "Select the color of the theme from different available colors.",
        "id" => "inkthemes_altstylesheet",
        "std" => "blue",
        "type" => "select",
        "options" => $alt_stylesheets);

    $options[] = array("name" => "Theme Language",
        "desc" => "By default the theme content displays from left to right which you can change to right to left i.e. 	  
			switching it to RTL.",
        "id" => "inkthemes_lanstylesheet",
        "std" => "Default",
        "type" => "select",
        "options" => $lan_stylesheets);

    $options[] = array("name" => "Custom CSS",
        "desc" => "Quickly add your custom CSS code to your theme by writing the code in this block.",
        "id" => "inkthemes_customcss",
        "std" => "",
        "type" => "textarea");

//****=============================================================================****//
//****-------------This code is used for creating social logos options-------------****//					
//****=============================================================================****//

    $options[] = array("name" => "Social Icons",
        "type" => "heading");

    $options[] = array("name" => "Twitter URL",
        "desc" => "Mention the URL of your Twitter here.",
        "id" => "inkthemes_twitter",
        "std" => "",
        "type" => "text");

    $options[] = array("name" => "Facebook URL",
        "desc" => "Mention the URL of your Facebook here.",
        "id" => "inkthemes_facebook",
        "std" => "",
        "type" => "text");

    $options[] = array("name" => "Google+ URL",
        "desc" => "Mention the URL of your Google+ here.",
        "id" => "inkthemes_google",
        "std" => "",
        "type" => "text");

    $options[] = array("name" => "LinkedIn URL",
        "desc" => "Mention the URL of your LinkedIn here.",
        "id" => "inkthemes_ln",
        "std" => "",
        "type" => "text");

    $options[] = array("name" => "YouTube URL",
        "desc" => "Mention the URL of your YouTube here.",
        "id" => "inkthemes_youtube",
        "std" => "",
        "type" => "text");

    $options[] = array("name" => "Pinterest URL",
        "desc" => "Mention the URL of your Pinterest here.",
        "id" => "inkthemes_pinterest",
        "std" => "",
        "type" => "text");

//****=============================================================================****//
//****-------------This code is used for creating Bottom Footer Setting options-------------****//					
//****=============================================================================****//			
    $options[] = array("name" => "Footer Settings",
        "type" => "heading");
    $options[] = array("name" => "Footer Text",
        "desc" => "Write the text here that will be displayed on the footer i.e. at the bottom of the Website.",
        "id" => "inkthemes_footertext",
        "std" => "",
        "type" => "textarea");
    //------------------------------------------------------------------//
//-------------This code is used for creating SEO description-------//							
//------------------------------------------------------------------//						
    $options[] = array("name" => "SEO Options",
        "type" => "heading");
    $options[] = array("name" => "Meta Keywords (comma separated)",
        "desc" => "Meta keywords provide search engines with additional information about topics that appear on your site. This only applies to your home page. Keyword Limit Maximum 8",
        "id" => "inkthemes_keyword",
        "std" => "",
        "type" => "textarea");
    $options[] = array("name" => "Meta Description",
        "desc" => "You should use meta descriptions to provide search engines with additional information about topics that appear on your site. This only applies to your home page.Optimal Length for Search Engines, Roughly 155 Characters",
        "id" => "inkthemes_description",
        "std" => "",
        "type" => "textarea");
    $options[] = array("name" => "Meta Author Name",
        "desc" => "You should write the full name of the author here. This only applies to your home page.",
        "id" => "inkthemes_author",
        "std" => "",
        "type" => "textarea");
    return $options;
}
