<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    die();
}
?>
<html>
<head>
    <title>TODO LIST</title>
</head>
<body>
    <h1>Todo List</h1>
    <a href="logout.php">Logout</a>
    <a href="completed.php">See completed tasks</a>
    <div>
        <form method="post" action="task_add.php">
            <input type="text" name="task" placeholder="Add task">
            <input type="submit">
        </form>
    </div>

    <div>
        <h2>Tasks</h2>
        <ul>
        <?php
            // connect to DB
            require_once "connection.php";

            // Get all tasks
            $result = $db->query("SELECT * FROM tasks WHERE completed=0 AND user_id=" . $_SESSION['user_id']);

            // Loop and display tasks
            while($row = $result->fetch()) {
                $id = $row['id'];
                echo "<li>" . $row['title'] .
                    " <a href='task_delete.php?id=$id'>X</a> <a href='task_complete.php?id=$id'>OK</a></li>";
            }

        ?>
        </ul>
    </div>

</body>
</html>
