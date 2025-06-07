<!DOCTYPE html>
<html>
<head>
    <title>Delete Category</title>
    <link rel="stylesheet" href="style/customer_manag.css">
</head>
<body>
    <div class="container">
        <h1>Delete Category</h1>
        <p>Are you sure you want to delete this category?</p>
        <form action="delete_category_confirm.php" method="post">
            <input type="hidden" name="CategoryID" value="<?php echo $_GET['id']; ?>">
            <input type="submit" value="Yes, Delete">
        </form>
    </div>
</body>
</html>