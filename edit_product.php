<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="style/insert_customer.css"> </head>
<body>
    <div class="login-container">
        <h1>Edit Product</h1>
        <form action="update_product.php" method="post" enctype="multipart/form-data">
		
			<input type="hidden" name="ProductID" value="<?php echo $_GET['id']; ?>">
		
		
            <label for="productTitle">Product Title:</label>
            <input type="text" id="productTitle" name="productTitle" value="<?php echo $_GET['ProductTitle']; ?>" required>

            <label for="productDescription">Product Description:</label>
            <textarea id="productDescription" name="productDescription" required> <?php echo $_GET['ProductDescription']; ?> </textarea>

            <label for="productPrice">Product Price:</label>
            <input type="number" id="productPrice" name="productPrice" value="<?php echo $_GET['ProductPrice']; ?>" required>

            <label for="productCost">Product Cost:</label>
            <input type="number" id="productCost" name="productCost" value="<?php echo $_GET['ProductCost']; ?>" required>

            <label for="productQuantity">Product Quantity:</label>
            <input type="number" id="productQuantity" name="productQuantity" value="<?php echo $_GET['QTY']; ?>" required>

			<?php
			$imagePath = $_GET['ImagePath'];
			 echo '<img src="' . $imagePath . '" id="previewImage" alt="Product Image" style="width: 200px; height: auto;">';
			?>
			
			<label for="productImage">Product Image:</label>
            <input type="file" id="productImage" name="productImage">
			
			
			
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
			

            <input type="submit" value="Update Product">
        </form>
    </div>
	
	<script>
	
				//Get selected category
				const selectElement = document.getElementById("CategoryName");
				const CategoryName = "<?php echo $_GET['CategoryName']; ?>";

				// Iterate over options and check the text content
				for (let i = 0; i < selectElement.options.length; i++) {
					if (selectElement.options[i].text === CategoryName) {
						selectElement.options[i].selected = true;
						break;
					}
				}
				
				//Preview selected image
				const productImage = document.getElementById('productImage');
				  const previewImage = document.getElementById('previewImage');

				  productImage.addEventListener('change', function() {
					const file = productImage.files[0];
					const reader = new FileReader();

					reader.onload = function(e) {
					  previewImage.src = e.target.result;
					};

					reader.readAsDataURL(file);
				  });
				  
</script>
				
    </script>
</body>
</html>