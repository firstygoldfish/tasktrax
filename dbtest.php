<?php
	require_once("classes/database.php");
	
	try
    {
       $db = new Database("/var/www/connectvars/todo_vars.inc");
       $db->useDatabase("todo");
    }
    catch(Exception $e)
    {
       echo $e->getMessage();
       exit();
    }
	
	echo "Database Connection Completed<hr style=\"height: 2px;color: red;background-color: red;border: none;\">";
	#$db->dumpTableData($db->getConnection(), "projects", "<br>");
	$db->dumpTableData("projects");
?>