
<body>
    <?php
    include("connect.php");
    include("cdn.html");
  // include("navbar.php");
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
          <button type='button'  class='btn btn-primary' data-bs-target='#collapseExample' data-bs-toggle='collapse' aria-expanded='false' aria-controls='collapseExample'>View Details</button>
          <div class='collapse' id='collapseExample'>
          <p class='card-text'>&#8377; " . $val["Price"] . "</p>
          <p class='card-text'> " . $val["Description"] . "</p>
          <p class='card-text'>Available Quantity :" . $val["Quantity"] . "</p>
          </div>
          </div>
      </div>
      </div>
      ";
    }
echo " </div></div>";
 ?>
</body>