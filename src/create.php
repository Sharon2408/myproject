<?php
include("connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $desc = $_POST['desc'];
    $quantity = $_POST['quant'];
    $price = $_POST['price'];
    $image = "https://images.pexels.com/photos/7930382/pexels-photo-7930382.jpeg?auto=compress&cs=tinysrgb&w=600";


    $query = "INSERT INTO Product(ProductName, ProductType, Description, Quantity, Price, Image) VALUES ('$name','$type','$desc','$quantity','$price','$image')";
    if (mysqli_query($conn, $query)) {
        //echo "New record created successfully !";
        header("Location: crudproduct.php");
        exit();
    } else {
        echo "Error inserting record: " . mysqli_error($conn);
    }

}
?>