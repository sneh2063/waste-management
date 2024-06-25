<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "user_management";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["password"];
        if (password_verify($password, $hashedPassword)) {
            header("Location: 12.php");
            exit(); 
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "User not found.";
    }
}

$conn->close();
?>
