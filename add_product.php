<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="style/insert_customer.css"> </head>
<body>
    <div class="login-container">
        <h1>Add Product</h1>
        <form action="insert_product.php" method="post" enctype="multipart/form-data">
            <label for="productTitle">Product Title:</label>
            <input type="text" id="productTitle" name="productTitle" required>

            <label for="productDescription">Product Description:</label>
            <textarea id="productDescription" name="productDescription" required></textarea>

            <label for="productPrice">Product Price:</label>
            <input type="number" id="productPrice" name="productPrice" required>

            <label for="productCost">Product Cost:</label>
            <input type="number" id="productCost" name="productCost" required>

            <label for="productQuantity">Product Quantity:</label>
            <input type="number" id="productQuantity" name="productQuantity" required>

            <label for="productImage">Product Image:</label>
            <input type="file" id="productImage" name="productImage" required>
			
			
			
			<label for="CategoryName">Category Name:</label>
			<select name="CategoryName" id="CategoryName">
				<?php
				// Fetch Category Name from the database and populate the dropdown
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
			// Prepare and execute the SQL statement to fetch Category Name
			$sql = "SELECT CategoryID, CategoryName FROM categories";
			$result = $conn->query($sql);
			$conn->close();
			
			
			// Populate the dropdown with Category Name
			while ($row = $result->fetch_assoc()) {
				echo "<option value='" . $row['CategoryID'] . "'>" . $row['CategoryName'] . "</option>";
			}
			
			?>
			
			</select>
            <br>
			

            <input type="submit" value="Add Product">
        </form>
    </div>
</body>
</html>