<?php
session_start();
// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    // Redirect to the homepage
    header("Location: home.php");
    exit();
}
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare and execute a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM Customers WHERE CustomerUserName = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["CustomerPassword"])) {
            // User exists and password matches
            $_SESSION["user_id"] = $row["CustomerID"];
            $_SESSION["username"] = $row["CustomerUserName"];
			$_SESSION["CustomerName"] = $row["CustomerName"];
			$_SESSION["PermissionID"] = $row["PermissionID"];
			
			
			
			if($row["PermissionID"]=="1")
			{
			header("Location: adminhome.php");
			}
			else{
			header("Location: home.php");
			}            
            exit();
        } 
		else {
           
			echo '<script>
        alert("Invalid password.");
        window.location.href = "login.html"; // Redirect to the login page
    </script>';
        }
    } else {
		echo '<script>
        alert("User does not exist.");
        window.location.href = "login.html"; // Redirect to the login page
    </script>';
		
        exit();
    }

    $stmt->close();
}

$conn->close();
?>