<?php #Database configuration file
    define('DB_SERVER','111.223.52.146'); #Database server name
    define('DB_USERNAME','zp11276_airlines'); #Database username
    define('DB_PASSWORD','FrameMarkKieSine123'); #Database password
    define('DB_DATABASE','zp11276_airlines'); #Database name
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE); #Database connection
?>