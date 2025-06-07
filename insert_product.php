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

        // Insert product data into the database
        $productTitle = $_POST["productTitle"];
        $productDescription = $_POST["productDescription"];
        $productPrice = $_POST["productPrice"];
        $productCost = $_POST["productCost"];
        $productQuantity = $_POST["productQuantity"];
		$CategoryID = $_POST["CategoryName"];
        $imagePath = $target_dir . $uniqueFilename;

        $sql = "INSERT INTO Products (ProductTitle, ProductDescription, ProductPrice, ProductCost, QTY, CategoryID, ImagePath)
                VALUES ('$productTitle', '$productDescription', '$productPrice', '$productCost', '$productQuantity','$CategoryID', '$imagePath')";

        if ($conn->query($sql) === TRUE) {
			echo '<script>
        alert("Product added successfully!");
        window.location.href = "view_products.php"; 
    </script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}

$conn->close();
?>