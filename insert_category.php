<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlinestore";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$CategoryName = $_POST['CategoryName'];
$CategoryDescription = $_POST['CategoryDescription'];

// Prepare and execute the SQL statement
$sql = "INSERT INTO categories (CategoryName, CategoryDescription) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $CategoryName, $CategoryDescription);

if ($stmt->execute()) {

// Show a popup window message
    echo '<script>
        alert("Added successfully.");
        window.location.href = "view_categories.php"; // Redirect to the Category page
    </script>';
	
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>