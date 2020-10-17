
<?php
session_start();
require_once 'db.php';
require_once 'taskModel.php';
$task = new taskModel();
require_once 'studentModel.php';
$student = new studentModel();


if (isset($_POST['submit'])) {
    
    if( empty($_POST['title']) || empty($_POST['description']) || empty($_POST['student']))
    {
        echo "Please fillout all required fields";
    }
    $id = $_POST["id"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $student_id =  $_POST["student"];
    $teacher_id = $_SESSION["id"];


    $task->update($title, $description, $student_id, $teacher_id, $id);
       
         header('Location:task.php');
   
}
