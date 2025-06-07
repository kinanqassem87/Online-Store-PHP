<!DOCTYPE html>
<html>
<head>
    <title>Collection page</title>
	<link rel="stylesheet" href="style/homepage.css">
</head>
<body>
	<a href="home.php"><img src="images/logo.png" alt="logo image" align="center" width="90px" height="30px"/></a>

<?php

session_start();

if (isset($_SESSION['user_id'])) {
    // User is logged in
	echo '<div style="float:right;margin-top:10px;">';
	echo '<a href="logout.php" style="margin-right: 10px;">Logout</a>';
	echo '<a href="cart.php" style="margin-right: 10px;" >Cart</a>';
	echo '<h3>Hello ' . $_SESSION['CustomerName'] . '</h3>';
	echo '</div>';
    
} else {
    // User is not logged in
	echo '<div style="float:right;margin-top:10px;">';
    echo '<a href="login.html" style="margin-right: 10px;">Login</a>';
    echo '<h3>Hello guest</h3>';
    echo '</div>';
	
}

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlinestore";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$CategoryID = $_GET["id"];

$sql = "SELECT * FROM Categories";
$resultCat = $conn->query($sql);

$sqlProOfCol = "SELECT * FROM products where CategoryID = ".$CategoryID."";
$resultProOfCol = $conn->query($sqlProOfCol);
$conn->close();
?>
    <ul>
	<a href="home.php"/>All Product</a>
        <?php
        if ($resultCat->num_rows > 0) {
            while($row = $resultCat->fetch_assoc()) {
                echo "<li><a href='collection_page.php?id=" . $row["CategoryID"] . "'>" . $row["CategoryName"] . "</a></li>";
            }
        } else {
            echo "No category found";
        }
        ?>
    </ul>

	
	<div class="product-grid">
        <?php
		
        if ($resultProOfCol->num_rows > 0) {
            while($row = $resultProOfCol->fetch_assoc()) {
                $productId = $row["ProductID"];
                $productTitle = $row["ProductTitle"];
				$ProductDescription = $row["ProductDescription"];
                $productPrice = $row["ProductPrice"];
				$ProductCost = $row["ProductCost"];
				$QTY = $row["QTY"];
                $imagePath = $row["ImagePath"];
				
				echo '<a href="view_product_details.php?id=' . $productId . ' &ProductTitle=' . $productTitle . '
					&ProductDescription=' . $ProductDescription . '
					&ProductPrice=' . $productPrice . '
					&QTY=' . $QTY . '
					&ImagePath=' . $imagePath . '
					">';
                echo '<div class="product-card">';
                echo '<img src="' . $imagePath . '" alt="' . $productTitle . '">';
                echo '<h3>' . $productTitle . '</h3>';
                echo '<p>$' . $productPrice . '</p>';
                echo '</div>';
				echo '</a>';
            }
        } else {
            echo "No products found.";
        }
        ?>
    </div>
	
</body>
</html>