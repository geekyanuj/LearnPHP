<?php
    include("connection.php");


    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM students WHERE id=$id";
        $resultset = mysqli_query($connection, $sql) or die("database error:" . mysqli_error($connection));
        $data = mysqli_fetch_row($resultset);
    echo json_encode($data);
    


    

}


?>