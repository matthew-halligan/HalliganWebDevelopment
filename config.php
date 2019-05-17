<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'harryptt_142user');
   define('DB_PASSWORD', '142user');
   define('DB_DATABASE', 'harryptt_CS142Final');
   define('DB_PORTNUM', '3036');

   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE,DB_PORTNUM);
?>