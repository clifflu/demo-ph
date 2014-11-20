<?php

function starts_with($haystack, $needle) {
    return substr($haystack, 0, strlen($needle)) === $needle;
}

function is_proxy($ip) {
    if (starts_with($ip, '10.24.')) {
        // Hardcoded for AWS VPC
        return True;
    }

    return False;
}

function client_ip() {
    $iplist = explode(',', @$_SERVER['HTTP_X_FORWARDED_FOR']);
    array_push($iplist, $_SERVER['REMOTE_ADDR']);

    for ($i = count($iplist)-1; $i > 0; $i--) {
        if (!trim($iplist[$i]))
            continue;

        if (!is_proxy($iplist[$i]))
            return $iplist[$i];
    }

    return $iplist[0];
}

