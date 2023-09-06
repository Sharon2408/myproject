<?php
include("connect.php");
include("cdn.html");
include("navbar.php");

class ViewProduct
{
    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getAllProducts()
    {
        $query = "SELECT * FROM Product;";
        $result = mysqli_query($this->conn, $query);

        $products = [];

        while ($val = mysqli_fetch_assoc($result)) {
            $products[] = $val;
        }

        return $products;
    }

    public function displayProducts()
    {
        $products = $this->getAllProducts();

        echo "<div class='container'>
            <div class='row d-flex'>";

        foreach ($products as $product) {
            echo "<div class='col justify-content-center align-item-center mt-5'>
                <div class='card' style='width: 18rem;'>
                    <img class='card-img-top' src='" . $product["Image"] . "' alt='Card image cap' height='300px' width='300px'>
                    <div class='card-body'>
                        <h5 class='card-title'>" . $product["ProductType"] . "</h5>
                        <p class='card-text'>" . $product["ProductName"] . "</p>
                        
                        <div class='d-flex  flex-direction-row'>
                            <div>
                                <form action='product.php' method='post'>
                                    <input value='" . $product["ProductCode"] . "' name='ProductCode' hidden>
                                    <button type='submit' class='btn btn-primary'>View Details</button>
                                </form>
                            </div>
                            <form action='Cart.php' method='post'>
                                <input value='" . $product["ProductCode"] . "' name='ProductCode' hidden>
                                <button type='submit' class='btn btn-primary ms-2'>Add to Cart</button> <br><br>
                                <label>Quantity:</label>
                        <input class='text-center' type='number' value='" . $product["ord_quant"] . "' name='ordquant'  min='1' max='50' >
                            </form>
                        </div>
                    </div>
                </div>
            </div>";
        }

        echo "</div></div>";
    }
}

$productManager = new ViewProduct($conn);
$productManager->displayProducts();

?>

 
 
 
 
