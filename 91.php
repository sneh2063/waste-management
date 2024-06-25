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

// Function to fetch data from the database
function fetchProducts($conn) {
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    } else {
        return [];
    }
}

// Function to update product data
function updateProduct($conn, $id, $name, $type_of_waste, $price, $quantity, $buyer_or_seller, $email) {
    $sql = "UPDATE products SET name='$name', type_of_waste='$type_of_waste', price='$price', quantity='$quantity', buyer_or_seller='$buyer_or_seller', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to search for products
function searchProducts($conn, $searchTerm) {
    $sql = "SELECT * FROM products WHERE name LIKE '%$searchTerm%' OR type_of_waste LIKE '%$searchTerm%' OR email LIKE '%$searchTerm%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    } else {
        return [];
    }
}

// Function to delete product
function deleteProduct($conn, $id) {
    $sql = "DELETE FROM products WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Handle POST requests for updating, searching, or deleting
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["update"])) {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $type_of_waste = $_POST["type_of_waste"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];
        $buyer_or_seller = $_POST["buyer_or_seller"];
        $email = $_POST["email"];

        if (updateProduct($conn, $id, $name, $type_of_waste, $price, $quantity, $buyer_or_seller, $email)) {
            echo "Product updated successfully.";
        } else {
            echo "Error updating product.";
        }
    } elseif (isset($_POST["search"])) {
        $searchTerm = $_POST["searchTerm"];

        $searchResults = searchProducts($conn, $searchTerm);
    } elseif (isset($_POST["delete"])) {
        $id = $_POST["delete"];

        if (deleteProduct($conn, $id)) {
            echo "Product deleted successfully.";
        } else {
            echo "Error deleting product.";
        }
    }
}

// Fetch all products
$products = fetchProducts($conn);

// Close connection
$conn->close();
?>
