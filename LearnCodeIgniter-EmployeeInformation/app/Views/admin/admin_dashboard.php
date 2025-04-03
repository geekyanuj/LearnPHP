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
            <img class="user-pic" src="<?php echo base_url('assets/male.png') ?>" alt="user-pic" onclick="toggleMenu()">
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img class="user-pic-img" src="<?php echo base_url('assets/male.png') ?>" alt="user-pic">
                        <h4><?php $session = session();
                            echo $session->get('username') ?></h4>
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
                    <a href="/logout" class="sub-menu-link">
                        <i class="bi bi-box-arrow-right"></i>
                        <p>Logout</p>
                        <span>></span>
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <div class="container justify-content-center align-items-center">
        <h2 class="mt-2">Welcome <span id="username"><?php echo $session->get('username') ?></span></h2>
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
                <h5>5</h5>
            </div>

        </div>

        <div class="table-container">
            <div class="mt-5">
                <div class="heading d-flex justify-content-between">
                    <h4 class="">Employee Details and Salary : </h4><i class="bi bi-plus-circle" data-bs-toggle="modal" data-bs-target="#addEmpModal"></i>
                </div>
                <table class="table table-striped table-hover border" id="empTable">
                    <thead class="border">
                        <tr>
                            <th scope="col">Emp Id</th>
                            <th scope="col">Username</th>
                            <th scope="col">E-mail</th>
                            <!-- <th scope="col">Password</th> -->
                            <!-- <th scope="col">Role</th> -->
                            <th scope="col">Full Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Created_At</th>
                            <th scope="col">Updated_At</th>
                            <th scope="col" class="text-center justify-content-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>


        <!-- Add Employee Modal -->
        <div class="modal fade" id="addEmpModal" tabindex="-1" aria-labelledby="addEmpModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addEmpModalLabel">Add Employee</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row text-center ">
                            <div class="col">
                                <form action="/addEmployee" method="post" id="addEmpForm">
                                    <div class="input-container mt-1 p-2">
                                        <label class="p-2">Name: </label>
                                        <input type="text" name="name" id="name" class="rounded-1" required><br>
                                    </div>
                                    <div class="input-container p-2">
                                        <label class="p-2">E-mail: </label>
                                        <input type="email" name="email" id="email" class="rounded-1" required><br>
                                    </div>
                                    <div class="input-container p-2">
                                        <label class="p-2">Username: </label>
                                        <input type="text" name="username" id="username" class="rounded-1" required><br>
                                    </div>
                                    <label>Gender :</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="others" value="others">
                                        <label class="form-check-label" for="others">Others</label>
                                    </div>
                            </div>

                            <div class="input-container mt-2 p-2">
                                <input id="addEmpBtn" name="add" type="submit" class="btn-primary btn" value="Add">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Update Employee Modal -->
        <div class="modal fade" id="updateEmpModal" tabindex="-1" aria-labelledby="updateEmpModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateEmpModalLabel">Update Employee</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row text-center ">
                            <div class="col">
                                <form action="/updateEmployee" method="post" id="updateEmpForm">
                                    <div class="input-container mt-1 p-2">
                                        <label class="p-2">Name: </label>
                                        <input type="text" name="name" id="name" class="rounded-1" required><br>
                                    </div>
                                    <div class="input-container p-2">
                                        <label class="p-2">E-mail: </label>
                                        <input type="email" name="email" id="email" class="rounded-1" required><br>
                                    </div>
                                    <div class="input-container p-2">
                                        <label class="p-2">Username: </label>
                                        <input type="text" name="username" id="username" class="rounded-1" required><br>
                                    </div>
                                    <label>Gender :</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="others" value="others">
                                        <label class="form-check-label" for="others">Others</label>
                                    </div>
                            </div>

                            <div class="input-container mt-2 p-2">
                                <input id="addEmpBtn" name="add" type="submit" class="btn-primary btn" value="Add">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Include DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    
    <!-- Include Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

    <script>
        // let subMenu = $('#subMenu');
        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            // $('#subMenu').classList.toggle("open-menu");
            subMenu.classList.toggle("open-menu");
        }
    </script>
    
    <script>
        $(document).ready(function() {
            loadEmpDataTable();
        });
        
        // showing all reccords to table
        function loadEmpDataTable(){
            // console.log("hello");
            $('#empTable').DataTable({
                processing: true,
                // serverSide: true,
                ajax: {
                    url: '<?php echo base_url('/dashboard/getAllEmpData'); ?>',
                    type: 'GET',
                    dataSrc: '', //used to convert the JSON to datatable data format
                },
                columns: [{
                        data: 'emp_id'
                    },
                    {
                        data: 'username'
                    },
                    {
                        data: 'email'
                    },
                    // {
                    //     data: 'password'
                    // },
                    // {
                    //     data: 'role'
                    // },
                    {
                        data: 'full_name'
                    },
                    {
                        data: 'gender'
                    },
                    {
                        data: 'created_at'
                    },
                    {
                        data: 'updated_at'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            
                            return '<button id="updateButton" class="btn btn-warning text-center" data-bs-toggle="modal" data-bs-target="#updateEmpModal" onclick=getDataOfEmp(' + row.emp_id + ');>Edit</button> <button type="submit" class="btn btn-danger delete" id="delete" data-id=' + row.emp_id + '>Delete</button>';
                        }
                    }
                ],
                "columnDefs": [{
                    className: 'dt-center',
                    targets: '_all'
                }]
            });
        }

        function getDataOfEmp(id){
            console.log(id);
            
        }
    </script>

</body>

</html>