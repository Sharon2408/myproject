<?php
include("connect.php");
class Update
{
    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function updateprod()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $productId = $_POST["ProductCode"];
            $ProductName = $_POST["ProductName"];
            $ProductType = $_POST["ProductType"];
            $Description = $_POST["Description"];
            $Quantity = $_POST["Quantity"];
            $Price = $_POST["Price"];

            $updateQuery = "UPDATE Product SET ProductName='$ProductName', ProductType='$ProductType', Description='$Description', Quantity='$Quantity', Price='$Price' WHERE ProductCode='$productId'";
            if (mysqli_query($this->conn,$updateQuery)) 
            {
                // echo "Updated Successfully";
                header("Location: crudproduct.php");
                exit();
            } 
            else 
            {
                echo "Error updating product: " . mysqli_error($this->conn);
            }
        }
    }
}

$updateproduct = new Update($conn);
$updateproduct->updateprod();
?>