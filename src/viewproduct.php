
<body>
    <?php
    include("connect.php");
    include("cdn.html");
   include("navbar.php");
    $prod = mysqli_query($conn, "SELECT * FROM Product;");
    echo "<div class='container'>
    <div class='row d-flex'>
        ";
    while ($val = mysqli_fetch_assoc($prod)) {
        echo "<div class='col justify-content-center align-item-center mt-5'>
        <div class='card' style='width: 18rem;'>
        <img class='card-img-top' src='" . $val["Image"] . "' alt='Card image cap' height='300px' width='300px'>
        <div class='card-body'>
          <h5 class='card-title'>" . $val["ProductType"] . "</h5>
          <p class='card-text'>" . $val["ProductName"] . "</p>
          <form action='product.php' method='post'>
          <input value='".$val["ProductCode"]."' name='ProductCode' hidden>
          <button type='submit'  class='btn btn-primary'  >View Details</button>
          </form>
          </div>
      </div>
      </div>
      ";
    }
echo " </div></div>";
 ?>
</body>