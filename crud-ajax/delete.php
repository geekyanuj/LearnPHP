<?php

include("connection.php");

if(isset($_POST['id'])) {
    $id=$_POST['id'];

    // print_r($id); die;

    $sql = "DELETE FROM students WHERE id=?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    $result = mysqli_stmt_execute($stmt);
    if ($result) {
        echo json_encode(["message" => "Record deleted successfully."]);
    } else {
        echo json_encode(["error" => "Error executing the query."]);
    }
    mysqli_close($connection);
}



?>