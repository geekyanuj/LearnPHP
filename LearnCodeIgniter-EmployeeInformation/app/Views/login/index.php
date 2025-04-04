
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Employee Information</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css')?>">

</head>

<body>
    <div class="d-flex flex-column justify-content-center align-items-center vh-100 bg-dark">
        <div id="loginBox" class="box row text-center p-3 w-25 rounded">
            <div class="col">
                <h4 class="text-center mb-4 text-light">Login</h4>
                <form method="post" id="loginFormId">
                    <input class="form-control mt-2" type="email" name="email" placeholder="Enter Email or Username" required />
                    <p class="error text-start" id="email-login-error"></p>
                    <input class="form-control mt-3 " type="password" name="password" placeholder="Enter your Password" required />
                    <p class="error text-start" id="password-login-error"></p>
                    <p class="text-start mt-1 text-light">Not a user? <a id="registerLink" class="text-white cursor-pointer" style="cursor:pointer">Register</a></p>
                    <input type="submit" id="loginBtn" class="btn btn-success my-2" name="submit" value="Login" />
                </form>
            </div>
        </div>

        <div id="registerBox" class="box row text-center p-3 w-25 rounded" style="display: none;">
            <div class="col">
                <h4 class="text-center mb-4 text-light">Register</h4>
                <form method="post" id="registerFormId">
                    <div class="mt-3">
                        <input class="form-control" type="email" name="r-email" placeholder="Enter Email" autocomplete="r-email" required />
                        <p class="error text-start" id="email-error"></p>
                    </div>
                    <div class="mt-3">
                        <input class="form-control" type="text" name="r-username" placeholder="Enter Username" autocomplete="r-username" required />
                        <p class="error text-start" id="username-error"></p>
                    </div>
                    <div class="mt-3">
                        <input class="form-control" type="password" name="r-password" placeholder="Enter Password" autocomplete="r-password" required />
                        <p class="error text-start" id="password-error"></p>
                    </div>
                    <div class="mt-3">
                        <input class="form-control" type="password" name="r-cpassword" placeholder="Confirm Password" autocomplete="r-cpassword" required />
                        <p class="error text-start" id="cpassword-error"></p>
                    </div>
                    <p class="text-start mt-1 text-light">Already a user? <a id="loginLink" class="text-white" style="cursor:pointer">Login</a></p>
                    <input type="submit" id="registerBtn" class="btn btn-primary my-2" name="submit" value="Register" />
                </form>
            </div>
        </div>
    </div>



    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Include DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#registerLink").on('click', function(e) {
                $("#loginBox").css("display", "none");
                $("#registerBox").css("display", "block");
            });
            $("#loginLink").on('click', function(e) {
                $("#registerBox").css("display", "none");
                $("#loginBox").css("display", "block");
            });

            $('#registerBtn').on('click', function(e) {
                e.preventDefault();
                var data = $('#registerFormId').serialize();
                // alert(data)
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('/register'); ?>', // routes name use
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        // console.log(response.status); return;
                        if (response.status) {
                            Swal.fire({
                                title: response.message,
                                icon: "success",
                            });

                            $("#registerFormId")[0].reset();
                            $("#registerBox").css("display", "none");
                            $("#loginBox").css("display", "block");
                        } else {

                            let msgUsername = response.message['r-username'] || response.message;
                            let msgEmail = response.message['r-email'];
                            let msgPassword = response.message['r-password'];
                            let msgCpassword = response.message['r-cpassword'];
                            $('#username-error').html(msgUsername);
                            $('#email-error').html(msgEmail);
                            $('#password-error').html(msgPassword);
                            $('#cpassword-error').html(msgCpassword);
                            setTimeout(function() {
                                $('#username-error').html('');
                                $('#email-error').html('');
                                $('#password-error').html('');
                                $('#cpassword-error').html('');
                            }, 3000);
                            
                        }
                        
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: error,
                            footer: '<a href="#"></a>'
                        });
                        

                    }
                });
            });

            $('#loginBtn').on('click', function(e) {
                e.preventDefault();
                var data = $('#loginFormId').serialize();
                // alert(data)
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('/login/authenticate'); ?>', // routes name use
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        if (response.status) {
                            Swal.fire({
                                title: response.message,
                                icon: "success",
                            });
                              
                            window.location.href="/dashboard";
                            $("#loginFormId")[0].reset();
                        } else {
                            
                            let msgEmail = response.message['email'];
                            let msgPassword = response.message['password'];
                            if(msgEmail !=null || msgPassword !=null){

                                $('#email-login-error').html(msgEmail);
                                $('#password-login-error').html(msgPassword);
                                setTimeout(function() {
                                    $('#email-login-error').html('');
                                    $('#password-login-error').html('');
                                }, 3000);

                            }else{
                                Swal.fire({
                                    title: response.message,
                                    icon: "error",
                                });

                            }

                        }
                    }
                });
            });
        });


            



    </script>

</body>

</html>