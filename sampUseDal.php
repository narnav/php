<?php
//log - basic only
include "log.php";

//CORS
header("Access-Control-Allow-Origin: *");
header('content-type: application/json');

//my DB functions
include "DAL.php";



//Result [{"id":"14","name":"ttt","tel":"777"},{"id":"16","name":"mmmm","tel":"123"}]
//get all/single
if($_SERVER["REQUEST_METHOD"] == "GET")
{
    //call samp
    //http://127.0.0.1/first/index.php?id=16
    //get single    
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $sql = "SELECT * from students where id=$id";
    }
    //get all
    else{
        $sql = "SELECT * from students";
    }

    $result =executeSQLWithResult($sql);    

    while($row = $result->fetch_assoc()) {
        $newArr[] = $row;
    }
    echo json_encode($newArr); // get all students in json format.
}


//data structure
// {
//     "name":"abc",
//     "tel":"123"
// }
//Post http://127.0.0.1/first/
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data = json_decode(file_get_contents('php://input'), true);
    // echo "my test:". file_get_contents('php://input');

    $data = file_get_contents('php://input');
    $dataObj = json_decode( $data);
    $tel = $dataObj->tel;
    $name = $dataObj->name;

    $sql = "INSERT INTO `students` (`name`,`tel`)VALUES('$name','$tel');";
    echo executeSQL($sql)?  "true": "false";
}


//data structure
// {
//     "id":"19",
//     "name":"mmmmmmmmmmmmmmmmmmmmmmm",
//     "tel":"123"
// }

//Put - Update
if ($_SERVER['REQUEST_METHOD'] === 'PUT') { 

    $data = file_get_contents('php://input');
    $dataObj = json_decode( $data);
    $tel = $dataObj->tel;
    $name = $dataObj->name;
    $id=$dataObj->id;

    $sql = "UPDATE `students` SET `name` = '$name',`tel` = '$tel' WHERE `id` = $id;";
    echo executeSQL($sql)?  "true": "false";
}

// //data stucture
// // {
// //     "id":"18"
// // }
// //Delete
if($_SERVER["REQUEST_METHOD"] == "DELETE")
{
    echo "start";
    // $data = file_get_contents('php://input');
    // $dataObj = json_decode( file_get_contents('php://input'));
    // $id=$dataObj->id;

    // $sql = "DELETE from `students`  WHERE `id` = '$id';";
    // echo executeSQL($sql)?  "true": "false";
    echo "end";
}
?>