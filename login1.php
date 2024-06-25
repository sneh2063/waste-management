<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Default password is empty for WampServer
$dbname = "user_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Retrieve hashed password from the database
    $sql = "SELECT password FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, verify password
        $row = $result->fetch_assoc();
        $hashedPassword = $row["password"];
        if (password_verify($password, $hashedPassword)) {
            // Start session and store user email
            session_start();
            $_SESSION["email"] = $email;
            // Redirect user to welcome page
            header("Location: 12.php");
            exit(); // Ensure script execution stops after redirection
        } else {
            // Debugging: Print out password hashes
            echo "Debug: Entered Password Hash: " . password_hash($password, PASSWORD_DEFAULT) . "<br>";
            echo "Debug: Stored Password Hash: $hashedPassword<br>";
            echo "Invalid email or password.";
        }
    } else {
        // User not found
        echo "User not found.";
    }
}

// Close connection
$conn->close();
?>
