<?php

function is_proxy($ip) {
    if ('10.' == substr($ip, 0, 3)) {
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

