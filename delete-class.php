<?php

session_start();

include ("config.php");
                                     
if (isset($_GET['id']))
{
    $id=$_GET['id'];
    $deleteQuery="DELETE FROM classes where CourceID=$id"; 
    mysqli_query($conn, $deleteQuery);

    echo "<script>window.location = 'manage_classes.php';</script>";
} else {
    echo "ERR!";
}

?>