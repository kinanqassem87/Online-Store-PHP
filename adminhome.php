<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two-Section Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    display: flex;
}

.section1, .section2 {
    flex: 1;
    padding: 20px;
    border: 1px solid #ccc;
}

.section1 {
    background-color: #f0f0f0;
}

.section2 {
    background-color: #e0e0e0;
}
</style>
<body>
    <div class="container">
        <section class="section1">
           <a href="admin.php"> <h2>Admin Page</h2> </a>
           
        </section>
        <section class="section2">
          <a href="home.php">  <h2>Home Page</h2> </a>
            
        </section>
    </div>
</body>
</html>