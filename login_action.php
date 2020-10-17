<?php
require_once 'db.php';
require_once 'user.php';
$employee =new user();
if(isset($_POST['submit']))
{
    $email=$_POST["email"];
    $password=$_POST["password"];
   // $password=hash('sha512',$passwords);
 $an=$employee->login($email,$password);
 var_dump($an);
session_start();
$_SESSION["user_name"] = $an['email_id'];
$_SESSION["id"] =  $an['id'];
$_SESSION["role"] = $an['role'];

if($an) {
header('Location:welcome.html');
}


 }
?>
