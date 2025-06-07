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

// Handle file upload and generate unique filename
$target_dir = "images/"; // Directory to store images
$target_file = $target_dir . basename($_FILES["productImage"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Allow certain file formats
$allowedExtensions = array("jpg", "jpeg", "png", "gif");
if (in_array($imageFileType, $allowedExtensions)) {
    if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $target_file)) {
         //Generate a unique filename
        $uniqueFilename = uniqid() . "." . $imageFileType;
        rename($target_file, $target_dir . $uniqueFilename);

        // update product data into the database
		$ProductID = $_POST["ProductID"];
        $productTitle = $_POST["productTitle"];
        $productDescription = $_POST["productDescription"];
        $productPrice = $_POST["productPrice"];
        $productCost = $_POST["productCost"];
        $productQuantity = $_POST["productQuantity"];
		$CategoryID = $_POST["CategoryName"];
        $imagePath = $target_dir . $uniqueFilename;

        $sql = "UPDATE Products SET productTitle = ?,
				productDescription = ?,
				productPrice = ?,
				productCost = ?,
				QTY = ?,
				imagePath = ?,
				CategoryID = ? WHERE ProductID = ?";
				
		$stmt = $conn->prepare($sql);
		// Bind parameters
		// ... (bind parameters for updated fields)
		$stmt->bind_param("ssssssii", $productTitle,$productDescription,$productPrice,$productCost,$productQuantity,$imagePath,$CategoryID,$ProductID);
		$stmt->execute();
		
		echo '<script>
        alert("Product updated successfully!");
        window.location.href = "view_products.php"; 
    </script>';
        
    } else {
		echo '<script>
        alert("Error with upload file!");
        window.location.href = "view_products.php"; 
    </script>';
    }
} else {
    // update product data into the database without Image
		$ProductID = $_POST["ProductID"];
        $productTitle = $_POST["productTitle"];
        $productDescription = $_POST["productDescription"];
        $productPrice = $_POST["productPrice"];
        $productCost = $_POST["productCost"];
        $productQuantity = $_POST["productQuantity"];
		$CategoryID = $_POST["CategoryName"];

        $sql = "UPDATE Products SET productTitle = ?,
				productDescription = ?,
				productPrice = ?,
				productCost = ?,
				QTY = ?,
				CategoryID = ? WHERE ProductID = ?";
				
		$stmt = $conn->prepare($sql);
		// Bind parameters
		// ... (bind parameters for updated fields)
		$stmt->bind_param("sssssii", $productTitle,$productDescription,$productPrice,$productCost,$productQuantity,$CategoryID,$ProductID);
		$stmt->execute();
		
		echo '<script>
        alert("Product updated successfully!");
        window.location.href = "view_products.php"; 
    </script>';
}

$conn->close();
?>