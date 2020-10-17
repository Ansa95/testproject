<?php

require_once 'db.php';
require_once 'studentModel.php';
$student = new studentModel();
$studentResult = $student->get();

if (isset($_GET['id'])) {
    $student->destroy($_GET['id']);
    
 }

?>
 <p> <a href="welcome.html">Back</a></p>
 <p>create student <a href="student_create.php">Create</a></p>
 <?php
if ($studentResult) {
?>

    <div class='container'>
        <table class="table table-bordered table-striped">
            <tr>
                <td>Email</td>
                <td width="70px">Delete</td>
                <td width="70px">EDIT</td>
            </tr>
            <?php
            foreach ($studentResult as $studentDetails) {
                echo "<form action='' method='POST'>";
                echo "<input type='hidden' value='" . $studentDetails['id'] . "' name='id' />"; //added
                echo "<tr>";
                echo "<td>" . $studentDetails['email_id'] . "</td>";
                echo "<td><a href='student.php?id=". $studentDetails['id'] ."' class='btn btn-danger'>Delete</a></td>";
               
                echo "<td><a href='student_edit.php?id=" . $studentDetails['id'] . "' class='btn btn-info'>Edit</a></td>";
                echo "</tr>";
                echo "</form>";
            }
            ?>
        </table>
    <?php
} else {
    echo "<br><br>No Record Found";
}
    ?>
    </div>