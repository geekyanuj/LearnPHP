<?php 




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Employee Information</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="d-flex flex-column justify-content-center align-items-center vh-100 bg-dark">
        <div id="loginBox" class="row text-center p-3 w-25 rounded" style="background-color: #4C4B4B; box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;">
            <div class="col">
                <h4 class="text-center mb-4 text-light">Login</h4>
                <form action="action.php" method="post">
                    <input class="form-control mt-2" type="email" name="email" placeholder="Enter Email or Username" required/>
                    <input class="form-control mt-3 " type="password" name="password" placeholder="Enter your Password" required/>
                    <p class="text-start mt-1 text-light">Not a user? <a id="registerLink" class="text-white cursor-pointer" style="cursor:pointer">Register</a></p>
                    <input type="submit" id="loginBtn" class="btn  btn-success my-2" name="submit" value="Login"/>
                </form>
            </div>
        </div>

        <div id="registerBox" class="row text-center p-3 w-25 rounded" style="background-color: #4C4B4B; box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px; display: none;">
            <div class="col">
                <h4 class="text-center mb-4 text-light">Register</h4>
                <form action="action.php" method="post">
                    <input class="form-control mt-2" type="email" name="r-email" placeholder="Enter Email" required/>
                    <input class="form-control mt-3" type="text" name="r-username" placeholder="Enter Username" required/>
                    <input class="form-control mt-3 " type="password" name="r-password" placeholder="Enter Password" required/>
                    <input class="form-control mt-3 " type="password" name="password" placeholder="Confirm Password" required/>
                    <p class="text-start mt-1 text-light">Already a user? <a id="loginLink" class="text-white" style="cursor:pointer">Login</a></p>
                    <input type="submit" id="registerBtn" class="btn  btn-primary my-2" name="submit" value="Register"/>
                </form>
            </div>
        </div>
    </div>

        
    
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- Include DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function(){
        $("#registerLink").on('click',function(e){
            $("#registerBox").css("display","block");
            $("#loginBox").css("display","none");
        });
        $("#loginLink").on('click',function(e){
            $("#loginBox").css("display","block");
            $("#registerBox").css("display","none");
        });

        let 
    });




</script>

</body>
</html>