$(function( $ ) {
    'use strict';
    app.MiscView = Backbone.View.extend({
        el: '#misc-content',
        
        template: _.template($("#tmpl-misc").html()),
        
        events: {
            'change': 'saveInfos'
        },
        
        initialize: function() {
            this.dispatcher = dispatcher;
            this.model.on('sync', this.render, this);
        },
        
        render: function() {
            defaultRender(this)
            
            $('#misc').css({
                'height' : $(window).height() - 120,
                'max-height' : $(window).height() - 120,
                'min-height' : $(window).height() - 120
            });
        },
        
        reload: function() {this.model.save();},
        
        saveInfos: function() {this.model.save(defaultGetData(this));}
    });
});