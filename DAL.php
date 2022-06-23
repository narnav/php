<?php
$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="123456";
$dbname="shop";

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM products";


function getres($sql) {
    $result = $GLOBALS['$conn']->query($sql);
    if ($result->num_rows > 0) {
        return $result;
    } 
  }

  

  while($row = getres($sql)->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["desc"].  "price" . $row["price"]. "<br>";
      }

// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo "id: " . $row["id"]. " - Name: " . $row["desc"].  "price" . $row["price"]. "<br>";
//   }
// } else {
//   echo "0 results";
// }
?>


