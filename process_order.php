<?php
session_start();
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlinestore";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve Form Data
$customerID = $_SESSION["user_id"];
$orderDate = date("Y-m-d");
$payCardNumber = $_POST["PayCardNumber"];
$payCardValidDate = $_POST["PayCardValidDate"];
$totalOrder = $_POST["total_order"];

// Prepare and Execute SQL Insert Query
$sql = "INSERT INTO Orders (OrderDate, CustomerID, PayCardNumber, PayCardValidDate, TotalOrder)
        VALUES ('$orderDate', '$customerID', '$payCardNumber', '$payCardValidDate', '$totalOrder')";
$conn->query($sql);	

// Retrieve the last OrderID from the Orders table
$sqllastID = "SELECT MAX(OrderID) AS last_order_id FROM Orders";
$resultlastID = $conn->query($sqllastID);

if ($resultlastID->num_rows > 0) {
    $row = $resultlastID->fetch_assoc();
    $lastOrderId = $row['last_order_id'];
} else {
    $lastOrderId = 0;
}

// Iterate through the cart and insert into OrderDetails
foreach ($_SESSION['cart'] as $productId => $quantity) {
    $sqlDetails = "INSERT INTO OrderDetails (ProductID, OrderID, QtyOfItem) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sqlDetails);
    $stmt->bind_param("iii", $productId, $lastOrderId, $quantity);
    $stmt->execute();
}

// Iterate through the cart and update QTY of Product
foreach ($_SESSION['cart'] as $productId => $quantity) {
    $updateSql = "UPDATE Products SET QTY = QTY - ? WHERE ProductID = ?";
	$updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("ii", $quantity, $productId);
    $updateStmt->execute();
}

 unset($_SESSION['cart']);
 echo '<script>
        alert("The purchase was completed successfully. Thank you.");
        window.location.href = "home.php"; 
    </script>';
 
// Close Database Connection
$conn->close();

exit();
?>
