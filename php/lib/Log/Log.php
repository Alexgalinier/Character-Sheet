<?php

require 'LogException.php';
require 'LogReader.php';

class Log extends LogReader 
{
    const MAX_SIZE = 10000000; // 10M
    const DEBUG = 'DEBUG';
    const ERROR = 'ERROR';
    const BLOC_DELIMITER = '/*** LOGGER BEGIN BLOC ***/';
    
    private static $firstLog = true;
    private static $logDir = null;
    private static $logFile = null;
    private static $messages = array();
    private static $registerFinish = false;
    
    public static function d($toDebug)
    {
        self::write($toDebug, self::DEBUG);
    }
    
    public static function e($toError)
    {
        self::write($toError, self::ERROR);
    }
    
    public static function logDir($logDir)
    {
        if (file_exists($logDir) === false) {
            throw new LogException('The path is not valid : '.$logDir);
        }
        
        self::$logDir = $logDir;
        self::init();
    }
    
    public static function reader($dirReader, $delimiter) 
    {
        parent::reader(self::$logDir, self::BLOC_DELIMITER);
    }
    
    public static function finish()
    {
        $file = self::getLogFile();
        file_put_contents($file, implode('', self::$messages), FILE_APPEND);
    }
    
    private static function write($message, $criticity)
    {
        $_message = '';
        if (self::$firstLog) {
            self::$firstLog = false;
            self::$messages[] = self::BLOC_DELIMITER.PHP_EOL;
        }
        
        $_message = '';
        $_message .= date('Y-m-d G:i:s').' ['.$criticity.'] ';
        if (($sessionId = session_id()) !== '') {
            $_message .= '['.$sessionId.'] ';
        }
        $_message .= self::convertMessage($message);
        $_message .= PHP_EOL;
        
        self::$messages[] = $_message;
    }
    
    private static function getLogFile()
    {
        if (self::$logFile === null) {
            if (self::$logDir === null) {
                throw new LogException('You must define a logger directory first');
            }

            $fileName =  self::$logDir.DS.date('Ymd').'.log';
            if (file_exists($fileName) === false) {
                $files = glob(self::$logDir.DS.date('Ymd').'-*.log');
                if ($files !== false && sizeof($files) > 1) {
                    $fileName = $files[(sizeof($files) - 1)];
                }
            }
            
            if (file_exists($fileName) === true && filesize($fileName) > self::MAX_SIZE) {
                $fileInfos = pathinfo($fileName);
                $fileNameExploded = explode('-', $fileInfos['filename']);
                if (sizeof($fileNameExploded) === 1) {
                    rename($fileName, self::$logDir.DS.date('Ymd').'-1.log');
                    self::$logFile = self::$logDir.DS.date('Ymd').'-2.log';
                } else {
                    $fileNumber = explode('.',$fileNameExploded[1]);
                    self::$logFile = self::$logDir.DS.date('Ymd').'-'.($fileNumber[0] + 1).'.log';
                }
            } else {
                self::$logFile = $fileName;
            }
        }
        
        return self::$logFile;
    }
    
    private static function convertMessage($message)
    {
        return str_replace(array('\t', PHP_EOL.PHP_EOL, PHP_EOL), array('&nbsp;&nbsp;&nbsp;&nbsp;','<br/>','<br/>'), print_r($message, true));
    }
    
    private static function init()
    {
        if (self::$registerFinish === false) {
            register_shutdown_function('Log::finish');
            self::$registerFinish = true;
        }
    }
}

