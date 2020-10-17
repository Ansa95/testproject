
<?php
require_once 'db.php';
require_once 'studentModel.php';
$student = new studentModel();

if (isset($_POST['edit'])) {
    
        if( empty($_POST['email']) || empty($_POST['password']) )
        {
            echo "Please fillout all required fields";
        }
    $id = $_POST["id"];
    $email_id = $_POST["email"];
    $password = $_POST["password"];
    $password = hash('sha512', $password);
    $role_id = 2;


    $student->update($email_id, $password, $role_id, $id);
       
         header('Location:student.php');
   
}
