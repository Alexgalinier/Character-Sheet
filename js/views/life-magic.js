$(function( $ ) {
    'use strict';
    app.LifeMagicView = Backbone.View.extend({
        el: '#life-magic-content',
        
        template: _.template($("#tmpl-life-magic").html()),
        
        events: {
            'change': 'saveInfos'
        },
        
        initialize: function() {
            this.dispatcher = dispatcher;
            this.model.on('sync', this.render, this);
            this.dispatcher.bind('charac:saved', this.reload, this);
        },
        
        render: function() {defaultRender(this)},
        
        reload: function() {this.model.save();},
        
        saveInfos: function() {
            this.model.save(defaultGetData(this));
            this.dispatcher.trigger('life-magic:saved');
        }
    });
});