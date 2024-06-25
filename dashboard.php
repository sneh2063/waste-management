<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: index.html");
}

echo "Welcome " . $_SESSION['email'];
// Fetch and display user's data here
?>
