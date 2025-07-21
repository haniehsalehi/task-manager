<?php
include 'db.php';

$task = $_POST['task'];

if (!empty($task)) {
    $conn->query("INSERT INTO tasks (task) VALUES ('$task')");
}

header("Location: index.php");
?>
