<?php
   session_start();
   // Set session variables
   $_SESSION["favcolor"] = "ingredientList";
   $_SESSION["favanimal"] = ingredientList;
   echo "Session variables are set.";
   $list = $_GET['ingredientList'];
   $list2 = $_GET['ingredientList'];

   echo $list;
   //$conn = new mysqli('localhost', 'root', 'inst377', 'Recipedatabase');
?>
<html>
<head>
   <title>Find a recipe!</title>
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

</head>
<body style="background-color: rgb(255, 255, 255)">
   <!-- Wrapper -->
   <div id="wrapper">
      <!-- Main -->
   <div id="main">
   <p>&ensp;</p>
   <a href=index.html>
      <img src = "http://thymeinthekitchenevv.com/wp-content/uploads/fall-food-cooking-class-evansville-in.jpg" class="center" id="logo"></a>
      <div class="inner">
      <!-- Header -->
      <header id="header">
      <!-- Banner -->
      <section id="banner" style="padding: 2em 0 0em 0 ;">
         <div style=" margin:0 auto;">


      <!--autocomplete-->
      <div class="Main ingredientInput">
        <h1 style="color:black;">Find a recipe!</h1>
        <div id="submission">
           <form autocomplete="off" action="php/generate.php" method = "get">

              <div class="autocomplete" style="width:300px;">
                  <input id="input" type="text" name="myIngredient" placeholder="Ingredient">
              </div>

              <input type="reset" value="Add Ingredient" onclick="addList()">
              <div class="message" id="msg_error"></div>

              <div class="Main addedIngredients">
                <h4>Your Ingredients</h4>
                <div class="ingredients-box">
                  <div class="message" id="ingredientList"></div>
                </div>
                <br>
              </div>

              <input type="hidden" id="ing" name="ing" value="ingredientList">
              <input type="submit" value="Generate Recipe">
           </form>
        </div>

        <!-- ADDING THE INPUT INGREDIENTS INTO AN ARRAY -->
        <script>
          var addedIngredients=[];
          var addedIngredientsRaw=[];
          function addList(){
            //get value from the input text already
            var inputIngr = document.getElementById("input").value;
            if (inputIngr == ""){
               document.getElementById("msg_error").innerHTML = "You have not added any ingredients yet!";
        			return false;
            }
            else if (addedIngredientsRaw.includes(inputIngr)) {
               document.getElementById("msg_error").innerHTML = "You already added this ingredient!";
        			return false;
            }
            else {
        			document.getElementById("msg_error").innerHTML = "";
        		}

            //append data to the array
            addedIngredients.push("&nbsp;" + inputIngr);
            addedIngredientsRaw.push(inputIngr);
            var inVal = "";
            for (i=0; i< addedIngredients.length; i++){
              inVal = inVal + addedIngredients[i] + "<br>";
            }
            //display array dataset
            document.getElementById('ingredientList').innerHTML = inVal;
          }
        </script>


    </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      <!-- AUTOCOMPLE -->
      <script>
      var ingredients = ["Yellow potatoes", "Carrot", "Onion", "Cashews", "Salt",
      "Garlic powder", "Onion powder", "Nutritional yeast", "Macaroni pasta",
      "Paprika", "Ground beef", "Green bell pepper", "Tomatoes", "Tomato sauce",
      "Pepper", "Banana", "Mixed berries", "Cooked quinoa", "Almond milk",
      "Peanut butter", "Fettuccine", "Kale", "Olive Oil", "White vinegar",
      "Diced Tomatoes", "Vegetable Broth", "Cream Cheese", "Black Pepper",
      "Garlic", "Roasted Red Peppers", "Dried Basil", "Cabbage", "Bean Sprouts",
      "Celery", "Shrimp", "Egg", "Vegetable oil", "Cornstarch",
      "Egg roll wrapper", "Russet potatoes", "Aquafaba", "Brussels sprouts",
      "Mayonnaise", "Siracha", "Lemon Juice", "Green Onion", "Spinach",
      "Red bell pepper", "Sour cream", "Cumin", "Sweet potato", "Cayenne",
      "Curry powder", "Flour", "Asparagus", "Butter", "Lemon ", "Broccoli",
      "Vegetable broth", "Chives", "Cashew sour cream", "Taco seasoning",
      "Corn", "Black beans", "Cheese", "Tater tots", "Flour Tortilla",
      "Pepperoni", "Pizza Sauce", "Mozzarella Cheese Sticks", "Vanilla extract",
      "White rice", "Crabmeat", "Cucumber", "Lime", "Cilantro", "Sugar",
      "Cocoa powder", "Baking powder", "Chocolate", "Honey", "Salmon", "Soy sauce",
      "Cumin", "Oregano", "Cayenne Pepper", "Artichoke Hearts", "Chickpeas"];

      var recipe_id = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 3, 3, 3, 3,
         3, 19, 19, 19, 19, 19, 19, 19, 19, 19, 4, 4, 4, 4, 4, 20, 20, 20, 20,
         20, 20, 20, 5, 5, 5, 5, 5, 21, 21, 21, 21, 21, 21, 21, 6, 6, 6, 6, 6,
         6, 6, 6, 6, 7, 7, 7, 7, 7, 7, 7, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 9, 9,
         9, 9, 9, 9, 9, 9, 10, 10, 10, 10, 10, 10, 10, 10, 22, 22, 22, 22, 22,
         11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 13, 13, 13, 13, 13, 13, 13, 13,
         13, 12, 12, 12, 12, 12, 12, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23,
         23, 23, 23, 23];
      var ingredient_id = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 16, 17, 18, 19, 20,
         22, 23, 24, 5, 8, 26, 21, 29, 30, 25, 31, 28, 27, 3, 40, 41, 42, 5, 23,
         36, 43, 44, 5, 45, 46, 28, 51, 52, 53, 54, 23, 9, 55, 5, 56, 29, 28,
         57, 58, 59, 60, 61, 5, 15, 3, 29, 23, 11, 12, 13, 14, 15, 3, 5, 32, 33,
         34, 35, 36, 37, 38, 39, 3, 6, 15, 47, 48, 49, 50, 3, 5, 29, 43, 11, 3,
         29, 62, 63, 64, 65, 66, 67, 68, 69, 70, 37, 72, 73, 74, 75, 76, 77, 5,
         36, 3, 37, 71, 77, 78, 79, 80, 81, 36, 5, 56, 23, 29, 81, 82, 83, 30,
         23, 29, 10, 84, 85, 86, 28, 3, 72, 25, 87, 88, 26, 5, 57]

      var cloneCount = 1;

      function autocomplete(inp, arr) {
         /*the autocomplete function takes two arguments,
         the text field element and an array of possible autocompleted values:*/
         var currentFocus;
         /*execute a function when someone writes in the text field:*/
         inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) { return false;}
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
               /*check if the item starts with the same letters as the text field value:*/
               if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                  /*create a DIV element for each matching element:*/
                  b = document.createElement("DIV");
                  /*make the matching letters bold:*/
                  b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                  b.innerHTML += arr[i].substr(val.length);
                  /*insert a input field that will hold the current array item's value:*/
                  b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                  /*execute a function when someone clicks on the item value (DIV element):*/
                  b.addEventListener("click", function(e) {
                     /*insert the value for the autocomplete text field:*/
                     inp.value = this.getElementsByTagName("input")[0].value;
                     /*close the list of autocompleted values,
                     (or any other open lists of autocompleted values:*/
                     closeAllLists();
                  });
                  a.appendChild(b);
               }
            }
         });
         /*execute a function presses a key on the keyboard:*/
         inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
               /*If the arrow DOWN key is pressed,
               increase the currentFocus variable:*/
               currentFocus++;
               /*and and make the current item more visible:*/
               addActive(x);
            } else if (e.keyCode == 38) { //up
               /*If the arrow UP key is pressed,
               decrease the currentFocus variable:*/
               currentFocus--;
               /*and and make the current item more visible:*/
               addActive(x);
            } else if (e.keyCode == 13) {
               /*If the ENTER key is pressed, prevent the form from being submitted,*/
               e.preventDefault();
               if (currentFocus > -1) {
                  /*and simulate a click on the "active" item:*/
                  if (x) x[currentFocus].click();
               }
            }
         });
         function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
         }
         function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
               x[i].classList.remove("autocomplete-active");
            }
         }
         function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
               if (elmnt != x[i] && elmnt != inp) {
                  x[i].parentNode.removeChild(x[i]);
               }
            }
         }
         /*execute a function when someone clicks in the document:*/
         document.addEventListener("click", function (e) {
            closeAllLists(e.target);
         });
      }
      autocomplete(document.getElementsByTagName("INPUT")[0], ingredients);
      // for (var x = 1; x < cloneCount; x++) {
      //    autocomplete(document.getElementsByTagName("INPUT")[x], ingredients);
      // }
      </script>
   <!--autocomplete-->


</form>
</div>
</section>
</div>
</div>
</div>
<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>

<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>
</body>
</html>
