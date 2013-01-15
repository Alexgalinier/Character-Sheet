<?php

class LogReader
{
    public static function reader($dirReader, $delimiter)
    {
        $day = date('d');
        $month = date('m');
        $year = date('Y');
        
        $date = date('d, F Y', mktime(0,0,0, $month, $day, $year));
        
        $logs = array();
        $log = '';
        foreach(glob($dirReader.DS.$year.$month.$day.'*.log') as $logFile) {
            $handle = fopen($logFile, "r");
            if ($handle) {
                while (($buffer = fgets($handle)) !== false) {
                    if (mb_strpos($buffer, $delimiter) === false) {
                        if ($buffer !== PHP_EOL) {
                            $lineValues = self::getLogLineValues($buffer);
                            $log .= '
                                <div class="log-line '.strtolower($lineValues['criticity']).'">
                                    <div class="log-hour">
                                        '.$lineValues['hour'].'
                                    </div>
                                    <div class="log-content">
                                        '.$lineValues['content'].'
                                    </div>
                                </div>
                                ';
                        }
                    } else {
                        if ($log !== '') {
                            $logs[] = $log;
                        }
                        $log = '';
                    }
                }
                $logs[] = $log;
                $log = '';
                fclose($handle);
            }
        }
        
        $_logs = '';
        foreach (array_reverse($logs) as $log) {
            $_logs .= '<div class="log-div">'.$log.'</div>';
        }
        
        echo '
            <!DOCTYPE HTML>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">

                    <style>
                        '.self::css().'
                    </style>

                    <title>Log Reader</title>
                </head>
                <body>
                    <div class="content">
                        <div class="filter">
                            <b>Logs</b> of the <b>'.$date.'</b>
                            <input type="text" id="search-text" placeholder="Search word" />
                        </div>
                        <div class="logs-head">
                            '.$_logs.'
                        </div>
                        
                    </div>

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
                    <script>
                        $("#search-text").keyup(function() {
                            var searchedVal = $("#search-text").val();
                            $(".log-line").each(function(index, value) {
                                if (searchedVal != "") {
                                    if ($(value).find(".log-content").text().indexOf(searchedVal) >= 0) {
                                        $(value).show();
                                    } else {
                                        $(value).hide();
                                    }
                                } else {
                                    $(value).show();
                                }
                            });
                        });
                    </script>
                </body>
            </html>
            ';
    }
    
    private static function css()
    {
        return file_get_contents(dirname(__FILE__).DS.'css'.DS.'styles.css');
    }
    
    private static function getLogLineValues($logLine) 
    {
        $logValues = array();
        $logValues['date'] = mb_substr($logLine, 0, 10);
        $logValues['hour'] = mb_substr($logLine, 11, 8);
        $logValues['criticity'] = mb_substr($logLine, 21, mb_strpos($logLine, ']') - 21);
        $logValues['content'] = str_replace(array(' ', PHP_EOL), array('&nbsp;', '<br/>'), mb_substr($logLine, mb_strpos($logLine, ']') + 2));
        
        return $logValues;
    }
}