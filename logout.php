<?php
#error_reporting(E_ALL);
#ini_set('display_errors', 1);

    require_once("classes/session.php");

	$ses = new Session();
	$ses->logout();
	header("Location:index.php");
?>