<!DOCTYPE html>
<html>
<head>
    <title>Basic Ecom - Cart Page</title>
</head>
<body>
    <h1>Cart Page</h1>
    <?php
        include "basic_ecom-db.php";
        
        $sql = "SELECT cart.cart_id, cart.item_id, items.item_name, items.item_description, items.item_url, items.item_price  FROM items INNER JOIN cart ON items.item_id = cart.item_id WHERE user_id = $user_id";

        echo "<table>";
        echo    "<tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Delete</th>
                </tr>";
        $results = mysqli_query($conn, $sql);
        if (mysqli_num_rows($results) > 0) {
                while ($row = mysqli_fetch_assoc($results)) {
                    echo "<tr>";
                        $cart_id = $row["cart_id"];
                        $image_url = $row["item_url"];
                        $name = $row["item_name"];
                        $des = $row["item_description"];
                        $price = $row["item_price"];
                        echo "<td><img src='$image_url' alt='Image'></td>";
                        echo "<td>$name</td>";
                        echo "<td>$des</td>";
                        echo "<td>R$price</td>";
                        echo    "<td>
                                    <form action='remove_from_cart.php' method='post'>
                                        <input type='hidden' name='cart_id' value='$cart_id'>
                                        <button type='submit'>Remove from cart</button>
                                    </form>
                                </td>";
                    echo "</tr>";
                }
        } else {
            echo "No items found.";
        }


    ?>
    <style>
        img {
            width: 200px;
            height: 200px;
            border-radius: 15px;
            margin-top : 10px;
        }
/* 
        .card_container {
            display : grid;
            align-content : center;
            text-align : center;
            grid-template-columns : repeat(3 , 400px);
            gap: 20px
        }

        .card {
            width: 400px;
            border: 1px, rgb(0, 0, 0), solid;
            margin-bottom: 50px;
            border-radius: 15px;
        } */
    </style>
</body>
</html>