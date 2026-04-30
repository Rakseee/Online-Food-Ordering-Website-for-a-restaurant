const express = require("express");
const bodyParser = require("body-parser");
const fs = require("fs");
const path = require("path");
const cors = require("cors");

const app = express();
const PORT = 3000;

// Middleware
app.use(cors());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Serve static HTML files
app.use(express.static(path.join(__dirname, "public")));

// Save contact form data
app.post("/api/contact", (req, res) => {
  const newMessage = req.body;
  const existingData = JSON.parse(fs.readFileSync("messages.json", "utf8"));
  existingData.push({ type: "contact", ...newMessage, date: new Date() });

  fs.writeFileSync("messages.json", JSON.stringify(existingData, null, 2));
  res.status(200).json({ message: "Message received!" });
});

// Save order data (example if you create a future order form)
app.post("/api/order", (req, res) => {
  const orderData = req.body;
  const existingData = JSON.parse(fs.readFileSync("messages.json", "utf8"));
  existingData.push({ type: "order", ...orderData, date: new Date() });

  fs.writeFileSync("messages.json", JSON.stringify(existingData, null, 2));
  res.status(200).json({ message: "Order received!" });
});

// Start server
app.listen(PORT, () => {
  console.log(`Server running on http://localhost:${PORT}`);
});

