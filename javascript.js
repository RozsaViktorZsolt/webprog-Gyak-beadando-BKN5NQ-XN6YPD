// Adatok tömbben
let items = ["Tej", "Kenyér", "Sajt"];

// Lista kirajzolása
function render() {
    const list = document.getElementById("itemList");
    list.innerHTML = "";

    items.forEach((item, index) => {
        const li = document.createElement("li");
        li.textContent = item;

        const deleteButton = document.createElement("button");
        deleteButton.textContent = "Törlés";
        deleteButton.onclick = function () {
            deleteItem(index);
        };

        li.appendChild(deleteButton);
        list.appendChild(li);
    });
}

// Új elem hozzáadása (CREATE)
function addItem() {
    const input = document.getElementById("itemInput");

    if (input.value !== "") {
        items.push(input.value);
        input.value = "";
        render();
    }
}

// Elem törlése (DELETE)
function deleteItem(index) {
    items.splice(index, 1);
    render();
}

// Első kirajzolás
render();