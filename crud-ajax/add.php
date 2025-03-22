<?php

include("connection.php");

// Insert data
if (isset($_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];


    if(empty($name) || empty($email)) {
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Oops!</strong> Please fill all required field below.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
    }
    else{
        
        $stmt = $connection->prepare("INSERT INTO `students`(`name`, `email`) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);

        if ($stmt->execute() == TRUE) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  Student added successfully!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        
        } else {
            echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Oops!</strong> Please fill all required field below.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          ';
        }
        
    }
    
    
}

?>