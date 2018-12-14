<?php
session_start();
$namequery = "SELECT ingredient_name FROM ingredient WHERE ingredient_id = ". $_GET['ing'];
$list = $_SESSION["ingredientList"];
// Create connection
$conn = new mysqli('localhost', 'root', 'inst377', 'Recipedatabase');

// Check connection
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error());
$result = $conn->query($namequery);

echo $list;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ingredient name: " . $row["ingredient_name"] . ".<br>";
    }
}

// for ($x = 0; $x <= 2; $x++) {
//     echo "Ingredient is " . $_SESSION["ing" . $x] . ".<br>";
// }

foreach ($list as $value) {
    echo "Ingredient is " . $value . ".<br>";
}

print_r($_SESSION);

$conn->close();
?>
