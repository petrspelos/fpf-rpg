<?php
    define('GAME_VERSION', '0.0.5.0');
    
    define('ISDEBUG', false);

    if(!ISDEBUG)
    {
        define('DB_USERNAME', 'commonuser');
        define('DB_PASSWORD', 'MhWK2ARrJ_h[(k&%');
        define('DB_HOST', 'innodb.endora.cz');
        define('DB_NAME', 'fpfrpg');
    }
    else
    {
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', '');
        define('DB_HOST', 'localhost');
        define('DB_NAME', 'fpfrpg');
    }
?>