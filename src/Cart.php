<?php
include("connect.php");
include("cdn.html");
include("navbar.php");
$u_id = $_SESSION['u_id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['ProductCode'];
    $data = "SELECT * FROM Product WHERE ProductCode=$id;";
    $row1 = mysqli_query($conn, $data);
    while ($r1 = $row1->fetch_assoc()) {
        $p_id = $r1['ProductCode'];
        $p_name = $r1['ProductName'];
        $p_type = $r1['ProductType'];
        $p_desc = $r1['Description'];
        $p_quant = $r1['Quantity'];
        $p_price = $r1['Price'];
        $p_img = $r1['Image'];
        $cart = "INSERT INTO Cart (ProductCode,Userid,ProductName,ProductType,Description,Quantity,Price,Image) 
    values ($p_id,$u_id,'$p_name','$p_type','$p_desc','$p_quant','$p_price','$p_img');";
        $excart = mysqli_query($conn, $cart);
    }

   
}

$viewcart = "SELECT * FROM Cart WHERE Userid = $u_id;";
$row2 = mysqli_query($conn, $viewcart);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h2 class="text-center">CART</h2>
            <?php if (isset($row2)): ?>
                <?php while ($r2 = $row2->fetch_assoc()): ?>
                    <div class="col-4">
                        <div class="card-deck">
                            <div class="card">
                                <img class="card-img-top" src="<?php echo $r2['Image']; ?>" alt="Card image cap" height="237px"
                                    width="180px">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php echo $r2['ProductName']; ?>
                                    </h5>
                                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in
                                        to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="container">
                    <div class="row p-3">
                        <div class="col text-center text-muted p-5 rounded border border-info">
                            <h1>Nothing in Cart! :(</h1>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>