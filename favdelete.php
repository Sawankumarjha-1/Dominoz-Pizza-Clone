<?php

    session_start();
    include 'connection.php';
    $itemId =$_GET['id'];
    $email =$_SESSION['username'];
    $query = "delete from  favourite where itemid =$itemId AND email='$email'";
    $res = mysqli_query($con,$query);
    $email = $_SESSION['username'];
                    $selectquery3 = "select * from favourite where email = '$email'";
                    $query3= mysqli_query($con,$selectquery3);
                    $selectquery4 = "select * from cartitem where signupemail = '$email'";
                   
                    $query4= mysqli_query($con,$selectquery4);
    
                    $_SESSION['favourite']=mysqli_num_rows($query3);
                    $_SESSION['cart']=mysqli_num_rows($query4);
    ?>
    <script>location.href = 'menu.php'</script>
    <?php
?>