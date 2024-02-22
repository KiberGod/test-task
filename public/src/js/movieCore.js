let genresName = [];
let genresId = [];
let genresInputCounter = 0;

function setGenres(name, id) {
    genresName.push(name);
    genresId.push(id);
}

function createGenresInput(){
    let containerId = "genr_" + String(genresInputCounter);
    let selectElement = document.createElement('select');
    selectElement.name = "genre_" + String(genresInputCounter);
    selectElement.id = "genre_" + String(genresInputCounter);

    for (let i = 0; i < genresName.length; i++) {
        const optionElement = document.createElement("option");
        optionElement.value = genresId[i];
        optionElement.text = genresName[i];
        selectElement.appendChild(optionElement);
    }

    const buttonElement = document.createElement("button");
    buttonElement.textContent = "-"
    buttonElement.classList = "btn btn-outline-danger";
    buttonElement.addEventListener("click", (event) => {
        event.preventDefault();
        document.getElementById(containerId).remove();
    });

    let containerElement = document.createElement("div");
    containerElement.id = containerId;
    containerElement.appendChild(selectElement);
    containerElement.appendChild(buttonElement);
    containerElement.classList = "d-inline";

    document.getElementById('insertInputPlace').after(containerElement);
    genresInputCounter = genresInputCounter + 1;
}

function setOldGenresInput(id){
    createGenresInput();

    let selectId = "genre_" + String(genresInputCounter-1);

    let selectElement = document.getElementById(selectId);
    let options = selectElement.options;
    for (let i = 0; i < options.length; i++) {
        if (options[i].value === id) {
            options[i].selected = true;
        }
    }
}
