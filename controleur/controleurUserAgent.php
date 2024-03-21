<?php
include_once "$racine/modele/bd.ip.inc.php";
class VerifIP {
    public function verif($ip) {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $browserInfo = get_browser($userAgent);
        $ips_ban = (new IP)->ifIPBan($ip);

        if (!empty($ips_ban) && in_array($ip, array_column($ips_ban, 'banIP'))) {
            return false;
        }

        if ($browserInfo->crawler) {
            (new IP)->setIPBan($ip);
            return false;
        }
        return true;
    }
    public function writeIPLog($ip) {
        $logFile = "logs/log.log";
        $logData = $ip.'|'. time().PHP_EOL;
        file_put_contents($logFile, $logData, FILE_APPEND);
        $lines = file($logFile);
        $currentTimestamp = time();
        $threshold = $currentTimestamp - (5 * 60);
        $filteredLines = array_filter($lines, function($line) use ($threshold) {
            $lineTimestamp = intval(explode('|', $line)[1]);
            return $lineTimestamp >= $threshold;
        });
        file_put_contents($logFile, implode('', $filteredLines));
    }    
    public function getIPLogs($ip) {
        $logFile = "logs/log.log";

        if (file_exists($logFile)) {

            $logs = file($logFile, FILE_IGNORE_NEW_LINES);

            $ipLogs = array();

            foreach ($logs as $log) {
                $logData = explode('|', $log);
                $logIP = trim($logData[0]);
                
                if ($logIP == $ip) {
                    $logTimestamp = intval($logData[1]);
                    
                    $ipLogs[] = array(
                        'timestamp' => $logTimestamp
                    );
                }
            }

            return $ipLogs;
        }
        
        return array();
    }
    public function ifIPSpam($ip) {
        $ipLogs = (new VerifIP)->getIPLogs($ip);

        $now = time();
        $reqPerSec = 0;

        foreach ($ipLogs as $log) {
            if ($log['timestamp'] >= $now - 1) {
                $reqPerSec++;
            }
        }

        return $reqPerSec > 100 ? True : False;
    }
}