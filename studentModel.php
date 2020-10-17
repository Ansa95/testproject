<?php


class studentModel

{
    public $dconnect;
      function __construct()
      {
          $db=new db('localhost','root','','interview');
          $db->connect();
          $this->dconnect=$db;
      }

    public function get() {
        $sql = "SELECT * from user WHERE role_id=2";
         $this->dconnect->run($sql);
        return $this->dconnect->getResult();
    }

    public function save($name,$user_name,$email_id, $password, $role_id)
    {
    $sql="insert into user (`name`,`user_name`,`email_id`,`password`,`role_id`) values ('$name','$user_name','$email_id','$password','$role_id')";
       $result= $this->dconnect->run($sql);
       return $result;
    }

    public function update($email_id, $password, $role_id, $id)
    {
    $sql="UPDATE user SET email_id='$email_id',password='$password' WHERE id=$id";
  
        $this->dconnect->run($sql);
    }

    public function getCorrespondingUser($id) 
    {
    $sql = "SELECT * from user WHERE id=".$id."";
     $this->dconnect->run($sql);
    return $this->dconnect->getResult();
    }

    public function destroy($id)
    {
        $sql = "DELETE from user WHERE id=".$id."";
        $this->dconnect->run($sql);
    }

}
