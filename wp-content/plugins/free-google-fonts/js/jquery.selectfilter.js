(function( $ ) {
    $.fn.textfilter = function( options ) {
        var defaults = {
            ondemand: false,
            select_id : "", // could not be empty
            debug : false,
            count_output: false,
            count_output_placeholder : ""
        };
        
        var opts = $.extend( {}, defaults, options );
        
        if (opts.debug) {
            debug(this, "jQuery.TextFilter started with options [select_id = " + opts.select_id + "][ondemand = " + opts.ondemand + "]" );
        }
        
        var originalOptions = new Array();
        $(opts.select_id).find("option").each(function() {
            var tfoption = new TFOption($(this).text(), $(this).val());
            originalOptions.push(tfoption);
        });
        
        if (opts.debug) {
            debug(this, 'Original options list length: ' + originalOptions.length);
        }
        
        opts.obj = $(this);
        $.fn.textfilter.runFilter = function() {                
            $(opts.select_id).html('');
            filterText = opts.obj.val();
            var items = 0;
            for(var i = 0; i < originalOptions.length; i++) {
                var tfoption = originalOptions[i];
                var name = tfoption.name;
                var rPattern = new RegExp(filterText, "gi");
                if (opts.debug) {
                    debug(this, "Checking pattern " + rPattern + " against " + name);
                }
                if (rPattern.test(name)) {
                    var opt = document.createElement("option");
                    opt.value = tfoption.val;
                    opt.innerHTML = tfoption.name;
                    jQuery(opts.select_id).append(opt);
                    items++;
                }
            }
            
            if (opts.count_output) {
                jQuery(opts.count_output_placeholder).text(items);
            }
        };            
        
        var eventHandlers = {
            keyup: function(e) {
                //$(this).textfilter.runFilter($(this).val());
                $(this).textfilter.runFilter();
            }
        };
                        
        return this.each(function() {
            if (!opts.ondemand) {
                $(this).keyup(eventHandlers.keyup);
            }
            $(this).entersubmit();
        });
    }
    
    function debug( obj, info ) {
        if ( window.console && window.console.log ) {
            window.console.log(  $(obj).attr('id')+": " + info);
        }
    };
    
    function TFOption(name, val) {
        this.name = name;
        this.val = val;
    }
    
})( jQuery );