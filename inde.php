<?php
// if(isset($_GET)){
// print_r($_GET);
//     print_r($_GET['id']);

// }


if(isset($_POST)){
    // print_r($_POST);
        // print_r($_POST['email']);
        // $email= $_POST['email'];
        // echo $email;
        
    
    }

//--------------Mysql db connection-----------
    $mysqli = new mysqli("localhost","root","","my_db");
    
    // Check connection
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: ";
      exit();
    }else{
        echo "Successfully connected to db";
    }
    


    // --------------------CRUD Operations----------------------


?>






<!DOCTYPE HTML>
<html>  
<body>

<form action="#" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
</form>

</body>
</html>