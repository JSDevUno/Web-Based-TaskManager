<?php
 include 'database.php';
?>

<?php
    if(isset( $_POST['title']) && isset( $_POST['description'])){
        $title = $_POST["title"];
        $description = $_POST["description"];
        $conn = connectDb();
        $sql = "INSERT INTO tasklist (title, descriptions)
        VALUES ('".$title."', '".$description."')";
        if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
        }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <div>
            <form action="create.php" method="post">
                <a href="index.php">Home</a><br>
                <label for="title">Title</label>
                <input type="text" id="title" name="title"><br>
                <label for="title">Description</label>
                <input type="text" id="title" name="description"><br>
                <input type="submit" value="Create">
            </form>
        </div>
    </div>
</body>
</html>