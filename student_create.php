<?php
require_once 'db.php';
require_once 'studentModel.php';
$student = new studentModel();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign Up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="scripts.js"></script>
</head>

<body>
    
    <div class="an">

        <div class="container">
            <h2 style="text-align:center;"> Create Student</h2>

            <form action="student_create.php" method="post" class="was-validated">
                <div class="row">
                    <div class="col-sm-6 ">
                        <label for="uname">email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"  required>

                        <label for=" pwd">Password:</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>


                        <label for="pwd">retypePassword:</label>
                        <input type="password" class="form-control" id="re_password" placeholder="Re Enter password" name="re_password" required>




                        <br>
                        <button type="submit" name="submit" id="submit" style="background-color:blue;margin-left:auto;margin-right:auto;display:block;margin-top:5%;margin-bottom:0%" class="btn btn-primary">Submit</button>

                    </div>
                </div>
            </form>
        </div>

</body>

</html>
<p>create student <a href="student.php">Back</a></p>
<p>create student <a href="student_create.php">Create</a></p>
<?php

if (isset($_POST['submit'])) {
    
        if( empty($_POST['email']) || empty($_POST['password']) )
        {
            echo "Please fillout all required fields";
        }

    $email_id = $_POST["email"];
    $password = $_POST["password"];
    $password = hash('sha512', $password);
    $role_id = 2;

    if ($student->save($email_id, $password, $role_id)) {
        header('Location:student.php');
    } else {

        header('student_create.php');
    }
}
?>