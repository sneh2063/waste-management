<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            margin-top: 20px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background-color: #2ecc71;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>    
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_management";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to fetch data
$sql = "SELECT name, type_of_waste, price, buyer_or_seller, email FROM users";
$result = mysqli_query($conn, $sql);

// Display data in a table
echo "<table>";
echo "<tr><th>Name</th><th>Type of Waste</th><th>Price</th><th>Buyer/Seller</th><th>Email</th></tr>";

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["type_of_waste"] . "</td>";
        echo "<td>" . $row["price"] . " Rs/kg</td>";
        echo "<td>" . $row["buyer_or_seller"] . "</td>";
        echo "<td><a href='mailto:" . $row["email"] . "'>" . $row["email"] . "</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>0 results</td></tr>";
}

echo "</table>";

mysqli_close($conn);
?>
</body>
</html>