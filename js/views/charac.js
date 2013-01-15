$(function( $ ) {
    'use strict';
    app.CharacView = Backbone.View.extend({
        el: '#charac-destiny-content',
        
        template: _.template($("#tmpl-charac").html()),
        
        events: {
            'change': 'saveInfos'
        },
        
        initialize: function() {
            this.dispatcher = dispatcher;
            this.model.on('sync', this.render, this);
            this.dispatcher.bind('player_infos:saved', this.reload, this);
            this.dispatcher.bind('skill:saved', this.reload, this);
            this.dispatcher.bind('spell:saved', this.reload, this);
        },
        
        render: function() {defaultRender(this)},
        
        reload: function() {this.model.save();},
        
        saveInfos: function() {
            var $this = this;
            this.model.save(defaultGetData(this), {success: function() {
                $this.render();
                $this.dispatcher.trigger('charac:saved');
            }});
        }
    });
});