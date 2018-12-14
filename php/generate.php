<?php
session_start();

$list = $_SESSION["ingredientList"];

$filtered_ingredients = "SELECT * FROM recipe_ingredient
LEFT JOIN ingredient
ON ingredient.ingredient_id = recipe_ingredient.ingredient_id
WHERE ingredient_name IN ('Paprika', 'Salt', 'Onion')";

$valid_recipes = "SELECT * FROM Recipe";

$all_recipe_ids = "SELECT recipe_id FROM recipe_ingredient";
//LEFT JOIN ingredient ON ingredient.ingredient_id=ingredient.ingredient_id";


//session_unset();
// Create connection
$conn = new mysqli('localhost', 'root', 'inst377', 'Recipedatabase');
// Check connection
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error());

$step = $conn->query($filtered_ingredients);
$all_recipe = $conn->query($all_recipe_ids);
$valid_recipe = $conn->query($valid_recipes);

// $recipearray = Array();
// while($result = $to_display->fetch_assoc()){
//    $recipearray[] = $result["recipe_name"];
// }
// $uniquerecipes = array_unique($recipearray);
$available_ingredients = array();
$required_ingredients = array();
$recipes_to_suggest = array();

foreach ($all_recipe as $rec) {
   $index = $rec["recipe_id"];
   $required_ingredients[$index]++;
   //echo $rec["recipe_id"] . "<br>";
}

if ($step->num_rows > 0) {

    // output data of each row
    while($row = $step->fetch_assoc()) {
      $ingredient = $row["ingredient_name"];
      //$recipe_name = $row["recipe_name"];
      $ingredient_id = $row["ingredient_id"];
      $recipe_id = $row["recipe_id"];

      $available_ingredients[$recipe_id]++;
    }
}
print_r($required_ingredients) . "<br />";
print_r($available_ingredients) . "<br />";

for ($x = 0; $x <= count($required_ingredients); $x++) {
   if ($required_ingredients[$x] == $available_ingredients[$x]) {
      array_push($recipes_to_suggest, $required_ingredients)
   }
}
echo "Recipes to suggest: "
print_r($recipes_to_suggest) . "<br />";

$conn->close();
?>
