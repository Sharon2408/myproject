<?php
// include("connect.php");

// $id = intval($_GET['q']);
// echo $id;
// $query = "UPDATE  Product SET ProductName=$name,ProductType=$type,Description=$description,Quantity=$quant,Price=$price WHERE ProductCode = $id";
// if (mysqli_query($conn, $query)) {
//     echo "Record edited successfully !";
// } else {
//     echo "Error editing record: " . mysqli_error($conn);
// }


?>
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


<?php
// Include database connection and any necessary configuration
// include("connect.php");
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $productId = $_POST["productCode"];
//     $ProductName = $_POST["ProductName"];
//     $ProductType = $_POST["ProductType"];
//     $Description = $_POST["Description"];
//     $Quantity = $_POST["Quantity"];
//     $Price = $_POST["Price"];
//     $Image = $_POST["Image"];

  
//     $updateQuery = "UPDATE Product SET ProductName='$ProductName', ProductType='$ProductType', Description='$Description', Quantity='$Quantity', Price='$Price', Image='$Image' WHERE ProductCode='$productId'";
//     if ($conn->query($updateQuery) === TRUE) {

//         header("Location: product.php");
//         exit();
//     } else {
//         echo "Error updating product: " . $conn->error;
//     }
// }
?>
