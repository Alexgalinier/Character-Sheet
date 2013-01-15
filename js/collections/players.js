(function() {
	'use strict';

        var PlayerList = Backbone.Collection.extend({
            model: app.Player,
            
            url: restUrl,
            
            getCurrent: function() {
                var param = window.location.href.split('/');
                return this.at(param[4]);
            }
        });
        
	app.Players = new PlayerList();
}());