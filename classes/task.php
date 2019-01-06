<?php

  class Task
  {
    Private $DBConn = NULL;

    function __construct(mysqli $dbcon)
    {
      if (!$dbcon) {
        throw new Exception("Task: Invalid DB handle.");
        email("dbadmin@ourplace.com","DB Problem",
           "Invalid handle provided to task class".
            $this->cxn->error());
        exit();
      }
      $this->$DBConn = $dbcon;
    }

    function getRows($table,$order)
    {
      $sql = "Select * from " . $table;
      if ($order != NULL)
      {
        $sql = $sql . " order by " . $order;
      }
      $sql = $sql . ";");
      $resultset = mysqli_query($this->cxn, $sql);
      return $resultset;
    }
  }
?>
