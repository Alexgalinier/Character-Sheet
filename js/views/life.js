$(function( $ ) {
    'use strict';
    app.LifeView = Backbone.View.extend({
        el: '#life-content',
        
        template: _.template($("#tmpl-life").html()),
        
        events: {
            'change': 'saveInfos'
        },
        
        initialize: function() {
            this.dispatcher = dispatcher;
            this.model.on('sync', this.render, this);
            this.dispatcher.bind('charac:saved', this.reload, this);
            this.dispatcher.bind('life-magic:saved', this.reload, this);
        },
        
        render: function() {
            defaultRender(this);
            
            this.$('img').bind('click', {view: this}, function(event) {
                var img = $(this),
                    checkbox = img.prev();
                    
                if (checkbox.is(':checked')) {
                    checkbox.removeAttr('checked');
                    img.attr('src','images/checkbox-unchecked.png');
                } else {
                    checkbox.attr('checked', 'checked');
                    img.attr('src','images/checkbox-checked.png');
                }
                event.data.view.saveInfos();
            });
        },
        
        reload: function() {this.model.save();},
        
        saveInfos: function() {
            var $this = this;
            
            this.model.save({
                'superficial' : this.$('.superficial:checked').length,
                'light' : this.$('.light:checked').length,
                'intermediate' : this.$('.intermediate:checked').length,
                'serious' : this.$('.serious:checked').length,
                'death' : this.$('.death:checked').length
            }, {success: function() {
                $this.dispatcher.trigger('life:saved');
            }});
            
        }
    });
});