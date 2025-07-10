<?php
    include "basic_ecom-db.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $c_id = $_POST["cart_id"];

        $sql = "DELETE FROM cart WHERE cart_id = $c_id";

        if ($conn->query($sql)) {
            echo "Item has been removed from cart :(";
        } else {
            echo "Error deleting record : " . $conn->error;
        }
    }

    $conn->close();
?>