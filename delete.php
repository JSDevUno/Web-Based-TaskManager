<?php
include 'database.php';
function resetAutoIncrement($tableName) {
    $conn = connectDb();
    $sql = "ALTER TABLE $tableName AUTO_INCREMENT = 1";
    $conn->query($sql);
    $conn->close();
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $conn = connectDb();
    $sql = "DELETE FROM tasklist WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        $result = $conn->query("SELECT COUNT(*) as count FROM tasklist");
        $row = $result->fetch_assoc();
        if ($row['count'] == 0) {
            resetAutoIncrement('tasklist');
        }

        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting task: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Task ID not provided";
}

