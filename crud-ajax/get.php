<?php

include("connection.php");


// $readSql = "SELECT * FROM students";
// $query_run = mysqli_query($connection, $readSql);
// $result_array = [];
// if(mysqli_num_rows($query_run) > 0){
//     foreach($query_run as $row){
//         array_push($result_array, $row);
//     }
//     header('Content-type: application/json');
//     echo json_encode($result_array);
// }else{
//     echo $return = "<h4>No Record Found</h4>";
// }


$sql = "SELECT * FROM students";
$resultset = mysqli_query($connection, $sql) or die("database error:" . mysqli_error($conn));
$data = array();
while ($rows = mysqli_fetch_assoc($resultset)) {
    $data[] = $rows;
}
// $results = array(
//     "iTotalRecords" => count($data),
//     "aaData" => $data
// );
// echo json_encode($results);


$results = array(
    // "draw" => isset($_GET['draw']) ? intval($_GET['draw']) : 0, // DataTables draw counter
    "recordsTotal" => count($data), // Total records without filter
    "recordsFiltered" => count($data), // Total records after filter
    "data" => $data // The filtered data
);
echo json_encode($results);