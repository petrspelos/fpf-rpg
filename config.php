<?php
    define('GAME_VERSION', '0.0.5.0');
    define('WORK_REWARD', 60);
    define('WORK_SANITY_DAMAGE', 5);
    
    define('ISDEBUG', true);
    define('S', false);

    if(!ISDEBUG && !S)
    {
        define('DB_USERNAME', 'commonuser');
        define('DB_PASSWORD', 'MhWK2ARrJ_h[(k&%');
        define('DB_HOST', 'innodb.endora.cz');
        define('DB_NAME', 'fpfrpg');
    }
    else if(!ISDEBUG && S)
    {
        define('DB_USERNAME', 'id1734748_commonuser');
        define('DB_PASSWORD', 'UXc+_]4Fn@`pU&P^');
        define('DB_HOST', 'localhost');
        define('DB_NAME', 'id1734748_fpfrpg');
    }
    else
    {
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', '');
        define('DB_HOST', 'localhost');
        define('DB_NAME', 'fpfrpg');
    }
?>