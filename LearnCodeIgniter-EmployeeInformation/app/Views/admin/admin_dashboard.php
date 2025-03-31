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

<body>
    <header>
        <nav class="nav justify-content-between align-items-center">
            <div class="nav-icons ps-2">
                <i class="bi bi-list fs-1 text-light"></i>
            </div>
            <div class="logo p-1 w-50"> 
                <img class="" src="<?php echo base_url('assets/logo.png') ?>" alt="logo">
            </div> 
            <div class="nav-icons">
                <i class="bi bi-building fs-2 text-light mx-3 cursor-pointer"></i>
                <i class="bi bi-calendar3 fs-2 text-light mx-3 cursor-pointer"></i>
            </div>
            <div class="profile-section me-2 ">
                <div class="img-icon-profile">
                    <img class="profileImg" src="<?php echo base_url('assets/male.png')?>" alt="user">
                </div>    
            </div>
        </nav>
    </header>
    <div class="container justify-content-center align-items-center vh-100">
        <h2>Welcome <span id="username"><?php echo $username ?></span></h2>
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
                <div class="box col-sm-3">
                    
                </div>
                <div class="box col-sm-3">
                    
                </div>
                <div class="box col-sm-3">
                    
                </div>
            
            <div class="col-sm-12">
            <a href="/admin/logout">Logout</a>
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
</body>

</html>