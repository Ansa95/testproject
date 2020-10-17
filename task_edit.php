<?php
session_start();
require_once 'db.php';
require_once 'taskModel.php';
$task = new taskModel();
require_once 'studentModel.php';
$student = new studentModel();
$studentDetails = $student->get();
$taskResult = $task->get();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="scripts.js"></script>
    <p><a href="welcome.html">Back</a></p>
    <p>create Task <a href="task_create.php">Create</a></p>

</head>

<body>
<?php
    if (isset($_GET['id'])) {
       $taskDetails = $task->getCorrespondingUser($_GET['id']);
    }
    ?>
    <div class="an">

        <div class="container">
            <h2> Create task</h2>

            <form action="task_edit_action.php" method="post" class="was-validated">
                <div class="row">
                    <div class="col-sm-6 ">
                        <label for="uname">Title:</label>
                        <input type = "hidden" name ="id" value="<?php echo $taskDetails[0]['id'] ?>">
                        <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="<?php echo $taskDetails[0]['title'] ?>" required>
                    <br>
                        <label for=" pwd">Description:</label>
                       <textarea id="description" name="description" rows="2" cols="50">  <?php echo $taskDetails[0]['description'] ?></textarea>
                        <br>
                        <label for=" pwd">Student:</label>
                        <select name="student" id="student_id">
                            <option value="select">Select</option>
                            <?php
                            foreach($studentDetails as $details) {
                            ?>
                        <option value="<?php echo $details['id']?>" <?=$taskDetails[0]['student_id'] == $details['id'] ? 'selected="selected"' : '';?>><?php echo $details['email_id']?></option>

                        <?php
                            }
                        ?>
                        </select>
                        <button type="submit" name="submit" id="submit" style="background-color:blue;margin-left:auto;margin-right:auto;display:block;margin-top:5%;margin-bottom:0%" class="btn btn-primary">Submit</button>

                    </div>
                </div>
            </form>
        </div>

</body>

</html>

<?php


?>