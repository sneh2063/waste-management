<?php
// Establish database connection
$conn = new mysqli("localhost", "root", "", "waste_management");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the form
$name = $_POST['name'];
$type = $_POST['type'];
$price = $_POST['price'];

// Insert data into the database
$sql = "INSERT INTO waste_items (name, type, price) VALUES ('$name', '$type', '$price')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
