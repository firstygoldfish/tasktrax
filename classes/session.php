<?php
 /*  Class: Session
  *  Desc:  Opens and maintains a PHP session.
  */

  class Session
  {
     private $message;

     function __construct()
     {
        session_start();
     }

     function getVariable($varname)
     {
        if(isset($_SESSION['$varname']))                 #17
            return $_SESSION['$varname'];
        else                                             #19
        {
            $this->message = "No such variable in
                                 this session";
            return FALSE;
        }
     }

     function storeVariable($varname,$value)
     {
        if(!is_string($varname))                         #29
        {
            throw new Exception("Parameter 1 is not a
                                 valid variable name.");
            return FALSE;
        }
        else                                             #35
            $_SESSION['$varname'] = $value;
     }

     function getMessage()
     {
        return $this->message;
     }

     function logout()             #44
     {
     $this->storeVariable("auth","fail");              #47
        return TRUE;
     }
     function login()             #44
     {
        $this->storeVariable("auth","yes");              #47
        return TRUE;
     }
     function authorised()             #44
     {
        if ($this->getVariable("auth") == "yes")
        {
        	return TRUE;
        } else {
            return FALSE;
        }
     }
  }
?>