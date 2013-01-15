$(function( $ ) {
    'use strict';
    app.PlayerInfosView = Backbone.View.extend({
        el: '#player-infos-content',
        
        template: _.template($("#tmpl-player-infos").html()),
        
        events: {
            'change': 'saveInfos'
        },
        
        initialize: function() {
            this.dispatcher = dispatcher;
            this.model.on('sync', this.render, this);
            this.dispatcher.bind('charac:saved', this.reload, this);
            this.dispatcher.bind('skill:saved', this.reload, this);
            this.dispatcher.bind('spell:saved', this.reload, this);
        },
        
        render: function() {
            defaultRender(this);
            
            if ($('#home-content').is(':visible') || (!$('#home-content').is(':visible') && !$('#skill-content').is(':visible') && !$('#spell-content').is(':visible'))) {
                $('#menu div').removeClass('current');
                $('#menu-main').addClass('current');
                $('#home-content').show();
                $('#skill-content').hide();
                $('#spell-content').hide();
                $('#misc-content').hide();
            }
            if ($('#skill-content').is(':visible')) {
                $('#menu div').removeClass('current');
                $('#menu-skills').addClass('current');
                $('#home-content').hide();
                $('#skill-content').show();
                $('#spell-content').hide();
                $('#misc-content').hide();
            }
            if ($('#spell-content').is(':visible')) {
                $('#menu div').removeClass('current');
                $('#menu-spell').addClass('current');
                $('#home-content').hide();
                $('#skill-content').hide();
                $('#spell-content').show();
                $('#misc-content').hide();
            }
            if ($('#misc-content').is(':visible')) {
                $('#menu div').removeClass('current');
                $('#menu-misc').addClass('current');
                $('#home-content').hide();
                $('#skill-content').hide();
                $('#spell-content').hide();
                $('#misc-content').show();
            }
            this.$('#menu-main').click(function() {
                $('#menu div').removeClass('current');
                $(this).addClass('current');
                $('#home-content').show();
                $('#skill-content').hide();
                $('#spell-content').hide();
                $('#misc-content').hide();
            });
            this.$('#menu-skills').click(function() {
                $('#menu div').removeClass('current');
                $(this).addClass('current');
                $('#home-content').hide();
                $('#skill-content').show();
                $('#spell-content').hide();
                $('#misc-content').hide();
            });
            this.$('#menu-spell').click(function() {
                $('#menu div').removeClass('current');
                $(this).addClass('current');
                $('#home-content').hide();
                $('#skill-content').hide();
                $('#spell-content').show();
                $('#misc-content').hide();
            });
            this.$('#menu-misc').click(function() {
                $('#menu div').removeClass('current');
                $(this).addClass('current');
                $('#home-content').hide();
                $('#skill-content').hide();
                $('#spell-content').hide();
                $('#misc-content').show();
            });
        },
        
        reload: function() {this.model.save();},
        
        saveInfos: function() {
            this.model.save(defaultGetData(this));
            this.dispatcher.trigger('player_infos:saved');
        }
    });
});