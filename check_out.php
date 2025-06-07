<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <link rel="stylesheet" href="style/check_out.css">
</head>
<body>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlinestore";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$user_id = $_SESSION["user_id"];
$sql = "SELECT * FROM customers where CustomerID = ". $user_id. "";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
			$CustomerName =  $row["CustomerName"]; 
			$CustomerPhone =  $row["CustomerPhone"];
			$CustomerAddress =  $row["CustomerAddress"];
			 
			   }  
			}

?>
<form action="process_order.php" method="post">
    <div class="checkout-container">
        <h2>Checkout</h2>
        <div class="customer-info">
            <label>Customer Name:</label>
            <p class="customer-name"><?php echo $CustomerName; ?></p>
            <label>Customer Phone:</label>
            <p class="customer-phone"><?php echo $CustomerPhone ?></p>
            <label>Customer Address:</label>
            <p class="customer-address"><?php echo $CustomerAddress ?></p>
        </div>
        <div class="payment-info">
			<label>Visa Card Number:</label>
			<input type="number" class="card-number" name="PayCardNumber" placeholder="XXXX XXXX XXXX XXXX" required>
			<label>Valid Date:</label>
			<input type="date" class="valid-date" name="PayCardValidDate" required>
		</div>
        <div class="order-total">
            <label>Order Total:</label>
			<h3 style="display:inline;">$</h3>
			<input style="background-color:red; color:white;" class="total" id="total_order" name="total_order" value="<?php echo $_GET['total_order'];?>" readonly>
        </div>
        <button type="submit" class="place-order">Place Order</button>
    </div>
	</form>
	<?php
	exit();
	?>
</body>
</html>