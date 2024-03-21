<?php

function getInfoNav() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $browser = "Inconnu";
    $browserVersion = "";

    if (strpos($userAgent, 'MSIE') !== false) {
        $browser = 'Internet Explorer';
        $browserVersion = getBrowserVersion($userAgent, 'MSIE');
    } elseif (strpos($userAgent, 'Trident') !== false) {
        $browser = 'Internet Explorer';
        $browserVersion = getBrowserVersion($userAgent, 'rv');
    } elseif (strpos($userAgent, 'Firefox') !== false) {
        $browser = 'Mozilla Firefox';
        $browserVersion = getBrowserVersion($userAgent, 'Firefox');
    } elseif (strpos($userAgent, 'Chrome') !== false) {
        $browser = 'Google Chrome';
        $browserVersion = getBrowserVersion($userAgent, 'Chrome');
    } elseif (strpos($userAgent, 'Safari') !== false) {
        $browser = 'Safari';
        $browserVersion = getBrowserVersion($userAgent, 'Version');
    }

    $info = [
        'nav' => $browser,
        'version' => $browserVersion,
        'langue' => substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, strpos($_SERVER['HTTP_ACCEPT_LANGUAGE'], ','))
    ];

    return $info;
}

function getBrowserVersion($userAgent, $browser) {
    $pattern = '/' . $browser . '\/([0-9.]+)/';
    preg_match($pattern, $userAgent, $matches);

    return isset($matches[1]) ? $matches[1] : '';
}

function getInfoOS() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'];

    $os = "Inconnu";
    if (preg_match('/Windows/i', $userAgent)) {
        $os = "Windows";
    } elseif (preg_match('/Macintosh|Mac OS X/i', $userAgent)) {
        $os = "Mac";
    } elseif (preg_match('/Linux/i', $userAgent)) {
        $os = "Linux";
    } elseif (preg_match('/Android/i', $userAgent)) {
        $os = "Android";
    } elseif (preg_match('/iOS/i', $userAgent)) {
        $os = "iOS";
    }

    $version = "Inconnue";
    if (preg_match('/Windows NT (\d+\.\d+)/i', $userAgent, $matches)) {
        $version = $matches[1];
    } elseif (preg_match('/Mac OS X (\d+[._]\d+[._]\d+)/i', $userAgent, $matches)) {
        $version = $matches[1];
    } elseif (preg_match('/Android (\d+\.\d+)/i', $userAgent, $matches)) {
        $version = $matches[1];
    } elseif (preg_match('/CPU(?: iPhone)? OS (\d+[._]\d+)/i', $userAgent, $matches)) {
        $version = $matches[1];
    }

    $info = [
        'os' => $os,
        'version' => $version,
    ];

    return $info;
}