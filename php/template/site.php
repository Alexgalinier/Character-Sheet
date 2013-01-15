<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width">
        
        <title>CHARACTER-SHEET</title>
        
        <?php App::css(); ?>
    </head>
    <body>
        <div id="home-content">
            <div class="float" id="life-content"></div>
            <div id="charac-destiny-content"></div>
            <div id="fight-dmg-content">
                <div class="float" id="dmg-content"></div>
                <div class="float" id="fight-content"></div>
            </div>
            <div class="float" id="life-magic-content"></div>
            <div class="float" id="armory-content"></div>
        </div>
        <div id="player-infos-content"></div>
        <div id="skill-content"></div>
        <div id="spell-content"></div>
        <div id="misc-content"></div>
        
        <?php App::jsTemplates(); ?>
        <?php App::js(); ?>
    </body>
</html>