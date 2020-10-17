<?php


class taskModel

{
    public $dconnect;
      function __construct()
      {
          $db=new db('localhost','root','','interview');
          $db->connect();
          $this->dconnect=$db;
      }
      public function get() {
        $sql = "SELECT * from task";
         $this->dconnect->run($sql);
        return $this->dconnect->getResult();
    }
  

    public function save($student_id, $teacher_id, $task_name, $description, $status)
    {
    $sql="insert into task (`student_id`,`teacher_id`,`task_name`,`description`,`status`) values ('$student_id','$teacher_id','$task_name','$description', '$status')";
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
    $sql = "SELECT * from task WHERE id=".$id."";
     $this->dconnect->run($sql);
    return $this->dconnect->getResult();
    }

    public function destroy($id)
    {
        $sql = "DELETE from task WHERE id=".$id."";
        $this->dconnect->run($sql);
    }

}
