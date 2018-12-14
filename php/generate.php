<?php
session_start();

$list = $_SESSION["ingredientList"];
$param = trim(json_encode(array_map('strval', $list)), '[]');
$filtered_ingredients = "SELECT * FROM recipe_ingredient
LEFT JOIN ingredient
ON ingredient.ingredient_id = recipe_ingredient.ingredient_id
WHERE ingredient_name IN ($param)";
//'Paprika', 'Salt', 'Onion'
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


$available_ingredients = array();
$required_ingredients = array();
$recipes_to_suggest = array();

$recipe_names = array();
$recipe_times = array();
$recipe_links = array();

foreach ($all_recipe as $rec) {
   $index = $rec["recipe_id"];
   $required_ingredients[$index]++;
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

for ($x = 0; $x <= count($required_ingredients); $x++) {
   if ($required_ingredients[$x] == $available_ingredients[$x]) {
      array_push($recipes_to_suggest, $x);
   }
}

//rint_r($recipes_to_suggest) . "<br />";

while($row = $valid_recipe->fetch_assoc()) {
  $id = $row["recipe_id"];
  $name = $row["recipe_name"];
  $link = $row["link"];
  $time = $row["cook_time"];

  for ($x = 0; $x <= count($recipes_to_suggest); $x++) {
     if ($recipes_to_suggest[$x] == $id) {
        array_push($recipe_names, $name);
        array_push($recipe_links, $link);
        array_push($recipe_times, $time);
     }
 }
 $text = array();
 // foreach ($recipe_names as $nam) {
 //    $recipe_names[0] . " (preperation time ". $recipe_times[0]. " minutes)"
 // }
 for ($x = 0; $x <= count($recipe_names); $x++) {
    $str = $recipe_names[$x] . " (preperation time ". $recipe_times[$x]. " minutes)";
    array_push($text, $str);
 }

}


//echo "Recipes to suggest: ";
//print_r($recipe_links) . "<br />";

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Recipe Generator</title>
  <link rel="stylesheet" type="text/css" href="css/main_style.css">

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
  <link rel="stylesheet" href="assets/css/main.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!--[if lte IE 9]>
  <link rel="stylesheet" href="assets/css/ie9.css" />
  <![endif]-->
  <!--[if lte IE 8]>
  <link rel="stylesheet" href="assets/css/ie8.css" />
  <![endif]-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style>
    .txt1{
      text-align: center;
    }
    .txt2{
      margin-left: 30px;
    }
    #Banner{
      margin: center;
    }
    #test{
      background: red;
    }
    /* .result{
      width: 600px;
      margin: center;
      background: red;
    } */
	 .column {
     float: left;
	 }
	 .left {
		 width: 50%;
	 }
	 .middle {
		 width: 5%;
	 }
	 .right {
		 width: 45%;
	 }
    #matched{
      width: 550px;
      height: 300px;
      border: 1px solid black;
      padding: 20px;
      margin-left: 210px;
      overflow: auto;
    }
	</style>
</head>
<body style="background-color: rgb(255, 255, 255)">
   <!-- Wrapper -->
   <div id="wrapper">
      <!-- Main -->
   <div id="main">
   <p>&ensp;</p>
   <a href=result.html>
      <img src = "http://thymeinthekitchenevv.com/wp-content/uploads/fall-food-cooking-class-evansville-in.jpg" class="center" id="logo"></a>
      <div class="inner">
      <!-- Header -->
      <header id="header">
      <!-- Banner -->
      <div id="Banner">
      <!-- <section id="banner" style="padding: 2em 0 0em 0 ;"> -->
         <div class="test">

           <!-- Recipes that match with user's ingredients -->
           <div class="result">

             <div class="left_matching">
               <h4 class="txt1">Recipes you can make right now!</h4>

					<div id="matched">

						<div class="row">

						  <div class="column">
							  <h6 id="matching_title"><?=$text[0]?></h6>
						  </div>

						  <div class="column">
							  <a href= '<?= $recipe_links[0] ?>'>Recipe</a>
						  </div>

						</div>

                  <div class="row">

						  <div class="column">
							  <h6 id="matching_title"><?=$text[1]?></h6>
						  </div>

						  <div class="column">
							  <a href= '<?= $recipe_links[1] ?>'>Recipe</a>
						  </div>

						</div>

                  <div class="row">

						  <div class="column">
							  <h6 id="matching_title"><?=$text[2]?></h6>
						  </div>

						  <div class="column">
							  <a href= '<?= $recipe_links[2] ?>'>Recipe</a>
						  </div>

						</div>

               </div>
             </div>

             </div>
           </div>

			  <!-- <script>
	       document.getElementById('matching_title').innerHTML = names[4] + " (preperation time " + cook_times[4] + " minutes)";
				 document.getElementById('matching_link').innerHTML = "blah"
				 document.getElementById('matching_link').href = links[4]

	        </script> -->

       </div>
     </div>
    </div>
    </div>
  </div>

</body>
</html>
