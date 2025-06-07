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
// Get the product ID from the form
$ProductID = $_POST['ProductID'];

// Prepare and execute the SQL statement to delete the product
$sql = "DELETE FROM products WHERE ProductID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $ProductID);
$stmt->execute();

// Redirect back to the view_products page
header("Location: view_products.php");
?>