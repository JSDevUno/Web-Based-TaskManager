<?php
include 'database.php';


$id = $title = $description = "";

if (isset($_GET["id"])) {
    $conn = connectDb();
    $id = $_GET["id"];
    $sql = "SELECT * FROM tasklist WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row["title"];
        $description = $row["descriptions"];
    } else {
        echo "Task not found";
    }
    $conn->close();
} else {
    echo "Task ID not provided";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="container">
        <p class="task">UPDATE TASK</p>
        <div class="inner">
            <form action="update.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="text" id="title" name="title" placeholder="Enter Title..." value="<?php echo htmlspecialchars($title); ?>"><br>
                <textarea name="description" id="description" cols="30" rows="10" placeholder="Enter Description/Details..."><?php echo htmlspecialchars($description); ?></textarea><br>
                <input type="submit" value="Update">
            </form>
            <a href="index.php">Home</a><br>
        </div>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id"]) && isset($_POST["title"]) && isset($_POST["description"])) {
        $id = $_POST["id"];
        $title = $_POST["title"];
        $description = $_POST["description"];

        $conn = connectDb();
        $sql = "UPDATE tasklist SET title='$title', descriptions='$description' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error updating task: " . $conn->error;
        }
        $conn->close();
    } else {
        echo "Missing required fields";
    }
}
?>
