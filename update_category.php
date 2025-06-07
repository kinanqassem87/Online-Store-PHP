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
// Get the Category ID and updated data from the form
$CategoryID = $_POST['CategoryID'];
$CategoryName = $_POST['CategoryName'];
$CategoryDescription = $_POST['CategoryDescription'];

// Prepare and execute the SQL statement to update the Categories data
$sql = "UPDATE categories SET CategoryName = ?,
CategoryDescription = ?
WHERE CategoryID = ?";
$stmt = $conn->prepare($sql);
// Bind parameters
// ... (bind parameters for updated fields)
$stmt->bind_param("ssi",$CategoryName,$CategoryDescription,$CategoryID);
$stmt->execute();

// Redirect back to the view_customers page
header("Location: view_categories.php");
?>