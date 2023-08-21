<body>
    <?php
    include("connect.php");
    include("cdn.html");
    // include("navbar.php");
    $content = mysqli_query($conn, "SELECT * FROM Product;");
    $name= $_GET['p_name'];
    $type= $_GET['p_type'];
    $desc= $_GET['p_desc'];
    $quantity= $_GET['p_quantity'];
    $price= $_GET['p_price'];
     $image= "https://images.pexels.com/photos/7930382/pexels-photo-7930382.jpeg?auto=compress&cs=tinysrgb&w=600";
    # Insert into the database
    $query = "INSERT INTO Product(ProductName, ProductType, Description, Quantity, Price, Image) VALUES ('$name','$type','$desc','$quantity','$price','$image')";
    if (mysqli_query($conn, $query)) {
        echo "New record created successfully !";
    } else {
         echo "Error inserting record: " . mysqli_error($conn);
    }
    echo "
    <div class='container'>
    <button class='btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#exampleModal' >CREATE</button>
    <br>
    <div class='row'>
        <div class='col'>
    <table class='table table-striped '>
    <thead class='text-center'>
        <tr>
             <th>ID</th>
            <th>Product Name</th>
            <th>Product Type</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Image</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>";
    while ($row = mysqli_fetch_assoc($content)) {
        echo " <tbody>
        <tr>
            <td>" . $row["ProductCode"] . "</td>
            <td>" . $row["ProductName"] . "</td>
            <td>" . $row["ProductType"] . "</td>
            <td>" . $row["Description"] . "</td>
            <td>" . $row["Quantity"] . "</td>
            <td>" . $row["Price"] . "</td>
            <td> <img src= ' " . $row["Image"] . " ' alt='image' height='100px' width='100px'> </td>
            <td><button type='button' class='btn btn-outline-success' >Edit</button></td>
            <td><button type='button' class='btn btn-outline-danger' >Delete</button></td>
        </tr>
    </tbody>";
    }
    echo "   </table>
           </div>
          </div>
        </div>";

    ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
                    <!-- <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="text" hidden class="form-control" placeholder="Product ID">
                            </div>
                        </div>
                        <br> -->
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="text" name="p_name" class="form-control" placeholder="Product Name">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="text" name="p_type" class="form-control" placeholder="Product Type">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="text" name="p_desc" class="form-control" placeholder="Product Description">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="text" name="p_quantity" class="form-control" placeholder="Product Quantity">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="text" name="p_price" class="form-control" placeholder="Product Price">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Cancel</button>
                    <button type="button" onclick="createProduct()" class="btn btn-primary">Post</button>
                </div>
            </div>
        </div>
    </div>
    <script>
function createProduct() {
if($_SERVER["REQUEST_METHOD"] == "POST"){

  if ( $_GET['p_name'] == ''||
     $_GET['p_type'] == ''||
     $_GET['p_desc'] == ''||
    $_GET['p_quantity'] == ''||
     $_GET['p_price']== '') {
     Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'please fill all fields',
          });
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        Swal.fire({
            icon: 'success',
            title: 'Product',
            text: 'Product Created',
          });
      }
    };
    xmlhttp.open("POST","getuser.php?q="+str,true);
    xmlhttp.send();
  }
}
}


</script>
</body>