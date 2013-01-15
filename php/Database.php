<?php

class Database
{
    private static $connexion = null;

    public static function players()
    {
        static::startConnexion();

        $players = array();
        $result = mysql_query('SELECT * FROM jdr_player');
        while ($player = mysql_fetch_array($result)) {
            $players[] = $player;
        }

        return $players;
    }

    public static function handleRequest($table, $keyValue, $keyName, $allowedData, $data = null)
    {
        static::startConnexion();

        if ($data !== null) {
            static::save($table, $data, $allowedData);
        }
        
        $res = mysql_query("SELECT * FROM $table WHERE $keyName = $keyValue");
        $infos = array();
        while($item = mysql_fetch_assoc($res)) {
            $infos[] = $item;
        }
        
        if (sizeof($infos) == 1) {
            $infos = $infos[0];
        }
        
        return static::parseAllowed($infos, $allowedData, true);
    }
    
    private static function startConnexion()
    {
        if (static::$connexion === null) {
            static::$connexion = mysql_connect(App::config('bd_host'), App::config('bd_login'), App::config('bd_password'));
            mysql_select_db(App::config('bd_name'));
            mysql_query("SET NAMES 'utf8'");
        }
    }

    private static function save($table, $data, $allowedKey)
    {
        $parsedData = static::parseAllowed($data, $allowedKey);
        
        $queryData = array();
        foreach ($parsedData as $key => $aData) {
            $queryData[] = " $key = '".str_replace('\'', '\\\'', $aData)."'";
        }

        return mysql_query("UPDATE $table SET " . implode(',', $queryData) . " WHERE id = " . $data['id']);
    }

    private static function parseAllowed($data, $allowedKey, $allowId = false)
    {
        $allowedData = array();
        
        foreach ($data as $key => $aData) {
            if (is_numeric($key)) {
                $allowedData[$key] = $aData;
            } else {
                if (($key && in_array($key, $allowedKey) === true) || ($allowId && $key === 'id')) {
                    $allowedData[$key] = $aData;
                }
            }
        }
        
        return $allowedData;
    }

}