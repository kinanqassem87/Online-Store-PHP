<!DOCTYPE html>
<html>
<head>
    <title>Products List</title>
    <link rel="stylesheet" href="style/customer_manag.css">
</head>
<body>
    <div class="container">
        <h1>Products List</h1>
        <form action="view_products.php" method="get">
            <label for="search">Search:</label>
            <input type="text" id="search" name="search" placeholder="Search by Prodcut name or Category name">
            <input type="submit" value="Search">
        </form>
		<a href="add_product.php" class="button">Add New Product</a>
        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Title</th>
                    <th>Product Description</th>
                    <th>Product Price</th>
                    <th>Product Cost</th>
                    <th>QTY</th>
                    <th>Category Name</th>
					<th>Image Path</th>	
					<th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'fetch_products.php';

                // Loop through the fetched data and display it in the table
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['ProductID'] . "</td>";
                    echo "<td>" . $row['ProductTitle'] . "</td>";
                    echo "<td>" . $row['ProductDescription'] . "</td>";
                    echo "<td>" . $row['ProductPrice'] . "</td>";
                    echo "<td>" . $row['ProductCost'] . "</td>";
                    echo "<td>" . $row['QTY'] . "</td>";
					echo "<td>" . $row['CategoryName'] . "</td>";
					echo "<td>" . $row['ImagePath'] . "</td>";
                    echo "<td><a href='edit_product.php?id=" . $row['ProductID'] . "
					&ProductTitle=" . $row['ProductTitle'] . "
					&ProductDescription=" . $row['ProductDescription'] . "
					&ProductPrice=" . $row['ProductPrice'] . "
					&ProductCost=" . $row['ProductCost'] . "
					&QTY=" . $row['QTY'] . "
					&CategoryName=" . $row['CategoryName'] . "
					&ImagePath=" . $row['ImagePath'] . "
					'>Edit</a> | <a href='delete_product.php?id=" . $row['ProductID'] . "'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
	
	<a href="logout.php">Logout</a>

</body>
</html>