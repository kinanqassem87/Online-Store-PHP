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
// Get the customer ID from the form
$customer_id = $_POST['customer_id'];

// Prepare and execute the SQL statement to delete the customer
$sql = "DELETE FROM Customers WHERE CustomerID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $customer_id);
$stmt->execute();

// Redirect back to the view_customers page
header("Location: view_customers.php");
?>