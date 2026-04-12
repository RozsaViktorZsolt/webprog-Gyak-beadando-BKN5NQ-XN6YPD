const API_URL = "http://localhost/fetchapi";

// READ
async function loadItems() {
    const response = await fetch(`${API_URL}/get.php`);
    const data = await response.json();

    const list = document.getElementById("list");
    list.innerHTML = "";

    data.forEach(item => {
        const li = document.createElement("li");
        li.textContent = item.name;

        const delBtn = document.createElement("button");
        delBtn.textContent = "Törlés";
        delBtn.onclick = () => deleteItem(item.id);

        li.appendChild(delBtn);
        list.appendChild(li);
    });
}

// CREATE
async function addItem() {
    const input = document.getElementById("nameInput");

    if (input.value === "") return;

    await fetch(`${API_URL}/add.php`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            name: input.value
        })
    });

    input.value = "";
    loadItems();
}

// DELETE
async function deleteItem(id) {
    await fetch(`${API_URL}/delete.php`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            id: id
        })
    });

    loadItems();
}

// első betöltés
loadItems();