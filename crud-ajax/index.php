<!DOCTYPE HTML>
<html>

<head>
    <title>CRUD Operation in PHP</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
</head>

<body>
    <div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 70vh;">
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


        <div class="mt-5">
            <table class="table table-striped table-hover" id="dataTable">
                <table class="table table-striped table-hover" id="dataTable">
                <thead class="border">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Created_At</th>
                        <!-- <th scope="col" colspan="2">Action</th> -->

                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    // <!-- Retrieving data using ajax  -->
    $(document).ready(function() {
        $.noConflict();
        var id = $('id').val();
        var name = $('#name').val();
        $('#dataTable').DataTable({
            "processing": true,
            " serverSide": true,
            "ajax": {
                url: 'get.php',
                type: "POST",
                dataType: 'html',
                data: {
                    id : id,
                    name: name,
                },
                success: function(data) {
                }
            },
        });

    });
    // <!-- Adding data using ajax -->
    $(document).ready(function() {
        $("#submitButton").click(function(event) {
            event.preventDefault(); // Prevent default form submission

            let form = $("#formId");
            let url = form.attr('action');
            let table = $('#data');

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // Serialize form data
                success: function(data) {
                    alert("Form Submitted Successfully");

                    getdata();
                },
                error: function(data) {
                    alert("Error occurred while submitting the form");
                }
            });
        });
    });
</script>

</html>