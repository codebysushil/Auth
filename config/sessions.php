<?php

ini_set('session.use_strict_mode', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_samesite', 'lax');
ini_set('session.cookie_secure', 1);

$params = [
    'lifetime' => time() + (86400 * 30),
    'path' => '/',
    'domain' => 'localhost',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'samesite_lax'
];

session_set_cookie_params($params);
# session_get_cookie_params();

//setcookie('name','sushil',time()+(86400*30),'/', 'localhost', true, true);
