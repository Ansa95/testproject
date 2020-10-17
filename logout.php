<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["email_id"]);
unset($_SESSION["role"]);
header("Location:login.html");

?>