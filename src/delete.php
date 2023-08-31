<?php
include("connect.php");

    $id = intval($_GET['q']);
    echo $id;
    $query = "DELETE FROM Product WHERE ProductCode = $id";
    if (mysqli_query($conn, $query)) {
        header("Location: crudproduct.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }



?>