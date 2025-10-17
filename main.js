const textbox = document.querySelector("input");
const button = document.querySelector("button");

async function fetchRecipe(Recipe) {
    const response = await fetch(`https://www.themealdb.com/api/json/v1/1/search.php?s=${Recipe.toLowerCase()}`);
    const data = await response.json();
    console.log(data);
    sessionStorage.setItem('recipeData', JSON.stringify(data.meals[0]));
    const formattedName = encodeURIComponent(data.meals[0].strMeal);
    window.location.href = `recipe`;
}

button.addEventListener("click", () => {
    const searchTerm = textbox.value;
    console.log(searchTerm);
    fetchRecipe(searchTerm);
});

textbox.addEventListener("keyup", function(event) {
    if (event.key === "Enter") {
        const searchTerm = textbox.value;
        console.log(searchTerm);
        fetchRecipe(searchTerm);
    }
});