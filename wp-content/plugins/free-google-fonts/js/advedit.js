jQuery(document).ready(function() {
    jQuery('#gf_custom_title_font_color').wpColorPicker({
        // you can declare a default color here,
        // or in the data-default-color attribute on the input
        defaultColor: jQuery('#gf_custom_title_font_color').val(),
        // a callback to fire whenever the color changes to a valid color
        change: function(event, ui){
            var selectedColor = ui.color.toString();
            jQuery('#gf_custom_title_font_color').val(selectedColor);
            RunLivePreview();
        }
    });
    jQuery('#gf_custom_title_font_shadow_color').wpColorPicker({
        // you can declare a default color here,
        // or in the data-default-color attribute on the input
        defaultColor: jQuery('#gf_custom_title_font_shadow_color').val(),
        // a callback to fire whenever the color changes to a valid color
        change: function(event, ui){
            var selectedColor = ui.color.toString();
            jQuery('#gf_custom_title_font_shadow_color').val(selectedColor);
            RunLivePreview();
        }
    });
    
    jQuery('.gfadveditable').change(function() {
        RunLivePreview();
    });
    
    jQuery("input[name$='post_title']").keyup(function() {
        return RunLivePreview();
    });
    jQuery("#gf_title_vshadow_left, #gf_title_hshadow_left, #gf_title_bshadow_left").click(function() {
        relAttr = jQuery(this).attr('rel');
        minAttr = jQuery(this).attr('min');
        v = jQuery('#' + relAttr).val();
        v--;
        if (minAttr != undefined) {
            if (v < minAttr) {
                v = minAttr;
            }
        }
        jQuery('#' + relAttr).val(v);
        RunLivePreview();
        return false;
    });
    jQuery("#gf_title_vshadow_right, #gf_title_hshadow_right, #gf_title_bshadow_right").click(function() {
        relAttr = jQuery(this).attr('rel');
        v = jQuery('#' + relAttr).val();
        v++;
        jQuery('#' + relAttr).val(v);
        RunLivePreview();
        return false;
    });
    
    jQuery('#lnkGfSavePreset').click(function() {
        //jQuery('#lnkGfSavePreset').hide();
        jQuery('#gf_title_save_preset').show();
        return false;
    });
    
    jQuery('#lnkGfCloseBox').click(function() {
        //jQuery('#lnkGfSavePreset').show();
        jQuery('#gf_title_save_preset').hide();
        return false;
    });
    
    jQuery('#btnSavePreset').click(function() {
        var presetname = jQuery('#gf_preset_title').val();
        if (presetname.length == 0) {
            alert('Preset name could not be empty. Please enter name.');
            jQuery('#gf_preset_title').focus();
            return false;
        }
       
        if (confirm('Are you sure you want to save this preset?')) {
            
            ff = jQuery('#gf_custom_title_font').val();
            fc = jQuery('#gf_custom_title_font_color').val();
            fs = jQuery('#gf_custom_title_font_size').val();
            fb = jQuery('#gf_custom_title_font_bold').is(":checked") ? 1 : 0;
            fi = jQuery('#gf_custom_title_font_italic').is(":checked") ? 1 : 0;
            fu = jQuery('#gf_custom_title_font_underline').is(":checked") ? 1 : 0;
            txt = jQuery("input[name$='post_title']").val();
            sv = jQuery('#gf_custom_title_font_shadow_vertical').val();
            sh = jQuery('#gf_custom_title_font_shadow_horizontal').val();
            sb = jQuery('#gf_custom_title_font_shadow_blur').val();
            sc = jQuery('#gf_custom_title_font_shadow_color').val();
            def = jQuery('#gf_is_default').is(':checked') ? 1 : 0;
            
            var data = {
                action: 'gf_title_save_preset',
                name: presetname,
                font : ff,
                title_color : fc,
                title_size : fs,
                title_bold : fb,
                title_italic : fi,
                title_underline : fu,
                title_shadow_vertical : sv,
                title_shadow_horizontal : sh,
                title_shadow_blur : sb,
                title_shadow_color : sc,
                is_default : def
            };
            
            jQuery('#gfsaver').show();
            jQuery('#btnSavePreset').hide();
            jQuery.post(ajaxurl, data, function(response) {
                var obj = jQuery.parseJSON(response);
                jQuery('#gfsaver').hide();
                jQuery('#btnSavePreset').show();
                if (obj.result != 0) {
                    alert(obj.message);
                } else {
                    alert('Preset saved successfully.');
                    window.location.href = jQuery('#cancellink').attr('href');
                }
            }).error(function() {
                jQuery('#gfsaver').hide(); 
                jQuery('#btnSavePreset').show();
                alert('Some error happened.');
            });
        }
       
        return false;
       
    });
    
    jQuery('#gf_update_preset').click(function() {
      
        if (confirm('Are you sure you want to update selected preset with current settings?')) {
            
            ff = jQuery('#gf_custom_title_font').val();
            fc = jQuery('#gf_custom_title_font_color').val();
            fs = jQuery('#gf_custom_title_font_size').val();
            fb = jQuery('#gf_custom_title_font_bold').is(":checked") ? 1 : 0;
            fi = jQuery('#gf_custom_title_font_italic').is(":checked") ? 1 : 0;
            fu = jQuery('#gf_custom_title_font_underline').is(":checked") ? 1 : 0;
            sv = jQuery('#gf_custom_title_font_shadow_vertical').val();
            sh = jQuery('#gf_custom_title_font_shadow_horizontal').val();
            sb = jQuery('#gf_custom_title_font_shadow_blur').val();
            sc = jQuery('#gf_custom_title_font_shadow_color').val();
            tn = jQuery('#gf_preset_title2').val();
            def = jQuery('#gf_is_default').is(':checked') ? 1 : 0;
            
            var sIx = jQuery('#gf_pv_preset').val(); 
            var preset = presetList[sIx];
            
            var data = {
                action: 'gf_title_update_preset',
                id: preset.object.id,
                font : ff,
                title_color : fc,
                title_size : fs,
                title_bold : fb,
                title_italic : fi,
                title_underline : fu,
                title_shadow_vertical : sv,
                title_shadow_horizontal : sh,
                title_shadow_blur : sb,
                title_shadow_color : sc,
                title_name : tn,
                is_default : def
            };

            jQuery('#gfupdater').show();
            jQuery('#gf_update_preset').hide();
            jQuery.post(ajaxurl, data, function(response) {
                var obj = jQuery.parseJSON(response);
                jQuery('#gfupdater').hide();
                jQuery('#gf_update_preset').show();
                if (obj.result != 0) {
                    alert(obj.message);
                } else {
                    alert('Preset saved successfully.');
                    window.location.reload();
                }
            }).error(function() {
                jQuery('#gfupdater').hide(); 
                jQuery('#gf_update_preset').show();
                alert('Some error happened.');
            });
        }
       
        return false;
       
    });
    
    jQuery('#gf_load_preset').click(function() {
        var sIx = jQuery('#gf_pv_preset').val(); 
        var preset = presetList[sIx];
        jQuery('#gf_custom_title_font').val(preset.object.font);
        jQuery('#gf_custom_title_font_color').val(preset.object.title_color);
        jQuery('#gf_custom_title_font_size').val(preset.object.title_size);
        jQuery('#gf_custom_title_font_bold').attr("checked", preset.object.title_bold == 1);
        jQuery('#gf_custom_title_font_italic').attr("checked", preset.object.title_italic == 1);
        jQuery('#gf_custom_title_font_underline').attr("checked", preset.object.title_underline == 1);
        jQuery('#gf_custom_title_font_shadow_vertical').val(preset.object.title_shadow_vertical);
        jQuery('#gf_custom_title_font_shadow_horizontal').val(preset.object.title_shadow_horizontal);
        jQuery('#gf_custom_title_font_shadow_blur').val(preset.object.title_shadow_blur);
        jQuery('#gf_custom_title_font_shadow_color').val(preset.object.title_shadow_color);
        jQuery('#gf_custom_title_font_color').wpColorPicker('color', preset.object.title_color);
        jQuery('#gf_custom_title_font_shadow_color').wpColorPicker('color', preset.object.title_shadow_color);
        RunLivePreview();
        return false;
    });
    
    jQuery('#gf_delete_preset').click(function() {
        var sIx = jQuery('#gf_pv_preset').val(); 
        var preset = presetList[sIx];
        if (confirm('Are you sure you want to delete any title font style? All unsaved changes will be lost!')) {
            var data = {
                action: 'gf_title_delete_preset',
                pollid: preset.object.id
            };
            
            jQuery('#gfupdater').show();
            jQuery('#gf_delete_preset').hide();
            jQuery.post(ajaxurl, data, function(response) {
                var obj = jQuery.parseJSON(response);
                jQuery('#gfupdater').hide();
                jQuery('#gf_delete_preset').show();
                if (obj.result != 0) {
                    alert(obj.message);
                } else {
                    alert('Preset deleted successfully.');
                    window.location.reload();
                }
            }).error(function() {
                jQuery('#gfupdater').hide(); 
                jQuery('#gf_delete_preset').show();
                alert('Some error happened.');
            });
        }
        return false;
    });
    
    jQuery('#gf_remove_post_title_styles').click(function() {
        if (confirm('Are you sure you want to remove title styling?')) {
            jQuery('#gf_custom_title_font').val('');
            jQuery('#gf_custom_title_font_color').val('');
            jQuery('#gf_custom_title_font_size').val('');
            jQuery('#gf_custom_title_font_bold').attr("checked", false);
            jQuery('#gf_custom_title_font_italic').attr("checked", false);
            jQuery('#gf_custom_title_font_underline').attr("checked", false);
            jQuery('#gf_custom_title_font_shadow_vertical').val(0);
            jQuery('#gf_custom_title_font_shadow_horizontal').val(0);
            jQuery('#gf_custom_title_font_shadow_blur').val(0);
            jQuery('#gf_custom_title_font_shadow_color').val('');
            jQuery('#gf_custom_title_font_color').wpColorPicker('color', '');
            jQuery('#gf_custom_title_font_shadow_color').wpColorPicker('color', '');
            RunLivePreview();
        }
        return false;
    });
    
   jQuery('#gf_custom_title_show') .click(function() {
      jQuery('.gf_custom_title_shown').hide();
      jQuery('.gf_custom_title_hidden').show();
      jQuery('.wp-color-result').css('margin', '0px');
      return false;
   });
   jQuery('#gf_custom_title_hide') .click(function() {
      jQuery('.gf_custom_title_shown').show();
      jQuery('.gf_custom_title_hidden').hide();
      return false;
   });
   
   jQuery('.wp-color-result').css('margin', '0px');
            
});

function RunLivePreview() {
    ff = jQuery('#gf_custom_title_font').val();
    fc = jQuery('#gf_custom_title_font_color').val();
    fs = jQuery('#gf_custom_title_font_size').val();
    fb = jQuery('#gf_custom_title_font_bold').is(":checked") ? "bold" : "";
    fi = jQuery('#gf_custom_title_font_italic').is(":checked") ? "italic" : "";
    fu = jQuery('#gf_custom_title_font_underline').is(":checked") ? "underline" : "";
    txt = jQuery("input[name$='post_title']").val();
    sv = jQuery('#gf_custom_title_font_shadow_vertical').val();
    sh = jQuery('#gf_custom_title_font_shadow_horizontal').val();
    sb = jQuery('#gf_custom_title_font_shadow_blur').val();
    sc = jQuery('#gf_custom_title_font_shadow_color').val();
    shadow = sv + "px " + sh + "px " + sb + "px " + sc;    
    
    jQuery('#gf_title_livepreview').css('font-family', ff);
    jQuery('#gf_title_livepreview').css('color', fc);
    jQuery('#gf_title_livepreview').css('font-size', fs);
    jQuery('#gf_title_livepreview').css('font-weight', fb);
    jQuery('#gf_title_livepreview').css('font-style', fi);
    jQuery('#gf_title_livepreview').css('text-decoration', fu);
    jQuery('#gf_title_livepreview').css('text-shadow', shadow);
    jQuery('#gf_title_livepreview').text(txt);
}

function TPresetOption(jsonobj) {
    this.object = jQuery.parseJSON(jsonobj);
}