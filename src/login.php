<?php

include("connect.php");
include("cdn.html");

class Login
{
    public $conn;
    public function __construct($conn)
    {
    $this->conn = $conn;
    }

    public function login()
    {
             session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $users = mysqli_query($this->conn,"SELECT * FROM User;");

    while($val = mysqli_fetch_assoc($users))
    {
        if ($val['Username'] == $_POST["username"] && $val['Password'] == $_POST["pass"] && $val['UserType'] == 'admin' ) 
        {
             $_SESSION["u_name"] = $_POST["username"];
                 
                    echo  "<script> Swal.fire(
                            'Good job!',
                            'You clicked the button!',
                            'success'
                             )</script>";
                             header("Location:crudproduct.php");
                            exit();
    }

    elseif($val['Username'] == $_POST["username"] && $val['Password'] == $_POST["pass"] && $val['UserType'] == 'user' )
    {
        $_SESSION["u_name"] = $_POST["username"];
        $_SESSION["u_id"] = $val['UID'];
        header("Location:viewproduct.php");
        exit();
    }
    else 
    {
            echo "<script> Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Check your username or password!',
            })</script>";       
    }
   
}
mysqli_close($this->conn);
}
}
}
$login = new Login($conn);
$login->login();

 ?>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="login-form">
                    <form action="" method="post">
                        <h1>Login</h1>
                        <div class="content">
                            <div class="input-field">
                                <input type="text" name="username" value="" placeholder="Username" autocomplete="off" >
                            </div>
                            <div class="input-field">
                                <input type="password" name="pass" value="" placeholder="Password" autocomplete="off">
                            </div>
                           
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
