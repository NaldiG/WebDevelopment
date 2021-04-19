<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    die();
}
?>
<html>
<head>
    <title>Completed LIST</title>
</head>
<body>
<h1>Completed List</h1>
<a href="logout.php">Logout</a>
<a href="tasks.php">See todo tasks</a>

<div>
    <h2>Completed Tasks</h2>
    <ul>
        <?php
        // connect to DB
        require_once "connection.php";

        // Get all tasks
        $result = $db->query("SELECT * FROM tasks WHERE completed=1 AND user_id=" . $_SESSION['user_id']);

        // Loop and display tasks
        while($row = $result->fetch()) {
            $id = $row['id'];
            echo "<li>" . $row['title'] .
                " <a href='task_delete.php?id=$id'>X</a> <a href='task_undo.php?id=$id'>Undo</a></li>";
        }

        ?>
    </ul>
</div>

</body>
</html>
