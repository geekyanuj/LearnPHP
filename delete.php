<?php
include("connection.php");
// Delete a record
if ($_GET) {
    $id = $_GET['id'];
    $deleteSQL = "DELETE FROM `students` WHERE `id`= ?";


    // // print_r($id);
    $stmt = $connection->prepare($deleteSQL);
    $stmt->bind_param('i', $id);
    if ($stmt->execute() == TRUE) {
        echo "<script type='text/javascript'>alert('Student deleted successfully!');</script>";
        header(header: "Location:form.php");
    } else {
        echo "<script type='text/javascript'>alert('Student not deleted!');</script>";
    }
}
