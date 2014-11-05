<?php

function client_ip() use ($_SERVER) {
    print_r($_SERVER);
    return "";
}

printf(
    "Greetings, User from %s",
    client_ip();
);
