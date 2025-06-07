<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>



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

$productId = $_GET["id"];
$ProductTitle = $_GET["ProductTitle"];
$ProductDescription = $_GET["ProductDescription"];
$ProductPrice = $_GET["ProductPrice"];
$QTY = $_GET["QTY"];
$ImagePath = $_GET["ImagePath"];

$conn->close();
?>
    <h1>Product Details</h1>

    <div class="product-details">
        <img src="<?php echo $ImagePath; ?>" alt="<?php echo $ProductTitle; ?>">
        <h2><?php echo $ProductTitle; ?></h2>
        <p><?php echo $ProductDescription; ?></p>
        <p>Price: $<?php echo $ProductPrice; ?></p>
		<form action="add_to_cart.php" method="post">
            <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1" value="1" max="<?php echo $QTY; ?>" onkeydown="return false;">
            <button type="submit">Add to Cart</button>
        </form>
    </div>
</body>
<style>
.product-details {
    text-align: center;
	margin-top:40px;
}

img {
	float: left;
    max-width: 300px;
	height:auto;
    margin-top: 50px;
	margin-left:100px;
}

form {
    margin-top: 50px;
}
</style>
</html>