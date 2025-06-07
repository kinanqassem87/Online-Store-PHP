<!DOCTYPE html>
<html>
<head>
    <title>Cart page</title>
	<link rel="stylesheet" href="style/customer_manag.css">
</head>

<body>
<div class="container">
<a href="home.php" class="button">Return to shop</a>
<a href="clear_cart.php"  class="button" style="float:right">Clear Cart</a>

<table>
            <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>

<?php
session_start();
$total_order = 0.0;
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlinestore";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $productId => $quantity) {
	
        // Fetch product details from the database using $productId
		
		$sql = "SELECT * FROM products where ProductID = ".$productId."";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
			
			 echo "<tr>";
                    echo "<td>" . $row["ProductTitle"] . "</td>";
                    echo "<td> $ " . $row["ProductPrice"] . "</td>";
                    echo "<td>" . $quantity . "</td>";
                    echo "<td> $ " . ($row["ProductPrice"] * $quantity) . "</td>";
					echo "</tr>";
				
				$total_order += (floatval($row["ProductPrice"] * $quantity));
			}
			
			
			}
    }
	$conn->close();
	echo "Total Order is : $ $total_order";
}
else{
echo "Cart is empty !";
} 

?>

</tbody>
 </table>
 <?php
 if($total_order === 0.0){}
 else{echo '<a href="check_out.php?total_order='.$total_order.'"  class="button" style="float:right;margin-top:20px;background-color:black;color:white;">Check out</a>';}
 ?>
 
 </div>
 <?php
 exit();
 ?>
</body>
</html>