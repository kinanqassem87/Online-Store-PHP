<?php
// Database connection details 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlinestore";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve search query
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Prepare and execute the SQL statement
$sql = "SELECT products.*, categories.CategoryName FROM products INNER JOIN categories ON products.CategoryID = categories.CategoryID WHERE ProductTitle LIKE '%" . $search . "%' OR categories.CategoryName LIKE '%" . $search . "%'";
$result = $conn->query($sql);
?>