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
// Get the customer ID and updated data from the form
$customer_id = $_POST['customer_id'];
$customer_username = $_POST['customer_username'];

$Name = $_POST['CustomerName'];
$CustomerPhone = $_POST['CustomerPhone'];
$CustomerAddress = $_POST['CustomerAddress'];
$PermissionType = $_POST['PermissionType'];
// Prepare and execute the SQL statement to update the customer data
$sql = "UPDATE Customers SET CustomerUserName = ?,
CustomerName = ?,
CustomerPhone = ?,
CustomerAddress = ?,
PermissionID = ? WHERE CustomerID = ?";
$stmt = $conn->prepare($sql);
// Bind parameters
// ... (bind parameters for updated fields)
$stmt->bind_param("ssssss", $customer_username,$Name,$CustomerPhone,$CustomerAddress,$PermissionType,$customer_id);
$stmt->execute();

// Redirect back to the view_customers page
header("Location: view_customers.php");
?>