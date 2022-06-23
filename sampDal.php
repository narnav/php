<?php
//development
//please replace vars with your DB vars
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "jeru";

//production
//please replace vars with your DB vars
// $servername = "localhost";
// $username = "id16143151_narnavg";
// $password = "Abc123!@#Abc123!@#";
// $dbname = "id16143151_shopdb";



$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="123456";
$dbname="shop";



//create connection to database
function connectToDB(){
    global $host ,$user ,$password ,$dbname;

    // Create connection
    $conn = new mysqli($host, $user, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else
    {
        return $conn; 
    }
}




//excute sql and return true if success , false if failer
function executeSQL($sql){
    global $conn; 
    $conn= connectToDB();
    
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        return true;
    } else {
        $conn->close();
        return false;
    //echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


//excute sql and return true if success , false if failer
function executeSQLWithResult($sql){
    global $conn; 
    $conn= connectToDB();
    return  $conn->query($sql);
 }

//test only
function test(){
    $sql = "SELECT * from products";
    $result =executeSQLWithResult($sql);      
        
    while($row = $result->fetch_assoc()) {
        $newArr[] = $row;
    }
    echo json_encode($newArr); // get all students in json format.
}
test();
?>