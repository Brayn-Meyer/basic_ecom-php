<?php
    include "basic_ecom-db.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['item_id'])) {
        $i_id = (int) $_POST['item_id'];

        $sql = "INSERT INTO cart (item_id, user_id) VALUES ('$i_id', '$user_id')";
        
        if ($conn ->query($sql) == TRUE) {
            echo "New item has been added to cart :|";
        } else {
            echo "Error" . $sql . "<br>" . $conn->error;
        }

        $conn -> close();

    }
?>