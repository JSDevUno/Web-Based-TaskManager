<?php
 include 'database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="title">
        <p class="welcome">Welcome <span style="color: red;">Jeevy!</span></p>
    </div>
    <div class="sidebar">
        <ul>
            <li><i class="fa-solid fa-list-check"></i><a href="/admin/posts/managepost.html" class="current">Manage Tasks</a></li>
        </ul>
    </div>
   <div id="managepost">
        <div class="tablecont">
            <h1 style="color: navy;">TASKS</h1>
            <h1><a href='create.php' class='blue'>Create</a></h1>
            <table>
                <tr>
                    <th>No.</th>
                    <th>Product</th>
                    <th>Description</th>
                </tr>
                <?php
                    $sql = "SELECT * FROM tasklist";
                    $conn = connectDb();
                    $result = $conn->query($sql);
    
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["title"] . "</td>";
                        echo "<td>" . $row["descriptions"] . "</td>";
                        echo "<td><a href='update.php?id=" . $row["id"] . "'>Edit</a> | <a href='delete.php? id=" . $row["id"] . "' class='red'>Delete</a></td>";
                        echo "</tr>";
                    }
                    } else {
                    echo "0 results";
                    }
                    $conn->close();
                ?>
            </table>
        </div>
   </div>
</body>
</html>