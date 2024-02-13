<?php
function connectDb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "tasks";
    
    $conn = new mysqli($servername, $username, $password, $db);
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
     return $conn;
    }

?>