<?php

include 'config.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $mail = $_POST['emailid'];
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    if($pass == $cpass){

        $sql ="SELECT * FROM teachers WHERE email = '$mail'";
        $result = mysqli_query($conn,$sql);

        if(!mysqli_num_rows($result) > 0){
            $sql = "INSERT INTO teachers (Name,email,Password) VALUES('$name','$mail','$pass')";
            $result = mysqli_query($conn, $sql);
            if($result){
               echo "<script>alert('WOW !!!  User Registration Successful !!!')</script>";
            }else{
                echo "<script>alert('Woops!! Somehing went wrong')</script>";
            }
        }else{
            echo "<script>alert('Woops!! E-Mail Already Exists')</script>";
        }
    }else{
        echo "<script>alert('Password Not Matched')</script>";
    }
};

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Create Account</title>
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
            .container-form form .form-btn{
                background: #fbd0d9;
                color: crimson;
                text-transform: capitalize;
                font-size: 20px;
                cursor: pointer;
            }
            .container-form .form-btn:hover{
                background: crimson;
                color: #fff;
            }
            .container-form form p{
                margin-top: 10px;
                font-size: 20px;
                color: #333;
            }
            .container-form form p a{
                color: crimson;
            }
            .container-form form .error-msg{
                margin: 10px 0;
                display: block;
                background: crimson;
                color: #fff;
                border-radius: 5px;
                font-size: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container-form">
            <form action="CreateAccount.php" method="POST">
                <h3>
                    Register Now!!
                </h3>
                <?php
                
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    };
                };

                ?>
                <input type="text" name="name" required placeholder="Enter Your Name Here">
                <input type="email" name="emailid" required placeholder="Enter Your E-mail Id Here">
                <input type="password" name="password" required placeholder="Enter Your Password Here">
                <input type="password" name="cpassword" required placeholder="Confirm Your Password Here">
                <input type="Submit" name="submit" value="register-now" class="form-btn">
                <p>already have an account?? <a href="FacultyLogin.php">Login Now</a></p>
            </form>
        </div>
    </body>
</html>