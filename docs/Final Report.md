# Final Report: Recipe Generator
Our final project is called Recipe Generator. The members in this group are Alex Boellner, Anny Chau, Emi Vo, Lisa Phung, and Nadine Perez. The link to our project code is https://github.com/nadineperez/Recipe, which is on Nadine’s github. We are running the server on Lisa’s VCL account with the username being lphung. 

### Information Problem
The information problem we are trying to solve is people who do not know what to cook, but have plenty of ingredients in their house. This website we have created will be the solution to this information problem. This will allow users to be able to add ingredients into our generator. Our website will then come up recipes that users could view and use to cook a delicious meal. The rationales and justifications on the system design and technology is that the system combines simplicity and all of the detailed recipes into a simple user interface.

### How we solve the problem
The final system solves the problem by having an easy to use interface that allows users to search for recipes with ingredients that they currently have. The website allows to people to search and keep track of recipes which allows the users to keep organized. This way they will not have to spend hours searching for a recipe that might ingredients that they have on end. The website also has a clear results page allowing users to see all the recipes on a single page and let them choose which one suits their taste the best.

### Challenges
One of the challenges that we faced was making additional fields when user click on “Add more ingredients” button. We were not able to figure out how to make the auto-complete function works with the additional fields. At the end, we decided to only make one input field for users. After the user click on the “Add ingredient” button, the input value will be held by a variable and displayed on the “Your ingredient” box. Another challenge was to generate the closed recipes with users’ input. Therefore, our system only provides the recipes which are matched with their ingredients input. Between this whole project, we had difficulties in developing this generator due to not enough knowledge with coding, in terms of php and etc.

### Future Work and Improvements
In our future work, we could include filtering on the recipe result list. This would include being able to filter by dietary restrictions such as vegan, vegetarian, or lactose intolerance. Future work could also mean adding an option to specify an amount of ingredients to match with recipes. For example, if you only had 3 eggs you would be able to search for recipes that specifically have 3 or less eggs in the recipe. These extensions would make the website a superior solution to the problems. Another feature in the future that could be added would be the ability to see reviews of each recipe item.

An improvement to the design of this database would be to include that though deleting a recipe will not affect the ingredients table, the possibility of deleting ingredients from the ingredients table could cause matching recipes to be deleted if they no longer have all the components listed. This would allow for less false positives where users are missing key ingredients from their dish but these ingredients would remain unknown within the database.  


