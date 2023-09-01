<body>
    <?php
    include("navbar.php");
    include("connect.php");
    include("cdn.html");
    
    $content =  "SELECT * FROM Product;";
    $res = $conn->query($content);
    ?>

    
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
    </thead>
  <?php  while ($row = $res->fetch_assoc()): ?>
         <tbody>
        <tr id="row">
            <td> <?php echo $row["ProductCode"];?> </td>
            <td> <?php echo $row["ProductName"];?> </td>
            <td> <?php echo $row["ProductType"];?> </td>
            <td> <?php echo $row["Description"];?> </td>
            <td> <?php echo $row["Quantity"];?> </td>
            <td> <?php echo $row["Price"];?> </td>
            <td> <img src='<?php echo $row["Image"];?>' alt='image' height='100px' width='100px'> </td>
            <td><button type='button'  class='btn btn-outline-success' onclick='editprod(<?php echo $row["ProductCode"]; ?>);'>Edit</button></td>
            <td><button type='button' class='btn btn-outline-danger'onclick='deleteprod(<?php echo $row["ProductCode"]; ?>);'>Delete</button></td>
        </tr>
    </tbody>
    <?php endwhile;?>
      </table>
           </div>
          </div>
        </div>

       <script>
function editprod(id){
    var xmlhttp = new XMLHttpRequest();
        console.log(id);
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
           var response =JSON.parse(this.responseText);
             document.getElementById('ProductCode').value = response.ProductCode;
            document.getElementById('ProductName').value = response.ProductName;
            document.getElementById('ProductType').value = response.ProductType;
            document.getElementById('Description').value = response.Description;
            document.getElementById('Quantity').value = response.Quantity;
            document.getElementById('Price').value = response.Price;
            
           
            $('#exampleModal1').modal('show');
          }
        };
        xmlhttp.open('GET','edit.php?q='+id,true);
        xmlhttp.send();
}

    function deleteprod(id){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            location.reload();
          }
        };
        xmlhttp.open('GET','delete.php?q='+id,true);
        xmlhttp.send();
    }
       </script>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Post Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <form action="create.php" method="post">
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Product Name">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="text" id="type"  name="type" class="form-control" placeholder="Product Type">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="text" id="desc" name="desc" class="form-control"
                                    placeholder="Product Description">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="text" id="quant" name="quant" class="form-control" placeholder="Product Quantity">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="text" id="price" name="price" class="form-control" placeholder="Product Price">
                            </div>
                        </div>
                        <br>
                         <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="file" id="Photo" name="Photo" class="form-control" placeholder="Product Photo">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <input type="submit"  class="btn btn-primary" value="Post">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <form action="update.php" method="post">
                    <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="text" id="ProductCode" name="ProductCode"  class="form-control"  hidden>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="text" id="ProductName" name="ProductName" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="text" id="ProductType"  name="ProductType" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="text" id="Description" name="Description" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="text" id="Quantity" name="Quantity" class="form-control" >
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="text" id="Price" name="Price" class="form-control" >
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <input type="submit"  class="btn btn-primary"  value="Edit">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script>
       
    </script>
</body>
