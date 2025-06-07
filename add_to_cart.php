<?php
session_start();

if (isset($_SESSION["user_id"])) {
//If the cart session variable doesn't exist, initialize it as an empty array
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
$productId = $_POST['product_id'];
$quantity = $_POST['quantity'];


// Add the product to the cart array
$_SESSION['cart'][$productId] = $quantity;

// Redirect to the homepage
header("Location: home.php");
}

else{
echo '<script>
        alert("Sorry ! You need to login first . . .");
        window.location.href = "login.html"; 
    </script>';
//header("Location: login.html");
}
exit();
?>
