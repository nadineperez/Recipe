<?php

$namequery = "SELECT ingredient_name FROM ingredient WHERE ingredient_id = ". $_GET['ing'];
// Create connection
$conn = new mysqli('localhost', 'root', 'inst377', 'Recipedatabase');

// Check connection
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error());
$result = $conn->query($namequery);

//$sql = "SELECT ingredient_name FROM ingredient";
// $result = $conn->query($namequery);
//
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ingredient name: " . $row["ingredient_name"];
    }

   // echo $namequery;

$conn->close();
?>
