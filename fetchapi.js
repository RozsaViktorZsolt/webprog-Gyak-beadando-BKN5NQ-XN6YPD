const API_URL = "http://localhost/fetchapi"; 

// READ - Adatok betöltése és listázása
async function loadItems() {
    try {
        const response = await fetch(`${API_URL}/get.php`);
        const data = await response.json();

        const list = document.getElementById("list");
        list.innerHTML = "";

        data.forEach(item => {
            const li = document.createElement("li");
            li.className = "item-row";
            li.style.borderBottom = "1px solid #ccc";
            li.style.padding = "10px";
            li.style.listStyle = "none";
            
            li.innerHTML = `
                <span><strong>${item.name}</strong> (${item.age} év), Képességek: ${item.skills}</span>
                <div style="display: inline-block; margin-left: 20px;">
                    <button onclick="showEdit('${item.id}', '${item.name}', '${item.age}', '${item.skills}')">Szerkesztés</button>
                    <button onclick="deleteItem('${item.id}')" style="color:red">Törlés</button>
                </div>
            `;
            list.appendChild(li);
        });
    } catch (error) {
        console.error("Hiba a betöltéskor:", error);
    }
}

// CREATE - Új elem hozzáadása
async function addItem() {
    const name = document.getElementById("nameInput").value;
    const age = document.getElementById("ageInput").value;
    const skills = document.getElementById("skillsInput").value;

    if (!name || !age) {
        alert("A név és a kor megadása kötelező!");
        return;
    }

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

// UPDATE - Szerkesztő felület megjelenítése adatokkal feltöltve
function showEdit(id, name, age, skills) {
    const container = document.getElementById("edit-container");
    if (container) {
        container.style.display = "block";
        document.getElementById("editId").value = id;
        document.getElementById("editName").value = name;
        document.getElementById("editAge").value = age;
        document.getElementById("editSkills").value = skills;
        // Gördítsünk oda, hogy látszódjon a szerkesztő
        container.scrollIntoView();
    }
}

// UPDATE - Módosított adatok mentése
async function updateItem() {
    const id = document.getElementById("editId").value;
    const name = document.getElementById("editName").value;
    const age = document.getElementById("editAge").value;
    const skills = document.getElementById("editSkills").value;

    if (!name || !age) {
        alert("A név és a kor nem lehet üres!");
        return;
    }

    await fetch(`${API_URL}/update.php`, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id, name, age, skills })
    });

    cancelEdit();
    loadItems();
}

// Szerkesztés megszakítása
function cancelEdit() {
    document.getElementById("edit-container").style.display = "none";
}

// DELETE - Törlés
async function deleteItem(id) {
    if (!confirm("Biztosan törölni szeretné ezt az elemet?")) return;
    
    await fetch(`${API_URL}/delete.php`, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id })
    });

    loadItems();
}

// Kezdő betöltés
loadItems();
