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
        <nav class="nav align-items-center w-100">
            <div class="logo p-2"> 
                <img class="" src="<?php echo base_url('assets/logo.png') ?>" alt="logo">
            </div> 
            <i class="bi bi-list fs-1"></i>
            <h4 class="pt-2 ps-5">ATYPICAL SOFTWARE PVT LTD</h4>
            <div class="nav-icons">
                <i class="bi bi-building fs-2 primary_color"></i>
            </div>
            <div class="profile-section w-100 d-flex justify-content-end">
                <img class="w-25 h-75 rounded" src="<?php echo base_url('assets/male.png')?>" alt="user">
            </div>
            
        </nav>
    </header>
    <div class="container justify-content-center align-items-center vh-100 bg-dark">
        <div class="row">
            <div class="col-sm-6">
                <h2>Welcome <span id="username"><?php echo $username ?></span></h2>

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