<?php

    session_start();
    include 'connection.php';
    $itemId =$_GET['id'];
    $query = "select * from  menu where id =$itemId;";
    $res = mysqli_query($con,$query);
    while($data = mysqli_fetch_array($res)){
        $itemname = $data['itemname'];
        $prize = $data['prize'];
        $image = $data['image'];
        $feature = $data['feature'];
        $category = $data['category'];
        $type = $data['type'];
        $email = $_SESSION['username'];
    }
    $query2 ="insert into favourite(itemid,itemname,prize,image,feature,category,type,email) values($itemId,'$itemname','$prize','$image','$feature','$category','$type','$email')";
    $res2 = mysqli_query($con,$query2);
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