<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
	<link rel="stylesheet" href="style/login.css">
</head>
<body>
    <div class="container">
        <h1>Edit Category</h1>
        <form action="update_category.php" method="post">
            <input type="hidden" name="CategoryID" value="<?php echo $_GET['id']; ?>">
			
            <label for="CategoryName">Category Name:</label>
            <input type="text" id="CategoryName" name="CategoryName" value="<?php echo $_GET['CategoryName']; ?>">
			
			 <label for="CategoryDescription">Category Description:</label>
			<textarea id="CategoryDescription" name="CategoryDescription" rows="3" cols="50"><?php echo $_GET['CategoryDescription']; ?></textarea>
			
            <br>
            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>