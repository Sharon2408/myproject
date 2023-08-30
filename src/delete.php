<?php
include("connect.php");

    $id = intval($_GET['q']);
    echo $id;
    $query = "DELETE FROM Product WHERE ProductCode = $id";
    if (mysqli_query($conn, $query)) {
        echo "Record deleted successfully !";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }



?>