const API_URL = "http://localhost/fetchapi"; 

async function loadItems() {
    const response = await fetch(`${API_URL}/get.php`);
    const data = await response.json();

    const list = document.getElementById("list");
    list.innerHTML = "";

    data.forEach(item => {
        const li = document.createElement("li");
        li.className = "item-row";
        li.innerHTML = `
            <span><strong>${item.name}</strong> (${item.age}), Skills: ${item.skills}</span>
            <button onclick="showEdit('${item.id}', '${item.name}', '${item.age}', '${item.skills}')">Edit</button>
            <button onclick="deleteItem('${item.id}')" style="color:red">Delete</button>
        `;
        list.appendChild(li);
    });
}

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

    document.getElementById("nameInput").value = "";
    document.getElementById("ageInput").value = "";
    document.getElementById("skillsInput").value = "";
    loadItems();
}

function showEdit(id, name, age, skills) {
    document.getElementById("edit-container").style.display = "block";
    document.getElementById("editId").value = id;
    document.getElementById("editName").value = name;
    document.getElementById("editAge").value = age;
    document.getElementById("editSkills").value = skills;
}

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


function showEdit(id, currentName) {
    const newName = prompt("Módosítsa a nevet:", currentName);
    if (newName && newName !== currentName) {
        updateItem(id, newName);
    }
}

async function updateItem(id, name) {
    await fetch(`${API_URL}/update.php`, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id, name })
    });
    loadItems();
}

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
