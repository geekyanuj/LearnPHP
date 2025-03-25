<?php 
    global $res, $num;

    if(isset($_POST["num"])){
        $fact=1;
        $num= $_POST["num"];
    
        for ($i= 1; $i <= $num; $i++) {
            $fact = $fact*$i;
            $res = $fact;
        }   
    } 
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Factorial</title>
</head>
<body>
    <form action="#" method="post">
        <input type="number" name="num" placeholder="Enter a number"/>
        <button type="submit">Find</button>
    </form>
    <div>
        <h2><?php
            if($num != null) 
                echo "Factorial of $num is $res"; 
        ?> </h2>
    </div>
</body>
</html>