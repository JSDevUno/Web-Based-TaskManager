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
</head>
<body>
    <div>
        <div>
            <form action="update.php" method="POST">
                <a href="index.php">Home</a><br>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>"><br>
                <label for="description">Description</label>
                <input type="text" id="description" name="description" value="<?php echo htmlspecialchars($description); ?>"><br>
                <input type="submit" value="Update">
            </form>
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
