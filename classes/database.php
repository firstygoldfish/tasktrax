<?php
 /*  Class:  Database
  *  Desc:   Class that connects to a MySQL database.
  */
class Database
{
  private $cxn;             // database connection object
  private $database_name;
  private $host;
  private $user;
  private $password;

  function __construct($filename)
  {
    include("$filename");
    if(!$this->cxn = new mysqli($host,$user,$passwd))   #16
    {
       throw new Exception("Database is not available.
                            Try again later.");
       email("dbadmin@ourplace.com","DB Problem",
          "MySQL server is not responding. ".
           $this->cxn->error());
       exit();
    }
    $this->host = $host;                                #25
    $this->user = $user;
    $this->password = $passwd;
  }

  function useDatabase($dbname)
  {
    if(!$result = $this->cxn->query("SHOW DATABASES"))  #32
    {
      throw new Exception("Database is not available.
                           Try again later");
      email("dbadmin@ourplace.com","DB Problem",
         "MySQL server is not responding. "
           .$this->cxn->error());
      exit();
    }
    else                                                #41
    {
      while($row = $result->fetch_row())
      {
        $databases[] = $row[0];
      }
    }
    if(in_array($dbname,$databases) ||
       in_array(strtolower($dbname),$databases))        #49
    {
      $this->database_name = $dbname;
      $this->cxn->select_db($dbname);
      return TRUE;
    }
    else                                                #55
    {
      throw new Exception("Database $dbname not found.");
      return FALSE;
    }
  }

  function getConnection()
  {
     return $this->cxn;
  }

  function getDatabaseName()
  {
     return $this->database_name;
  }
  function getRows($table,$order)
  {
    $sql = "Select * from " . $table;
    if ($order != NULL)
    {
      $sql = $sql . " order by " . $order;
    }
    $sql = $sql . ";";
    $resultset = mysqli_query($this->cxn, $sql);
    return $resultset;
  }
  function dumpTableData($table)
  {
	 echo "[TABLE] <b>" . strtoupper($table) . "</b><br><br>";
	 $resultset = mysqli_query($this->cxn, "Select * from " . $table . ";");
	 while ($row = mysqli_fetch_row($resultset))
	 {
		foreach($row as $key => $val)
		{
			$fieldinfo = $resultset->fetch_field_direct($key);
			echo "[" . strtoupper($fieldinfo->name) . "] <b>" . $val . "</b><br>";
		}
		echo "<hr>";
	}
  }
}
?>
