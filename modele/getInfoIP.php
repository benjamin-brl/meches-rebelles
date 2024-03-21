<?php
function getInfoIP($ip) {
    if ($ip != '127.0.0.1' && $ip != '::1') {
        $geoPluginURL = 'http://www.geoplugin.net/php.gp?ip='.$ip;
        $geoPluginResult = unserialize(file_get_contents($geoPluginURL));
    
        if (!empty($geoPluginResult) && $geoPluginResult['geoplugin_status'] == 200) {
            return $geoPluginResult;
        } else {
            return "Impossible de récupérer les différentes informations par rapport à l'IP.";
        }
    } else {
        return "IP locale 😑";
    }
}