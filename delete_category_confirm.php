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
// Get the category ID from the form
$CategoryID = $_POST['CategoryID'];

// Prepare and execute the SQL statement to delete the category
$sql = "DELETE FROM categories WHERE CategoryID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $CategoryID);
$stmt->execute();

// Redirect back to the view_customers page
header("Location: view_categories.php");
?>