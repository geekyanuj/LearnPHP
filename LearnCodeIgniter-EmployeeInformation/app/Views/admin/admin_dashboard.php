<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Employee Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/dashboard_style.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="hero">
    <header>
        <nav class="nav d-flex justify-content-between align-items-center position-relative w-100 ">
                <img class="logo" src="<?php echo base_url('assets/logo.png') ?>" alt="logo">
                <ul class="list-unstyled w-75 text-end">
                    <li><a href="">Home</a></li>
                    <li><a href="">About Company</a></li>
                    <li><a href="">Contact HR</a></li>
                    <li><a href="">Attendance</a></li>
                </ul>
                <img class="user-pic" src="<?php echo base_url('assets/male.png') ?>" alt="user-pic">
                <div class="sub-menu-wrap">
                    <div class="sub-menu">
                        <div class="user-info">
                            <img class="user-pic-img" src="<?php echo base_url('assets/male.png') ?>" alt="user-pic">
                            <h4><?php $session= session(); echo $session->get('username') ?></h4>
                        </div>
                        <hr>
                        <a href="" class="sub-menu-link">
                            <i class="bi bi-person"></i>
                            <p>Edit Profile</p>
                            <span>></span>
                        </a>
                        <a href="" class="sub-menu-link">
                            <i class="bi bi-gear"></i>
                            <p>Setting & Privacy</p>
                            <span>></span>
                        </a>
                        <a href="" class="sub-menu-link">
                            <i class="bi bi-box-arrow-right"></i>
                            <p>Logout</p>
                            <span>></span>
                        </a>
                    </div>
                </div>
        </nav>
    </header>
    <div class="container justify-content-center align-items-center">
        <h2>Welcome <span id="username"><?php  echo $session->get('username') ?></span></h2>
        <div class="row">
                <div class="box col-sm-3 align-items-center d-flex flex-column text-light">
                    <i class="bi bi-people-fill fs-2"></i>
                    <p class="m-0">Total Employees</p>
                    <h5>50</h5>
                </div>
                <div class="box col-sm-3 align-items-center d-flex flex-column text-light">
                    <i class="bi bi-people-fill fs-2"></i>
                    <p class="m-0">Teams</p>
                    <h5>50</h5>
                </div>
                <div class="box col-sm-3 align-items-center d-flex flex-column text-light">
                    <i class="bi bi-people-fill fs-2"></i>
                    <p class="m-0"> Reports & Analytics</p>
                    <h5>50</h5>
                </div>
                <div class="box col-sm-3 align-items-center d-flex flex-column text-light">
                    <i class="bi bi-people-fill fs-2"></i>
                    <p class="m-0">Notifications & Alerts</p>
                    <h5>50</h5>
                </div>
            
            </div>
            <div class="">
                <a href="/logout">Logout</a>
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
</body>

</html>