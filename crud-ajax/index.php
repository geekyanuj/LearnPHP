<!DOCTYPE HTML>
<html>

<head>
    <title>CRUD Operation in PHP</title>

    <!-- Include DataTables CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">







</head>

<body>
    <!-- Add student -->
    <div class="container d-flex flex-column justify-content-center align-items-center mt-2">
        <div class="row border text-center shadow px-2 pe-3 pt-3">
            <h4>Add Student</h4>
            <div class="col">
                <form action="add.php" method="post" id="formId">
                    <div class="input-container mt-2 p-2">
                        <label class="p-2">Name: </label>
                        <input type="text" name="name" id="name" class="rounded-1"><br>
                    </div>
                    <div class="input-container mt-2 p-2">
                        <label class="p-2">E-mail: </label>
                        <input type="email" name="email" id="email" class="rounded-1" required><br>
                    </div>
                    <div class="input-container mt-2 p-2">
                        <input id="submitButton" type="submit" class="btn-primary btn">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="updateStudentModal" tabindex="-1" aria-labelledby="updateStudentLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateStudentLabel">Update Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row border text-center shadow px-2 pe-3 pt-3">
                        <div class="col">
                            <form action="update.php" method="post" id="updateFormId">
                                <div class="input-container mt-2 p-2">
                                    <label class="p-2">Name: </label>
                                    <input type="text" name="name" id="u-name" class="rounded-1"><br>
                                </div>
                                <div class="input-container mt-2 p-2">

                                    <input type="text" name="id" id="id" class="rounded-1"><br>
                                </div>

                                <div class="input-container mt-2 p-2">
                                    <label class="p-2">E-mail: </label>
                                    <input type="email" name="email" id="u-email" class="rounded-1" required><br>
                                </div>
                                <div class="input-container mt-2 p-2">
                                    <input id="updateButtonbtn" name="update" type="submit" class="btn-primary btn" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="container border px-5 mt-2 shadow justify-content-center align-items-center">
        <div class="mt-5">
            <h4>Your Students :</h4>
            <table class="table table-striped table-hover border" id="dataTable">
                <thead class="border">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Created_At</th>
                        <th scope="col" colspan="2" class="text-center justify-content-center">Action</th>
                    </tr>
                </thead>

            </table>
        </div>
    </div>
</body>


<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- Include DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    // showing all reccords to table
    $(document).ready(function() {
        var table = $('#dataTable').DataTable({
            "ajax": {
                "url": "get.php",
            },
            "columns": [{
                    "data": "id"
                },
                {
                    "data": "name"
                },
                {
                    "data": "email"
                },
                {
                    "data": "created_at"
                },
                {
                    "data": null,
                    "render": function(data, type, row) {
                        return '<button id="updateButton" class="btn btn-warning text-center" data-bs-toggle="modal" data-bs-target="#updateStudentModal" onclick=getData(' + row.id + ');>Edit</button> <button type="submit" class="btn btn-danger delete" id="delete" data-id='+ row.id +'>Delete</button>';
                    }
                }
            ],
            "columnDefs": [{
                "className": "dt-center",
                "targets": "_all"
            }]
        });
    });



    // <!-- Adding data using ajax -->
    $(document).ready(function() {
        $("#submitButton").click(function(event) {
            event.preventDefault(); // Prevent default form submission

            let form = $("#formId");
            let url = form.attr('action');
            let table = $('#dataTable').DataTable();


            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // Serialize form data
                success: function(data) {

                    table.ajax.reload();
                    alert("Form Submitted Successfully");
                    form[0].reset();
                },
                error: function(data) {
                    alert("Error occurred while submitting the form");
                }
            });
        });
    });




    // Retrieving and updating the data
    function getData(id) {
        // console.log("id",id);
        // let form = $("#updateFormId");
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: 'edit.php',
                data: {
                    "id": id,
                },
                dataType: "JSON",
                success: function(response) {
                    // console.log(response[0]);
                    var id = $('#id').val(response[0]);
                    var name = $('#u-name').val(response[1]);
                    var email = $('#u-email').val(response[2]);
                    
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', error);
                }

            });
        });
    }


    $(document).ready(function() {
        let form = $("#updateFormId");
        let url = form.attr('action');
        let id = form.attr('data-id');
        let table = $('#dataTable').DataTable();
        $("#updateButtonbtn").click(function(event) {
            event.preventDefault(); // Prevent default form submission

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // Serialize form data
                success: function(data) {

                    table.ajax.reload();
                    alert("Update Successfully");
                    form[0].reset();
                    $('#updateStudentModal').modal('hide');
                },
                error: function(data) {
                    alert("Error occurred while submitting the form");
                }
            });
        });
    });


    //deleting the data --- another way of getting id from each row
    $(document).ready(function() {
        $("body").on("click","#delete",function(event){
            let table = $('#dataTable').DataTable();
            let id = $(this).attr('data-id');
            // alert(id);
            // console.log(id);
            event.preventDefault(); // Prevent default form submission

            if(confirm("Are you sure want to delete id : "+id)){
                $.ajax({
                    type: "POST",
                    url: 'delete.php',
                    data: {
                        "id": id,
                    },
                    dataType: "JSON",
                    success: function(data) {
    
                        alert(data["message"]);
                        table.ajax.reload();
                    },
                    error: function(data) {
                        alert(data["message"]);
                    }
                });

            }


        });
    });


    
</script>



</html>