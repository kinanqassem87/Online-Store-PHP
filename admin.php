<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Dashboard</title>
    <link rel="stylesheet" href="style/admin.css">
</head>
<body>
<?php
 include 'checkadmin.php';
?>
    <header>
        <h1>Management Dashboard</h1>
    </header>
    <main>
        <section class="section">
           <a href="view_customers.php"> <h2>Customers Management</h2> </a>
            </section>
        <section class="section">
          <a href="view_products.php">   <h2>Products Management</h2></a>
            </section>
        <section class="section">
           <a href="view_categories.php">  <h2>Categories Management</h2></a>
            </section>
        <section class="section">
           <a href="view_orders.php">  <h2>Orders Management</h2></a>
            </section>
    </main>
</body>
</html>