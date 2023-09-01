<?php
include("connect.php");
include("cdn.html");
include("navbar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['ProductCode'];
    $data = "SELECT * FROM Product WHERE ProductCode=$id;";
    $row = mysqli_query($conn, $data);

    while ($r = $row->fetch_assoc()) {
        echo "<br><br><br><div class='container'>
        <div class='row g-5 bg-secondary'>
            <div class='col'>
    <img src='" . $r['Image'] . "' alt=''>
            </div>

            <div class='col'>
            <div>
    <h4>" . $r['ProductName'] . "</h4>
    </div>

    <div>
    <h5>Product Description:</h5>
    <h6>" . $r['Description'] . "</h6>
    </div>
    <div>
        <h5>Price: <b>" . $r['Price'] . "</b></h5>
        </div>
            </div>
        </div>
    </div>";
    }
}
?>