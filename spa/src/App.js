import { useState } from "react";

/* ===== 1. Alkalmazás: Számláló ===== */
function Counter() {
  const [count, setCount] = useState(0);

  return (
    <div>
      <h3>Számláló</h3>
      <p>Érték: {count}</p>
      <button onClick={() => setCount(count + 1)}>+</button>
      <button onClick={() => setCount(count - 1)}>-</button>
    </div>
  );
}

/* ===== 2. Alkalmazás: Kalkulátor ===== */
function Calculator() {
  const [num1, setNum1] = useState("");
  const [num2, setNum2] = useState("");
  const [result, setResult] = useState(null);

  return (
    <div>
      <h3>Kalkulátor</h3>

      <input
        type="number"
        value={num1}
        onChange={(e) => setNum1(e.target.value)}
      />
      <input
        type="number"
        value={num2}
        onChange={(e) => setNum2(e.target.value)}
      />

      <button onClick={() => setResult(Number(num1) + Number(num2))}>
        Összeadás
      </button>

      <p>Eredmény: {result}</p>
    </div>
  );
}

/* ===== Fő SPA komponens ===== */
function App() {
  const [page, setPage] = useState("counter");

  return (
    <div style={{ padding: "20px" }}>
      <h2>SPA – React egyoldalas alkalmazás</h2>

      <button onClick={() => setPage("counter")}>Számláló</button>
      <button onClick={() => setPage("calculator")}>Kalkulátor</button>

      <hr />

      {page === "counter" && <Counter />}
      {page === "calculator" && <Calculator />}
    </div>
  );
}

export default App;