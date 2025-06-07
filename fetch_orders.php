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

// SQL query to join tables and calculate the sum of QtyOfItem
$sql = "SELECT 
    o.OrderID, 
    o.OrderDate, 
    c.CustomerName, 
    o.TotalOrder, 
    SUM(od.QtyOfItem) AS TotalQty
FROM 
    Orders o
INNER JOIN 
    Customers c ON o.CustomerID = c.CustomerID
INNER JOIN 
    OrderDetails od ON o.OrderID = od.OrderID
GROUP BY 
    o.OrderID, o.OrderDate, c.CustomerName, o.TotalOrder";

$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>