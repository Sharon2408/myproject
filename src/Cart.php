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
        $p_ordquant = $r1['ordquant'];
        $cart = "INSERT INTO Cart (ProductCode,Userid,ProductName,ProductType,Description,Quantity,ord_quant,Price,Image) 
    values ($p_id,$u_id,'$p_name','$p_type','$p_desc','$p_quant',$p_ordquant,'$p_price','$p_img');";
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
    <title>Simple Login Form Example</title>
    <link rel="stylesheet" href="../src/assets/button.css">
</head>

<body>
    <?php if (isset($row2)): ?>
        <div class="container mt-5">
            <div class="row">
                <h2 class="text-center">CART</h2>
                <div class="col-12">
                    <h1>Product List</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Quantity</th>
                                <th>Sub-Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php while ($r2 = $row2->fetch_assoc()): ?>
                            <tbody>
                                <td>
                                    <?php echo $r2['ProductName'] ?>
                                </td>
                                <td> &#8377;
                                    <?php echo $r2['Price'] ?>
                                </td>
                                <td> <img src="<?php echo $r2['Image'] ?>" alt="" height="80px"> </td>
                                <td> <?php echo $r2['ord_quant'] ?> </td>
                                <td>&#8377; </td>
                                <td>
                                    <form action="deletecart.php" method="post">
                                        <button type="submit" class="butn"
                                            onclick='deleteprod(<?php echo $r2["ProductCode"]; ?>);'>
                                            <svg viewBox="0 0 15 17.5" height="17.5" width="15"
                                                xmlns="http://www.w3.org/2000/svg" class="icon">
                                                <path transform="translate(-2.5 -1.25)"
                                                    d="M15,18.75H5A1.251,1.251,0,0,1,3.75,17.5V5H2.5V3.75h15V5H16.25V17.5A1.251,1.251,0,0,1,15,18.75ZM5,5V17.5H15V5Zm7.5,10H11.25V7.5H12.5V15ZM8.75,15H7.5V7.5H8.75V15ZM12.5,2.5h-5V1.25h5V2.5Z"
                                                    id="Fill"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tbody>
                        <?php endwhile; ?>
                    </table>
                </div>
                <div class="card">
                    <div class="card-body text-end">
                        <h2>Cart Total: <br> $<span id="cart-total">0.00</span></h2>

                        <p></p>
                        <button class="btn btn-primary" onclick="checkout()">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <?php else: ?>
        <div class="container">
            <div class="row p-3">
                <div class="col text-center text-muted p-5 rounded border border-info">
                    <h1>Nothing in Cart! :(</h1>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <script>
                    function deleteprod(id) {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {
                                location.reload();
                            }
                        };
                        xmlhttp.open('GET', 'deletecart.php?q=' + id, true);
                        xmlhttp.send();
                    }
                </script>
</body>

</html>