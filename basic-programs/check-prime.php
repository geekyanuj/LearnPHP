<?php
   global $res;

    if(isset($_POST["num"])){
        
        $num = $_POST["num"];
        // print_r($num);
        // echo $num;
        $flag = false;


        if($num==0 || $num== 1){
            $flag = true;
        }
        for($i = 2; $i < $num/2; $i++){
            //non-prime
            if($num% $i==0){
                $flag = true;
                break;
            }
        }

        if($flag){
            $res = "$num is not a prime number";
        }else{
            $res = "$num is a prime number";
        }
        
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Prime</title>
</head>
<body>
    <form action="#" method="POST">
        <input type="number" placeholder="Enter a number" name="num" >
        <button type="submit">Check</button>
    </form>
    <div>
    <h1><?php echo $res; ?></h1>
    </div>
</body>
</html>