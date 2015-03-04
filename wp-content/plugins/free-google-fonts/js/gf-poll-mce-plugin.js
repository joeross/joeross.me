(function() {
    tinymce.create('tinymce.plugins.GfPollPlugin', {
        init: function(ed, url) {
            ed.addButton('gf_poll', {
                title: 'Power Posts Poll',
                image: url + '/../assets/gfpoll.png',
                onclick: function() {
                    tb_show('Wizard', 'admin-ajax.php?action=gf_load_poll_wizard&height=520', null);
                    /*
                    var url = prompt("URL filmu", "Podaj adres url filmu na youtube");
                    if (url !== null && url !== '') {
                        ed.execCommand('mceInsertContent', false, '[xltvideo]' + url + '[/xltvideo]');
                    }*/
                }
            });
        },
        createControl: function(n, cm) {
            return null;
        },
        getInfo: function() {
            return {
                longname: "Power Posts Poll",
                author: 'KAPlugins',
                authorurl: 'http://wordpressplugins.cc',
                infourl: 'http://wordpressplugins.cc',
                version: "1.0"
            };
        }
    });
    tinymce.PluginManager.add('gf_poll', tinymce.plugins.GfPollPlugin);
})();