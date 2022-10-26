jQuery(document).ready(function () {
    if (inkobj.is_reset == 'true') {
        var reset_popup = jQuery('#of-popup-reset');
        reset_popup.fadeIn();
        window.setTimeout(function () {
            reset_popup.fadeOut();
        }, 2000);
        //alert(response);
    }

    jQuery.fn.center = function () {
        this.animate({"top": (jQuery(window).height() - this.height() - 200) / 2 + jQuery(window).scrollTop() + "px"}, 100);
        this.css("left", 250);
        return this;
    }


    jQuery('#of-popup-save').center();
    jQuery('#of-popup-reset').center();
    jQuery(window).scroll(function () {

        jQuery('#of-popup-save').center();
        jQuery('#of-popup-reset').center();
    });
//AJAX Upload
    jQuery('.image_upload_button').each(function () {

        var clickedObject = jQuery(this);
        var clickedID = jQuery(this).attr('id');
        new AjaxUpload(clickedID, {
            action: inkobj.ajax_url,
            name: clickedID, // File upload name
            data: {// Additional data to send
                action: 'of_ajax_post_action',
                type: 'upload',
                data: clickedID,
                option_nonce: jQuery('#blackrider_option_nonce').val(),
            },
            autoSubmit: true, // Submit file after selection
            responseType: false,
            onChange: function (file, extension) {
            },
            onSubmit: function (file, extension) {
                clickedObject.text('Uploading'); // change button text, when user selects file	
                this.disable(); // If you want to allow uploading only 1 file at time, you can disable upload button
                interval = window.setInterval(function () {
                    var text = clickedObject.text();
                    if (text.length < 13) {
                        clickedObject.text(text + '.');
                    }
                    else {
                        clickedObject.text('Uploading');
                    }
                }, 200);
            },
            onComplete: function (file, response) {
                var data = JSON.parse(response);
                window.clearInterval(interval);
                clickedObject.text('Upload Image');
                this.enable(); // enable upload button

                // If there was an error
                if (data.error) {
                    var buildReturn = '<span class="upload-error">' + data.error + '</span>';
                    jQuery(".upload-error").remove();
                    clickedObject.parent().after(buildReturn);
                }
                else {
                    var buildReturn = '<img class="hide of-option-image" id="image_' + clickedID + '" src="' + data.url + '" alt="" />';
                    jQuery(".upload-error").remove();
                    jQuery("#image_" + clickedID).remove();
                    clickedObject.parent().after(buildReturn);
                    jQuery('img#image_' + clickedID).fadeIn();
                    clickedObject.next('span').fadeIn();
                    clickedObject.parent().prev('input').val(data.url);
                }
            }
        });
    });
//AJAX Remove (clear option value)
    jQuery('.image_reset_button').click(function () {

        var clickedObject = jQuery(this);
        var clickedID = jQuery(this).attr('id');
        var theID = jQuery(this).attr('title');
        var ajax_url = inkobj.ajax_url;
        var data = {
            action: 'of_ajax_post_action',
            type: 'image_reset',
            data: theID,
            option_nonce: jQuery('#blackrider_option_nonce').val(),
        };
        jQuery.post(ajax_url, data, function (response) {
            var image_to_remove = jQuery('#image_' + theID);
            var button_to_hide = jQuery('#reset_' + theID);
            image_to_remove.fadeOut(500, function () {
                jQuery(this).remove();
            });
            button_to_hide.fadeOut();
            clickedObject.parent().prev('input').val('');
        });
        returnfalse;
    });
    jQuery('#ofform').submit(function () {
        function newValues() {
            var serializedValues = jQuery("#ofform").serialize();
            return serializedValues;
        }
        jQuery(":checkbox, :radio").click(newValues);
        jQuery("select").change(newValues);
        jQuery('.ajax-loading-img').fadeIn();
        var serializedReturn = newValues();
        var ajax_url = inkobj.ajax_url;
        //var data = {data : serializedReturn};
        var data = {
            type: inkobj.page_type,
            action: 'of_ajax_post_action',
            data: serializedReturn,
            option_nonce: jQuery('#blackrider_option_nonce').val(),
        };
        jQuery.post(ajax_url, data, function (response) {
            var success = jQuery('#of-popup-save');
            var loading = jQuery('.ajax-loading-img');
            loading.fadeOut();
            success.fadeIn();
            window.setTimeout(function () {
                success.fadeOut();
            }, 2000);
        });
        return false;
    });
});