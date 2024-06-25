<?php
// Establish database connection
$conn = new mysqli("localhost", "root", "", "waste_management");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the database
$sql = "SELECT * FROM waste_items";
$result = $conn->query($sql);

// Display data
if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th><th>Type</th><th>Price</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["type"]."</td><td>".$row["price"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
