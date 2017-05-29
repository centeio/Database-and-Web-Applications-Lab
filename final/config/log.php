

<?php
    /* from http://www.hotscripts.com/blog/track-your-visitors-using-php/ */
    function iff($tst, $cmp, $bad) {
        return(($tst == $cmp) ? $cmp : $bad);
    }

    function logVisitor() {
        global $BASE_DIR;
        // Getting the information
        
        if(!$_SESSION['logged']) {
        
            $ipaddress = $_SERVER['REMOTE_ADDR'];
            
            // Write to log file:
            $logfile = $BASE_DIR . 'config/logfile.txt';

            // Open the log file in “Append” mode
            if (!$handle = fopen($logfile, 'a+')) {
                die("Failed to open log file");
            }

            // Write $logline to our logfile.
            if (fwrite($handle, session_id() . "|" .  date("Y-m-d") . "\n") === FALSE) {
                die("Failed to write to log file");
            }

            fclose($handle);
            $_SESSION['logged'] = true;
        }
    }

    function getNVisitors(){
        global $BASE_DIR;
        
        // Open log file
        $logfile =  $BASE_DIR . 'config/logfile.txt';

        if (file_exists($logfile)) {

            $handle = fopen($logfile, "r");
            $log = fread($handle, filesize($logfile));
            fclose($handle);
        } else {
            die ("The log file doesn’t exist!");
        }

        // Seperate each logline
        $log = explode("\n", trim($log));
       // $nvisitors = count($log);
        return $log;
    }
    
    function logError($message) {
        global $BASE_DIR;
        
        $errorLog = $BASE_DIR . 'config/error_log.txt';
            
        file_put_contents($errorLog,date(DATE_RSS) . "\n" . $message . "\n\n" , FILE_APPEND | LOCK_EX);
    }

?>