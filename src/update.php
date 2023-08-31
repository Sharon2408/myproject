<?php
include("connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST["ProductCode"];
    $ProductName = $_POST["ProductName"];
    $ProductType = $_POST["ProductType"];
    $Description = $_POST["Description"];
    $Quantity = $_POST["Quantity"];
    $Price = $_POST["Price"];



    $updateQuery = "UPDATE Product SET ProductName='$ProductName', ProductType='$ProductType', Description='$Description', Quantity='$Quantity', Price='$Price' WHERE ProductCode='$productId'";
    if ($conn->query($updateQuery)) {
       // echo "Updated Successfully";
       header("Location: crudproduct.php");
       exit();
    } else {
        echo "Error updating product: " . mysqli_error($conn);
    }
}
?>