<?php

session_start();

if(!isset($_SESSION["admin_userid"]) || $_SESSION["admin_username"]=="")
{
	session_destroy();
	header("location: login.php");
	exit;
}


?>