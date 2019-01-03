<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

	require_once("classes/database.php");
	require_once("classes/account.php");
    require_once("classes/session.php");

	try
    {
       $db = new Database("/var/www/connectvars/todo_vars.inc");
       #$db = new Database("/sdcard/Icode-Go/data_files/www/todo_vars.inc");
       $db->useDatabase("todo");
	   $acct = new Account($db->getConnection(), "users");
    }
    catch(Exception $e)
    {
       echo "Error accessing database : " . $e->getMessage();
       exit();
    }
		#echo "Database connection established<br>Post Detail : " . $_POST["userID"] . " : " . $_POST["userPW"] . "<hr>";
	$ses = new Session();
	if ($acct->comparePassword($_POST["userID"], $_POST["userPW"]) == true)
	{
      	$ses->login();
		header("Location:mainpage.php");
	} else {
      	$ses->logout();
		header("Location:index.php?loginfail=1");    #&" . $_POST["userPW"] . "='" . password_hash($_POST["userPW"], PASSWORD_DEFAULT) . "'");
	}
?>