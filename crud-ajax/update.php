<?php 
include("connection.php");
if(isset($_POST['id'])) {
    $id=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];

    $sql = "UPDATE students SET name =?, email=? WHERE id=?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "ssi", $name, $email, $id);
    $result = mysqli_stmt_execute($stmt);
    if ($result) {
        // If the query is successful, you can return a success message
        echo json_encode(["message" => "Record updated successfully."]);
    } else {
        // If the query fails, return an error message
        echo json_encode(["error" => "Error executing the query."]);
    }
    mysqli_close($connection);
}
?>