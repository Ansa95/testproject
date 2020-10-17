<?php
require_once 'db.php';
require_once 'user.php';
$employee =new user();
if(isset($_POST['submit']))
{
  
  if(empty($_POST["role_id"])){
    echo "Please fillout all required fields";
    exit;
  }
    $email=$_POST["email"];
    $password=$_POST["password"];
    
    $role = $_POST["role_id"];
  
    if($role =='student') {
      $password=hash('sha512',$password);
    }

   
 $an=$employee->login($email,$password);

session_start();
$_SESSION["user_name"] = $an[0]['email_id'];
$_SESSION["id"] =  $an[0]['id'];
$_SESSION["role"] = $an[0]['role'];

if($_SESSION["role"] == 'student'){
  header('Location:dashboard.php');
} else {
header('Location:welcome.html');
}
 }
?>
