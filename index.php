<?php

printf(
    "Greetings, TCP/IP from %s, Browser from %s",
    $_SERVER['REMOTE_ADDR'],
    $_SERVER['X-FORWARDED_FOR']
);
