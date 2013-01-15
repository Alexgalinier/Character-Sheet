$(function( $ ) {
    'use strict';
    app.SpellView = Backbone.View.extend({
        el: '#spell-content',
        
        template: _.template($("#tmpl-spell").html()),
        
        events: {
            'change': 'saveInfos'
        },
        
        initialize: function() {
            this.dispatcher = dispatcher;
            this.model.on('sync', this.render, this);
            this.dispatcher.bind('charac:saved', this.reload, this);
            this.dispatcher.bind('skill:saved', this.reload, this);
        },
        
        render: function() {
            var showAllSpells = false;
            
            if ($('#show-hide-all-spells').length > 0) {
                showAllSpells = $('#show-hide-all-spells').is('.show');
            }
            
            defaultRender(this)
            
            $('#show-hide-all-spells').click(function() {
                $(this).toggleClass('show');
                if ($(this).is('.show')) {
                    $('#all-spells .spell-lists').show();
                    $('#legends').show();
                } else {
                    $('#all-spells .spell-lists').hide();
                    $('#legends').hide();
                }
            });
            
            if (showAllSpells) {
                $('#show-hide-all-spells').addClass('show');
                $('#all-spells .spell-lists').show();
                $('#legends').show();
            } else {
                $('#all-spells .spell-lists').hide();
                $('#legends').hide();
            }
        },
        
        reload: function() {this.model.save();},
        
        saveInfos: function() {
            var data = {'spells' : {}},
                $this = this;
            
            this.$('input[type="checkbox"]:checked').each(function(index, item) {
                data['spells'][$(item).attr('id')] = 1;
            });
            
            this.model.save(data, {success: function() {
                $this.render();
                $this.dispatcher.trigger('spell:saved');
            }});
        }
    });
});