<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1></h1>
    <p></p>
    <script>
        const recipeData = JSON.parse(sessionStorage.getItem('recipeData'));

        if (recipeData) {
            console.log(recipeData); // full object
            document.querySelector('h1').textContent = recipeData.strMeal;
            document.querySelector('p').textContent = recipeData.strInstructions;
            // Populate other fields like recipeData.strInstructions, etc.
        } else {
            console.log("No recipe data found in sessionStorage.");
        }
    </script>
</body>
</html>