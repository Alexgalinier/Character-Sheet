<?php

class Misc extends RestProvider
{
    public function isHandler($url)
    {
        return $url === 'misc';
    }
    
    public function getDBTableName()
    {
        return 'jdr_misc';
    }
    
    public function getDBAllowedKeys()
    {
        return array(
            'misc'
        );
    }

    public function getLabels()
    {
        return array();
    }

    public function getData($data)
    {
        return $data;
    }
}