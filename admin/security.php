<?php

session_start();
if(!isset($_SESSION["admin_userid"]) || $_SESSION["admin_username"]=="")
{
	header("location: login.php");
	exit;
}

?>