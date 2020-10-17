<?php

require_once 'db.php';
require_once 'taskModel.php';
$task = new taskModel();
$taskResult = $task->get();

if (isset($_GET['id'])) {
    $task->destroy($_GET['id']);
    
 }
?>
 <p> <a href="welcome.html">Back</a></p>
 <p>create task <a href="task_create.php">Create</a></p>
<?php
if ($taskResult) {
?>

    <div class='container'>
        <table class="table table-bordered table-striped">
            <tr>
                <td>Title</td>
                <td>Description</td>
                <td width="70px">Delete</td>
                <td width="70px">EDIT</td>
            </tr>
            <?php
            foreach ($taskResult as $taskDetails) {
                echo "<form action='' method='POST'>";
                echo "<input type='hidden' value='" . $taskDetails['id'] . "' name='id' />"; //added
                echo "<tr>";
                echo "<td>" . $taskDetails['title'] . "</td>";
                echo "<td>" . $taskDetails['description'] . "</td>";
                echo "<td><a href='task.php?id=". $taskDetails['id'] ."' class='btn btn-danger'>Delete</a></td>";
               
                echo "<td><a href='task_edit.php?id=" . $taskDetails['id'] . "' class='btn btn-info'>Edit</a></td>";
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