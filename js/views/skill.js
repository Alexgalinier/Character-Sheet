$(function( $ ) {
    'use strict';
    app.SkillView = Backbone.View.extend({
        el: '#skill-content',
        
        template: _.template($("#tmpl-skill").html()),
        
        events: {
            'change': 'saveInfos'
        },
        
        initialize: function() {
            this.dispatcher = dispatcher;
            this.model.on('sync', this.render, this);
            this.dispatcher.bind('charac:saved', this.reload, this);
            this.dispatcher.bind('player_infos:saved', this.reload, this);
            this.dispatcher.bind('life:saved', this.reload, this);
            this.dispatcher.bind('spell:saved', this.reload, this);
        },
        
        render: function() {
            var showFight = $('#skill-1 table').css('display') != 'none',
                showBody = $('#skill-2 table').css('display') != 'none',
                showSport = $('#skill-3 table').css('display') != 'none',
                showMagic = $('#skill-4 table').css('display') != 'none',
                showNature = $('#skill-5 table').css('display') != 'none',
                showAcademic = $('#skill-6 table').css('display') != 'none',
                showArt = $('#skill-7 table').css('display') != 'none',
                showSocial = $('#skill-8 table').css('display') != 'none',
                editMode = $('#skill-1').length > 0 && !$('#skill-1').is('.consult');
            
            defaultRender(this);
            
            this.$('.float h2').click(function() {
                var table = $(this).next();
                if (table.is(':visible')) {
                    table.hide();
                    table.parent().css('height', 'auto');
                } else {
                    table.parent().removeAttr('style');
                    table.show();
                }
            });
            
            this.$('#set-unset-edit').click(function() {
                if ($('#skill-1').is('.consult')) {
                    $('#skill-content .float').removeClass('consult');
                } else {
                    $('#skill-content .float').addClass('consult');
                }
            });
            
            if (editMode)
                $('#skill-content .float').removeClass('consult');
            if (!showFight)
                $('#skill-1 table').hide().parent().css('height', 'auto');
            if (!showBody)
                $('#skill-2 table').hide().parent().css('height', 'auto');
            if (!showSport)
                $('#skill-3 table').hide().parent().css('height', 'auto');
            if (!showMagic)
                $('#skill-4 table').hide().parent().css('height', 'auto');
            if (!showNature)
                $('#skill-5 table').hide().parent().css('height', 'auto');
            if (!showAcademic)
                $('#skill-6 table').hide().parent().css('height', 'auto');
            if (!showArt)
                $('#skill-7 table').hide().parent().css('height', 'auto');
            if (!showSocial)
                $('#skill-8 table').hide().parent().css('height', 'auto');
        },
        
        reload: function() {this.model.save();},
        
        saveInfos: function() {
            var $this = this;
            this.model.save(defaultGetData(this), {success: function() {
                $this.render();
                $this.dispatcher.trigger('skill:saved');
            }});
        }
    });
});