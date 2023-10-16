const giornoSelect = document.getElementById("giorno");
const meseSelect = document.getElementById("mese");
const annoSelect = document.getElementById("anno");




for (let i = 1; i <= 31; i++) {
    giornoSelect.innerHTML += `<option value="${i}">${i}</option>`;
}




for (let i = 1; i <= 12; i++) {
    meseSelect.innerHTML += `<option value="${i < 10 ? '0' + i : i}">${i < 10 ? '0' + i : i}</option>`;
}




for (let i = 1920; i <= 2021; i++) {
    annoSelect.innerHTML += `<option value="${i}">${i}</option>`;
}


class CodiceCatastaleEstero {
    constructor(nome, codiceCatastale, sigla = "") {
        this.nome = nome;
        this.codiceCatastale = codiceCatastale;
        this.sigla = sigla;
    }
}


let array = [];
let input = document.getElementById("luogo_nascita");
input.addEventListener("keyup", (e) => {
    afterListener();
});


function afterListener() {
    let o = 0;
    removeElements();
    for (let i of array) {
        if (
            i.nome.toLowerCase().startsWith(input.value.toLowerCase()) &&
            input.value !== "" &&
            o < 3
        ) {
            let listItem = document.createElement("li");
            listItem.classList.add("list-items", "bg-gray-700");
            listItem.style.cursor = "pointer";
            listItem.addEventListener("click", () => {
                displayNames(i.nome, i.sigla, i.codiceCatastale);
            });
            let word;
            if (i.sigla !== "") {
                word = i.nome + " (" + i.sigla + ")";
            } else {
                word = i.nome;
            }
            listItem.innerHTML = word;
            document.querySelector(".list").appendChild(listItem);
            o++;
        }
    }
}


function displayNames(nome, sigla, codice) {
    if (sigla !== "") {
        input.value = nome + " (" + sigla + ")";
    } else {
        input.value = nome;
    }
    removeElements();
}


function removeElements() {
    let items = document.querySelectorAll(".list-items");
    items.forEach((item) => {
        item.remove();
    });
}


async function comuni() {
    fetch('codiciCatastali/statiesteri.json')
        .then(response => response.json())
        .then(json => {
            for (let key in json) {
                if (json.hasOwnProperty(key)) {
                    let item = json[key];
                    array.push(new CodiceCatastaleEstero(item.nome, item.codice));
                }
            }
        })
        .then(() => {
            fetch('codiciCatastali/comuni.json')
                .then(response => response.json())
                .then(json => {
                    for (let key in json) {
                        if (json.hasOwnProperty(key)) {
                            let item = json[key];
                            array.push(new CodiceCatastaleEstero(item.nome, item.codiceCatastale, item.sigla));
                        }
                    }
                });
        });
}