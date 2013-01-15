<?php

abstract class RestProvider
{
    protected $keyName = 'id';
    
    public abstract function isHandler($url);
    public abstract function getDBAllowedKeys();
    public abstract function getDBTableName();
    public abstract function getLabels();
    public abstract function getData($data);
    
    public function handle($key)
    {
        $data = Database::handleRequest($this->getDBTableName(), $key, $this->keyName, $this->getDBAllowedKeys(), Rest::$data);
        $data = array_merge($this->getData($data), $this->getLabels());
        
        Rest::send($data);
    }
    
    public function get($key)
    {
        $data = Database::handleRequest($this->getDBTableName(), $key, $this->keyName, $this->getDBAllowedKeys());
        $data = array_merge($this->getData($data), $this->getLabels());
        
        return $data;
    }
}
