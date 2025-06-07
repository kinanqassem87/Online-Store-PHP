<!DOCTYPE html>
<html>
<head>
    <title>Customer List</title>
    <link rel="stylesheet" href="style/customer_manag.css">
</head>
<body>
    <div class="container">
        <h1>Customer List</h1>
        <form action="view_customers.php" method="get">
            <label for="search">Search:</label>
            <input type="text" id="search" name="search" placeholder="Search by username or name">
            <input type="submit" value="Search">
        </form>
		<a href="insert_customer.html" class="button">Add New Customer</a>
        <table>
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Permission Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'fetch_customers.php';

                // Loop through the fetched data and display it in the table
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['CustomerID'] . "</td>";
                    echo "<td>" . $row['CustomerUserName'] . "</td>";
                    echo "<td>" . $row['CustomerName'] . "</td>";
                    echo "<td>" . $row['CustomerPhone'] . "</td>";
                    echo "<td>" . $row['CustomerAddress'] . "</td>";
                    echo "<td>" . $row['PermissionType'] . "</td>";
                    echo "<td><a href='edit_customer.php?id=" . $row['CustomerID'] . "
					&UserName=" . $row['CustomerUserName'] . "
					&CustomerName=" . $row['CustomerName'] . "
					&CustomerPhone=" . $row['CustomerPhone'] . "
					&CustomerAddress=" . $row['CustomerAddress'] . "
					&PermissionType=" . $row['PermissionType'] . "
					'>Edit</a> | <a href='delete_customer.php?id=" . $row['CustomerID'] . "'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
	
	<a href="logout.php">Logout</a>
</body>
</html>