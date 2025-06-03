import React, { useState, useEffect } from "react";

function App() {
  const [type, setType] = useState("");
  const [quantity, setQuantity] = useState("");
  const [date, setDate] = useState("");
  const [poultry, setPoultry] = useState([]);

  // Fetch all poultry records
  const fetchPoultry = () => {
    fetch("http://localhost/backend/api/get_poultry.php")
      .then((res) => res.json())
      .then((data) => setPoultry(data));
  };

  useEffect(() => {
    fetchPoultry();
  }, []);

  // Add poultry record
  const handleSubmit = (e) => {
    e.preventDefault();
    fetch("http://localhost/backend/api/add_poultry.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ type, quantity, date }),
    })
      .then((res) => res.json())
      .then(() => {
        fetchPoultry();
        setType("");
        setQuantity("");
        setDate("");
      });
  };

  return (
    <div style={{ padding: 24 }}>
      <h2>Poultry Management System</h2>
      <form onSubmit={handleSubmit}>
        <input
          placeholder="Type"
          value={type}
          onChange={(e) => setType(e.target.value)}
          required
        />
        <input
          placeholder="Quantity"
          type="number"
          value={quantity}
          onChange={(e) => setQuantity(e.target.value)}
          required
        />
        <input
          placeholder="Date Added"
          type="date"
          value={date}
          onChange={(e) => setDate(e.target.value)}
          required
        />
        <button type="submit">Add Poultry</button>
      </form>

      <h3>All Poultry Records</h3>
      <table border="1" cellPadding={6}>
        <thead>
          <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Quantity</th>
            <th>Date Added</th>
          </tr>
        </thead>
        <tbody>
          {poultry.map((row) => (
            <tr key={row.id}>
              <td>{row.id}</td>
              <td>{row.type}</td>
              <td>{row.quantity}</td>
              <td>{row.date_added}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}

export default App;