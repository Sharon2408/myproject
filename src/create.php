<?php
include("connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['ProductName'];
    $type = $_POST['ProductType'];
    $desc = $_POST['Description'];
    $quantity = $_POST['Quantity'];
    $price = $_POST['Price'];
    $image = "https://images.pexels.com/photos/7930382/pexels-photo-7930382.jpeg?auto=compress&cs=tinysrgb&w=600";


    $query = "INSERT INTO Product(ProductName, ProductType, Description, Quantity, Price, Image) VALUES ('$name','$type','$desc','$quantity','$price','$image')";
    if (mysqli_query($conn, $query)) {
        echo "New record created successfully !";
    } else {
        echo "Error inserting record: " . mysqli_error($conn);
    }

}
?>