<!DOCTYPE html>
<html>
<head>
    <title>Basic Ecom - Landing Page</title>
</head>
<body>
    <?php include "basic_ecom-db.php"; ?>
    <h1>Welcome 
        <?php 
            $sql = "SELECT username FROM users WHERE user_id = $user_id";
            $name = mysqli_query($conn, $sql);
            if (mysqli_num_rows($name) > 0) {
                while ($row = mysqli_fetch_assoc($name)) {
                    echo $row["username"]. "<br>";
                }
            } else {
                echo "No users found.";
            }
        ?>
    </h1>
    <h4>You are here.</h4>
    <ul>
        <li><a href="product_page.php">Product Page</a></li>
        <li><a href="cart_page.php">Cart Page</a></li>
    </ul>
    <style>
        h1, h4 {
            text-align : center;
        }
    </style>
</body>
</html>