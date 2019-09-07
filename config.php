<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'matthew_root');
   define('DB_PASSWORD', 'matthew');
   define('DB_DATABASE', 'matthew_Halligan-Web-Development');
   //define('DB_PORTNUM', '3036');

   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die ("Couldn't connect to database: " . mysqli_connect_error());

   define('CURR_PATH', 'https://www.halliganwebdevelopment.com');
   define('ADMIN_PATH', 'https://www.halliganwebdevelopment.com/admin');
?>