<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'harryptt_CS142Final');
   //define('DB_PORTNUM', '3036');

   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   define('CURR_PATH', 'http://localhost/bhudev');
   define('ADMIN_PATH', 'http://localhost/bhudev/admin');
?>