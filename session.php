<?php
   include('config.php');
   session_start();
 
   $user_check = $_SESSION['user'];
   
   $ses_sql = mysqli_query($conn,"SELECT Name from teachers WHERE Name = '$user_check'");
   $row = mysqli_fetch_array($ses_sql);
   
   $login_session = $row['Name'];
   
   if(!isset($_SESSION['user'])){
      header("Location:FacultyLogin.php");
   }
?>