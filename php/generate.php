<?php
session_start();

// $namequery = "SELECT ingredient_name FROM ingredient WHERE ingredient_id = ". $_GET['ing'];
// $ingredientId = "SELECT * FROM recipe_ingredient WHERE ingredient_id = ". $_GET['ing'];

$list = $_SESSION["ingredientList"];
//echo $list[0];
//echo $list[1];

// substr_replace($strlist ,"", -1);
// echo ($strlist);

//$valid_recipes = "SELECT recipe_name FROM Recipe";

$filtered_ingredients = "SELECT * FROM recipe_ingredient
LEFT JOIN ingredient
ON ingredient.ingredient_id = recipe_ingredient.ingredient_id
WHERE ingredient_name IN ('Paprika', 'Salt', 'Onion')";

$all_recipe_ids = "SELECT recipe_id FROM recipe_ingredient";
//LEFT JOIN ingredient ON ingredient.ingredient_id=ingredient.ingredient_id";


//session_unset();
// Create connection
$conn = new mysqli('localhost', 'root', 'inst377', 'Recipedatabase');
// Check connection
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error());

$step = $conn->query($filtered_ingredients);
$all_recipe = $conn->query($all_recipe_ids);

// $recipearray = Array();
// while($result = $to_display->fetch_assoc()){
//    $recipearray[] = $result["recipe_name"];
// }
// $uniquerecipes = array_unique($recipearray);

if ($step->num_rows > 0) {

    // output data of each row
    while($row = $step->fetch_assoc()) {

      echo "ingredient id: " . $row["ingredient_id"] . " recipe id: " . $row["recipe_id"] . "<br />";

      $ingredient = $row["ingredient_name"];
      //$recipe_name = $row["recipe_name"];
      $ingredient_id = $row["ingredient_id"];
      $recipe_id = $row["recipe_id"];

      foreach ($all_recipe as $rec) {
         echo "$rec['recipe_id'] <br>";
      }



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
