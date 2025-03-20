<?php

include("connection.php");

// $server = "localhost";
// $dbname = "my_db";
// $username = "root";
// $password = '';

// $connection = new mysqli($server, $username, $password, $dbname);

// if ($connection->connect_errno) {
//     echo " DB Connection: Failed to connect to database";
// } else {
//     echo " DB Connection: Successfully connected";
// }

// Insert data
if (isset($_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $stmt = $connection->prepare("INSERT INTO `students`(`name`, `email`) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);

    if ($stmt->execute() == TRUE) {
        echo "<script type='text/javascript'>alert('Student added successfully!');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Student not added!');</script>";
    }
}

// Read the data
$readSql = "SELECT * FROM students";
$res = $connection->query($readSql);





?>

<!DOCTYPE HTML>
<html>

<head>
    <title>CRUD Operation in PHP</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 70vh;">
        <div class="row border text-center shadow px-2 pe-3 pt-3">
            <h4>Add Student</h4>
            <div class="col">
                <form action="#" method="post">
                    <div class="input-container mt-2 p-2">
                        <label class="p-2">Name: </label>
                        <input type="text" name="name" class="rounded-1"><br>
                    </div>
                    <div class="input-container mt-2 p-2">
                        <label class="p-2">E-mail: </label>
                        <input type="email" name="email" class="rounded-1" required><br>
                    </div>
                    <div class="input-container mt-2 p-2">
                        <input type="submit" class="btn-primary btn">
                    </div>
                </form>
            </div>
        </div>




        <div class="mt-5">
            <table class="table table-striped table-hover">
                <thead class="border">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Created_At</th>
                        <th scope="col" colspan="2">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php

                    if ($res->num_rows > 0) {
                        while ($row = $res->fetch_assoc()) { ?>
                            <tr>
                                <th scope="row"><?php echo $row["id"]; ?></th>
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo $row["email"]; ?></td>
                                <td><?php echo $row["created_at"]; ?></td>
                                <td><a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
                                <td><a href="delete.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure want to delete?')">Delete</a></td>
                            </tr>
                        <?php } ?>

                    <?php } else { ?>
                        <tr>
                            <td colspan=" 4" class="text-center">No records found</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</html>