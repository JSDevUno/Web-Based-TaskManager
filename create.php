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
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="container">
        <p class="task">CREATE TASK</p>
        <div class="inner">
            <form action="create.php" method="post">
                <input type="text" id="title" name="title" placeholder="Enter Title..."><br>
                <textarea name="description" id="description" cols="30" rows="10" placeholder="Enter Description/Details..."></textarea><br>
                <input type="submit" value="Create">
            </form>
            <a href="index.php" class="back">Home</a><br>
        </div>
    </div>
</body>
</html>