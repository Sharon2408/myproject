
<?php

include("connect.php");

$productId = intval($_GET['q']) ;
    $query = "SELECT * FROM Product WHERE ProductCode = $productId";
    $result = mysqli_query($conn,$query);
    if ($result->num_rows > 0) {
        $productData = $result->fetch_assoc();
        $conn->close();
        header('Content-Type: application/json');
        echo json_encode($productData);
        exit();
    }



?>



