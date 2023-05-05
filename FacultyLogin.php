<?php
include 'config.php';

session_start();
if(isset($_POST['submit'])){
    $mail =$_POST['emailid'];
    $pass = md5($_POST['password']);

    $sql = "SELECT * FROM teachers WHERE email='$mail' && Password ='$pass' ";
    $result = mysqli_query($conn ,$sql );
    $row = mysqli_fetch_array($result);
    if(mysqli_num_rows($result) > 0){
       echo " <script>alert('Whoops!!! ,SuccessFul')</script> ";
        $_SESSION['user']=$row['Name'];
        header("location: welcome.php");
    }else{
        echo " <script>alert('Whoops!!! , Maybe the email or Password is incorrect')</script> ";
    }
}
?>
<!DOCTYPE html>
<Html>
    <Head>
        <title>Login Page</title>
        <style>
            .container-form {
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 20px;
                padding-bottom: 60px;
                background: #eee;
            }
            .container-form form{
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
                background: #fff;
                text-align: center;
            }
            .container-form form h3{
                font-size: 30px;
                text-transform: uppercase;
                margin-bottom: 10px;
                color: #333;
            }
            .container-form input{
                width: 80%;
                padding: 10px;
                font-size: 17px;
                margin: 8px 0;
                background: #eee;
                border: none;
                outline: none;
            }
            .container-form form .login-btn{
                background: #CDFCC7;
                color: rgb(49, 122, 0);
                text-transform: capitalize;
                font-size: 20px;
                cursor: pointer;
            }
            .container-form .login-btn:hover{
                background: rgb(46, 224, 1);
                color: #fff;
            }
            .container-form form p{
                margin-top: 10px;
                font-size: 20px;
                color: #333;
            }
            .container-form form p a{
                color: rgb(29, 119, 2);
            }
        </style>
    </Head>
    <body>
        <div class="container-form">
            <form action="" method="post">
                <h3>
                    Login
                </h3>
                <input type="email" name="emailid" required placeholder="Enter Your Mail">
                <input type="password" name="password" required placeholder="Enter Your Password">
                <input type="submit" name="submit" value="Login" class="login-btn">
                <p>Don't have an account?? <a href="CreateAccount.php">Register Now</a></p>
            </form>
        </div>
    </body>
</Html>