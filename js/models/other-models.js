(function() {
    'use strict';
    app.Charac = Backbone.Model.extend({urlRoot: restUrl + '/charac'});
}());

(function() {
    'use strict';
    app.Fight = Backbone.Model.extend({urlRoot: restUrl + '/fight'});
}());

(function() {
    'use strict';
    app.LifeMagic = Backbone.Model.extend({urlRoot: restUrl + '/life_magic'});
}());

(function() {
    'use strict';
    app.PlayerInfos = Backbone.Model.extend({urlRoot: restUrl + '/player_infos'});
}());

(function() {
    'use strict';
    app.Skill = Backbone.Model.extend({urlRoot: restUrl + '/skill'});
}());

(function() {
    'use strict';
    app.Life = Backbone.Model.extend({urlRoot: restUrl + '/life'});
}());

(function() {
    'use strict';
    app.Armory = Backbone.Model.extend({urlRoot: restUrl + '/armory'});
}());

(function() {
    'use strict';
    app.Spell = Backbone.Model.extend({urlRoot: restUrl + '/spell'});
}());

(function() {
    'use strict';
    app.Misc = Backbone.Model.extend({urlRoot: restUrl + '/misc'});
}());