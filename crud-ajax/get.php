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


$response = "SELECT * FROM students";
$result = mysqli_query($connection, $response);

// if ($result) {
//     $data = array();
//     foreach ($result as $value) {
//         $data[] = $value['id'];
//         $data[] = $value['name'];
//         $data[] = $value['email'];
//         $data[] = $value['created_at'];
//     }
//     $output= array("data" => $data);
//     header('Content-type:application/json');
//     echo json_encode($output);
//     // print_r($data);
// }

if ($result) {
    $data = array();
    while ($value = mysqli_fetch_assoc($result)) {
        $data[] = array(
            'id' => $value['id'],
            'name' => $value['name'],
            'email' => $value['email'],
            'created_at' => $value['created_at']
        );
    }
    $output = array('data' => $data);
    header('Content-type: application/json');
    echo json_encode($output);
} else {
    echo json_encode(array('error' => 'Query failed'));
}





        
?>