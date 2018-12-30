<?php
 /*  Class:  Account
  *  Desc:   A user account stored in a database. Represents
  *          the account information stored in one record
  *          in a table.
  */
class Account
{
    private $userID = NULL;
    private $userPW = NULL;
    private $cxn;
    private $table_name;
    private $message;

    function __construct( mysqli $cxn,$table)
    {
      $this->cxn = $cxn;
      if(is_string($table))                              #17
      {
        $sql = "SHOW TABLES LIKE '$table'";              #19
        $result = $this->cxn->query($sql);
        if($result->num_rows > 0)                        #21
        {
          $this->table_name = $table;
        }
        else                                             #25
        {
          throw new Exception("Entity $table does not exist");
          return FALSE;
        }
      }
      else                                               #32
      {
        throw new Exception("Not a valid entity name");
        return FALSE;
      }
    }

    function comparePassword($userID, $userPW)
    {
      $sql = "SELECT name FROM $this->table_name
              WHERE name ='$userID' AND
                    password = '$userPW'";
      if(!$result = $this->cxn->query($sql))             #74
      {
        throw new Exception("Could not query database: " . $this->cxn->error);
        exit();
      }
      if($result->num_rows < 1 )                         #80
      {
        $this->message  = 'Incorrect login credentials!';
        return FALSE;
      }
      else                                               #86
        return TRUE;
    }

    function getMessage()
    {
       return $this->message;
    }

 }
?>
