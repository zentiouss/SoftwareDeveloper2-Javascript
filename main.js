const API_URL = "https://en.wikipedia.org/w/api.php?action=opensearch";

function fetchSearchResults(input, limit) {


    const fullURL = `${API_URL}&search=${input.toLowerCase()}&limit=${limit}`;


    fetch(fullURL + "&origin=*").then(response => response.json()).then(data => {


        displayWikiResults(data);


    }).catch(error => {


        console.error('Error fetching search results:', error);


    });
}
function fetchDatabaseResults(input, limit) {


    let data = `input=${input}&limit=${limit}`;





    fetch('getData.php', {


        method: 'POST',


        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },


        body: data


    })


    .then(response => response.json())


    .then(result => displayDatabaseResults(result));


};





function fetchDescription(pageTitle) {


    const descURL = `https://en.wikipedia.org/api/rest_v1/page/summary/${encodeURIComponent(pageTitle)}`;


    return fetch(descURL).then(response => response.json()).then(data => {


        return data.extract || "No description available.";


    }).catch(error => {


        console.error('Error fetching description:', error);


        return "No description available.";


    });


}





const searchInput = document.querySelector('.searchbar');


searchInput.addEventListener('keydown', (event) => {


    if (event.key === 'Enter') {


        const query = searchInput.value;


        const resultLimit = localStorage.getItem('resultLimit') || 12;


        const searchEngine = localStorage.getItem('searchEngine') || 'wikipedia';


        if (searchEngine === 'wikipedia') {


            fetchSearchResults(query, resultLimit);


        } else if (searchEngine === 'database') {


            fetchDatabaseResults(query, resultLimit);


        }


    }

});

function createRowContainer() {



    const rowdiv = document.createElement('div');


    rowdiv.classList.add('rowcontainer');


    return rowdiv;


};





function createResultContainer(title, description, link) {


    const resultdiv = document.createElement('div');


    resultdiv.classList.add('resultcontainer');


    const h2 = document.createElement('h2');


    h2.classList.add('title');


    const a = document.createElement('a');


    a.href = link || "#";


    a.textContent = title;


    h2.appendChild(a);


    const p = document.createElement('p');


    p.classList.add('description');


    p.textContent = description;


    resultdiv.appendChild(h2);


    resultdiv.appendChild(p);





    return resultdiv;


};





async function displayWikiResults(data) {


    const container = document.querySelector('.listofresults');


    container.innerHTML = '';





    // container.style.display = 'none';





    console.log(data);





    const titles = data[1];


    const links = data[3];








    for (let i = 0; i < titles.length; i += 3) {


        // Create a new row container


        const rowContainer = createRowContainer();





        // Add up to 3 results in this row


        for (let v = i; v < i + 3 && v < titles.length; v++) {


            const description = await fetchDescription(titles[v])


            const resultContainer = createResultContainer(titles[v], description, links[v]);


            rowContainer.appendChild(resultContainer);


        }





        // Add the completed row to the main container


        container.appendChild(rowContainer);


    }





    // container.style.display = 'flex';


}





async function displayDatabaseResults(data) {


    const container = document.querySelector('.listofresults');


    container.innerHTML = '';





    // container.style.display = 'none';





    console.log(data);





    for (let i = 0; i < data.length; i += 3) {


        // Create a new row container


        const rowContainer = createRowContainer();





        // Add up to 3 results in this row


        for (let v = i; v < i + 3 && v < data.length; v++) {


            const product = data[v];


            const description = product.productDescription || "No description available.";


            const resultContainer = createResultContainer(product.productName, description);


            rowContainer.appendChild(resultContainer);


        }





        // Add the completed row to the main container


        container.appendChild(rowContainer);

    }


    // container.style.display = 'flex';


}