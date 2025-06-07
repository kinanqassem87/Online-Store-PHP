<!DOCTYPE html>
<html>
<head>
    <title>Delete Customer</title>
    <link rel="stylesheet" href="style/customer_manag.css">
</head>
<body>
    <div class="container">
        <h1>Delete Customer</h1>
        <p>Are you sure you want to delete this customer?</p>
        <form action="delete_customer_confirm.php" method="post">
            <input type="hidden" name="customer_id" value="<?php echo $_GET['id']; ?>">
            <input type="submit" value="Yes, Delete">
        </form>
    </div>
</body>
</html>