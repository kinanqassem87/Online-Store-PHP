<!DOCTYPE html>
<html>
<head>
    <title>Categories List</title>
    <link rel="stylesheet" href="style/customer_manag.css">
</head>
<body>
    <div class="container">
        <h1>Categories List</h1>
        <form action="view_categories.php" method="get">
            <label for="search">Search:</label>
            <input type="text" id="search" name="search" placeholder="Search by Collection name or Description">
            <input type="submit" value="Search">
        </form>
		<a href="insert_category.html" class="button">Add New Category</a>
        <table>
            <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Category Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'fetch_category.php';

                // Loop through the fetched data and display it in the table
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['CategoryID'] . "</td>";
                    echo "<td>" . $row['CategoryName'] . "</td>";
                    echo "<td>" . $row['CategoryDescription'] . "</td>";
                    echo "<td><a href='edit_category.php?id=" . $row['CategoryID'] . "
					&CategoryName=" . $row['CategoryName'] . "
					&CategoryDescription=" . $row['CategoryDescription'] . "
					'>Edit</a> | <a href='delete_category.php?id=" . $row['CategoryID'] . "'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
	
	<a href="logout.php">Logout</a>
</body>
</html>