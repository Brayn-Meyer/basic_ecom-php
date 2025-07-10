<!DOCTYPE html>
<html>
<head>
    <title>Basic Ecom - Product Page</title>
</head>
<body>
    <h1>Product Page</h1>
    <ul>
        <li><a href="landing_page.php">Landing Page</a></li>
        <li><a href="cart_page.php">Cart Page</a></li>
    </ul>
    <?php
        include "basic_ecom-db.php";

        $sql = "SELECT * FROM items";
        $results = mysqli_query($conn, $sql);

        if (mysqli_num_rows($results) > 0) {
            echo "<div class='card_container'>";
            while ($row = mysqli_fetch_assoc($results)) {
                $item_id = $row["item_id"];
                $image_url = $row["item_url"];
                $name = $row["item_name"];
                $des = $row["item_description"];
                $price = $row["item_price"];

                echo "<div class='card'>";
                    echo "<img src='$image_url' alt='Image'>";
                    echo "<h2>Name: $name</h2>";
                    echo "<h4>Description: $des</h4>";
                    echo "<h4>Price: R$price</h4>";

                    echo "<form action='add_to_cart.php' method='post'>";
                    echo "<input type='hidden' name='item_id' value='$item_id'>";
                    echo "<button type='submit'>Add to cart</button>";
                    echo "</form>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "No items found.";
        }

        mysqli_close($conn);
    ?>

    <style>
        img {
            width: 200px;
            height: 200px;
            border-radius: 15px;
            margin-top: 10px;
        }

        .card_container {
            display: grid;
            align-content: center;
            text-align: center;
            grid-template-columns: repeat(3, 400px);
            gap: 20px;
        }

        .card {
            width: 400px;
            border: 1px solid rgb(0, 0, 0); /* Corrected CSS */
            margin-bottom: 50px;
            border-radius: 15px;
            padding: 15px;
        }
    </style>
</body>
</html>