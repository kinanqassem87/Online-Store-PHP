<!DOCTYPE html>
<html>
<head>
    <title>Delete Product</title>
    <link rel="stylesheet" href="style/customer_manag.css">
</head>
<body>
    <div class="container">
        <h1>Delete Product</h1>
        <p>Are you sure you want to delete this product?</p>
        <form action="delete_product_confirm.php" method="post">
            <input type="hidden" name="ProductID" value="<?php echo $_GET['id']; ?>">
            <input type="submit" value="Yes, Delete">
        </form>
    </div>
</body>
</html>