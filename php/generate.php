<?php
session_start();

// $namequery = "SELECT ingredient_name FROM ingredient WHERE ingredient_id = ". $_GET['ing'];
// $ingredientId = "SELECT * FROM recipe_ingredient WHERE ingredient_id = ". $_GET['ing'];

$list = $_SESSION["ingredientList"];
$valid = "SELECT recipe_name FROM Recipe";

$table = "SELECT * FROM Recipe
LEFT JOIN recipe_ingredient ON Recipe.recipe_id=recipe_ingredient.recipe_id
LEFT JOIN ingredient ON ingredient.ingredient_id=ingredient.ingredient_id";
//WHERE ingredient.ingredient_name IN ($condition)";
//LEFT JOIN recipe_ingredient ON ingredient_id";
//$joined = "SELECT * FROM recipe JOIN $ings ON recipe_id";
//$recipes = "SELECT recipe_name FROM $joined WHERE ingredient IN ($condition)";

//recipes = "SELECT * FROM ". $joined WHERE ingredient IN ". $list)";
// foreach ($list as $ingredient) {
//     //$ingid = "SELECT ingredient_id FROM ingredient WHERE ingredient_name =" $ingredient;
//     //$associated_recipes = "SELECT * FROM recipe_ingredient WHERE ingredient_id =" $ingid;
//     $name = "SELECT ingredient_id FROM ingredient WHERE ingredient_name = ". $ingredient;
//
//     echo "Ingredient is " . $ingredient . ".<br>";
//     echo "Ingredient name is " . $name . ".<br>";
//
// }

//session_unset();
// Create connection
$conn = new mysqli('localhost', 'root', 'inst377', 'Recipedatabase');
// Check connection
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error());

$step = $conn->query($table);
$to_display = $valid.
if ($step->num_rows > 0) {
    // output data of each row
    while($row = $step->fetch_assoc()) {
      //echo $row["ingredient_name"];
        // if (in_array($row["ingredient_name"], $list)) {
        //    echo "recipe name: " . $row["recipe_name"] . " ingredient id: " . $row["ingredient_name"] . ".<br>";
        // }
        $ingredient = $row["ingredient_name"];
        $recipe_name = $row["recipe_name"];

        if (in_array($ingredient, $list) == FALSE) {
           unset($valid['recipe_name'][$recipe_name]);
        }
    }
}

// $finaltable = $conn->query($joined);
// $recipes = $conn->query($recipes);
// $matches = array($recipes);
//
// if ($recipes->num_rows > 0) {
//     // output data of each row
//     while($row = $recipes->fetch_assoc()) {
//         echo "recipe id: " . $row["recipe_id"] . ".<br>";
//     }
// }

//print_r($_SESSION);

$conn->close();
?>
