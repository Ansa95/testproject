<?php
session_start();
require_once 'db.php';
require_once 'taskModel.php';
$task = new taskModel();
$taskdetails = $task->getAll($_SESSION["id"]);
?>
<html>

<head>
    <p>welcome. <?php echo $_SESSION["user_name"] ?></p>
    <a class="nav-link" href="logout.php">Logout</a>
</head>

<body>
    <h1>Task Assigned</h1>
    <?php
    if ($taskdetails) {
    ?>
        <div class='container'>
            <table class="table table-bordered table-striped">
                <tr>
                    <td>Title</td>
                    <td width="70px">Description</td>
                  
                </tr>
                <?php
                foreach ($taskdetails as $details) {

                    echo "<tr>";
                    echo "<td>" . $details['title'] . "</td>";
                    echo "<td>" . $details['description'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        <?php
    } else {
        echo "<br><br>No Record Found";
    }
        ?>
</body>

</html>