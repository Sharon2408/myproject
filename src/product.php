<?php
include("connect.php");
include("cdn.html");
include("navbar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['ProductCode'];
    $data = "SELECT * FROM Product WHERE ProductCode=$id;";
    $row = mysqli_query($conn, $data);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Login Form Example</title>
    <link rel="stylesheet" href="../src/assets/productstyle.css">
</head>

<body>
    

<section class="btn-design">
    <div class="container-fluid">
        <div class="row w-100 justify-content-between">

            
            <div class="col-md-12 col-lg-4 col-xl-5" id="Colunm-1">
                <div class="card" id="img-card" style="width: 31rem;">
                    <a href="#">
                    <?php  while ($r = $row->fetch_assoc()): ?>
                        <div class="card-img-top"><img class="poster-img" src="<?php echo $r['Image']; ?>" alt="jailer-poster">

                        </div>
                    </a>
                </div>

            </div>
            
            <div class="col-md-12 col-lg-8 col-xl-7 text-white mt-md-4 mt-lg-4" id="film-contents">

               
                <div class="movie-name">
                    <p><?php echo $r['ProductName']; ?> <br> &#8377; <?php echo $r['Price']; ?></p>
                </div>

                
                <div class="row">
                    <div class="mt-3 d-flex align-items-center" id="movie-ratings">
                        <i class="fa-solid fa-star fa-beat-fade"></i>
                        <p class="ms-2">3.1/5</p>
                    </div>
                </div>

               
                <div class="row ms-1 mt-3" id="rate-row">
                    <div class="card d-flex flex-row align-items-center p-0 p-sm-1">
                        <div class="col-2 col-md-8" id="rate-col-one">
                            <div class="card-body">
                                <div class="card-text">
                                    <p>Add your rating & review</p>
                                    <p>Your ratings matter</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-5 col-md-4">
                            <div class="rate-btn text-center">
                                <a href="#">Rate now</a>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="row mt-4">
                    <div class="col-12 d-flex align-items-center">
                        <div class="dimension">
                            <a href="#">Available Stock : <?php echo $r['Quantity']; ?> </a>
                        </div>
                    </div>
                </div>

                
                <div class="row mt-3" id="certificate">
                    <div class="col-12">
                        <p>
                            Description: <?php echo $r['Description']; ?>
                        </p>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-12" id="book-ticket">
                    <form action='Cart.php' method='post'>
                                <input value="<?php echo $r['ProductCode']; ?>" name='ProductCode' hidden>
                                <button type='submit' class='btn btn-primary ms-2'>Add to Cart</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endwhile;?>
</body>
</html>