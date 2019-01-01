<?php
	require_once("classes/database.php");
	require_once("classes/account.php");

	try
    {
       $db = new Database("/var/www/connectvars/todo_vars.inc");
       $db->useDatabase("todo");
	   	 $acct = new Account($db->getConnection(), "users");
    }
    catch(Exception $e)
    {
       echo "Error accessing database : " . $e->getMessage();
       exit();
    }
		#echo "Database connection established<br>Post Detail : " . $_POST["userID"] . " : " . $_POST["userPW"] . "<hr>";
	  if ($acct->comparePassword($_POST["userID"], $_POST["userPW"]) == TRUE)
		{
			header("Location:mainpage.php");
		} else {
			header("Location:index.php?loginfail=1");    #&" . $_POST["userPW"] . "='" . password_hash($_POST["userPW"], PASSWORD_DEFAULT) . "'");
		}
?>
