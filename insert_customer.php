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
$customer_username = $_POST['customer_username'];
$customer_password = $_POST['customer_password'];
$customer_name = $_POST['customer_name'];
$customer_phone = $_POST['customer_phone'];
$customer_address = $_POST['customer_address'];
$permission_id = 2; // Default value

// Hash the password using a strong algorithm 
$hashed_password = password_hash($customer_password, PASSWORD_DEFAULT);

// Prepare and execute the SQL statement
$sql = "INSERT INTO Customers (CustomerUserName, CustomerPassword, CustomerName, CustomerPhone, CustomerAddress, PermissionID) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $customer_username, $hashed_password, $customer_name, $customer_phone, $customer_address, $permission_id);

if ($stmt->execute()) {

// Show a popup window message
    echo '<script>
        alert("Thanks for registering! You can now log in.");
        window.location.href = "login.html"; // Redirect to the login page
    </script>';
	
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>