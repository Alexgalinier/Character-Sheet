$(function( $ ) {
    'use strict';
    app.FightView = Backbone.View.extend({
        el: '#fight-dmg-content',
        
        templateFight : _.template($("#tmpl-fight").html()),
        templateDmg : _.template($("#tmpl-dmg").html()),
        
        events: {
            'change': 'saveInfos'
        },
        
        initialize: function() {
            this.model.on('sync', this.render, this);
            this.dispatcher = dispatcher;
            this.dispatcher.bind('charac:saved', this.reload, this);
            this.dispatcher.bind('player_infos:saved', this.reload, this);
        },
        
        render: function() {
            var focusId = this.$('input:focus').attr('id');
            
            $('#dmg-content').html(this.templateDmg(this.model.toJSON()));
            $('#fight-content').html(this.templateFight(this.model.toJSON()));
            
            if (focusId != undefined) {
                $('#' + focusId).focus();
            }
            
            return this;
        },
        
        reload: function() {
            this.model.save();
        },
        
        saveInfos: function() {
            this.model.save(defaultGetData(this));
        }
    });
});