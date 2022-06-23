<!DOCTYPE html>
<html lang="en">
<?php include 'head.html'?>
<body>
<?php
include "sampDAL.php";
 include 'header.html'?>
<?php include 'nav.html'?>

<div class="container mt-5">
    <?php include 'left.html';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $desc = $_REQUEST['desc'];
  $price = $_REQUEST['price'];
  if (empty($desc)) {
    echo "Name is empty";
  } else {

    $sql = "INSERT INTO `products` (`desc`,`price`)VALUES('$desc',$price);";
    echo executeSQL($sql)?  "true": "false";

  }
}
    
    include 'right.html'?>
</div>
</div>
<?php 
include 'footer.html';
?>
</body>
</html>
