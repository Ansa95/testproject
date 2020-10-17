<?php


class user

{
    public $dconnect;
      function __construct()
      {
          $db=new db('localhost','root','','interview');
          $db->connect();
          $this->dconnect=$db;
      }


    public function login($email,$password)
    {
       $sql = "SELECT user.id,email_id,password,role.role from user
        INNER JOIN role ON user.role_id = role.id WHERE email_id='$email' AND password='$password'";

   // $sql="select email_id,password from user WHERE email_id='$email' AND password='$password'";
        $this->dconnect->run($sql);
        return $this->dconnect->getResult();
    }

}
