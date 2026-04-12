import { useState } from "react";

function App() {
  const [items, setItems] = useState(["Alma", "Banán", "Körte"]);
  const [newItem, setNewItem] = useState("");

  const addItem = () => {
    if (newItem !== "") {
      setItems([...items, newItem]);
      setNewItem("");
    }
  };

  const deleteItem = (index) => {
    const newList = items.filter((_, i) => i !== index);
    setItems(newList);
  };

  return (
    <div style={{ padding: "20px" }}>
      <h2>React CRUD alkalmazás</h2>

      <input
        type="text"
        value={newItem}
        onChange={(e) => setNewItem(e.target.value)}
        placeholder="Új elem"
      />
      <button onClick={addItem}>Hozzáadás</button>

      <ul>
        {items.map((item, index) => (
          <li key={index}>
            {item}
            <button onClick={() => deleteItem(index)}>
              Törlés
            </button>
          </li>
        ))}
      </ul>
    </div>
  );
}

export default App;
