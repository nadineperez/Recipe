<?php
// Create connection
$conn = new mysqli('ec2-18-232-114-144.compute-1.amazonaws.com', 'root', 'inst377', 'Recipedatabase');
$sql = "SELECT ingredient_name FROM ingredient";

// Check connection
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error());

//$sql = "SELECT ingredient_name FROM ingredient";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ingredient name: " . $row["ingredient_name"];
    }
} else {
    echo "0 results";
}
$conn->close();
?>
