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
  

    public function save($title, $description, $student_id, $teacher_id)
    {
    $sql="insert into task (`student_id`,`teacher_id`,`title`,`description`) values ('$student_id','$teacher_id','$title','$description')";
    echo $sql;
       $result= $this->dconnect->run($sql);
       return $result;
    }

    public function update($title, $description, $student_id, $teacher_id,$id)
    {
       
    $sql="UPDATE task SET title='$title',description='$description', student_id=$student_id,teacher_id =$teacher_id WHERE id=$id";
 
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

    public function getAll($id) {
        $sql = "SELECT * from task WHERE student_id=".$id."";
        $this->dconnect->run($sql);
       return $this->dconnect->getResult();
    }

}
