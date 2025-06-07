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

// Get the order ID from the URL parameter
$orderId = $_GET['order_id'];

// SQL query to fetch order details
$sql = "SELECT 
    od.ProductID , 
    p.ProductTitle AS ProductTitle, 
    p.ProductPrice AS ProductPrice, 
    od.QtyOfItem AS QtyOfItem, 
    (p.ProductPrice * od.QtyOfItem) AS TotalPrice
FROM 
    orderdetails od
INNER JOIN 
    products p ON od.ProductID = p.ProductID
WHERE 
    od.OrderID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $orderId);
$stmt->execute();
$result = $stmt->get_result();

$orderDetails = [];
while ($row = $result->fetch_assoc()) {
    $orderDetails[] = $row;
}


// Close the database connection
$conn->close();
?>