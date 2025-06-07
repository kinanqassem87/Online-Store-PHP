<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer</title>
	<link rel="stylesheet" href="style/login.css">
</head>
<body>
    <div class="container">
        <h1>Edit Customer</h1>
        <form action="update_customer.php" method="post">
            <input type="hidden" name="customer_id" value="<?php echo $_GET['id']; ?>">
			
            <label for="customer_username">Customer Username:</label>
            <input type="text" id="customer_username" name="customer_username" value="<?php echo $_GET['UserName']; ?>">
			
			 <label for="CustomerName">CustomerName:</label>
            <input type="text" id="CustomerName" name="CustomerName" value="<?php echo $_GET['CustomerName']; ?>">
			
			 <label for="CustomerPhone">CustomerPhone:</label>
            <input type="text" id="CustomerPhone" name="CustomerPhone" value="<?php echo $_GET['CustomerPhone']; ?>">
			
			 <label for="CustomerAddress">CustomerAddress:</label>
            <input type="text" id="CustomerAddress" name="CustomerAddress" value="<?php echo $_GET['CustomerAddress']; ?>">
			
			 
			
			<label for="PermissionType">Permission Type:</label>
			<select name="PermissionType" id="PermissionType">
				<?php
				// Fetch permission types from the database and populate the dropdown
				// Database connection details 
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "onlinestore";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}
			// Prepare and execute the SQL statement to fetch permission types
			$sql = "SELECT PermissionID, PermissionType FROM Permissions";
			$result = $conn->query($sql);
			$conn->close();
			
			
			// Populate the dropdown with permission types
			while ($row = $result->fetch_assoc()) {
				echo "<option value='" . $row['PermissionID'] . "'>" . $row['PermissionType'] . "</option>";
			}
			
			?>
			
			</select>
            <br>
            <input type="submit" value="Update">
        </form>
    </div>
	
	
	
	
				<script>
				const selectElement = document.getElementById("PermissionType");
				const PermissionType = "<?php echo $_GET['PermissionType']; ?>";

				// Iterate over options and check the text content
				for (let i = 0; i < selectElement.options.length; i++) {
					if (selectElement.options[i].text === PermissionType) {
						selectElement.options[i].selected = true;
						break;
					}
				}
			</script>
	
</body>
</html>