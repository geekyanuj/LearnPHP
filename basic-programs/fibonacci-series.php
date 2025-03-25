<?php 
    global $result, $num;
    $result[] = array();

    if(isset($_POST["num"])){
        $num= $_POST["num"];
    
        if($num < 1){
            $res = "Invalid number";
        }  

         // First two terms of the series
         $prev1 = 1;
         $prev2 = 0;

         for($i = 1; $i <= $num; $i++){
             
             if($i>2){
                $curr = $prev1 + $prev2;
                $prev2 = $prev1;
                $prev1 = $curr;
                array_push($result, $curr);
            }
            else if($i==1){
                array_push($result, $prev2);
            }
            else if($i== 2){
                array_push($result, $prev1);
            }
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
            if($num == null) 
                echo "Fibonacci series is ".print_r($result); 
        ?> </h2>
    </div>
</body>
</html>