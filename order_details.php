<!DOCTYPE html>
<html>
<head>
    <title>Order Details</title>
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
include 'fetch_details.php';
$totalAmount = 0;
?>

    <h1>Order Details</h1>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderDetails as $row): ?>
                <tr>
                    <td><?php echo $row['ProductTitle']; ?></td>
                    <td> $ <?php echo $row['ProductPrice']; ?></td>
                    <td><?php echo $row['QtyOfItem']; ?></td>
                    <td> $ <?php echo $row['TotalPrice']; ?></td>
					<?php $totalAmount+=$row['TotalPrice']; ?>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3"><strong>Total</strong></td>
                <td><strong>$ <?php echo $totalAmount; ?></strong></td>
            </tr>
        </tbody>
    </table>

</body>
</html>