(function() {
    'use strict';
    app.Player = Backbone.Model.extend({
        
        getPlayerInfos : function() {
            if (this.PlayerInfos === undefined)
                this.PlayerInfos = new app.PlayerInfos(this.get('player_infos'));
            return this.PlayerInfos;
        },
        
        getCharac : function() {
            if (this.Charac === undefined)
                this.Charac = new app.Charac(this.get('charac'));
            return this.Charac;
        },
        
        getFight : function() {
            if (this.Fight === undefined)
                this.Fight = new app.Fight(this.get('fight'));
            return this.Fight;
        },
        
        getLifeMagic : function() {
            if (this.LifeMagic === undefined)
                this.LifeMagic = new app.LifeMagic(this.get('life-magic'));
            return this.LifeMagic;
        },
        
        getSkill : function() {
            if (this.Skill === undefined)
                this.Skill = new app.Skill(this.get('skill'));
            return this.Skill;
        },
        
        getLife : function() {
            if (this.Life === undefined)
                this.Life = new app.Life(this.get('life'));
            return this.Life;
        },
        
        getArmory : function() {
            if (this.Armory === undefined)
                this.Armory = new app.Armory(this.get('armory'));
            return this.Armory;
        },
        
        getSpell : function() {
            if (this.Spell === undefined)
                this.Spell = new app.Spell(this.get('spell'));
            return this.Spell;
        },
        
        getMisc : function() {
            if (this.Misc === undefined)
                this.Misc = new app.Misc(this.get('misc'));
            return this.Misc;
        }
    });
}());