<?php

require PATH_PHP . DS . 'Database.php';

class Rest
{
    public static $data = null;
    public static $rests = null;

    public static function init()
    {
        if (static::$rests === null) {
            static::$rests = array();
            
            $rests = new FilesystemIterator(PATH_PHP_REST, FilesystemIterator::SKIP_DOTS);
            foreach($rests as $file) {
                require PATH_PHP_REST.DS.$file->getFilename();
                
                $class = $file->getBasename('.php');
                static::$rests[$class] = new $class();
            }
        }
    }
    
    public static function route()
    {
        static::init();
        
        $data = file_get_contents('php://input');
        if ($data) {
            static::$data = json_decode($data, true);
        }

        if (!isset($_GET['task'])) {
            static::players();
        } else {
            foreach(static::$rests as $rest) {
                if ($rest->isHandler($_GET['task']) === true) {
                    $rest->handle($_GET['id']);
                    break;
                }
            }
        }
    }

    public static function players()
    {
        $data = array();
        foreach (Database::players() as $player) {
            $data[] = array(
                'player_infos' => static::restGet('PlayerInfos', $player['id']),
                'charac' => static::restGet('Charac', $player['id']),
                'fight' => static::restGet('Fight', $player['id']),
                'life-magic' => static::restGet('LifeMagic', $player['id']),
                'skill'=> static::restGet('Skill', $player['id']),
                'life'=> static::restGet('Life', $player['id']),
                'armory'=> static::restGet('Armory', $player['id']),
                'spell'=> static::restGet('Spell', $player['id']),
                'misc'=> static::restGet('Misc', $player['id'])
            );
        }

        static::send($data);
    }

    public static function restGet($rest, $id)
    {
        return static::$rests[$rest]->get($id);
    }
    
    public static function send($data)
    {
        header('Cache-Control: no-cache, must-revalidate');
        header('Content-type: application/json');

        echo json_encode($data);
    }
}