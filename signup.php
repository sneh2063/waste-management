<?php
$conn = new mysqli("localhost", "root", "", "user_management");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$type_of_waste = $_POST['type_of_waste'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$buyer_or_seller = $_POST['buyer_or_seller'];
$email = $_POST['email'];
$password = $_POST['password'];

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
error_log("Hashed Password: " . $hashedPassword);

$sql = "INSERT INTO users (name, type_of_waste, price, quantity, buyer_or_seller, email, password) VALUES ('$name', '$type_of_waste', '$price',  '$quantity','$buyer_or_seller', '$email', '$hashedPassword')";

if ($conn->query($sql) === TRUE) {
    header("Location: home.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
