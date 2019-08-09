// Popup
function gt3_show_admin_pop(gt3_message_text, gt3_message_type) {
    // Success - gt3_message_type = 'info_message'
    // Error - gt3_message_type = 'error_message'
    jQuery(".gt3_result_message").remove();
    jQuery("body").removeClass('active_message_popup').addClass('active_message_popup');
    jQuery("body").append("<div class='gt3_result_message " + gt3_message_type + "'>" + gt3_message_text + "</div>");
    var messagetimer = setTimeout(function () {
        jQuery(".gt3_result_message").fadeOut();
        jQuery("body").removeClass('active_message_popup');
        clearTimeout(messagetimer);
    }, 3000);
}

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function waiting_state_start() {
    jQuery(".waiting-bg").show();
}

function waiting_state_end() {
    jQuery(".waiting-bg").hide();
}

// Composer Part
function gt3_update_slider_value(cur_obj) {
    var obj_array = [];
    cur_obj.find(".vc-slide-item").each(function () {
        var data_type = jQuery(this).attr("data-type"),
            data_url = jQuery(this).attr("data-url"),
            tmp_arr = new Object();

        tmp_arr["slide_type"] = data_type;
        tmp_arr["slide_url"] = data_url;

        if (data_type == "video") {
            var data_title = jQuery(this).attr("data-title"),
                data_caption = jQuery(this).attr("data-caption"),
                data_cover = jQuery(this).attr("data-cover");

            tmp_arr["slide_title"] = data_title;
            tmp_arr["slide_caption"] = data_caption;
            tmp_arr["slide_cover"] = data_cover;
        }

        obj_array.push(tmp_arr);
    });

    var data = {
        action: "gt3_get_param_value_for_slider",
        string: JSON.stringify(obj_array)
    };

    jQuery.post(ajaxurl, data, function (response) {
        cur_obj.closest(".edit_form_line").find(".wpb_vc_param_value").val(response);
    });
}

jQuery(document).on("click", ".inter_x_2", function () {
    var object_for_update = jQuery(this).closest(".gt3-slides-list");

    jQuery(this).closest("li").remove();
    gt3_update_slider_value(object_for_update);
});

jQuery(document).on("click", ".vc-add-slide-image", function () {
    var ul_to_append = jQuery(this).siblings(".gt3-slides-list");

    var file_frame = wp.media.frames.file_frame = wp.media({
        title: "Select Images",
        button: {
            text: "Select",
        },
        multiple: true,
        library: {
            type: "image"
        }
    });

    var itemsIDs = [];

    file_frame.on("select", function () {
        file_frame.state().get("selection").forEach(function (item, i, arr) {
            itemsIDs[itemsIDs.length] = item.id;
        });

        var data = {
            action: "gt3_get_vc_images_for_slider",
            ids: itemsIDs.join(","),
        }

        jQuery.post(ajaxurl, data, function (response) {
            ul_to_append.append(response);
            gt3_update_slider_value(ul_to_append);
        });
    });

    file_frame.open();
});

jQuery(document).on("click", ".vc-add-slide-video", function () {
    var line = "\
  <div class='vc-video-popup'>\
    <h4>Add Video</h4>\
    <p>Video URL:</p>\
    <input type='text' name='video_url'>\
    <p>Video Title:</p>\
    <input type='text' name='video_title'>\
    <p>Image Cover:</p>\
    <div class='video-image-preview' data-url=''></div>\
    <input type='button' name='select_image' value='Select'>\
    <p>Video Caption:</p>\
    <input type='text' name='video_caption'>\
    <p></p>\
    <input type='button' name='cancel_vc_video_popup' value='Cancel'>\
    <input type='button' name='save_vc_video_popup' value='Save'>\
  </div>";


    if (!jQuery(this).siblings(".vc-video-popup").length)
        jQuery(this).siblings(".gt3-slides-list").after(line);
});

jQuery(document).on("click", "input[name='cancel_vc_video_popup']", function () {
    jQuery(this).closest(".vc-video-popup").siblings(".gt3-slides-list").show();
    jQuery(this).closest(".vc-video-popup").remove();
});

jQuery(document).on("click", "input[name='select_image'], .video-image-preview", function () {
    var div_to_append = jQuery(this).closest(".vc-video-popup").find(".video-image-preview");

    var file_frame = wp.media.frames.file_frame = wp.media({
        title: "Select Images",
        button: {
            text: "Select",
        },
        multiple: false,
        library: {
            type: "image"
        }
    });

    var itemsIDs = [];

    file_frame.on("select", function () {
        var gt3_image_attachment = file_frame.state().get("selection").first().toJSON();

        var data = {
            action: "gt3_get_vc_image_for_video_cover",
            url: gt3_image_attachment.url,
        }

        jQuery.post(ajaxurl, data, function (response) {
            div_to_append.attr("data-url", gt3_image_attachment.url).html(response);
        });
    });

    file_frame.open();
});

jQuery(document).on("click", "input[name='save_vc_video_popup']", function () {
    var div_to_remove = jQuery(this).closest(".vc-video-popup"),
        ul_to_append = div_to_remove.siblings(".gt3-slides-list");

    var url = div_to_remove.find("input[name='video_url']").val(),
        title = div_to_remove.find("input[name='video_title']").val(),
        image = div_to_remove.find(".video-image-preview").attr("data-url"),
        caption = div_to_remove.find("input[name='video_caption']").val();

    var data = {
        action: "gt3_get_vc_video_for_slider",
        url: url,
        title: title,
        image: image,
        caption: caption
    }

    jQuery.post(ajaxurl, data, function (response) {
        ul_to_append.append(response);
        div_to_remove.remove();
        gt3_update_slider_value(ul_to_append);
    });
});

jQuery(document).on("click", "input[name='save_vc_edit_video_popup']", function () {
    var div_to_remove = jQuery(this).closest(".vc-video-popup"),
        ul_to_append = div_to_remove.siblings(".gt3-slides-list"),
        li_to_replace = ul_to_append.find("li").eq(div_to_remove.attr("data-obj-num"));

    var url = div_to_remove.find("input[name='video_url']").val(),
        title = div_to_remove.find("input[name='video_title']").val(),
        image = div_to_remove.find(".video-image-preview").attr("data-url"),
        caption = div_to_remove.find("input[name='video_caption']").val();

    var data = {
        action: "gt3_get_vc_video_for_slider",
        url: url,
        title: title,
        image: image,
        caption: caption
    }

    jQuery.post(ajaxurl, data, function (response) {
        li_to_replace.replaceWith(response);
        ul_to_append.show();
        div_to_remove.remove();
        gt3_update_slider_value(ul_to_append);
    });
});

jQuery(document).on("click", ".inter_edit_2", function () {
    var object_for_update = jQuery(this).closest("li"),
        object_for_update_index = object_for_update.index(),
        attributes_container = object_for_update.find(".video-item"),
        url = attributes_container.attr("data-url"),
        title = attributes_container.attr("data-title"),
        image = attributes_container.attr("data-cover"),
        caption = attributes_container.attr("data-caption"),
        closest_ul = jQuery(this).closest(".gt3-slides-list");

    closest_ul.hide();

    var line = "\
  <div class='vc-video-popup' data-obj-num='" + object_for_update_index + "'>\
    <h4>Edit Video</h4>\
    <p>Video URL:</p>\
    <input type='text' name='video_url' value='" + url + "'>\
    <p>Video Title:</p>\
    <input type='text' name='video_title' value='" + title + "'>\
    <p>Image Cover:</p>\
    <div class='video-image-preview' data-url='" + image + "'></div>\
    <input type='button' name='select_image' value='Select'>\
    <p>Video Caption:</p>\
    <input type='text' name='video_caption' value='" + caption + "'>\
    <p></p>\
    <input type='button' name='cancel_vc_video_popup' value='Cancel'>\
    <input type='button' name='save_vc_edit_video_popup' value='Save'>\
  </div>";

    closest_ul.after(line);

    var data = {
        action: "gt3_get_vc_image_for_video_cover",
        url: image,
    }

    jQuery.post(ajaxurl, data, function (response) {
        closest_ul.siblings(".vc-video-popup").find(".video-image-preview").html(response);
    });
});

// gt3ButtonDependency
function gt3ButtonDependency () {
    // Icon Type
    jQuery('div[data-vc-shortcode-param-name="btn_icon_type"]').each(function () {
        var cur_this = jQuery(this);
        if (cur_this.find('.btn_icon_type').val() == 'font') {
            cur_this.parents('.vc_edit_form_elements').find('div[data-vc-shortcode-param-name="btn_icon_color"], div[data-vc-shortcode-param-name="btn_icon_color_hover"]').show();
        }
        cur_this.find('.btn_icon_type').change(function () {
            if (jQuery(this).val() == 'font') {
                cur_this.parents('.vc_edit_form_elements').find('div[data-vc-shortcode-param-name="btn_icon_color"], div[data-vc-shortcode-param-name="btn_icon_color_hover"]').show();
            } else {
                cur_this.parents('.vc_edit_form_elements').find('div[data-vc-shortcode-param-name="btn_icon_color"], div[data-vc-shortcode-param-name="btn_icon_color_hover"]').hide();
            }
        });
    });
    // Border Style
    jQuery('div[data-vc-shortcode-param-name="btn_border_style"]').each(function () {
        var cur_this = jQuery(this);
        if (cur_this.find('.btn_border_style').val() != 'none') {
            cur_this.parents('.vc_edit_form_elements').find('div[data-vc-shortcode-param-name="btn_border_color"], div[data-vc-shortcode-param-name="btn_border_color_hover"]').show();
        }
        cur_this.find('.btn_border_style').change(function () {
            if (jQuery(this).val() != 'none') {
                cur_this.parents('.vc_edit_form_elements').find('div[data-vc-shortcode-param-name="btn_border_color"], div[data-vc-shortcode-param-name="btn_border_color_hover"]').show();
            } else {
                cur_this.parents('.vc_edit_form_elements').find('div[data-vc-shortcode-param-name="btn_border_color"], div[data-vc-shortcode-param-name="btn_border_color_hover"]').hide();
            }
        });
    });
}
jQuery(document).on("click", ".gt3_radio_toggle_cont", function () {
	var cur_val = jQuery(this).find('.gt3_checkbox_value').val();	
	if (cur_val == 'on') {
		jQuery(this).find(".gt3_radio_toggle_mirage").removeClass("checked").addClass("not_checked");
		jQuery(this).find('.gt3_checkbox_value').val('off');
	} else {
		jQuery(this).find(".gt3_radio_toggle_mirage").removeClass("not_checked").addClass("checked");
		jQuery(this).find('.gt3_checkbox_value').val('on');
	}
});	

jQuery(document).on("click", ".gt3_packery_ls_item", function () {	
	var cur_wrapper = jQuery(this).parents('.gt3_packery_ls_cont'),
		cur_val = jQuery(this).attr('data-value');
		cur_wrapper.find('.checked').removeClass('checked');
		cur_wrapper.find('.gt3_packery_ls_value').val(cur_val);
		cur_wrapper.find('.'+cur_val).addClass('checked');
});	

jQuery(document).ready(function() {
    var navigationForm = jQuery('#update-nav-menu');
    navigationForm.on('change', '[data-item-option]', function() {
        if (jQuery(this).attr('type') == 'checkbox') {
            jQuery(this).parent().find('input[type=hidden]').val(jQuery(this).parent().find('input[type=checkbox]').is(":checked"));
            if (jQuery(this).hasClass('mega-menu-checkbox')) {
                if (jQuery(this).parent().find('input[type=checkbox]').is(":checked")) {
                    jQuery(this).parents('.menu-item ').addClass('menu-item-megamenu-active');
                    $item = jQuery(this).parents('.menu-item ');
                    do{
                        $item = $item.next();
                        if (!$item.hasClass('menu-item-depth-0')) {
                            $item.addClass('menu-item-megamenu_sub-active');
                        }
                    } while(!$item.hasClass('menu-item-depth-0') && $item.next().length != 0)
                }else{
                    jQuery(this).parents('.menu-item ').removeClass('menu-item-megamenu-active');
                    $item = jQuery(this).parents('.menu-item ');
                    do{
                        $item = $item.next();
                        if (!$item.hasClass('menu-item-depth-0')) {
                            $item.removeClass('menu-item-megamenu_sub-active');
                        }
                    } while(!$item.hasClass('menu-item-depth-0') && $item.next().length != 0)
                }
            }
        }
        if (jQuery(this)[0].tagName == 'SELECT') {
            jQuery(this).parent().find('input[type=hidden]').val(jQuery(this)[0].value);
        }
    });

    gt3_color_picker();

    gt3_redux_img_title ();

    // gt3 Package Plans
    gt3_package_plans ();
});

function gt3_color_picker() {
    if (jQuery('.gt3_cpicker_wrap').size() > 0) {
        jQuery(".cpicker").wpColorPicker();
    }
}

jQuery(document).on("click", ".cpicker", function () {
    gt3_color_picker();
});

function gt3_redux_img_title () {
    var redux_image_select_tag = jQuery('.redux-image-select');
    if (redux_image_select_tag.length) {
        redux_image_select_tag.each(function () {
            var alt_attr = jQuery(this).find("img").attr("alt");
            jQuery(this).find('img').attr("title", alt_attr)
        });
    }
}

//Icon select 




var gt3_redux_icon_select = function( icon ) {
    if ( icon.hasOwnProperty( 'id' ) ) {
        return "<i class='" + icon.id + "'></i>" + "&nbsp;&nbsp;" + icon.text;
    }
};

function gt3_icon_select_init(){
    setTimeout(function () {        
        jQuery('select[id^="icon_select__"]').each(function(){
            var default_params = {
                width: 'resolve',
                triggerChange: true,
                allowClear: true,
                formatResult: gt3_redux_icon_select,
                formatSelection: gt3_redux_icon_select,
                escapeMarkup: function( m ) {
                    return m;
                }
            };       
            jQuery( this ).select2( "destroy" );
            jQuery( this ).select2( default_params );

        })
    }, 300)
}

jQuery(window).load(function() {
    gt3_icon_select_init();
    gt3_hours_of_operation();
});



// gt3 Package Plans
function gt3_package_plans () {
    var product_type_tag = jQuery('#product-type');
    if (product_type_tag.length) {
        if (product_type_tag.val() == 'job_package' || product_type_tag.val() == 'job_package_subscription') {
            jQuery('#product-package-settings').slideDown(1);
            jQuery('#product_catdiv, #tagsdiv-product_tag, #postimagediv, #woocommerce-product-images').slideUp(1);
        }
        product_type_tag.change(function(){
            if (jQuery(this).val() == 'job_package' || product_type_tag.val() == 'job_package_subscription') {
                jQuery('#product-package-settings').stop().slideDown(300);
                jQuery('#product_catdiv, #tagsdiv-product_tag, #postimagediv, #woocommerce-product-images').slideUp(300);
            } else {
                jQuery('#product-package-settings').stop().slideUp(300);
                jQuery('#product_catdiv, #tagsdiv-product_tag, #postimagediv, #woocommerce-product-images').slideDown(300);
            }
        });
    }
}






function empty(data) {
    if (typeof(
            data
        ) == 'number' || typeof(
            data
        ) == 'boolean') {
        return false;
    }
    if (typeof(
            data
        ) == 'undefined' || data === null) {
        return true;
    }
    if (typeof(
            data.length
        ) != 'undefined') {
        return data.length === 0;
    }
    var count = 0;
    for (var i in data) {
        // if(data.hasOwnProperty(i))
        //
        // This doesn't work in ie8/ie9 due the fact that hasOwnProperty works only on native objects.
        // http://stackoverflow.com/questions/8157700/object-has-no-hasownproperty-method-i-e-its-undefined-ie8
        //
        // for hosts objects we do this
        if (Object.prototype.hasOwnProperty.call(data, i)) {
            count++;
        }
    }
    return count === 0;
}




function gt3_set_element_option(option_id,option_name,option_value,element){
    if (empty(option_id) || empty(option_name) || empty(element)) {
        return;
    }
    var element_value = element[0].value;
    var item_obj = [];
    var option_obj = {};
    if (empty(element_value)) {
        option_obj[option_name] = option_value;
        item_obj[option_id] = option_obj;
    }else{
        item_obj = JSON.parse(element_value);
        option_obj[option_name] = option_value;
        if (!empty(item_obj[option_id])) {
            item_obj[option_id][option_name] = option_value;
        }else{
            item_obj[option_id] = option_obj;
        }
    }
    jQuery(element).val(JSON.stringify(item_obj))
}

function gt3_get_element_option(element){
    if (empty(element)) { return; }
    var element_value = element[0].value;
    if (empty(element_value)) {
        return '';
    }else{
        return JSON.parse(element_value);
    }
}

function gt3_delete_element_option(option_id,element){
    if (empty(option_id)) {
        return;
    }
    var element_value = element[0].value;
    if (empty(element_value)) {
        return;
    }
    var item_obj = JSON.parse(element_value);
    if (empty(item_obj[option_id])) {
        return;
    }
    item_obj.splice(option_id, 1);
    jQuery(element).val(JSON.stringify(item_obj));
}
/**
 * end Social Icons
 */

function gt3_move_index (soc_array,old_index, new_index) {
    if (new_index >= soc_array.length) {
        var k = new_index - soc_array.length;
        while ((k--) + 1) {
            soc_array.push(undefined);
        }
    }
    soc_array.splice(new_index, 0, soc_array.splice(old_index, 1)[0]);
    return soc_array;
};

/**
 * Hours of Operation
 */
function gt3_hours_of_operation(){
    var field = jQuery('#_job_hours').parent('.form-field');
    if (empty(field)) {
        return;
    }
    var item_count = 1;
    var draggable_icon = '<a href="javascript:;" class="gt3_hours_of_operation_item_sortable_handle"><i class="fa fa-arrows" aria-hidden="true"></i></a>';
    var item_remove = '<div class="gt3_hours_of_operation_item_remove"><i class="fa fa-trash" aria-hidden="true"></i></div>';
    var textarea = field.find('#_job_hours');
    var textarea_placeholder = textarea.attr('placeholder').split("\n");
    var item_days = '<div class="gt3_hours_of_operation__days_wrapper"><input type="text" value="" placeholder="'+textarea_placeholder[0].trim()+'"></input></div>';
    var item_hours = '<div class="gt3_hours_of_operation__hours_wrapper"><input type="text" value="" placeholder="'+textarea_placeholder[1].trim()+'"></input></div>';

    field.append('<div class="gt3_hours_of_operation_container"></div>')
    var social_container = field.find('.gt3_hours_of_operation_container');
    field.append('<div class="gt3_add_hours_of_operation_item"><i class="fa fa-plus" aria-hidden="true"></i></div>');
    var add_hours_of_operation_button = field.find('.gt3_add_hours_of_operation_item');
    var item_index = 0,
        old_index = 0,
        soc_array,
        item_days_preset,
        item_hours_preset;


    var element = jQuery('#_job_hours');
    var element_value = gt3_get_element_option(element);
    element.hide();
    var days_value,
        hours_value;
    if (!empty(element_value) && Array.isArray(element_value)) {
        for (var i = 0; i <= element_value.length - 1; i++) {
            hours_value = !empty(element_value[i].hours) ? element_value[i].hours : '';
            days_value = !empty(element_value[i].days) ? element_value[i].days : '';
            item_days_preset = '<div class="gt3_hours_of_operation__days_wrapper"><input type="text" value="'+days_value+'" placeholder="'+textarea_placeholder[0].trim()+'"></input></div>';

            item_hours_preset = '<div class="gt3_hours_of_operation__hours_wrapper"><input type="text" value="'+hours_value+'" placeholder="'+textarea_placeholder[1].trim()+'"></input></div>';

            item_count++;
            social_container.append('<div class="gt3_hours_of_operation_item gt3_hours_of_operation_item_'+item_count+'">'+draggable_icon+item_days_preset+item_hours_preset+item_remove+'</div>');

        }
    }else{
        social_container.append('<div class="gt3_hours_of_operation_item gt3_hours_of_operation_item_'+item_count+'">'+draggable_icon+item_days+item_hours+item_remove+'</div>');
    }
    social_container.sortable( {
        handle: '.gt3_hours_of_operation_item_sortable_handle',
        placeholder: ' gt3_hours_of_operation_item gt3_hours_of_operation_item--placeholder',
        items: '.gt3_hours_of_operation_item',
        start: function ( event, ui ) {
            // Make the placeholder has the same height as dragged item
            ui.placeholder.height( ui.item.height() );
            item_index = ui.item.index();
        },
        update: function( event, ui ) {
            old_index = item_index;
            item_index = ui.item.index();
            soc_array = gt3_get_element_option(element);
            if (!empty(soc_array)) {
                soc_array = gt3_move_index(soc_array,old_index,item_index);
            }
            jQuery(element).val(JSON.stringify(soc_array));
        },
    } );
    add_hours_of_operation_button.on('click',function(){
        item_count++;
        social_container.append('<div class="gt3_hours_of_operation_item gt3_hours_of_operation_item_'+item_count+'">'+draggable_icon+item_days+item_hours+item_remove+'</div>');
    })
    var remove_social_item = field.find('.gt3_hours_of_operation_item_remove');
    jQuery(document).on("click", ".gt3_hours_of_operation_item_remove", function (e) {
        e.preventDefault();
        e.stopPropagation();
        var index = jQuery(this).parents('.gt3_hours_of_operation_item').index();
        gt3_delete_element_option(index,element);
        jQuery(this).parent('.gt3_hours_of_operation_item').remove();
    });

    jQuery(document).on("change", ".gt3_hours_of_operation__days_wrapper input", function (e) {
        var index = jQuery(this).parents('.gt3_hours_of_operation_item').index();
        var input_value = jQuery(this).val();
        gt3_set_element_option(index,'days',input_value,jQuery('#_job_hours'));
    });

    jQuery(document).on("change", ".gt3_hours_of_operation__hours_wrapper input", function (e) {
        var index = jQuery(this).parents('.gt3_hours_of_operation_item').index();
        var input_value = jQuery(this).val();
        gt3_set_element_option(index,'hours',input_value,jQuery('#_job_hours'));
    });

}