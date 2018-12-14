<?php
session_start();

// $namequery = "SELECT ingredient_name FROM ingredient WHERE ingredient_id = ". $_GET['ing'];
// $ingredientId = "SELECT * FROM recipe_ingredient WHERE ingredient_id = ". $_GET['ing'];
$list = $_SESSION["ingredientList"];
print_r($list);

//session_unset();
// Create connection
$conn = new mysqli('localhost', 'root', 'inst377', 'Recipedatabase');

// Check connection
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error());

foreach ($list as $ingredient) {
    echo "Ingredient is " . $ingredient . ".<br>";

    $ingid = "SELECT ingredient_id FROM recipe_ingredient WHERE ingredient_name = $ingredient;

    $associated_recipes = "SELECT * FROM recipe_ingredient WHERE ingredient_id = $ingid;
    if ($associated_recipes->num_rows > 0) {
        // output data of each row
        while($row = $associated_recipes->fetch_assoc()) {
            echo "recipe id: " . $row["recipe_id"] . ".<br>";
        }
    }
}



//$recipes = $conn->query($ingredientId);

// if ($ingredient->num_rows > 0) {
//     // output data of each row
//     while($row = $ingredient->fetch_assoc()) {
//         echo "ingredient name: " . $row["ingredient_name"] . ".<br>";
//     }
// }

// if ($recipes->num_rows > 0) {
//     // output data of each row
//     while($row = $recipes->fetch_assoc()) {
//         echo "associated recipe: " . $row["recipe_id"] . ".<br>";
//     }
// }



//print_r($_SESSION);

$conn->close();
?>
