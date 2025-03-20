<?php

include("connection.php");


// Retreive single data
if ($_GET) {
    $id = $_GET['id'];
    // print_r($id);

    $getStudentSql = "SELECT * FROM `students` WHERE `id`= $id";
    // print_r($getStudentSql);
    if ($getStudentSql == TRUE) {
        $student = $connection->query($getStudentSql);
        if ($student->num_rows > 0) {
            while ($row = $student->fetch_assoc()) {
                // print_r($row);
?>

                <!DOCTYPE html>
                <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
                        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
                </head>

                <body>
                    <div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 70vh;">
                        <div class="row border text-center shadow px-2 pe-3 pt-3">
                            <h4>Update Student</h4>
                            <div class="col">
                                <form action="#" method="post">

                                    <div class="input-container mt-2 p-2">
                                        <label class="p-2">Id: </label>
                                        <input type="text" name="id" class="rounded-1" value="<?php echo $row['id']; ?>" disabled>
                                    </div>
                                    <div class="input-container mt-2 p-2">
                                        <label class="p-2">Name: </label>
                                        <input type="text" name="name" class="rounded-1" value="<?php echo $row['name']; ?>"><br>
                                    </div>
                                    <div class="input-container mt-2 p-2">
                                        <label class="p-2">E-mail: </label>
                                        <input type="email" name="email" class="rounded-1" value="<?php echo $row['email']; ?>" required><br>
                                    </div>
                                    <div class="input-container mt-2 p-2">
                                        <input type="submit" class="btn-primary btn" value="Update">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </body>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
                    crossorigin="anonymous"></script>

                </html>


<?php
            }
        }
    } else {
        echo " <br/> Student not found!";
    }
}


// Update Query
if (isset($_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $stmt = $connection->prepare("UPDATE `students` SET `name`=?, `email`=? WHERE `id`=?");
    $stmt->bind_param("ssi", $name, $email, $id);

    if ($stmt->execute() == TRUE) {
        echo "<script type='text/javascript'>alert('Student updated successfully!');</script>";
        header("Refresh:0");
    } else {
        echo "<script type='text/javascript'>alert('Student not updated!');</script>";
    }
}

?>