$(function( $ ) {
    'use strict';
    app.AppView = Backbone.View.extend({
        initialize: function() {
            app.Players.on('reset', this.render, this);
            app.Players.fetch();
        },
        
        render: function() {
            var view;
            view = new app.PlayerInfosView({ model: app.Players.getCurrent().getPlayerInfos(), dispatcher: dispatcher });
            view.render();
            view = new app.CharacView({ model: app.Players.getCurrent().getCharac(), dispatcher: dispatcher });
            view.render();
            view = new app.FightView({ model: app.Players.getCurrent().getFight(), dispatcher: dispatcher });
            view.render();
            view = new app.LifeMagicView({ model: app.Players.getCurrent().getLifeMagic(), dispatcher: dispatcher });
            view.render();
            view = new app.SkillView({ model: app.Players.getCurrent().getSkill(), dispatcher: dispatcher });
            view.render();
            view = new app.LifeView({ model: app.Players.getCurrent().getLife(), dispatcher: dispatcher });
            view.render();
            view = new app.ArmoryView({ model: app.Players.getCurrent().getArmory(), dispatcher: dispatcher });
            view.render();
            view = new app.SpellView({ model: app.Players.getCurrent().getSpell(), dispatcher: dispatcher });
            view.render();
            view = new app.MiscView({ model: app.Players.getCurrent().getMisc(), dispatcher: dispatcher });
            view.render();
        }
    });
});