<!DOCTYPE html>
<html>
<head>
    <title>Order Summary</title>
	</head>
	<style>
	table {
    border-collapse: collapse;
    width: 100%;
			}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
		}

th {
    background-color: #f2f2f2;   

	}
	</style>
<body>
<?php
include 'fetch_orders.php';
?>
    <h1>Order Summary</h1>
    <table>
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Order Date</th>
            <th>Customer Name</th>
            <th>Total Order</th>
            <th>Total Quantity</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['OrderID']; ?></td>
                <td><?php echo $row['OrderDate']; ?></td>
                <td><?php echo $row['CustomerName']; ?></td>
                <td><?php echo $row['TotalOrder']; ?></td>
                <td><?php echo $row['TotalQty']; ?></td>
                <td><a href="order_details.php?order_id=<?php echo $row['OrderID']; ?>">View Details</a></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
</body>
</html>