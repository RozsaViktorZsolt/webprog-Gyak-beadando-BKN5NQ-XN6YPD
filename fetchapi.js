// Az API_URL-t a tárhelyedhez kell igazítani a dokumentációban megadott cím alapján [cite: 54]
const API_URL = "http://localhost/fetchapi"; 

// READ - Adatok betöltése
async function loadItems() {
    const response = await fetch(`${API_URL}/get.php`);
    const data = await response.json();

    const list = document.getElementById("list");
    list.innerHTML = "";

    data.forEach(item => {
        const li = document.createElement("li");
        li.className = "item-row";
        // A feladatkiírás szerinti mezők megjelenítése [cite: 43]
        li.innerHTML = `
            <span><strong>${item.name}</strong> (${item.age}), Skills: ${item.skills}</span>
            <button onclick="showEdit('${item.id}', '${item.name}', '${item.age}', '${item.skills}')">Edit</button>
            <button onclick="deleteItem('${item.id}')" style="color:red">Delete</button>
        `;
        list.appendChild(li);
    });
}

// CREATE - Hozzáadás
async function addItem() {
    const name = document.getElementById("nameInput").value;
    const age = document.getElementById("ageInput").value;
    const skills = document.getElementById("skillsInput").value;

    if (!name || !age) return;

    await fetch(`${API_URL}/add.php`, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ name, age, skills })
    });

    // Mezők ürítése
    document.getElementById("nameInput").value = "";
    document.getElementById("ageInput").value = "";
    document.getElementById("skillsInput").value = "";
    loadItems();
}

// UPDATE - Szerkesztési felület megjelenítése
function showEdit(id, name, age, skills) {
    document.getElementById("edit-container").style.display = "block";
    document.getElementById("editId").value = id;
    document.getElementById("editName").value = name;
    document.getElementById("editAge").value = age;
    document.getElementById("editSkills").value = skills;
}

// UPDATE - Adatok mentése
async function updateItem() {
    const id = document.getElementById("editId").value;
    const name = document.getElementById("editName").value;
    const age = document.getElementById("editAge").value;
    const skills = document.getElementById("editSkills").value;

    await fetch(`${API_URL}/update.php`, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id, name, age, skills })
    });

    cancelEdit();
    loadItems();
}

function cancelEdit() {
    document.getElementById("edit-container").style.display = "none";
}

// DELETE - Törlés
async function deleteItem(id) {
    if (!confirm("Biztosan törlöd?")) return;
    
    await fetch(`${API_URL}/delete.php`, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id })
    });

    loadItems();
}

loadItems();
