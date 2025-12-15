const searchtext = document.querySelector('.top-center p');



const optionsButton = document.querySelector('.search-options .options-button');


const optionButtons = document.querySelectorAll('.search-options .option-button');


optionsButton.addEventListener('click', () => {


    optionButtons.forEach(btn => {


        btn.classList.toggle('hidden');


    });


});





optionButtons.forEach(btn => {


    btn.addEventListener('click', () => {


        const selectedEngine = btn.getAttribute('data-engine');


        if (!selectedEngine) {


            let v = prompt("Please give a max result limit.");


            if (!isNaN(v)) {


                localStorage.setItem('resultLimit', v);


            }


            optionButtons.forEach(b => b.classList.add('hidden'));


            return;


        };


        localStorage.setItem('searchEngine', selectedEngine);


        optionButtons.forEach(b => b.classList.add('hidden'));


        searchtext.textContent = `Search using ${localStorage.getItem('searchEngine') || 'wikipedia'}`;


    });


});





searchtext.textContent = `Search using ${localStorage.getItem('searchEngine') || 'wikipedia'}`;