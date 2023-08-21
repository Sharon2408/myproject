<?php
session_start();
$emailerror = $passworderror = $email = $pass = '';
$valid = true;
include("connect.php");
include("cdn.html");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $users = mysqli_query($conn,"SELECT * FROM User;");
  while($val = mysqli_fetch_assoc($users)){
    if ($val['Username'] == $_POST["username"] && $val['Password'] == $_POST["pass"] && $val['UserType'] == 'admin' ) {
        $_SESSION["u_name"] = $_POST["username"];
        header("Location:crudproduct.php");
      echo  "<script> Swal.fire(
            'Good job!',
            'You clicked the button!',
            'success'
        )</script>";
        exit();
    }
    elseif($val['Username'] == $_POST["username"] && $val['Password'] == $_POST["pass"] && $val['UserType'] == 'user' ){

        header("Location:viewproduct.php");
        exit();
    }
    else {
       echo "<script> Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Check your username or password!',
          })</script>";       
    }
   
  }
   
  mysqli_close($conn);
}

 ?>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="login-form">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <h1>Login</h1>
                        <div class="content">
                            <div class="input-field">
                                <input type="text" name="username" value="<?php echo $email; ?>" placeholder="Username">
                                <small name="emailerror">
                                    <?php echo $emailerror; ?>
                                </small>
                            </div>
                            <div class="input-field">
                                <input type="password" name="pass" value="<?php echo $pass; ?>" placeholder="Password">
                                <small name="passworderror">
                                    <?php echo $passworderror; ?>
                                </small>
                            </div>
                            <a href="#" class="link">Forgot Your Password?</a>
                        </div>
                        <div class="action">
                            <button type="submit" name="submit">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
