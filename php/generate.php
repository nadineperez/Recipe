<?php
session_start();

// $namequery = "SELECT ingredient_name FROM ingredient WHERE ingredient_id = ". $_GET['ing'];
// $ingredientId = "SELECT * FROM recipe_ingredient WHERE ingredient_id = ". $_GET['ing'];

$list = $_SESSION["ingredientList"];

// foreach($list as $key => $value) {
//    $strlist .'. $value  .',;
// }
// substr_replace($strlist ,"", -1);
// echo ($strlist);

$valid = "SELECT recipe_name FROM Recipe";

$table = "SELECT * FROM Recipe
LEFT JOIN recipe_ingredient ON Recipe.recipe_id=recipe_ingredient.recipe_id
LEFT JOIN ingredient ON ingredient.ingredient_id=ingredient.ingredient_id";


//session_unset();
// Create connection
$conn = new mysqli('localhost', 'root', 'inst377', 'Recipedatabase');
// Check connection
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error());

$step = $conn->query($table);
$to_display = $conn->query($valid);

$recipearray = Array();
while($result = $to_display->fetch_assoc()){
   $recipearray[] = $result["recipe_name"];
}
$uniquerecipes = array_unique($recipearray);

if ($step->num_rows > 0) {

    // output data of each row
    while($row = $step->fetch_assoc()) {

        $ingredient = $row["ingredient_name"];
        $recipe_name = $row["recipe_name"];

        echo "ingr" . $ingredient[0] + "rec" . $recipe_name[0];

        // if (in_array($ingredient, $list) == FALSE) {
        //    //unset($uniquerecipes[$recipe_name]);
        //    //$uniquerecipes= array_flip($uniquerecipes)
        //    if (($key = array_search($recipe_name, $uniquerecipes)) !== false) {
        //      echo "key " + $key
        //     unset($uniquerecipes[$key]);
        //     }
        // }
    }
}
$conn->close();
?>
