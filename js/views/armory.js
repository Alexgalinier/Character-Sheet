$(function( $ ) {
    'use strict';
    app.ArmoryView = Backbone.View.extend({
        el: '#armory-content',
        
        template: _.template($("#tmpl-armory").html()),
        
        /*events: {
            'change': 'saveInfos'
        },*/
        
        initialize: function() {
            this.dispatcher = dispatcher;
            this.model.on('sync', this.render, this);
            this.dispatcher.bind('life:saved', this.reload, this);
        },
        
        render: function() {
            defaultRender(this);
        },
        
        reload: function() {this.model.save();},
        
        saveInfos: function() {
            /*TODO
            this.model.save({
                'superficial' : this.$('.superficial:checked').length,
                'light' : this.$('.light:checked').length,
                'intermediate' : this.$('.intermediate:checked').length,
                'serious' : this.$('.serious:checked').length,
                'death' : this.$('.death:checked').length
            });
            this.dispatcher.trigger('life:saved');*/
        }
    });
});